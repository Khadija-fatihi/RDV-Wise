<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['patient.user', 'medecin.user']);

        if ($request->filled('status')) {
            $query->where('statut', $request->status);
        }

        if ($request->filled('doctor')) {
            $query->whereHas('medecin.user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->doctor . '%');
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('date_heure', $request->date);
        }

        if ($request->filled('department')) {
            $query->whereHas('medecin', function ($q) use ($request) {
                $q->where('specialite', $request->department);
            });
        }

        $appointments    = $query->orderBy('date_heure', 'desc')->paginate(15);
        $todayCount      = Appointment::whereDate('date_heure', today())->count();
        $completedCount  = Appointment::where('statut', 'completed')->whereDate('date_heure', today())->count();
        $specialties     = Doctor::distinct()->pluck('specialite');

        return view('admin.Admin-Supervise-Appointments', compact(
            'appointments',
            'todayCount',
            'completedCount',
            'specialties'
        ));
    }

    public function cancel(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'statut'        => 'cancelled',
            'notes_medecin' => $request->reason ?? 'Cancelled by administrator',
        ]);

        return redirect()->route('admin.appointments')
            ->with('success', 'Appointment cancelled successfully.');
    }

    public function reschedule($id)
    {
        $appointment = Appointment::with(['patient.user', 'medecin.user'])->findOrFail($id);
        return view('admin.admin-appointment-reschedule', compact('appointment'));
    }

    public function doReschedule(Request $request, $id)
    {
        $request->validate([
            'date_heure' => 'required|date|after:now',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'date_heure' => $request->date_heure,
            'statut'     => 'confirmed',
        ]);

        return redirect()->route('admin.appointments')
            ->with('success', 'Appointment rescheduled successfully.');
    }
}
