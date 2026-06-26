<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\SignupController;


use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\AppointmentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if ($user?->isPatient()) {
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
            'doctor_id'        => 'required|exists:doctors,id',
            'appointment_date' => 'required|date_format:Y-m-d\TH:i|after:now',
            'reason_for_visit' => 'nullable|string|max:500',
            'appointment_type' => 'required|in:consultation,hemodialyse,dialyse_peritoneale,suivi,urgence,in-person,online',
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

        if ($patient?->user) {
            $patient->user->notify(new AppointmentNotification($appointment, 'patient', 'scheduled'));
        }

        if ($doctor?->user) {
            $doctor->user->notify(new AppointmentNotification($appointment, 'doctor', 'scheduled'));
        }

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully!');
    }

    public function show($id)
    {
        $appointment = Appointment::with(['patient.user', 'medecin.user', 'consultation'])->findOrFail($id);

        return view('Appointment.show', compact('appointment'));
    }

    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['statut' => 'confirmed']);

        $patientUser = $appointment->patient?->user;
        $doctorUser = $appointment->doctor?->user;

        if ($patientUser) {
            $patientUser->notify(new AppointmentNotification($appointment, 'patient', 'confirmed'));
        }

        if ($doctorUser) {
            $doctorUser->notify(new AppointmentNotification($appointment, 'doctor', 'confirmed'));
        }

        return back()->with('success', 'Appointment confirmed!');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['statut' => 'cancelled']);

        $patientUser = $appointment->patient?->user;
        $doctorUser = $appointment->doctor?->user;

        if ($patientUser) {
            $patientUser->notify(new AppointmentNotification($appointment, 'patient', 'cancelled'));
        }

        if ($doctorUser) {
            $doctorUser->notify(new AppointmentNotification($appointment, 'doctor', 'cancelled'));
        }

        return back()->with('success', 'Appointment cancelled!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['statut' => 'cancelled']);

        return redirect()->route('appointments.index')->with('success', 'Appointment cancelled successfully!');
    }
}
