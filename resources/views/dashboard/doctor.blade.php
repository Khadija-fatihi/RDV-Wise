@extends('layouts.app')

@section('title', 'Doctor Dashboard - RDV Wise')

@section('content')

<div class="space-y-8">

    <!-- Welcome -->
    <div>
        <h1 class="text-2xl font-bold">Welcome back, Dr. {{ auth()->user()->name ?? 'Doctor' }} 👨‍⚕️</h1>
        <p class="text-gray-500">Manage your patients and schedule</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Patients</p>
            <h2 class="text-2xl font-bold text-blue-600">{{ $totalPatients ?? 0 }}</h2>
        </div>
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Today's Appointments</p>
            <h2 class="text-2xl font-bold text-green-600">{{ $todayAppointmentsCount ?? 0 }}</h2>
        </div>
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Completed</p>
            <h2 class="text-2xl font-bold text-gray-700">{{ $completedAppointments ?? 0 }}</h2>
        </div>
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pending</p>
            <h2 class="text-2xl font-bold text-red-500">{{ $pendingAppointments ?? 0 }}</h2>
        </div>
    </div>

    <!-- Today's Schedule -->
    <div>
        <h2 class="text-xl font-bold mb-4">Today's Schedule</h2>

        @if(isset($todayAppointments) && $todayAppointments->count())
            <div class="space-y-4">
                @foreach($todayAppointments as $appointment)
                    <div class="bg-white p-5 rounded-xl shadow flex justify-between items-center">
                        <div>
                            <p class="font-bold">{{ $appointment->patient->user->name ?? 'Patient' }}</p>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($appointment->date_heure)->format('H:i') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">
                                {{ $appointment->type_seance ?? 'Consultation' }}
                            </span>
                            <a href="#" class="bg-green-600 text-white px-3 py-1 rounded text-sm">Start</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No appointments today</p>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('doctor.schedule') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg">
            📋 My Schedule
        </a>
        <a href="{{ route('profile') }}" class="bg-gray-200 px-5 py-2 rounded-lg">
            👤 My Profile
        </a>
    </div>

    <!-- Notifications -->
    <div>
        <h2 class="text-xl font-bold mb-2">Notifications</h2>
        <p class="text-gray-500">You have {{ $notificationsCount ?? 0 }} new notifications</p>
        <a href="{{ route('doctor.notifications') }}" class="text-blue-600">View all →</a>
    </div>

</div>

@endsection