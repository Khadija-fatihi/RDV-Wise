@extends('layouts.app')

@section('title', 'Patient Dashboard - Smarte Santé')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4 bg-primary text-white">
        <div class="card-body p-4 p-md-5">
            <p class="text-uppercase small fw-semibold mb-2 text-white-50">Patient overview</p>
            <h1 class="display-6 fw-bold mb-2">Welcome back 👋 {{ auth()->user()->name }}</h1>
            <p class="mb-0 text-white-50">Manage your appointments, visits, and care updates in one place.</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-primary border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <p class="text-muted text-uppercase small fw-semibold mb-2">Total Appointments</p>
                            <h2 class="fw-bold text-primary mb-0">{{ $totalAppointments ?? 0 }}</h2>
                        </div>
                        <span class="material-symbols-outlined fs-1 text-primary-emphasis">calendar_month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-success border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <p class="text-muted text-uppercase small fw-semibold mb-2">Upcoming</p>
                            <h2 class="fw-bold text-success mb-0">{{ $upcomingAppointments ?? 0 }}</h2>
                        </div>
                        <span class="material-symbols-outlined fs-1 text-success-emphasis">event_available</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-info border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <p class="text-muted text-uppercase small fw-semibold mb-2">Completed</p>
                            <h2 class="fw-bold text-info mb-0">{{ $completedAppointments ?? 0 }}</h2>
                        </div>
                        <span class="material-symbols-outlined fs-1 text-info-emphasis">check_circle</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4 p-md-5">
            <h2 class="h4 fw-bold mb-4 d-flex align-items-center gap-2 text-primary">
                <span class="material-symbols-outlined">today</span>
                Today's Appointments
            </h2>

        @if(isset($todayAppointments) && $todayAppointments->count())
            <div class="d-grid gap-3">
                @foreach($todayAppointments as $appointment)
                    <div class="d-flex justify-content-between align-items-center rounded-4 border border-primary-subtle bg-light p-3 p-md-4 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <span class="material-symbols-outlined fs-2 text-primary">medical_services</span>
                            <div>
                                <p class="fw-semibold mb-1">{{ $appointment->medecin->user->name ?? 'Doctor' }}</p>
                                <p class="text-muted small mb-0 d-flex align-items-center gap-1">
                                    <span class="material-symbols-outlined">schedule</span>
                                    {{ \Carbon\Carbon::parse($appointment->date_heure)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                        <span class="badge bg-primary-subtle text-primary fw-semibold rounded-pill px-3 py-2">
                            {{ $appointment->type_seance ?? 'Consultation' }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center rounded-4 border border-info-subtle bg-info-subtle p-4 p-md-5">
                <span class="material-symbols-outlined fs-1 text-info-emphasis d-block mb-2">event_busy</span>
                <p class="text-muted mb-0">No appointments scheduled for today</p>
            </div>
        @endif
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <a href="{{ route('book') }}" class="btn btn-primary btn-lg w-100 d-flex justify-content-center align-items-center gap-2 rounded-4 shadow-sm">
                <span class="material-symbols-outlined">add_circle</span>
                Book Appointment
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('visits') }}" class="btn btn-outline-secondary btn-lg w-100 d-flex justify-content-center align-items-center gap-2 rounded-4 shadow-sm">
                <span class="material-symbols-outlined">assignment</span>
                My Visits
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 bg-gradient bg-info-subtle">
        <div class="card-body p-4 p-md-5">
            <h2 class="h4 fw-bold mb-3 d-flex align-items-center gap-2 text-primary">
                <span class="material-symbols-outlined">notifications_active</span>
                Notifications
            </h2>
            <p class="text-muted mb-3">You have <span class="fw-bold text-primary">{{ $notificationsCount ?? 0 }}</span> new notifications</p>
            <a href="{{ route('notifications') }}" class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center gap-1">
                <span>View all</span>
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>

</div>

@endsection