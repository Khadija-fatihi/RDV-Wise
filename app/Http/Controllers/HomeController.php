<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

public function patientDashboard()
{
    $user = auth()->user();

    $appointments = $user->patient->appointments();

    return view('dashboard.patient', [
        'totalAppointments' => $appointments->count(),
        'upcomingAppointments' => $appointments->where('date_heure', '>', now())->count(),
        'completedAppointments' => $appointments->where('statut', 'completed')->count(),
        'todayAppointments' => $appointments->whereDate('date_heure', today())->get(),
        'notificationsCount' => 2
    ]);
}
public function doctorDashboard()
{
    $user = auth()->user();

    $doctor = $user->doctor;

    $appointments = $doctor->appointments();

    return view('dashboard.doctor', [
        'totalPatients' => $doctor->appointments()->distinct('patient_id')->count(),
        'todayAppointmentsCount' => $appointments->whereDate('date_heure', today())->count(),
        'completedAppointments' => $appointments->where('statut', 'completed')->count(),
        'pendingAppointments' => $appointments->where('statut', 'pending')->count(),
        'todayAppointments' => $appointments->whereDate('date_heure', today())->get(),
        'notificationsCount' => 3
    ]);
}
}
