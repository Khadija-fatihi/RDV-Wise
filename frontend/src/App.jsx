import { Routes, Route, Navigate } from 'react-router-dom'
import useAuthStore from './store/authStore'

// Auth pages
import Login    from './pages/auth/Login'
import Register from './pages/auth/Register'

// Admin pages
import AdminDashboard from './pages/admin/Dashboard'
import AdminPatients  from './pages/admin/Patients'
import AdminMedecins  from './pages/admin/Medecins'

// Médecin pages
import MedecinDashboard    from './pages/medecin/Dashboard'
import MedecinAppointments from './pages/medecin/Appointments'
import MedecinConsultation from './pages/medecin/Consultation'

// Patient pages
import PatientDashboard    from './pages/patient/Dashboard'
import PatientAppointments from './pages/patient/Appointments'
import PatientAI           from './pages/patient/AiAnalysis'
import PatientHistory      from './pages/patient/History'

// Layout
import DashboardLayout from './components/layout/DashboardLayout'

// Guards
const PrivateRoute = ({ children, roles }) => {
  const { user } = useAuthStore()
  if (!user) return <Navigate to="/login" replace />
  if (roles && !roles.includes(user.role)) return <Navigate to="/unauthorized" replace />
  return children
}

const PublicRoute = ({ children }) => {
  const { user } = useAuthStore()
  if (!user) return children
  return <Navigate to={getDashboardPath(user.role)} replace />
}

const getDashboardPath = (role) => {
  if (role === 'admin')   return '/admin'
  if (role === 'medecin') return '/medecin'
  return '/patient'
}

export default function App() {
  return (
    <Routes>
      {/* Public */}
      <Route path="/" element={<Navigate to="/login" replace />} />
      <Route path="/login"    element={<PublicRoute><Login /></PublicRoute>} />
      <Route path="/register" element={<PublicRoute><Register /></PublicRoute>} />

      {/* Admin */}
      <Route path="/admin" element={
        <PrivateRoute roles={['admin']}>
          <DashboardLayout role="admin" />
        </PrivateRoute>
      }>
        <Route index           element={<AdminDashboard />} />
        <Route path="patients" element={<AdminPatients />} />
        <Route path="medecins" element={<AdminMedecins />} />
      </Route>

      {/* Médecin */}
      <Route path="/medecin" element={
        <PrivateRoute roles={['medecin']}>
          <DashboardLayout role="medecin" />
        </PrivateRoute>
      }>
        <Route index                  element={<MedecinDashboard />} />
        <Route path="appointments"    element={<MedecinAppointments />} />
        <Route path="consultation/:id" element={<MedecinConsultation />} />
      </Route>

      {/* Patient */}
      <Route path="/patient" element={
        <PrivateRoute roles={['patient']}>
          <DashboardLayout role="patient" />
        </PrivateRoute>
      }>
        <Route index               element={<PatientDashboard />} />
        <Route path="appointments" element={<PatientAppointments />} />
        <Route path="ai"           element={<PatientAI />} />
        <Route path="history"      element={<PatientHistory />} />
      </Route>

      {/* Fallback */}
      <Route path="/unauthorized" element={
        <div className="flex items-center justify-center min-h-screen">
          <div className="text-center">
            <h1 className="text-3xl font-bold text-red-600">403</h1>
            <p className="text-gray-600 mt-2">Accès non autorisé</p>
          </div>
        </div>
      } />
      <Route path="*" element={<Navigate to="/login" replace />} />
    </Routes>
  )
}