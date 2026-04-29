<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    /**
     * List all appointments with filters
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['patient.user', 'medecin.user']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('statut', $request->status);
        }

        // Filter by doctor name
        if ($request->filled('doctor')) {
            $query->whereHas('medecin.user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->doctor . '%');
            });
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('date_heure', $request->date);
        }

        // Filter by department/specialite
        if ($request->filled('department')) {
            $query->whereHas('medecin', function ($q) use ($request) {
                $q->where('specialite', $request->department);
            });
        }

        $appointments  = $query->orderBy('date_heure', 'desc')->paginate(15);
        $todayCount    = Appointment::whereDate('date_heure', today())->count();
        $completedCount = Appointment::where('statut', 'completed')->whereDate('date_heure', today())->count();

        // Specialties for filter dropdown
        $specialties = Doctor::distinct()->pluck('specialite');

        return view('admin.Admin-Supervise-Appointments', compact(
            'appointments',
            'todayCount',
            'completedCount',
            'specialties'
        ));
    }

    /**
     * Cancel an appointment
     */
    public function cancel(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'statut'         => 'cancelled',
            'notes_medecin'  => $request->reason ?? 'Cancelled by administrator',
        ]);

        return redirect()->route('admin.appointments')
            ->with('success', 'Appointment cancelled successfully.');
    }

    /**
     * Show reschedule form
     */
    public function reschedule($id)
    {
        $appointment = Appointment::with(['patient.user', 'medecin.user'])->findOrFail($id);
        return view('admin.admin-appointment-reschedule', compact('appointment'));
    }

    /**
     * Apply reschedule
     */
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