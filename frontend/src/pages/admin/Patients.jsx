import { useState } from 'react'
import { useQuery, useMutation, useQueryClient } from '@tanstack/react-query'
import { patientService } from '../../services/api'
import toast from 'react-hot-toast'
import { Search, Plus, Trash2, Eye, Loader2, X } from 'lucide-react'

const DIALYSE_LABELS = {
  hemodialyse: '🔵 Hémodialyse',
  peritoneal:  '🟢 Péritonéal',
  aucun:       '⚪ Aucun',
}

export default function AdminPatients() {
  const qc = useQueryClient()
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)
  const [modal, setModal] = useState(null) // null | 'create' | 'view'
  const [selected, setSelected] = useState(null)
  const [form, setForm] = useState({ name:'', email:'', password:'', phone:'', type_dialyse:'aucun' })

  const { data, isLoading } = useQuery({
    queryKey: ['patients', search, page],
    queryFn: () => patientService.list({ search, page }).then(r => r.data),
    keepPreviousData: true,
  })

  const createMutation = useMutation({
    mutationFn: patientService.create,
    onSuccess: () => {
      qc.invalidateQueries(['patients'])
      toast.success('Patient créé avec succès')
      setModal(null)
      setForm({ name:'', email:'', password:'', phone:'', type_dialyse:'aucun' })
    },
    onError: (e) => toast.error(e.response?.data?.message || 'Erreur')
  })

  const deleteMutation = useMutation({
    mutationFn: patientService.delete,
    onSuccess: () => { qc.invalidateQueries(['patients']); toast.success('Patient supprimé') }
  })

  const handleDelete = (id, name) => {
    if (confirm(`Supprimer le patient ${name} ?`)) deleteMutation.mutate(id)
  }

  const patients = data?.data || []

  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold text-gray-900">Patients</h1>
          <p className="text-gray-500 text-sm mt-1">{data?.total || 0} patients enregistrés</p>
        </div>
        <button onClick={() => setModal('create')} className="btn-primary flex items-center gap-2">
          <Plus size={16} /> Nouveau patient
        </button>
      </div>

      {/* Recherche */}
      <div className="relative max-w-md">
        <Search size={16} className="absolute left-3 top-2.5 text-gray-400" />
        <input className="input pl-9" placeholder="Rechercher par nom, email ou CIN..."
          value={search} onChange={e => { setSearch(e.target.value); setPage(1) }} />
      </div>

      {/* Table */}
      <div className="card p-0 overflow-hidden">
        <div className="overflow-x-auto">
          <table className="w-full text-sm">
            <thead className="bg-gray-50 border-b border-gray-100">
              <tr>
                {['Nom', 'Email', 'Type dialyse', 'Téléphone', 'Actions'].map(h => (
                  <th key={h} className="text-left px-4 py-3 font-medium text-gray-600">{h}</th>
                ))}
              </tr>
            </thead>
            <tbody className="divide-y divide-gray-50">
              {isLoading ? (
                <tr><td colSpan={5} className="text-center py-10">
                  <Loader2 className="animate-spin mx-auto text-blue-500" />
                </td></tr>
              ) : patients.length === 0 ? (
                <tr><td colSpan={5} className="text-center py-10 text-gray-400">
                  Aucun patient trouvé
                </td></tr>
              ) : patients.map(p => (
                <tr key={p.id} className="hover:bg-gray-50 transition-colors">
                  <td className="px-4 py-3 font-medium text-gray-800">
                    <div className="flex items-center gap-2">
                      <div className="w-8 h-8 bg-blue-100 rounded-full flex items-center
                                      justify-center text-blue-700 text-xs font-bold">
                        {p.user?.name?.charAt(0)}
                      </div>
                      {p.user?.name}
                    </div>
                  </td>
                  <td className="px-4 py-3 text-gray-600">{p.user?.email}</td>
                  <td className="px-4 py-3">
                    <span className="text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded-full">
                      {DIALYSE_LABELS[p.type_dialyse] || p.type_dialyse}
                    </span>
                  </td>
                  <td className="px-4 py-3 text-gray-600">{p.user?.phone || '—'}</td>
                  <td className="px-4 py-3">
                    <div className="flex items-center gap-2">
                      <button onClick={() => { setSelected(p); setModal('view') }}
                        className="p-1.5 text-blue-500 hover:bg-blue-50 rounded">
                        <Eye size={15} />
                      </button>
                      <button onClick={() => handleDelete(p.id, p.user?.name)}
                        className="p-1.5 text-red-500 hover:bg-red-50 rounded">
                        <Trash2 size={15} />
                      </button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>

        {/* Pagination */}
        {data?.last_page > 1 && (
          <div className="flex items-center justify-between px-4 py-3 border-t border-gray-100">
            <span className="text-sm text-gray-500">
              Page {data.current_page} / {data.last_page}
            </span>
            <div className="flex gap-2">
              <button disabled={page === 1} onClick={() => setPage(p => p - 1)}
                className="btn-secondary text-sm py-1 px-3 disabled:opacity-40">Préc.</button>
              <button disabled={page === data.last_page} onClick={() => setPage(p => p + 1)}
                className="btn-secondary text-sm py-1 px-3 disabled:opacity-40">Suiv.</button>
            </div>
          </div>
        )}
      </div>

      {/* Modal Créer */}
      {modal === 'create' && (
        <div className="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-2xl w-full max-w-md shadow-2xl">
            <div className="flex items-center justify-between p-6 border-b">
              <h3 className="font-semibold text-gray-800">Nouveau patient</h3>
              <button onClick={() => setModal(null)}><X size={20} className="text-gray-400" /></button>
            </div>
            <div className="p-6 space-y-4">
              {[
                { key: 'name',     label: 'Nom complet',  type: 'text',     required: true },
                { key: 'email',    label: 'Email',        type: 'email',    required: true },
                { key: 'password', label: 'Mot de passe', type: 'password', required: true },
                { key: 'phone',    label: 'Téléphone',    type: 'tel',      required: false },
              ].map(f => (
                <div key={f.key}>
                  <label className="label">{f.label}</label>
                  <input type={f.type} required={f.required} className="input"
                    value={form[f.key]}
                    onChange={e => setForm({ ...form, [f.key]: e.target.value })} />
                </div>
              ))}
              <div>
                <label className="label">Type de dialyse</label>
                <select className="input" value={form.type_dialyse}
                  onChange={e => setForm({ ...form, type_dialyse: e.target.value })}>
                  <option value="aucun">Aucun</option>
                  <option value="hemodialyse">Hémodialyse</option>
                  <option value="peritoneal">Péritonéal</option>
                </select>
              </div>
            </div>
            <div className="flex gap-3 p-6 pt-0">
              <button onClick={() => setModal(null)} className="btn-secondary flex-1">Annuler</button>
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

      {/* Modal Voir */}
      {modal === 'view' && selected && (
        <div className="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-2xl w-full max-w-md shadow-2xl">
            <div className="flex items-center justify-between p-6 border-b">
              <h3 className="font-semibold text-gray-800">Fiche patient</h3>
              <button onClick={() => setModal(null)}><X size={20} className="text-gray-400" /></button>
            </div>
            <div className="p-6 space-y-3">
              {[
                ['Nom',           selected.user?.name],
                ['Email',         selected.user?.email],
                ['Téléphone',     selected.user?.phone || '—'],
                ['CIN',           selected.cin || '—'],
                ['Sexe',          selected.sexe || '—'],
                ['Groupe sanguin',selected.groupe_sanguin || '—'],
                ['Type dialyse',  DIALYSE_LABELS[selected.type_dialyse]],
                ['Séances/semaine', selected.seances_par_semaine],
                ['Antécédents',   selected.antecedents || '—'],
              ].map(([label, value]) => (
                <div key={label} className="flex gap-3">
                  <span className="text-sm text-gray-500 w-36 shrink-0">{label}</span>
                  <span className="text-sm font-medium text-gray-800">{value}</span>
                </div>
              ))}
            </div>
            <div className="p-6 pt-0">
              <button onClick={() => setModal(null)} className="btn-secondary w-full">Fermer</button>
            </div>
          </div>
        </div>
      )}
    </div>
  )
}