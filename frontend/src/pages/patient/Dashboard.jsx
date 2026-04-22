import { useQuery } from '@tanstack/react-query'
import { appointmentService, patientService } from '../../services/api'
import useAuthStore from '../../store/authStore'
import { Link } from 'react-router-dom'
import { Calendar, ClipboardList, Brain, Plus, Activity } from 'lucide-react'
import { format } from 'date-fns'
import { fr } from 'date-fns/locale'

const BADGE = {
  en_attente: 'bg-yellow-100 text-yellow-800',
  confirme:   'bg-green-100 text-green-800',
  annule:     'bg-red-100 text-red-800',
  termine:    'bg-gray-100 text-gray-600',
}

export default function PatientDashboard() {
  const { user } = useAuthStore()

  const { data: rdvData } = useQuery({
    queryKey: ['patient-rdv'],
    queryFn: () => appointmentService.list({ statut: 'confirme' }).then(r => r.data)
  })

  const nextRdv = rdvData?.data?.[0]

  return (
    <div className="space-y-6">
      <div>
        <h1 className="text-2xl font-bold text-gray-900">Bienvenue, {user?.name} 👋</h1>
        <p className="text-gray-500 text-sm mt-1">
          {format(new Date(), "EEEE d MMMM yyyy", { locale: fr })}
        </p>
      </div>

      {/* Prochain RDV */}
      {nextRdv ? (
        <div className="bg-gradient-to-r from-blue-600 to-teal-600 rounded-2xl p-6 text-white">
          <p className="text-blue-100 text-sm mb-1">Prochain rendez-vous</p>
          <p className="text-2xl font-bold">
            {format(new Date(nextRdv.date_heure), "EEEE d MMMM à HH:mm", { locale: fr })}
          </p>
          <p className="text-blue-100 mt-1">
            👨‍⚕️ Dr. {nextRdv.medecin?.user?.name} — {nextRdv.medecin?.specialite}
          </p>
          <span className="inline-block mt-3 bg-white/20 text-white text-xs px-3 py-1 rounded-full">
            {nextRdv.type_seance?.replace('_', ' ')}
          </span>
        </div>
      ) : (
        <div className="bg-blue-50 border-2 border-dashed border-blue-200 rounded-2xl p-6 text-center">
          <Calendar size={36} className="mx-auto text-blue-300 mb-2" />
          <p className="text-blue-600 font-medium">Aucun rendez-vous à venir</p>
          <Link to="/patient/appointments" className="btn-primary mt-3 inline-flex items-center gap-2 text-sm">
            <Plus size={15} /> Prendre un rendez-vous
          </Link>
        </div>
      )}

      {/* Accès rapide */}
      <div className="grid grid-cols-1 sm:grid-cols-3 gap-4">
        {[
          { to: '/patient/appointments', icon: Calendar,      label: 'Mes rendez-vous',    desc: 'Voir et gérer vos RDV',   color: 'bg-blue-500' },
          { to: '/patient/history',      icon: ClipboardList, label: 'Mes consultations',  desc: 'Historique et ordonnances', color: 'bg-teal-500' },
          { to: '/patient/ai',           icon: Brain,         label: 'Analyse IA',         desc: 'Vérifier vos symptômes',  color: 'bg-purple-500' },
        ].map(({ to, icon: Icon, label, desc, color }) => (
          <Link key={to} to={to}
            className="card hover:shadow-md transition-shadow group cursor-pointer">
            <div className={`w-11 h-11 ${color} rounded-xl flex items-center justify-center mb-3
                             group-hover:scale-110 transition-transform`}>
              <Icon size={22} className="text-white" />
            </div>
            <p className="font-semibold text-gray-800">{label}</p>
            <p className="text-sm text-gray-500 mt-1">{desc}</p>
          </Link>
        ))}
      </div>

      {/* Derniers RDV */}
      <div className="card">
        <div className="flex items-center justify-between mb-4">
          <h2 className="font-semibold text-gray-800">Derniers rendez-vous</h2>
          <Link to="/patient/appointments" className="text-sm text-blue-600 hover:underline">
            Voir tout
          </Link>
        </div>
        <div className="space-y-2">
          {(rdvData?.data || []).slice(0, 5).map(rdv => (
            <div key={rdv.id} className="flex items-center gap-3 py-2 border-b border-gray-50 last:border-0">
              <div className="w-10 h-10 bg-gray-100 rounded-lg flex flex-col items-center justify-center">
                <span className="text-xs font-bold text-gray-700">
                  {format(new Date(rdv.date_heure), 'dd')}
                </span>
                <span className="text-xs text-gray-500">
                  {format(new Date(rdv.date_heure), 'MMM', { locale: fr })}
                </span>
              </div>
              <div className="flex-1">
                <p className="text-sm font-medium text-gray-800">Dr. {rdv.medecin?.user?.name}</p>
                <p className="text-xs text-gray-500">
                  {format(new Date(rdv.date_heure), 'HH:mm')} — {rdv.type_seance?.replace('_', ' ')}
                </p>
              </div>
              <span className={`text-xs px-2 py-0.5 rounded-full font-medium ${BADGE[rdv.statut]}`}>
                {rdv.statut.replace('_', ' ')}
              </span>
            </div>
          ))}
        </div>
      </div>
    </div>
  )
}