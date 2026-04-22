import { useState } from 'react'
import { Link, useNavigate } from 'react-router-dom'
import useAuthStore from '../../store/authStore'
import toast from 'react-hot-toast'
import { Activity, Eye, EyeOff, Loader2 } from 'lucide-react'

export default function Login() {
  const { login, loading } = useAuthStore()
  const navigate = useNavigate()
  const [form, setForm] = useState({ email: '', password: '' })
  const [showPwd, setShowPwd] = useState(false)

  const handleSubmit = async (e) => {
    e.preventDefault()
    try {
      const user = await login(form)
      toast.success(`Bienvenue, ${user.name} !`)
      if (user.role === 'admin')   navigate('/admin')
      else if (user.role === 'medecin') navigate('/medecin')
      else navigate('/patient')
    } catch (err) {
      toast.error(err.message)
    }
  }

  const demoLogins = [
    { label: 'Admin',   email: 'admin@berdai.ma',    role: 'admin' },
    { label: 'Médecin', email: 'medecin1@berdai.ma', role: 'medecin' },
    { label: 'Patient', email: 'patient1@berdai.ma', role: 'patient' },
  ]

  return (
    <div className="min-vh-100 d-flex align-items-center justify-content-center py-5">
      <div className="w-100" style={{ maxWidth: '520px' }}>
        <div className="card shadow-lg overflow-hidden">
          <div className="p-5 text-center bg-primary text-white">
            <div className="d-flex align-items-center justify-content-center mb-3">
              <div className="bg-white rounded-circle d-flex align-items-center justify-content-center"
                   style={{ width: 60, height: 60 }}>
                <Activity size={28} className="text-primary" />
              </div>
            </div>
            <h1 className="h3 fw-bold mb-1">BERDAI</h1>
            <p className="mb-0">Centre de Dialyse — Espace médical</p>
          </div>

          <div className="card-body p-5 bg-dark text-white">
            <h2 className="h5 fw-semibold mb-4">Connexion</h2>
            <form onSubmit={handleSubmit} className="mb-4">
              <div className="mb-3">
                <label className="form-label">Adresse email</label>
                <input
                  type="email" required
                  className="form-control"
                  placeholder="vous@exemple.com"
                  value={form.email}
                  onChange={e => setForm({ ...form, email: e.target.value })}
                />
              </div>
              <div className="mb-4">
                <label className="form-label">Mot de passe</label>
                <div className="input-group">
                  <input
                    type={showPwd ? 'text' : 'password'} required
                    className="form-control"
                    placeholder="••••••••"
                    value={form.password}
                    onChange={e => setForm({ ...form, password: e.target.value })}
                  />
                  <button type="button" className="btn btn-outline-light"
                    onClick={() => setShowPwd(!showPwd)}>
                    {showPwd ? <EyeOff size={18} /> : <Eye size={18} />}
                  </button>
                </div>
              </div>

              <button type="submit" disabled={loading}
                className="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                {loading && <Loader2 size={16} className="spinner-border spinner-border-sm" />}
                Se connecter
              </button>
            </form>

            <div className="mt-4 pt-3 border-top border-white/15 text-center text-white-75">
              <p className="mb-2 small">Comptes de démonstration</p>
              <div className="d-flex gap-2 justify-content-center flex-wrap">
                {demoLogins.map(d => (
                  <button key={d.role}
                    type="button"
                    onClick={() => setForm({ email: d.email, password: 'password' })}
                    className="btn btn-sm btn-outline-light rounded-pill">
                    {d.label}
                  </button>
                ))}
              </div>
            </div>

            <p className="text-center text-white-50 mt-4 mb-0">
              Pas encore de compte ?{' '}
              <Link to="/register" className="text-white text-decoration-underline">
                S'inscrire
              </Link>
            </p>
          </div>
        </div>
      </div>
    </div>
  )
}
