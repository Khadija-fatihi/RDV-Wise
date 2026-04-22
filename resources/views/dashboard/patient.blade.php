@extends('layouts.app')

@section('title', 'Patient Dashboard - RDV Wise')

@section('content')

<div class="space-y-8">

    <!-- Welcome -->
    <div>
        <h1 class="text-2xl font-bold">Welcome back 👋 {{ auth()->user()->name }}</h1>
        <p class="text-gray-500">Manage your health and appointments easily</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Total Appointments</p>
            <h2 class="text-2xl font-bold text-blue-600">{{ $totalAppointments ?? 0 }}</h2>
        </div>
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Upcoming</p>
            <h2 class="text-2xl font-bold text-green-600">{{ $upcomingAppointments ?? 0 }}</h2>
        </div>
        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-gray-500 text-sm">Completed</p>
            <h2 class="text-2xl font-bold text-gray-700">{{ $completedAppointments ?? 0 }}</h2>
        </div>
    </div>

    <!-- Today's Appointments -->
    <div>
        <h2 class="text-xl font-bold mb-4">Today's Appointments</h2>

        @if(isset($todayAppointments) && $todayAppointments->count())
            <div class="space-y-4">
                @foreach($todayAppointments as $appointment)
                    <div class="bg-white p-5 rounded-xl shadow flex justify-between items-center">
                        <div>
                            <p class="font-bold">{{ $appointment->medecin->user->name ?? 'Doctor' }}</p>
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($appointment->date_heure)->format('H:i') }}
                            </p>
                        </div>
                        <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">
                            {{ $appointment->type_seance ?? 'Consultation' }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No appointments today</p>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('book') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
            ➕ Book Appointment
        </a>
        <a href="{{ route('visits') }}" class="bg-gray-200 px-5 py-2 rounded-lg hover:bg-gray-300">
            📋 My Visits
        </a>
    </div>

    <!-- Notifications Preview -->
    <div>
        <h2 class="text-xl font-bold mb-2">Notifications</h2>
        <p class="text-gray-500 mb-2">You have {{ $notificationsCount ?? 0 }} new notifications</p>
        <a href="{{ route('notifications') }}" class="text-blue-600 font-medium">View all →</a>
    </div>

</div>

@endsection