import { useState } from 'react'
import { useQuery, useMutation } from '@tanstack/react-query'
import { aiService } from '../../services/api'
import toast from 'react-hot-toast'
import { Brain, CheckSquare, Square, AlertTriangle, Loader2, RotateCcw } from 'lucide-react'

const URGENCE_CONFIG = {
  elevee:  { color: 'text-red-700 bg-red-50 border-red-200',    icon: '🔴', label: 'Urgence élevée' },
  moderee: { color: 'text-orange-700 bg-orange-50 border-orange-200', icon: '🟠', label: 'Urgence modérée' },
  faible:  { color: 'text-green-700 bg-green-50 border-green-200',  icon: '🟢', label: 'Urgence faible' },
}

export default function PatientAI() {
  const [selected, setSelected] = useState([])
  const [result, setResult] = useState(null)

  const { data: symptomesData, isLoading: loadingSymptomes } = useQuery({
    queryKey: ['symptomes'],
    queryFn: () => aiService.symptomes().then(r => r.data)
  })

  const analyzeMutation = useMutation({
    mutationFn: (data) => aiService.analyze(data).then(r => r.data),
    onSuccess: (data) => {
      setResult(data)
      toast.success('Analyse terminée !')
    },
    onError: e => toast.error(e.response?.data?.message || 'Erreur d\'analyse')
  })

  const toggleSymptome = (id) => {
    setSelected(prev =>
      prev.includes(id) ? prev.filter(s => s !== id) : [...prev, id]
    )
  }

  const handleAnalyze = () => {
    if (selected.length === 0) return toast.error('Sélectionnez au moins un symptôme')
    analyzeMutation.mutate({ symptomes: selected })
  }

  const handleReset = () => {
    setSelected([])
    setResult(null)
  }

  const symptomes = symptomesData?.symptomes || []
  const urgConf = result ? URGENCE_CONFIG[result.urgence] : null

  return (
    <div className="space-y-6 max-w-3xl">
      <div>
        <h1 className="text-2xl font-bold text-gray-900 flex items-center gap-2">
          <Brain className="text-purple-500" size={26} /> Module IA — Analyse des symptômes
        </h1>
        <p className="text-gray-500 text-sm mt-1">
          Sélectionnez vos symptômes pour obtenir une suggestion médicale personnalisée
        </p>
      </div>

      {/* Résultat */}
      {result && (
        <div className={`rounded-2xl border-2 p-6 ${urgConf?.color}`}>
          <div className="flex items-start justify-between mb-4">
            <div>
              <p className="text-lg font-bold flex items-center gap-2">
                {urgConf?.icon} {result.maladie_probable}
              </p>
              <span className="text-xs font-medium px-2 py-0.5 rounded-full bg-white/50">
                {urgConf?.label}
              </span>
            </div>
            <button onClick={handleReset} className="text-sm flex items-center gap-1 opacity-70 hover:opacity-100">
              <RotateCcw size={14} /> Recommencer
            </button>
          </div>

          <div className="bg-white/60 rounded-xl p-4 mb-4">
            <p className="text-sm font-semibold mb-1">🩺 Spécialité recommandée</p>
            <p className="text-xl font-bold">{result.specialite_suggeree}</p>
          </div>

          <div className="bg-white/60 rounded-xl p-4 mb-4">
            <p className="text-sm font-semibold mb-1">💬 Recommandation</p>
            <p className="text-sm">{result.recommandation}</p>
          </div>

          {/* Top 3 diagnostics */}
          {Object.keys(result.resultats || {}).length > 0 && (
            <div>
              <p className="text-sm font-semibold mb-2">📊 Correspondances détectées</p>
              <div className="space-y-2">
                {Object.entries(result.resultats).map(([maladie, data]) => (
                  <div key={maladie} className="bg-white/60 rounded-lg p-3 flex items-center justify-between">
                    <div>
                      <p className="text-sm font-medium capitalize">{maladie.replace(/_/g, ' ')}</p>
                      <p className="text-xs opacity-70">{data.specialite}</p>
                    </div>
                    <div className="text-right">
                      <div className="w-20 bg-white/50 rounded-full h-2">
                        <div className="h-2 rounded-full bg-current"
                          style={{ width: `${Math.round(data.score * 100)}%` }} />
                      </div>
                      <p className="text-xs mt-0.5">{data.matches} symptômes</p>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          )}

          <p className="text-xs mt-4 opacity-60">
            ⚠️ Ce résultat est indicatif et ne remplace pas un avis médical professionnel.
          </p>
        </div>
      )}

      {!result && (
        <>
          {/* Symptômes sélectionnés */}
          {selected.length > 0 && (
            <div className="bg-purple-50 border border-purple-200 rounded-xl p-4">
              <p className="text-sm font-medium text-purple-700 mb-2">
                {selected.length} symptôme(s) sélectionné(s)
              </p>
              <div className="flex flex-wrap gap-2">
                {symptomes.filter(s => selected.includes(s.id)).map(s => (
                  <span key={s.id}
                    onClick={() => toggleSymptome(s.id)}
                    className="text-xs bg-purple-600 text-white px-2 py-1 rounded-full cursor-pointer
                               hover:bg-purple-700 flex items-center gap-1">
                    {s.label} ✕
                  </span>
                ))}
              </div>
            </div>
          )}

          {/* Liste des symptômes */}
          <div className="card">
            <h2 className="font-semibold text-gray-800 mb-4">Sélectionnez vos symptômes</h2>
            {loadingSymptomes ? (
              <div className="text-center py-8">
                <Loader2 className="animate-spin mx-auto text-purple-500" />
              </div>
            ) : (
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-2">
                {symptomes.map(s => {
                  const isSelected = selected.includes(s.id)
                  return (
                    <button key={s.id} onClick={() => toggleSymptome(s.id)}
                      className={`flex items-center gap-3 p-3 rounded-xl border text-left transition-all ${
                        isSelected
                          ? 'border-purple-400 bg-purple-50 text-purple-800'
                          : 'border-gray-200 hover:border-purple-200 hover:bg-gray-50 text-gray-700'
                      }`}>
                      {isSelected
                        ? <CheckSquare size={18} className="text-purple-600 shrink-0" />
                        : <Square size={18} className="text-gray-300 shrink-0" />
                      }
                      <span className="text-sm font-medium">{s.label}</span>
                    </button>
                  )
                })}
              </div>
            )}
          </div>

          {/* Bouton analyser */}
          <button
            onClick={handleAnalyze}
            disabled={selected.length === 0 || analyzeMutation.isPending}
            className="btn-primary w-full flex items-center justify-center gap-2 py-3 text-base">
            {analyzeMutation.isPending
              ? <><Loader2 size={18} className="animate-spin" /> Analyse en cours...</>
              : <><Brain size={18} /> Analyser mes symptômes</>
            }
          </button>
        </>
      )}
    </div>
  )
}