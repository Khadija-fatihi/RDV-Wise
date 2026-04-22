<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentController extends Controller
{



    public function index()
    {
        $user = Auth::user();
        
        if ($user->isPatient()) {
            $appointments = $user->patient->appointments()->with('doctor.user')->paginate(15);
        } elseif ($user->isDoctor()) {
            $appointments = $user->doctor->appointments()->with('patient.user')->paginate(15);
        } else {
            $appointments = Appointment::with('patient.user', 'doctor.user')->paginate(15);
        }

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->where('is_available', true)->get();
        $specializations = Doctor::distinct()->pluck('specialization');
        
        return view('appointments.create', compact('doctors', 'specializations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date_format:Y-m-d H:i|after:now',
            'reason_for_visit' => 'nullable|string|max:500',
            'appointment_type' => 'required|in:in-person,online',
        ]);

        $patient = Auth::user()->patient;
        $doctor = Doctor::findOrFail($validated['doctor_id']);

        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $validated['doctor_id'],
            'appointment_date' => $validated['appointment_date'],
            'reason_for_visit' => $validated['reason_for_visit'] ?? null,
            'status' => 'scheduled',
            'appointment_type' => $validated['appointment_type'],
            'consultation_fee' => $doctor->consultation_fee,
        ]);

        $patient->increment('total_appointments');

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully!');
    }

    public function show($id)
    {
        $appointment = Appointment::with('patient.user', 'doctor.user', 'consultation')->findOrFail($id);
        return view('appointments.show', compact('appointment'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::with('user')->where('is_available', true)->get();
        return view('appointments.edit', compact('appointment', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $validated = $request->validate([
            'appointment_date' => 'required|date_format:Y-m-d H:i|after:now',
            'reason_for_visit' => 'nullable|string|max:500',
            'appointment_type' => 'required|in:in-person,online',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.show', $appointment)->with('success', 'Appointment updated successfully!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'cancelled']);
        return redirect()->route('appointments.index')->with('success', 'Appointment cancelled successfully!');
    }

    public function getAvailableSlots($doctorId, $date)
    {
        $doctor = Doctor::findOrFail($doctorId);
        $date = Carbon::createFromFormat('Y-m-d', $date);
        
        $schedule = schedule::where('doctor_id', $doctorId)
            ->whereDate('date', $date)
            ->first();

        if (!$schedule) {
            return response()->json(['slots' => []]);
        }

        $existingAppointments = Appointment::where('doctor_id', $doctorId)
            ->whereDate('appointment_date', $date)
            ->pluck('appointment_date')
            ->toArray();

        $slots = [];
        $current = Carbon::createFromFormat('Y-m-d H:i', $date->format('Y-m-d') . ' ' . $schedule->start_time->format('H:i'));
        $end = Carbon::createFromFormat('Y-m-d H:i', $date->format('Y-m-d') . ' ' . $schedule->end_time->format('H:i'));

        while ($current->lessThan($end)) {
            if (!in_array($current->toDateTimeString(), $existingAppointments)) {
                $slots[] = $current->format('H:i');
            }
            $current->addMinutes($schedule->slot_duration);
        }

        return response()->json(['slots' => $slots]);
    }
}
