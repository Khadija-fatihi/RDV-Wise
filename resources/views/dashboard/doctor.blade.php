@extends('layouts.app')

@section('title', 'Doctor Dashboard - RDV Wise')

@section('content')

<div class="space-y-8">

    <!-- Welcome -->
    <div>
        <h1 class="text-2xl font-bold">Welcome back, Dr. {{ auth()->user()->name ?? 'Doctor' }} 👨‍⚕️</h1>
        <p class="text-gray-500">Manage your patients and schedule</p>
    </div>

    <!-- Stats with Icons -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Total Patients</p>
                    <h2 class="text-3xl font-bold text-blue-600">{{ $totalPatients ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-4xl text-blue-100">group</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Today's Appointments</p>
                    <h2 class="text-3xl font-bold text-green-600">{{ $todayAppointmentsCount ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-4xl text-green-100">today</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-emerald-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Completed</p>
                    <h2 class="text-3xl font-bold text-emerald-600">{{ $completedAppointments ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-4xl text-emerald-100">check_circle</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-red-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Pending</p>
                    <h2 class="text-3xl font-bold text-red-600">{{ $pendingAppointments ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-4xl text-red-100">pending_actions</span>
            </div>
        </div>
    </div>

    <!-- Today's Schedule -->
    <div>
        <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-blue-600">schedule</span>
            Today's Schedule
        </h2>

        @if(isset($todayAppointments) && $todayAppointments->count())
            <div class="space-y-4">
                @foreach($todayAppointments as $appointment)
                    <div class="bg-white p-5 rounded-xl shadow flex flex-col md:flex-row md:justify-between md:items-center gap-4 hover:shadow-md transition border-l-4 border-blue-400">
                        <div>
                            <p class="font-bold">{{ $appointment->patient->user->name ?? 'Patient' }}</p>
                            <p class="text-sm text-gray-500 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">schedule</span>
                                {{ \Carbon\Carbon::parse($appointment->date_heure)->format('H:i') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-3 flex-wrap">
                            <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full font-semibold">
                                {{ $appointment->type_seance ?? 'Consultation' }}
                            </span>
                            <a href="{{ route('consultation.workspace') }}" class="bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-green-700 transition flex items-center gap-2">
                                <span class="material-symbols-outlined">medical_information</span>
                                Start
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 flex items-center gap-4">
                <span class="material-symbols-outlined text-4xl text-blue-300">event_busy</span>
                <p class="text-gray-600">No appointments scheduled for today.</p>
            </div>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('doctor.schedule') }}" class="bg-blue-600 text-white px-6 py-4 rounded-lg shadow hover:bg-blue-700 transition flex items-center justify-center gap-2 font-bold">
            <span class="material-symbols-outlined">calendar_month</span>
            My Schedule
        </a>
        <a href="{{ route('profile') }}" class="bg-gray-100 text-gray-800 px-6 py-4 rounded-lg border border-gray-200 hover:bg-gray-200 transition flex items-center justify-center gap-2 font-bold">
            <span class="material-symbols-outlined">account_circle</span>
            My Profile
        </a>
    </div>

    <!-- Notifications -->
    <div class="bg-gradient-to-br from-purple-50 to-blue-50 p-6 rounded-xl border border-purple-200">
        <h2 class="text-xl font-bold mb-3 flex items-center gap-2">
            <span class="material-symbols-outlined text-purple-600">notifications</span>
            Notifications
        </h2>
        <p class="text-gray-600 mb-3">You have <span class="font-bold text-purple-600">{{ $notificationsCount ?? 0 }}</span> new notifications.</p>
        <a href="{{ route('doctor.notifications') }}" class="text-blue-600 font-medium hover:underline flex items-center gap-1">
            View all
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>

</div>

@endsection