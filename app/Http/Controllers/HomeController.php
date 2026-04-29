<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function patientDashboard()
    {
        $user    = auth()->user();
        $patient = $user->patient;

        $appointments = $patient->appointments();

        return view('dashboard.patient', [
            'totalAppointments'     => $appointments->count(),
            'upcomingAppointments'  => $appointments->where('date_heure', '>', now())->count(),
            'completedAppointments' => $appointments->where('statut', 'completed')->count(),
            'todayAppointments'     => $appointments->whereDate('date_heure', today())->get(),
            'notificationsCount'    => 2,
        ]);
    }

    public function doctorDashboard()
    {
        $user   = auth()->user();
        $doctor = $user->doctor;

        // ✅ Use medecin_id via the fixed relationship
        $appointments = $doctor->appointments();

        return view('dashboard.doctor', [
            'totalPatients'          => $doctor->appointments()->distinct('patient_id')->count('patient_id'), // ✅ fixed distinct count
            'todayAppointmentsCount' => $appointments->whereDate('date_heure', today())->count(),
            'completedAppointments'  => $appointments->where('statut', 'completed')->count(),
            'pendingAppointments'    => $appointments->where('statut', 'pending')->count(),
            'todayAppointments'      => $appointments->whereDate('date_heure', today())->get(),
            'notificationsCount'     => 3,
        ]);
    }
}