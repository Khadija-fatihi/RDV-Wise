@extends('layouts.app')

@section('title', 'Book Appointment - Smart santé')

@section('content')

@if(session('success'))
    <div class="alert alert-success rounded-4 shadow-sm mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger rounded-4 shadow-sm mb-4">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger rounded-4 shadow-sm mb-4">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container py-4 pb-5">
    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 mx-auto" style="max-width: 760px;">
        <div class="mb-4">
            <p class="text-uppercase small fw-semibold text-primary mb-2">Appointment booking</p>
            <h1 class="h2 fw-bold text-dark mb-1">Book New Appointment</h1>
            <p class="text-muted mb-0">Schedule your next medical consultation</p>
        </div>

        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Doctor Selection -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-uppercase small text-muted">Select Doctor</label>
                <select name="doctor_id" class="form-select form-select-lg rounded-4 shadow-sm" required>
                    <option value="">Choose a doctor...</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->user->name }} - {{ $doctor->specialite }}</option>
                        <option value="Dr-smith">Dr-smith - Nephrologie</option>
                        
                    @endforeach
                </select>
            </div>

            <!-- Appointment Type -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-uppercase small text-muted">Appointment Type</label>
                <select name="appointment_type" class="form-select form-select-lg rounded-4 shadow-sm" required>
                    <option value="consultation">Consultation</option>
                    <option value="hemodialyse">Hemodialyse</option>
                    <option value="dialyse_peritoneale">Dialyse Peritoneale</option>
                    <option value="suivi">Suivi</option>
                    <option value="urgence">Urgence</option>
                </select>
            </div>

            <!-- Date & Time -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-uppercase small text-muted">Date & Time</label>
                <input name="appointment_date" type="datetime-local" min="{{ now()->addHour()->format('Y-m-d\TH:i') }}" class="form-control form-control-lg rounded-4 shadow-sm" required/>
            </div>

            <!-- Reason for Visit -->
            <div class="mb-3">
                <label class="form-label fw-semibold text-uppercase small text-muted">Reason for Visit</label>
                <textarea name="reason_for_visit" rows="4" class="form-control rounded-4 shadow-sm" placeholder="Describe your symptoms or reason for the appointment..."></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4 shadow-sm fw-semibold">
                Book Appointment
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('appointments.index') }}" class="text-primary fw-semibold text-decoration-none">View My Appointments</a>
        </div>
    </div>
</div>

@endsection