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
        'upcomingAppointments' => $appointments->where('appointment_date', '>', now())->count(),
        'completedAppointments' => $appointments->where('status', 'completed')->count(),
        'todayAppointments' => $appointments->whereDate('appointment_date', today())->get(),
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
        'todayAppointmentsCount' => $appointments->whereDate('appointment_date', today())->count(),
        'completedAppointments' => $appointments->where('status', 'completed')->count(),
        'pendingAppointments' => $appointments->where('status', 'scheduled')->count(),
        'todayAppointments' => $appointments->whereDate('appointment_date', today())->get(),
        'notificationsCount' => 3
    ]);
}
}
