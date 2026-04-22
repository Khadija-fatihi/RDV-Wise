import axios from 'axios'

const api = axios.create({
  baseURL: '/api',
  headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
  withCredentials: true,
})

// Attach token automatiquement
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('token')
  if (token) config.headers.Authorization = `Bearer ${token}`
  return config
})

// Gérer les 401 → redirect login
api.interceptors.response.use(
  (res) => res,
  (err) => {
    if (err.response?.status === 401) {
      localStorage.removeItem('token')
      localStorage.removeItem('user')
      window.location.href = '/login'
    }
    return Promise.reject(err)
  }
)

// ── Auth ──────────────────────────────────────────────────────────
export const authService = {
  login:    (data) => api.post('/auth/login', data),
  register: (data) => api.post('/auth/register', data),
  logout:   ()     => api.post('/auth/logout'),
  me:       ()     => api.get('/auth/me'),
}

// ── Patients ──────────────────────────────────────────────────────
export const patientService = {
  list:          (params) => api.get('/admin/patients', { params }),
  get:           (id)     => api.get(`/admin/patients/${id}`),
  create:        (data)   => api.post('/admin/patients', data),
  update:        (id, d)  => api.put(`/admin/patients/${id}`, d),
  delete:        (id)     => api.delete(`/admin/patients/${id}`),
  consultations: (id)     => api.get(`/admin/patients/${id}/consultations`),
  myProfile:     ()       => api.get('/patient/profil'),
  updateProfile: (data)   => api.put('/patient/profil', data),
  myConsultations: ()     => api.get('/patient/consultations'),
}

// ── Médecins ──────────────────────────────────────────────────────
export const medecinService = {
  list:      (params) => api.get('/medecins', { params }),
  get:       (id)     => api.get(`/medecins/${id}`),
  create:    (data)   => api.post('/admin/medecins', data),
  update:    (id, d)  => api.put(`/admin/medecins/${id}`, d),
  delete:    (id)     => api.delete(`/admin/medecins/${id}`),
  slots:     (id, date) => api.get(`/medecins/${id}/slots`, { params: { date } }),
  dashboard: ()       => api.get('/medecin/dashboard'),
  updateProfil: (data) => api.put('/medecin/profil', data),
}

// ── Rendez-vous ───────────────────────────────────────────────────
export const appointmentService = {
  list:    (params) => api.get('/appointments', { params }),
  get:     (id)     => api.get(`/appointments/${id}`),
  create:  (data)   => api.post('/appointments', data),
  confirm: (id)     => api.patch(`/medecin/rdv/${id}/confirm`),
  cancel:  (id, d)  => api.patch(`/appointments/${id}/cancel`, d),
  today:   ()       => api.get('/medecin/rdv/today'),
}

// ── Consultations ─────────────────────────────────────────────────
export const consultationService = {
  list:   (params) => api.get('/medecin/consultations', { params }),
  get:    (id)     => api.get(`/medecin/consultations/${id}`),
  create: (data)   => api.post('/medecin/consultations', data),
  update: (id, d)  => api.put(`/medecin/consultations/${id}`, d),
}

// ── IA ────────────────────────────────────────────────────────────
export const aiService = {
  symptomes: ()     => api.get('/ai/symptomes'),
  analyze:   (data) => api.post('/patient/ai/analyze', data),
  history:   ()     => api.get('/patient/ai/history'),
}

// ── Statistiques ──────────────────────────────────────────────────
export const statsService = {
  admin: () => api.get('/admin/stats'),
}

export default api