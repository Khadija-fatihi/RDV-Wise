import { useQuery } from '@tanstack/react-query'
import { patientService } from '../../services/api'
import { ClipboardList, Loader2, ChevronDown, ChevronUp } from 'lucide-react'
import { useState } from 'react'
import { format } from 'date-fns'
import { fr } from 'date-fns/locale'

export default function PatientHistory() {
  const [expanded, setExpanded] = useState(null)

  const { data, isLoading } = useQuery({
    queryKey: ['patient-consultations'],
    queryFn: () => patientService.myConsultations().then(r => r.data)
  })

  const consultations = data?.data || []

  return (
    <div className="space-y-6">
      <div>
        <h1 className="text-2xl font-bold text-gray-900">Mes consultations</h1>
        <p className="text-gray-500 text-sm mt-1">Historique de vos séances et ordonnances</p>
      </div>

      {isLoading ? (
        <div className="text-center py-10"><Loader2 className="animate-spin mx-auto text-blue-500" /></div>
      ) : consultations.length === 0 ? (
        <div className="card text-center py-12 text-gray-400">
          <ClipboardList size={40} className="mx-auto mb-3 opacity-40" />
          <p>Aucune consultation enregistrée</p>
        </div>
      ) : (
        <div className="space-y-3">
          {consultations.map(c => (
            <div key={c.id} className="card p-0 overflow-hidden">
              <button onClick={() => setExpanded(expanded === c.id ? null : c.id)}
                className="w-full flex items-center gap-4 p-5 text-left hover:bg-gray-50 transition-colors">
                {/* Date */}
                <div className="min-w-[56px] text-center bg-blue-50 rounded-xl p-2">
                  <p className="text-lg font-bold text-blue-600">
                    {format(new Date(c.date), 'dd')}
                  </p>
                  <p className="text-xs text-blue-400 uppercase">
                    {format(new Date(c.date), 'MMM', { locale: fr })}
                  </p>
                </div>
                {/* Info */}
                <div className="flex-1">
                  <p className="font-semibold text-gray-800">Dr. {c.medecin?.user?.name}</p>
                  <p className="text-sm text-gray-500">{c.medecin?.specialite}</p>
                  {c.diagnostic && (
                    <p className="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{c.diagnostic}</p>
                  )}
                </div>
                {/* Paramètres rapides */}
                <div className="hidden sm:flex gap-4 text-center">
                  {c.poids_apres && (
                    <div>
                      <p className="text-sm font-bold text-gray-700">{c.poids_apres} kg</p>
                      <p className="text-xs text-gray-400">Poids</p>
                    </div>
                  )}
                  {c.tension_apres && (
                    <div>
                      <p className="text-sm font-bold text-gray-700">{c.tension_apres}</p>
                      <p className="text-xs text-gray-400">Tension</p>
                    </div>
                  )}
                  {c.duree_seance && (
                    <div>
                      <p className="text-sm font-bold text-gray-700">{c.duree_seance} min</p>
                      <p className="text-xs text-gray-400">Durée</p>
                    </div>
                  )}
                </div>
                {expanded === c.id ? <ChevronUp size={18} className="text-gray-400" />
                                   : <ChevronDown size={18} className="text-gray-400" />}
              </button>

              {/* Détails */}
              {expanded === c.id && (
                <div className="border-t border-gray-100 p-5 bg-gray-50">
                  <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    {[
                      ['Poids avant',   c.poids_avant,   'kg'],
                      ['Poids après',   c.poids_apres,   'kg'],
                      ['Ultrafiltration', c.ultrafiltration, 'L'],
                      ['Tension avant', c.tension_avant,  ''],
                      ['Tension après', c.tension_apres,  ''],
                      ['Urée',          c.taux_uree,      ''],
                      ['Créatinine',    c.creatinine,     ''],
                      ['Durée',         c.duree_seance,   'min'],
                    ].map(([label, val, unit]) => val ? (
                      <div key={label} className="bg-white rounded-lg p-3">
                        <p className="text-xs text-gray-400">{label}</p>
                        <p className="text-sm font-bold text-gray-800">{val} {unit}</p>
                      </div>
                    ) : null)}
                  </div>

                  {c.diagnostic && (
                    <div className="bg-white rounded-lg p-3 mb-3">
                      <p className="text-xs text-gray-400 mb-1">Diagnostic</p>
                      <p className="text-sm text-gray-800">{c.diagnostic}</p>
                    </div>
                  )}
                  {c.prescription && (
                    <div className="bg-white rounded-lg p-3 mb-3">
                      <p className="text-xs text-gray-400 mb-1">Prescription</p>
                      <p className="text-sm text-gray-800">{c.prescription}</p>
                    </div>
                  )}
                  {c.complications && (
                    <div className="bg-red-50 rounded-lg p-3">
                      <p className="text-xs text-red-500 font-semibold mb-1">⚠️ Complications</p>
                      <p className="text-sm text-red-700">{c.details_complications || 'Complications signalées'}</p>
                    </div>
                  )}
                </div>
              )}
            </div>
          ))}
        </div>
      )}
    </div>
  )
}