import { create } from 'zustand'
import { authService } from '../services/api'

const useAuthStore = create((set, get) => ({
  user:    JSON.parse(localStorage.getItem('user') || 'null'),
  token:   localStorage.getItem('token') || null,
  loading: false,
  error:   null,

  login: async (credentials) => {
    set({ loading: true, error: null })
    try {
      const { data } = await authService.login(credentials)
      localStorage.setItem('token', data.token)
      localStorage.setItem('user', JSON.stringify(data.user))
      set({ user: data.user, token: data.token, loading: false })
      return data.user
    } catch (err) {
      const msg = err.response?.data?.message || 'Erreur de connexion'
      set({ error: msg, loading: false })
      throw new Error(msg)
    }
  },

  register: async (formData) => {
    set({ loading: true, error: null })
    try {
      const { data } = await authService.register(formData)
      localStorage.setItem('token', data.token)
      localStorage.setItem('user', JSON.stringify(data.user))
      set({ user: data.user, token: data.token, loading: false })
      return data.user
    } catch (err) {
      const msg = err.response?.data?.message || 'Erreur d\'inscription'
      set({ error: msg, loading: false })
      throw new Error(msg)
    }
  },

  logout: async () => {
    try { await authService.logout() } catch {}
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    set({ user: null, token: null })
  },

  refreshUser: async () => {
    try {
      const { data } = await authService.me()
      localStorage.setItem('user', JSON.stringify(data.user))
      set({ user: data.user })
    } catch {}
  },

  isAdmin:   () => get().user?.role === 'admin',
  isMedecin: () => get().user?.role === 'medecin',
  isPatient: () => get().user?.role === 'patient',
}))

export default useAuthStore