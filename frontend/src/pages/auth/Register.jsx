import { useState } from 'react'
import { Link, useNavigate } from 'react-router-dom'
import useAuthStore from '../../store/authStore'
import toast from 'react-hot-toast'
import { Activity, Loader2 } from 'lucide-react'

export default function Register() {
  const { register, loading } = useAuthStore()
  const navigate = useNavigate()
  const [form, setForm] = useState({
    name: '', email: '', password: '', password_confirmation: '',
    role: 'patient', phone: ''
  })

  const handleSubmit = async (e) => {
    e.preventDefault()
    if (form.password !== form.password_confirmation) {
      return toast.error('Les mots de passe ne correspondent pas')
    }
    try {
      const user = await register(form)
      toast.success('Compte créé avec succès !')
      navigate(user.role === 'medecin' ? '/medecin' : '/patient')
    } catch (err) {
      toast.error(err.message)
    }
  }

  return (
    <div className="min-vh-100 d-flex align-items-center justify-content-center py-5">
      <div className="w-100" style={{ maxWidth: '560px' }}>
        <div className="card shadow-lg overflow-hidden">
          <div className="p-5 text-center bg-success text-white">
            <div className="d-flex align-items-center justify-content-center mb-3">
              <div className="bg-white rounded-circle d-flex align-items-center justify-content-center"
                   style={{ width: 60, height: 60 }}>
                <Activity size={28} className="text-success" />
              </div>
            </div>
            <h1 className="h3 fw-bold mb-1">BERDAI</h1>
            <p className="mb-0">Créer un compte et accéder à votre espace</p>
          </div>

          <div className="card-body p-5 bg-dark text-white">
            <h2 className="h5 fw-semibold mb-4">Inscription</h2>
            <div className="mb-4">
              <div className="btn-group w-100" role="group" aria-label="Sélection du rôle">
                {['patient', 'medecin'].map(r => (
                  <button key={r} type="button"
                    onClick={() => setForm({ ...form, role: r })}
                    className={`btn ${form.role === r ? 'btn-primary' : 'btn-outline-light'}`}>
                    {r === 'patient' ? '👤 Patient' : '🩺 Médecin'}
                  </button>
                ))}
              </div>
            </div>

            <form onSubmit={handleSubmit} className="mb-4">
              <div className="mb-3">
                <label className="form-label">Nom complet</label>
                <input type="text" required className="form-control"
                  placeholder="Prénom Nom"
                  value={form.name} onChange={e => setForm({ ...form, name: e.target.value })} />
              </div>
              <div className="mb-3">
                <label className="form-label">Email</label>
                <input type="email" required className="form-control"
                  value={form.email} onChange={e => setForm({ ...form, email: e.target.value })} />
              </div>
              <div className="mb-3">
                <label className="form-label">Téléphone</label>
                <input type="tel" className="form-control" placeholder="+212 6XX XXX XXX"
                  value={form.phone} onChange={e => setForm({ ...form, phone: e.target.value })} />
              </div>
              <div className="mb-3">
                <label className="form-label">Mot de passe</label>
                <input type="password" required minLength={8} className="form-control"
                  value={form.password} onChange={e => setForm({ ...form, password: e.target.value })} />
              </div>
              <div className="mb-4">
                <label className="form-label">Confirmer le mot de passe</label>
                <input type="password" required className="form-control"
                  value={form.password_confirmation}
                  onChange={e => setForm({ ...form, password_confirmation: e.target.value })} />
              </div>

              <button type="submit" disabled={loading}
                className="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                {loading && <Loader2 size={16} className="spinner-border spinner-border-sm" />}
                Créer mon compte
              </button>
            </form>

            <p className="text-center text-white-50 mb-0">
              Déjà un compte ?{' '}
              <Link to="/login" className="text-white text-decoration-underline">
                Se connecter
              </Link>
            </p>
          </div>
        </div>
      </div>
    </div>
  )
}
