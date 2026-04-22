import { useState } from 'react'
import { useQuery, useMutation, useQueryClient } from '@tanstack/react-query'
import { medecinService } from '../../services/api'
import toast from 'react-hot-toast'
import { Search, Plus, Trash2, Loader2, X, Stethoscope } from 'lucide-react'

const SPECIALITES = [
  'Néphrologue', 'Cardiologue', 'Endocrinologue',
  'Hématologue', 'Urologue', 'Médecin généraliste'
]

export default function AdminMedecins() {
  const qc = useQueryClient()
  const [search, setSearch] = useState('')
  const [modal, setModal] = useState(false)
  const [form, setForm] = useState({
    name:'', email:'', password:'', phone:'',
    specialite:'Néphrologue', cabinet:'', tarif:''
  })

  const { data: medecins = [], isLoading } = useQuery({
    queryKey: ['medecins', search],
    queryFn: () => medecinService.list({ search }).then(r => r.data)
  })

  const createMutation = useMutation({
    mutationFn: medecinService.create,
    onSuccess: () => {
      qc.invalidateQueries(['medecins'])
      toast.success('Médecin ajouté')
      setModal(false)
      setForm({ name:'', email:'', password:'', phone:'', specialite:'Néphrologue', cabinet:'', tarif:'' })
    },
    onError: e => toast.error(e.response?.data?.message || 'Erreur')
  })

  const deleteMutation = useMutation({
    mutationFn: medecinService.delete,
    onSuccess: () => { qc.invalidateQueries(['medecins']); toast.success('Médecin supprimé') }
  })

  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold text-gray-900">Médecins</h1>
          <p className="text-gray-500 text-sm">{medecins.length} médecins</p>
        </div>
        <button onClick={() => setModal(true)} className="btn-primary flex items-center gap-2">
          <Plus size={16} /> Nouveau médecin
        </button>
      </div>

      <div className="relative max-w-md">
        <Search size={16} className="absolute left-3 top-2.5 text-gray-400" />
        <input className="input pl-9" placeholder="Rechercher un médecin..."
          value={search} onChange={e => setSearch(e.target.value)} />
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {isLoading ? (
          <div className="col-span-3 text-center py-10">
            <Loader2 className="animate-spin mx-auto text-blue-500" />
          </div>
        ) : medecins.map(m => (
          <div key={m.id} className="card hover:shadow-md transition-shadow">
            <div className="flex items-start justify-between mb-3">
              <div className="flex items-center gap-3">
                <div className="w-11 h-11 bg-teal-100 rounded-xl flex items-center justify-center">
                  <Stethoscope size={20} className="text-teal-600" />
                </div>
                <div>
                  <p className="font-semibold text-gray-800">{m.user?.name}</p>
                  <span className="text-xs bg-teal-50 text-teal-700 px-2 py-0.5 rounded-full">
                    {m.specialite}
                  </span>
                </div>
              </div>
              <button onClick={() => { if(confirm(`Supprimer ${m.user?.name} ?`)) deleteMutation.mutate(m.id) }}
                className="p-1.5 text-red-400 hover:bg-red-50 rounded">
                <Trash2 size={15} />
              </button>
            </div>
            <div className="text-sm text-gray-500 space-y-1">
              <p>📧 {m.user?.email}</p>
              {m.cabinet && <p>🏥 {m.cabinet}</p>}
              {m.tarif && <p>💰 {m.tarif} MAD</p>}
              <p>⏱ {m.consultation_duree} min / consultation</p>
            </div>
          </div>
        ))}
      </div>

      {/* Modal */}
      {modal && (
        <div className="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-2xl w-full max-w-md shadow-2xl">
            <div className="flex items-center justify-between p-6 border-b">
              <h3 className="font-semibold">Nouveau médecin</h3>
              <button onClick={() => setModal(false)}><X size={20} className="text-gray-400"/></button>
            </div>
            <div className="p-6 space-y-4 max-h-96 overflow-y-auto">
              {[
                { key:'name',     label:'Nom complet',  type:'text',     req:true  },
                { key:'email',    label:'Email',        type:'email',    req:true  },
                { key:'password', label:'Mot de passe', type:'password', req:true  },
                { key:'phone',    label:'Téléphone',    type:'tel',      req:false },
                { key:'cabinet',  label:'Cabinet / Salle', type:'text', req:false },
                { key:'tarif',    label:'Tarif (MAD)',  type:'number',   req:false },
              ].map(f => (
                <div key={f.key}>
                  <label className="label">{f.label}</label>
                  <input type={f.type} required={f.req} className="input"
                    value={form[f.key]}
                    onChange={e => setForm({ ...form, [f.key]: e.target.value })} />
                </div>
              ))}
              <div>
                <label className="label">Spécialité</label>
                <select className="input" value={form.specialite}
                  onChange={e => setForm({ ...form, specialite: e.target.value })}>
                  {SPECIALITES.map(s => <option key={s}>{s}</option>)}
                </select>
              </div>
            </div>
            <div className="flex gap-3 p-6 pt-0">
              <button onClick={() => setModal(false)} className="btn-secondary flex-1">Annuler</button>
              <button onClick={() => createMutation.mutate(form)}
                disabled={createMutation.isPending}
                className="btn-primary flex-1 flex items-center justify-center gap-2">
                {createMutation.isPending && <Loader2 size={14} className="animate-spin" />}
                Créer
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  )
}