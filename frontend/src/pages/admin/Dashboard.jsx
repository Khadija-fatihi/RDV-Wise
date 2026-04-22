import { useQuery } from '@tanstack/react-query'
import { statsService } from '../../services/api'
import {
  BarChart, Bar, LineChart, Line, PieChart, Pie, Cell,
  XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer
} from 'recharts'
import { Users, Stethoscope, Calendar, Activity, TrendingUp, Clock } from 'lucide-react'

const COLORS = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6']
const MOIS = ['Jan','Fév','Mar','Avr','Mai','Jun','Jul','Aoû','Sep','Oct','Nov','Déc']

const StatCard = ({ icon: Icon, label, value, sub, color }) => (
  <div className="card flex items-center gap-4">
    <div className={`p-3 rounded-xl ${color}`}>
      <Icon size={22} className="text-white" />
    </div>
    <div>
      <p className="text-2xl font-bold text-gray-800">{value ?? '—'}</p>
      <p className="text-sm text-gray-500">{label}</p>
      {sub && <p className="text-xs text-blue-600 font-medium mt-0.5">{sub}</p>}
    </div>
  </div>
)

export default function AdminDashboard() {
  const { data, isLoading } = useQuery({
    queryKey: ['admin-stats'],
    queryFn: () => statsService.admin().then(r => r.data)
  })

  if (isLoading) return (
    <div className="flex items-center justify-center h-64">
      <div className="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-600" />
    </div>
  )

  const { stats, rdv_par_mois, rdv_par_type, rdv_par_statut, patients_dialyse, top_medecins } = data || {}

  // Formater données mois pour le graphique
  const chartMois = (rdv_par_mois || []).map(r => ({
    name: MOIS[r.mois - 1],
    RDV: r.total
  }))

  const pieStatut = (rdv_par_statut || []).map(r => ({
    name: r.statut.replace('_', ' '),
    value: r.total
  }))

  const pieDialyse = (patients_dialyse || []).map(r => ({
    name: r.type_dialyse,
    value: r.total
  }))

  return (
    <div className="space-y-6">
      <div>
        <h1 className="text-2xl font-bold text-gray-900">Tableau de bord</h1>
        <p className="text-gray-500 text-sm mt-1">Vue globale du centre de dialyse</p>
      </div>

      {/* Stat cards */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <StatCard icon={Users}       label="Patients"         value={stats?.total_patients}      color="bg-blue-500" />
        <StatCard icon={Stethoscope} label="Médecins"         value={stats?.total_medecins}      color="bg-teal-500" />
        <StatCard icon={Calendar}    label="RDV aujourd'hui"  value={stats?.rdv_aujourd_hui}     color="bg-purple-500" />
        <StatCard icon={Clock}       label="En attente"       value={stats?.rdv_en_attente}      color="bg-orange-500" />
      </div>

      {/* Charts row 1 */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {/* RDV par mois */}
        <div className="card">
          <h3 className="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <TrendingUp size={18} className="text-blue-500" /> Rendez-vous par mois
          </h3>
          <ResponsiveContainer width="100%" height={220}>
            <BarChart data={chartMois}>
              <CartesianGrid strokeDasharray="3 3" stroke="#f0f0f0" />
              <XAxis dataKey="name" tick={{ fontSize: 12 }} />
              <YAxis tick={{ fontSize: 12 }} />
              <Tooltip />
              <Bar dataKey="RDV" fill="#3b82f6" radius={[4,4,0,0]} />
            </BarChart>
          </ResponsiveContainer>
        </div>

        {/* RDV par statut */}
        <div className="card">
          <h3 className="font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <Activity size={18} className="text-purple-500" /> Statut des RDV
          </h3>
          <ResponsiveContainer width="100%" height={220}>
            <PieChart>
              <Pie data={pieStatut} cx="50%" cy="50%" outerRadius={80}
                   dataKey="value" label={({ name, percent }) =>
                     `${name} ${(percent * 100).toFixed(0)}%`}>
                {pieStatut.map((_, i) => (
                  <Cell key={i} fill={COLORS[i % COLORS.length]} />
                ))}
              </Pie>
              <Tooltip />
            </PieChart>
          </ResponsiveContainer>
        </div>
      </div>

      {/* Charts row 2 */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {/* Type dialyse */}
        <div className="card">
          <h3 className="font-semibold text-gray-700 mb-4">Patients par type de dialyse</h3>
          <ResponsiveContainer width="100%" height={200}>
            <PieChart>
              <Pie data={pieDialyse} cx="50%" cy="50%" innerRadius={50} outerRadius={80}
                   dataKey="value" label={({ name, value }) => `${name}: ${value}`}>
                {pieDialyse.map((_, i) => (
                  <Cell key={i} fill={COLORS[i % COLORS.length]} />
                ))}
              </Pie>
              <Tooltip />
            </PieChart>
          </ResponsiveContainer>
        </div>

        {/* Top médecins */}
        <div className="card">
          <h3 className="font-semibold text-gray-700 mb-4">Top médecins (RDV)</h3>
          <div className="space-y-3">
            {(top_medecins || []).map((m, i) => (
              <div key={m.id} className="flex items-center gap-3">
                <span className="w-6 h-6 rounded-full bg-blue-100 text-blue-700 text-xs
                                 font-bold flex items-center justify-center">
                  {i + 1}
                </span>
                <div className="flex-1">
                  <p className="text-sm font-medium text-gray-800">{m.user?.name}</p>
                  <p className="text-xs text-gray-500">{m.specialite}</p>
                </div>
                <span className="text-sm font-semibold text-blue-600">
                  {m.appointments_count} RDV
                </span>
              </div>
            ))}
          </div>
        </div>
      </div>

      {/* Résumé stats */}
      <div className="grid grid-cols-3 gap-4">
        <div className="card text-center">
          <p className="text-3xl font-bold text-green-600">{stats?.rdv_confirmes}</p>
          <p className="text-sm text-gray-500 mt-1">RDV confirmés</p>
        </div>
        <div className="card text-center">
          <p className="text-3xl font-bold text-gray-600">{stats?.total_consultations}</p>
          <p className="text-sm text-gray-500 mt-1">Consultations</p>
        </div>
        <div className="card text-center">
          <p className="text-3xl font-bold text-red-500">{stats?.rdv_annules}</p>
          <p className="text-sm text-gray-500 mt-1">RDV annulés</p>
        </div>
      </div>
    </div>
  )
}