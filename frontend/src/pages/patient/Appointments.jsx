import { useState } from 'react'
import { useQuery, useMutation, useQueryClient } from '@tanstack/react-query'
import { appointmentService, medecinService } from '../../services/api'
import toast from 'react-hot-toast'
import { Plus, X, Calendar, Loader2, XCircle } from 'lucide-react'
import { format } from 'date-fns'
import { fr } from 'date-fns/locale'

const BADGE = {
  en_attente: 'bg-yellow-100 text-yellow-700',
  confirme:   'bg-green-100 text-green-700',
  annule:     'bg-red-100 text-red-600',
  termine:    'bg-gray-100 text-gray-500',
}

export default function PatientAppointments() {
  const qc = useQueryClient()
  const [modal, setModal] = useState(false)
  const [step, setStep] = useState(1) // 1: choisir médecin, 2: choisir créneau
  const [selectedMedecin, setSelectedMedecin] = useState(null)
  const [selectedDate, setSelectedDate] = useState('')
  const [selectedSlot, setSelectedSlot] = useState('')
  const [motif, setMotif] = useState('')
  const [type, setType] = useState('consultation')

  const { data, isLoading } = useQuery({
    queryKey: ['patient-appointments'],
    queryFn: () => appointmentService.list().then(r => r.data)
  })

  const { data: medecins = [] } = useQuery({
    queryKey: ['medecins-list'],
    queryFn: () => medecinService.list().then(r => r.data)
  })

  const { data: slotsData, isLoading: loadingSlots } = useQuery({
    queryKey: ['slots', selectedMedecin?.id, selectedDate],
    queryFn: () => medecinService.slots(selectedMedecin.id, selectedDate).then(r => r.data),
    enabled: !!selectedMedecin && !!selectedDate,
  })

  const bookMutation = useMutation({
    mutationFn: appointmentService.create,
    onSuccess: () => {
      qc.invalidateQueries(['patient-appointments'])
      toast.success('Rendez-vous réservé ! Un email de confirmation vous sera envoyé.')
      resetModal()
    },
    onError: e => toast.error(e.response?.data?.message || 'Erreur lors de la réservation')
  })

  const cancelMutation = useMutation({
    mutationFn: (id) => appointmentService.cancel(id, {}),
    onSuccess: () => { qc.invalidateQueries(['patient-appointments']); toast.success('RDV annulé') }
  })

  const resetModal = () => {
    setModal(false); setStep(1); setSelectedMedecin(null)
    setSelectedDate(''); setSelectedSlot(''); setMotif(''); setType('consultation')
  }

  const handleBook = () => {
    if (!selectedSlot) return toast.error('Sélectionnez un créneau')
    const dateHeure = `${selectedDate}T${selectedSlot}:00`
    bookMutation.mutate({
      medecin_id: selectedMedecin.id,
      date_heure: dateHeure,
      motif, type_seance: type
    })
  }

  const appointments = data?.data || []
  const slots = slotsData?.slots || []

  return (
    <div className="space-y-6">
      <div className="flex items-center justify-between">
        <h1 className="text-2xl font-bold text-gray-900">Mes rendez-vous</h1>
        <button onClick={() => setModal(true)} className="btn-primary flex items-center gap-2">
          <Plus size={16} /> Nouveau RDV
        </button>
      </div>

      {/* Liste */}
      <div className="space-y-3">
        {isLoading ? (
          <div className="text-center py-10"><Loader2 className="animate-spin mx-auto text-blue-500" /></div>
        ) : appointments.length === 0 ? (
          <div className="card text-center py-10 text-gray-400">
            <Calendar size={36} className="mx-auto mb-2 opacity-40" />
            <p>Aucun rendez-vous</p>
          </div>
        ) : appointments.map(rdv => (
          <div key={rdv.id} className="card flex items-center gap-4">
            <div className="min-w-[60px] text-center bg-blue-50 rounded-xl p-2">
              <p className="text-xl font-bold text-blue-600">
                {format(new Date(rdv.date_heure), 'dd')}
              </p>
              <p className="text-xs text-blue-400 uppercase">
                {format(new Date(rdv.date_heure), 'MMM', { locale: fr })}
              </p>
            </div>
            <div className="flex-1">
              <p className="font-semibold text-gray-800">Dr. {rdv.medecin?.user?.name}</p>
              <p className="text-sm text-gray-500">
                {rdv.medecin?.specialite} · {format(new Date(rdv.date_heure), 'HH:mm')} ·{' '}
                <span className="capitalize">{rdv.type_seance?.replace('_',' ')}</span>
              </p>
              {rdv.motif && <p className="text-xs text-gray-400 mt-0.5">{rdv.motif}</p>}
            </div>
            <div className="flex items-center gap-2">
              <span className={`text-xs px-2 py-1 rounded-full font-medium ${BADGE[rdv.statut]}`}>
                {rdv.statut.replace('_',' ')}
              </span>
              {['en_attente','confirme'].includes(rdv.statut) && (
                <button onClick={() => { if(confirm('Annuler ce RDV ?')) cancelMutation.mutate(rdv.id) }}
                  className="p-1.5 text-red-400 hover:bg-red-50 rounded">
                  <XCircle size={16} />
                </button>
              )}
            </div>
          </div>
        ))}
      </div>

      {/* Modal réservation */}
      {modal && (
        <div className="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
          <div className="bg-white rounded-2xl w-full max-w-lg shadow-2xl">
            <div className="flex items-center justify-between p-6 border-b">
              <div>
                <h3 className="font-semibold text-gray-800">Nouveau rendez-vous</h3>
                <div className="flex gap-1 mt-1">
                  {[1,2].map(s => (
                    <div key={s} className={`h-1 w-12 rounded-full ${step >= s ? 'bg-blue-500' : 'bg-gray-200'}`} />
                  ))}
                </div>
              </div>
              <button onClick={resetModal}><X size={20} className="text-gray-400" /></button>
            </div>

            <div className="p-6">
              {/* Step 1: Choisir médecin */}
              {step === 1 && (
                <div className="space-y-3">
                  <p className="text-sm text-gray-600 mb-3">Choisissez un médecin</p>
                  <div className="space-y-2 max-h-80 overflow-y-auto">
                    {medecins.map(m => (
                      <button key={m.id} onClick={() => setSelectedMedecin(m)}
                        className={`w-full flex items-center gap-3 p-3 rounded-xl border text-left transition-all ${
                          selectedMedecin?.id === m.id
                            ? 'border-blue-400 bg-blue-50'
                            : 'border-gray-200 hover:border-blue-200'
                        }`}>
                        <div className="w-10 h-10 bg-teal-100 rounded-lg flex items-center
                                        justify-center text-teal-700 text-lg font-bold">
                          {m.user?.name?.charAt(0)}
                        </div>
                        <div>
                          <p className="font-medium text-gray-800">{m.user?.name}</p>
                          <p className="text-xs text-gray-500">{m.specialite} · {m.tarif} MAD</p>
                        </div>
                      </button>
                    ))}
                  </div>
                  <button onClick={() => { if(!selectedMedecin) return toast.error('Choisissez un médecin'); setStep(2) }}
                    className="btn-primary w-full mt-3">
                    Suivant →
                  </button>
                </div>
              )}

              {/* Step 2: Date + créneau */}
              {step === 2 && (
                <div className="space-y-4">
                  <div>
                    <p className="font-medium text-gray-700 mb-1">
                      Dr. {selectedMedecin?.user?.name} — {selectedMedecin?.specialite}
                    </p>
                  </div>
                  <div>
                    <label className="label">Date</label>
                    <input type="date" className="input" min={new Date().toISOString().split('T')[0]}
                      value={selectedDate} onChange={e => { setSelectedDate(e.target.value); setSelectedSlot('') }} />
                  </div>
                  {selectedDate && (
                    <div>
                      <label className="label">Créneau disponible</label>
                      {loadingSlots ? <Loader2 className="animate-spin text-blue-500" size={20} /> : (
                        <div className="grid grid-cols-4 gap-2">
                          {slots.filter(s => s.disponible).map(s => (
                            <button key={s.heure} onClick={() => setSelectedSlot(s.heure)}
                              className={`py-2 rounded-lg text-sm font-medium border transition-all ${
                                selectedSlot === s.heure
                                  ? 'border-blue-500 bg-blue-500 text-white'
                                  : 'border-gray-200 text-gray-700 hover:border-blue-300'
                              }`}>
                              {s.heure}
                            </button>
                          ))}
                          {slots.filter(s => s.disponible).length === 0 && (
                            <p className="col-span-4 text-sm text-gray-400 text-center py-3">
                              Aucun créneau disponible ce jour
                            </p>
                          )}
                        </div>
                      )}
                    </div>
                  )}
                  <div>
                    <label className="label">Type de séance</label>
                    <select className="input" value={type} onChange={e => setType(e.target.value)}>
                      <option value="consultation">Consultation</option>
                      <option value="dialyse">Dialyse</option>
                      <option value="controle">Contrôle</option>
                      <option value="urgence">Urgence</option>
                    </select>
                  </div>
                  <div>
                    <label className="label">Motif (optionnel)</label>
                    <input type="text" className="input" placeholder="Motif du rendez-vous"
                      value={motif} onChange={e => setMotif(e.target.value)} />
                  </div>
                  <div className="flex gap-3">
                    <button onClick={() => setStep(1)} className="btn-secondary flex-1">← Retour</button>
                    <button onClick={handleBook}
                      disabled={bookMutation.isPending || !selectedSlot}
                      className="btn-primary flex-1 flex items-center justify-center gap-2">
                      {bookMutation.isPending && <Loader2 size={14} className="animate-spin" />}
                      Confirmer
                    </button>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      )}
    </div>
  )
}