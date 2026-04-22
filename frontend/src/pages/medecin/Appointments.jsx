import { useState } from 'react'
import { useQuery, useMutation, useQueryClient } from '@tanstack/react-query'
import { appointmentService, consultationService } from '../../services/api'
import toast from 'react-hot-toast'
import { CheckCircle, XCircle, ClipboardList, X, Loader2 } from 'lucide-react'
import { format } from 'date-fns'

const BADGE = {
  en_attente: 'bg-yellow-100 text-yellow-800',
  confirme:   'bg-green-100 text-green-800',
  annule:     'bg-red-100 text-red-800',
  termine:    'bg-gray-100 text-gray-600',
}

export default function MedecinAppointments() {
  const qc = useQueryClient()
  const [consultModal, setConsultModal] = useState(null)
  const [consultForm, setConsultForm] = useState({
    diagnostic:'', prescription:'', poids_avant:'', poids_apres:'',
    tension_avant:'', tension_apres:'', taux_uree:'', creatinine:'',
    duree_seance:'', observations:'', complications: false
  })

  const { data, isLoading } = useQuery({
    queryKey: ['medecin-appointments'],
    queryFn: () => appointmentService.list().then(r => r.data)
  })

  const confirmMutation = useMutation({
    mutationFn: appointmentService.confirm,
    onSuccess: () => { qc.invalidateQueries(['medecin-appointments']); toast.success('RDV confirmé') }
  })
  const cancelMutation = useMutation({
    mutationFn: (id) => appointmentService.cancel(id, {}),
    onSuccess: () => { qc.invalidateQueries(['medecin-appointments']); toast.success('RDV annulé') }
  })
  const consultMutation = useMutation({
    mutationFn: consultationService.create,
    onSuccess: () => {
      qc.invalidateQueries(['medecin-appointments'])
      toast.success('Consultation enregistrée')
      setConsultModal(null)
    },
    onError: e => toast.error(e.response?.data?.message || 'Erreur')
  })

  const appointments = data?.data || []

  const openConsult = (rdv) => {
    setConsultModal(rdv)
    setConsultForm({ diagnostic:'', prescription:'', poids_avant:'', poids_apres:'',
      tension_avant:'', tension_apres:'', taux_uree:'', creatinine:'',
      duree_seance:'', observations:'', complications: false })
  }

  return (
    <div className="space-y-6">
      <h1 className="text-2xl font-bold text-gray-900">Mes rendez-vous</h1>

      <div className="card p-0 overflow-hidden">
        <div className="overflow-x-auto">
          <table className="w-full text-sm">
            <thead className="bg-gray-50 border-b">
              <tr>
                {['Patient','Date & Heure','Type','Statut','Actions'].map(h => (
                  <th key={h} className="text-left px-4 py-3 font-medium text-gray-600">{h}</th>
                ))}
              </tr>
            </thead>
            <tbody className="divide-y divide-gray-50">
              {isLoading ? (
                <tr><td colSpan={5} className="text-center py-10">
                  <Loader2 className="animate-spin mx-auto text-blue-500" /></td></tr>
              ) : appointments.map(rdv => (
                <tr key={rdv.id} className="hover:bg-gray-50">
                  <td className="px-4 py-3 font-medium text-gray-800">
                    {rdv.patient?.user?.name}
                  </td>
                  <td className="px-4 py-3 text-gray-600">
                    {format(new Date(rdv.date_heure), 'dd/MM/yyyy HH:mm')}
                  </td>
                  <td className="px-4 py-3 capitalize text-gray-600">
                    {rdv.type_seance?.replace('_',' ')}
                  </td>
                  <td className="px-4 py-3">
                    <span className={`text-xs px-2 py-1 rounded-full font-medium ${BADGE[rdv.statut]}`}>
                      {rdv.statut.replace('_',' ')}
                    </span>
                  </td>
                  <td className="px-4 py-3">
                    <div className="flex gap-1">
                      {rdv.statut === 'en_attente' && <>
                        <button onClick={() => confirmMutation.mutate(rdv.id)}
                          className="p-1.5 text-green-600 hover:bg-green-50 rounded" title="Confirmer">
                          <CheckCircle size={16} />
                        </button>
                        <button onClick={() => cancelMutation.mutate(rdv.id)}
                          className="p-1.5 text-red-500 hover:bg-red-50 rounded" title="Annuler">
                          <XCircle size={16} />
                        </button>
                      </>}
                      {rdv.statut === 'confirme' && (
                        <button onClick={() => openConsult(rdv)}
                          className="p-1.5 text-blue-500 hover:bg-blue-50 rounded" title="Consultation">
                          <ClipboardList size={16} />
                        </button>
                      )}
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>

      {/* Modal Consultation */}
      {consultModal && (
        <div className="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-2xl w-full max-w-2xl shadow-2xl">
            <div className="flex items-center justify-between p-6 border-b">
              <div>
                <h3 className="font-semibold text-gray-800">Fiche de consultation</h3>
                <p className="text-sm text-gray-500">Patient : {consultModal.patient?.user?.name}</p>
              </div>
              <button onClick={() => setConsultModal(null)}><X size={20} className="text-gray-400"/></button>
            </div>
            <div className="p-6 grid grid-cols-2 gap-4 max-h-[60vh] overflow-y-auto">
              {/* Paramètres dialyse */}
              <div className="col-span-2">
                <p className="text-xs font-semibold text-gray-400 uppercase mb-3">Paramètres de séance</p>
              </div>
              {[
                ['poids_avant',   'Poids avant (kg)',  'number'],
                ['poids_apres',   'Poids après (kg)',  'number'],
                ['tension_avant', 'Tension avant',     'number'],
                ['tension_apres', 'Tension après',     'number'],
                ['taux_uree',     'Taux urée',         'number'],
                ['creatinine',    'Créatinine',        'number'],
                ['duree_seance',  'Durée séance (min)','number'],
              ].map(([key, label, type]) => (
                <div key={key}>
                  <label className="label">{label}</label>
                  <input type={type} className="input"
                    value={consultForm[key]}
                    onChange={e => setConsultForm({ ...consultForm, [key]: e.target.value })} />
                </div>
              ))}
              {/* Diagnostic */}
              <div className="col-span-2 mt-2">
                <p className="text-xs font-semibold text-gray-400 uppercase mb-3">Diagnostic & Prescription</p>
              </div>
              <div className="col-span-2">
                <label className="label">Diagnostic</label>
                <textarea rows={2} className="input resize-none"
                  value={consultForm.diagnostic}
                  onChange={e => setConsultForm({ ...consultForm, diagnostic: e.target.value })} />
              </div>
              <div className="col-span-2">
                <label className="label">Prescription</label>
                <textarea rows={2} className="input resize-none"
                  value={consultForm.prescription}
                  onChange={e => setConsultForm({ ...consultForm, prescription: e.target.value })} />
              </div>
              <div className="col-span-2">
                <label className="label">Observations</label>
                <textarea rows={2} className="input resize-none"
                  value={consultForm.observations}
                  onChange={e => setConsultForm({ ...consultForm, observations: e.target.value })} />
              </div>
              <div className="col-span-2 flex items-center gap-3">
                <input type="checkbox" id="complication"
                  checked={consultForm.complications}
                  onChange={e => setConsultForm({ ...consultForm, complications: e.target.checked })}
                  className="w-4 h-4" />
                <label htmlFor="complication" className="text-sm text-gray-700">
                  Complications durant la séance
                </label>
              </div>
            </div>
            <div className="flex gap-3 p-6 pt-0">
              <button onClick={() => setConsultModal(null)} className="btn-secondary flex-1">Annuler</button>
              <button
                onClick={() => consultMutation.mutate({ ...consultForm, appointment_id: consultModal.id })}
                disabled={consultMutation.isPending}
                className="btn-primary flex-1 flex items-center justify-center gap-2">
                {consultMutation.isPending && <Loader2 size={14} className="animate-spin" />}
                Enregistrer
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  )
}