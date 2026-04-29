<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\SignupController;


use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isPatient()) {
            $appointments = $user->patient->appointments()->with('doctor.user')->paginate(15);
        } elseif ($user->isMedecin()) {
            $appointments = $user->doctor->appointments()->with('patient.user')->paginate(15);
        } else {
            $appointments = Appointment::with(['patient.user', 'doctor.user'])->paginate(15);
        }

        return view('Appointment.index', compact('appointments'));
    }

    public function create()
    {
        return redirect()->route('book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id'       => 'required|exists:medecins,id',
            'appointment_date'=> 'required|date_format:Y-m-d H:i|after:now',
            'reason_for_visit'=> 'nullable|string|max:500',
            'appointment_type'=> 'required|in:consultation,hemodialyse,dialyse_peritoneale,suivi,urgence,in-person,online',
        ]);

        $patient = Auth::user()->patient;
        $doctor  = Doctor::findOrFail($validated['doctor_id']);

        $appointment = Appointment::create([
            'patient_id'  => $patient->id,
            'medecin_id'  => $validated['doctor_id'],
            'date_heure'  => $validated['appointment_date'],
            'motif'       => $validated['reason_for_visit'] ?? null,
            'statut'      => 'pending',
            'type_seance' => in_array($validated['appointment_type'], ['in-person', 'online']) ? 'consultation' : $validated['appointment_type'],
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully!');
    }

    public function show($id)
    {
        $appointment = Appointment::with(['patient.user', 'medecin.user', 'consultation'])->findOrFail($id);

        return view('Appointment.show', compact('appointment'));
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['statut' => 'cancelled']);

        return redirect()->route('appointments.index')->with('success', 'Appointment cancelled successfully!');
    }
}
