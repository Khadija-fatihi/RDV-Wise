@extends('layouts.app')

@section('title', 'Appointment Details')
@section('page-title', 'Appointment Details')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="md:col-span-2">
        <div class="card">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Appointment Information</h2>

            <div class="space-y-4">
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ auth()->user()->isPatient() ? 'Doctor' : 'Patient' }}</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            @if (auth()->user()->isPatient())
                                Dr. {{ $appointment->doctor->user->name }}
                            @else
                                {{ $appointment->patient->user->name }}
                            @endif
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Status</p>
                        <p class="badge badge-{{ $appointment->status === 'confirmed' ? 'success' : ($appointment->status === 'cancelled' ? 'danger' : 'info') }}">
                            {{ ucfirst($appointment->status) }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Date & Time</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $appointment->appointment_date->format('M d, Y H:i') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Type</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white capitalize">
                            {{ str_replace('-', ' ', $appointment->appointment_type) }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Consultation Fee</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            ${{ number_format($appointment->consultation_fee ?? 0, 2) }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Payment Status</p>
                        <p class="badge {{ $appointment->is_paid ? 'badge-success' : 'badge-warning' }}">
                            {{ $appointment->is_paid ? 'Paid' : 'Pending' }}
                        </p>
                    </div>
                </div>

                @if ($appointment->reason_for_visit)
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Reason for Visit</p>
                        <p class="text-gray-900 dark:text-gray-300 mt-1">{{ $appointment->reason_for_visit }}</p>
                    </div>
                @endif

                @if ($appointment->consultation)
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Consultation Notes</h3>
                        
                        @if ($appointment->consultation->diagnosis)
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Diagnosis</p>
                                <p class="text-gray-900 dark:text-gray-300">{{ $appointment->consultation->diagnosis }}</p>
                            </div>
                        @endif

                        @if ($appointment->consultation->treatment_plan)
                            <div class="mt-3">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Treatment Plan</p>
                                <p class="text-gray-900 dark:text-gray-300">{{ $appointment->consultation->treatment_plan }}</p>
                            </div>
                        @endif

                        @if ($appointment->consultation->medications_prescribed)
                            <div class="mt-3">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Medications</p>
                                <p class="text-gray-900 dark:text-gray-300">{{ $appointment->consultation->medications_prescribed }}</p>
                            </div>
                        @endif

                        @if ($appointment->consultation->follow_up_date)
                            <div class="mt-3">
                                <p class="text-sm text-gray-600 dark:text-gray-400">Follow-up Date</p>
                                <p class="text-gray-900 dark:text-gray-300">{{ $appointment->consultation->follow_up_date->format('M d, Y') }}</p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to Appointments</a>
                @if ($appointment->status !== 'completed' && $appointment->status !== 'cancelled' && auth()->user()->isPatient())
                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this appointment?')">
                            Cancel Appointment
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                @if (auth()->user()->isPatient())
                    Doctor Information
                @else
                    Patient Information
                @endif
            </h3>

            @if (auth()->user()->isPatient())
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Name</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->doctor->user->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Specialization</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->doctor->specialization }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Experience</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->doctor->years_experience }} years</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Rating</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->doctor->rating }}/5 ⭐</p>
                    </div>

                    @if ($appointment->doctor->hospital_affiliation)
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Hospital</p>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->doctor->hospital_affiliation }}</p>
                        </div>
                    @endif
                </div>
            @else
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Name</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->patient->user->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->patient->user->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Phone</p>
                        <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->patient->user->phone ?? 'N/A' }}</p>
                    </div>

                    @if ($appointment->patient->blood_type)
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Blood Type</p>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $appointment->patient->blood_type }}</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
