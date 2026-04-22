import { Outlet, NavLink, useNavigate } from 'react-router-dom'
import { useState } from 'react'
import useAuthStore from '../../store/authStore'
import toast from 'react-hot-toast'
import {
  LayoutDashboard, Users, UserCircle, Calendar, ClipboardList,
  Brain, LogOut, Menu, X, Activity, Stethoscope
} from 'lucide-react'

const navConfig = {
  admin: [
    { to: '/admin',          label: 'Tableau de bord', icon: LayoutDashboard, end: true },
    { to: '/admin/patients', label: 'Patients',        icon: Users },
    { to: '/admin/medecins', label: 'Médecins',        icon: Stethoscope },
  ],
  medecin: [
    { to: '/medecin',               label: 'Tableau de bord', icon: LayoutDashboard, end: true },
    { to: '/medecin/appointments',  label: 'Rendez-vous',     icon: Calendar },
  ],
  patient: [
    { to: '/patient',               label: 'Mon espace',      icon: LayoutDashboard, end: true },
    { to: '/patient/appointments',  label: 'Mes rendez-vous', icon: Calendar },
    { to: '/patient/history',       label: 'Consultations',   icon: ClipboardList },
    { to: '/patient/ai',            label: 'Analyse IA',      icon: Brain },
  ],
}

const roleColors = {
  admin:   'from-blue-900 to-blue-700',
  medecin: 'from-teal-900 to-teal-700',
  patient: 'from-indigo-900 to-indigo-700',
}

const roleLabels = {
  admin:   '🛡️ Administrateur',
  medecin: '🩺 Médecin',
  patient: '👤 Patient',
}

export default function DashboardLayout({ role }) {
  const { user, logout } = useAuthStore()
  const navigate = useNavigate()
  const [sidebarOpen, setSidebarOpen] = useState(false)

  const navItems = navConfig[role] || []

  const handleLogout = async () => {
    await logout()
    toast.success('Déconnecté avec succès')
    navigate('/login')
  }

  const Sidebar = () => (
    <aside className={`flex flex-col h-full bg-gradient-to-b ${roleColors[role]} text-white`}>
      {/* Logo */}
      <div className="px-6 py-5 border-b border-white/10">
        <div className="flex items-center gap-3">
          <div className="w-9 h-9 bg-white/20 rounded-lg flex items-center justify-center">
            <Activity size={20} className="text-white" />
          </div>
          <div>
            <p className="font-bold text-sm leading-tight">BERDAI</p>
            <p className="text-xs text-white/60">Centre de Dialyse</p>
          </div>
        </div>
      </div>

      {/* User info */}
      <div className="px-6 py-4 border-b border-white/10">
        <div className="flex items-center gap-3">
          <div className="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center text-sm font-bold">
            {user?.name?.charAt(0).toUpperCase()}
          </div>
          <div className="overflow-hidden">
            <p className="text-sm font-medium truncate">{user?.name}</p>
            <p className="text-xs text-white/60">{roleLabels[role]}</p>
          </div>
        </div>
      </div>

      {/* Navigation */}
      <nav className="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
        {navItems.map(({ to, label, icon: Icon, end }) => (
          <NavLink
            key={to}
            to={to}
            end={end}
            onClick={() => setSidebarOpen(false)}
            className={({ isActive }) =>
              `flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors ${
                isActive
                  ? 'bg-white/20 text-white'
                  : 'text-white/70 hover:bg-white/10 hover:text-white'
              }`
            }
          >
            <Icon size={18} />
            {label}
          </NavLink>
        ))}
      </nav>

      {/* Logout */}
      <div className="px-4 py-4 border-t border-white/10">
        <button
          onClick={handleLogout}
          className="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm text-white/70
                     hover:bg-white/10 hover:text-white transition-colors"
        >
          <LogOut size={18} />
          Déconnexion
        </button>
      </div>
    </aside>
  )

  return (
    <div className="flex h-screen overflow-hidden bg-slate-950 text-slate-100">
      {/* Desktop sidebar */}
      <div className="hidden md:flex md:w-64 md:flex-shrink-0 md:flex-col">
        <Sidebar />
      </div>

      {/* Mobile sidebar overlay */}
      {sidebarOpen && (
        <div className="fixed inset-0 z-40 md:hidden">
          <div className="absolute inset-0 bg-black/50" onClick={() => setSidebarOpen(false)} />
          <div className="absolute left-0 top-0 h-full w-64 z-50">
            <Sidebar />
          </div>
        </div>
      )}

      {/* Main content */}
      <div className="flex-1 flex flex-col overflow-hidden">
        {/* Mobile topbar */}
        <header className="md:hidden flex items-center justify-between bg-white border-b px-4 py-3">
          <button onClick={() => setSidebarOpen(true)} className="text-gray-500">
            <Menu size={22} />
          </button>
          <span className="font-semibold text-gray-800">BERDAI Centre de Dialyse</span>
          <div className="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-sm font-bold text-blue-700">
            {user?.name?.charAt(0).toUpperCase()}
          </div>
        </header>

        {/* Page content */}
        <main className="flex-1 overflow-y-auto p-4 md:p-8">
          <Outlet />
        </main>
      </div>
    </div>
  )
}