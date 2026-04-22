import { useQuery, useMutation, useQueryClient } from '@tanstack/react-query'
import { medecinService, appointmentService } from '../../services/api'
import useAuthStore from '../../store/authStore'
import toast from 'react-hot-toast'
import { Calendar, Users, Clock, CheckCircle, XCircle, Loader2 } from 'lucide-react'
import { format } from 'date-fns'
import { fr } from 'date-fns/locale'

const STATUT_BADGE = {
  en_attente: 'bg-yellow-100 text-yellow-800',
  confirme:   'bg-green-100 text-green-800',
  annule:     'bg-red-100 text-red-800',
  termine:    'bg-gray-100 text-gray-700',
}

export default function MedecinDashboard() {
  const { user } = useAuthStore()
  const qc = useQueryClient()

  const { data: stats } = useQuery({
    queryKey: ['medecin-dashboard'],
    queryFn: () => medecinService.dashboard().then(r => r.data)
  })

  const { data: todayRdv = [], isLoading } = useQuery({
    queryKey: ['today-rdv'],
    queryFn: () => appointmentService.today().then(r => r.data)
  })

  const confirmMutation = useMutation({
    mutationFn: appointmentService.confirm,
    onSuccess: () => { qc.invalidateQueries(['today-rdv']); toast.success('RDV confirmé') }
  })

  const cancelMutation = useMutation({
    mutationFn: (id) => appointmentService.cancel(id, {}),
    onSuccess: () => { qc.invalidateQueries(['today-rdv']); toast.success('RDV annulé') }
  })

  return (
    <div className="space-y-6">
      <div>
        <h1 className="text-2xl font-bold text-gray-900">Bonjour, {user?.name} 👨‍⚕️</h1>
        <p className="text-gray-500 text-sm mt-1">
          {format(new Date(), "EEEE d MMMM yyyy", { locale: fr })}
        </p>
      </div>

      {/* Stats */}
      <div className="grid grid-cols-2 lg:grid-cols-4 gap-4">
        {[
          { icon: Calendar, label: "Aujourd'hui",   value: stats?.rdv_today,     color: 'bg-blue-500' },
          { icon: Clock,    label: "Cette semaine", value: stats?.rdv_semaine,   color: 'bg-teal-500' },
          { icon: Users,    label: "Mes patients",  value: stats?.patients_total, color: 'bg-purple-500' },
          { icon: CheckCircle, label: "En attente", value: stats?.rdv_en_attente, color: 'bg-orange-500' },
        ].map(({ icon: Icon, label, value, color }) => (
          <div key={label} className="card flex items-center gap-3">
            <div className={`p-2.5 rounded-xl ${color}`}>
              <Icon size={20} className="text-white" />
            </div>
            <div>
              <p className="text-xl font-bold text-gray-800">{value ?? '—'}</p>
              <p className="text-xs text-gray-500">{label}</p>
            </div>
          </div>
        ))}
      </div>

      {/* RDV du jour */}
      <div className="card">
        <h2 className="font-semibold text-gray-800 mb-4 flex items-center gap-2">
          <Calendar size={18} className="text-blue-500" />
          Rendez-vous du jour
          <span className="ml-auto text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">
            {todayRdv.length}
          </span>
        </h2>

        {isLoading ? (
          <div className="text-center py-8"><Loader2 className="animate-spin mx-auto text-blue-500" /></div>
        ) : todayRdv.length === 0 ? (
          <div className="text-center py-10 text-gray-400">
            <Calendar size={36} className="mx-auto mb-2 opacity-40" />
            <p>Aucun rendez-vous aujourd'hui</p>
          </div>
        ) : (
          <div className="space-y-3">
            {todayRdv.map(rdv => (
              <div key={rdv.id}
                className="flex items-center gap-4 p-3 rounded-xl border border-gray-100 hover:bg-gray-50">
                {/* Heure */}
                <div className="text-center min-w-[52px]">
                  <p className="text-lg font-bold text-blue-600">
                    {format(new Date(rdv.date_heure), 'HH:mm')}
                  </p>
                </div>
                {/* Patient */}
                <div className="flex-1">
                  <p className="font-medium text-gray-800">{rdv.patient?.user?.name}</p>
                  <p className="text-xs text-gray-500 capitalize">
                    {rdv.type_seance?.replace('_', ' ')} — {rdv.motif || 'Sans motif'}
                  </p>
                </div>
                {/* Statut */}
                <span className={`text-xs px-2 py-1 rounded-full font-medium ${STATUT_BADGE[rdv.statut]}`}>
                  {rdv.statut.replace('_', ' ')}
                </span>
                {/* Actions */}
                {rdv.statut === 'en_attente' && (
                  <div className="flex gap-1">
                    <button onClick={() => confirmMutation.mutate(rdv.id)}
                      className="p-1.5 text-green-600 hover:bg-green-50 rounded" title="Confirmer">
                      <CheckCircle size={18} />
                    </button>
                    <button onClick={() => cancelMutation.mutate(rdv.id)}
                      className="p-1.5 text-red-500 hover:bg-red-50 rounded" title="Annuler">
                      <XCircle size={18} />
                    </button>
                  </div>
                )}
              </div>
            ))}
          </div>
        )}
      </div>
    </div>
  )
}