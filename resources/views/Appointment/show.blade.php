@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                <p class="text-uppercase small fw-semibold text-primary mb-2">Appointment overview</p>
                <h1 class="h2 fw-bold mb-3">Appointment Details</h1>
                <p class="text-muted mb-4">Review your scheduled consultation and related notes.</p>

                <div class="border rounded-4 p-4 mb-4 bg-light-subtle">
                    <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
                        <div>
                            <p class="text-uppercase small fw-semibold text-muted mb-1">{{ auth()->user()->isPatient() ? 'Doctor' : 'Patient' }}</p>
                            <h2 class="h4 fw-bold mb-0">
                                @if (auth()->user()->isPatient())
                                    Dr. {{ $appointment->doctor->user->name ?? 'Doctor' }}
                                @else
                                    {{ $appointment->patient->user->name ?? 'Patient' }}
                                @endif
                            </h2>
                        </div>
                        <div class="text-md-end">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Status</p>
                            <span class="badge rounded-pill bg-{{ $appointment->status === 'confirmed' ? 'success' : ($appointment->status === 'cancelled' ? 'danger' : 'warning') }} text-dark fw-semibold px-3 py-2">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <div class="border rounded-4 p-3 h-100 bg-white">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Date & Time</p>
                            <p class="h5 fw-bold mb-0">{{ $appointment->appointment_date->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="border rounded-4 p-3 h-100 bg-white">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Type</p>
                            <p class="h5 fw-bold text-capitalize mb-0">{{ str_replace('_', ' ', $appointment->type_seance) }}</p>
                        </div>
                    </div>
                </div>

                @if ($appointment->motif)
                    <div class="border rounded-4 p-3 mb-4 bg-white">
                        <p class="text-uppercase small fw-semibold text-muted mb-2">Reason for Visit</p>
                        <p class="mb-0 text-dark">{{ $appointment->motif }}</p>
                    </div>
                @endif

                @if ($appointment->consultation)
                    <div class="border rounded-4 p-4 bg-white">
                        <h3 class="h5 fw-bold mb-3">Consultation Notes</h3>
                        @if (!empty($appointment->consultation->diagnostic))
                            <div class="mb-3">
                                <p class="text-uppercase small fw-semibold text-muted mb-1">Diagnosis</p>
                                <p class="mb-0">{{ $appointment->consultation->diagnostic }}</p>
                            </div>
                        @endif
                        @if (!empty($appointment->consultation->traitement))
                            <div class="mb-3">
                                <p class="text-uppercase small fw-semibold text-muted mb-1">Treatment Plan</p>
                                <p class="mb-0">{{ $appointment->consultation->traitement }}</p>
                            </div>
                        @endif
                        @if (!empty($appointment->consultation->notes))
                            <div>
                                <p class="text-uppercase small fw-semibold text-muted mb-1">Notes</p>
                                <p class="mb-0">{{ $appointment->consultation->notes }}</p>
                            </div>
                        @endif
                    </div>
                @endif

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <a href="{{ route('appointments.index') }}" class="btn btn-outline-secondary rounded-4">Back to Appointments</a>
                    @if ($appointment->status !== 'completed' && $appointment->status !== 'cancelled' && auth()->user()->isPatient())
                        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-4" onclick="return confirm('Are you sure you want to cancel this appointment?')">
                                Cancel Appointment
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h3 class="h5 fw-bold mb-3">
                    @if (auth()->user()->isPatient())
                        Doctor Information
                    @else
                        Patient Information
                    @endif
                </h3>

                @if (auth()->user()->isPatient())
                    <div class="d-grid gap-3">
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Name</p>
                            <p class="fw-semibold mb-0">{{ $appointment->doctor->user->name ?? 'Doctor' }}</p>
                        </div>
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Specialization</p>
                            <p class="fw-semibold mb-0">{{ $appointment->doctor->specialite ?? $appointment->doctor->specialization ?? 'General' }}</p>
                        </div>
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Cabinet</p>
                            <p class="fw-semibold mb-0">{{ $appointment->doctor->cabinet ?? 'Main clinic' }}</p>
                        </div>
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Consultation Fee</p>
                            <p class="fw-semibold mb-0">{{ number_format($appointment->doctor->tarif ?? 0, 2) }} MAD</p>
                        </div>
                    </div>
                @else
                    <div class="d-grid gap-3">
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Name</p>
                            <p class="fw-semibold mb-0">{{ $appointment->patient->user->name ?? 'Patient' }}</p>
                        </div>
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Email</p>
                            <p class="fw-semibold mb-0">{{ $appointment->patient->user->email ?? 'N/A' }}</p>
                        </div>
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Phone</p>
                            <p class="fw-semibold mb-0">{{ $appointment->patient->user->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="border rounded-4 p-3 bg-light-subtle">
                            <p class="text-uppercase small fw-semibold text-muted mb-1">Blood Type</p>
                            <p class="fw-semibold mb-0">{{ $appointment->patient->blood_type ?? 'N/A' }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
