@extends('layouts.app')

@section('title', 'Patient Dashboard - RDV Wise')

@section('content')

<div class="space-y-8">

    <!-- Welcome -->
    <div>
        <h1 class="text-2xl font-bold">Welcome back 👋 {{ auth()->user()->name }}</h1>
        <p class="text-gray-500">Manage your health and appointments easily</p>
    </div>

    <!-- Stats with Icons -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Total Appointments</p>
                    <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $totalAppointments ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-5xl text-blue-100">calendar_month</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Upcoming</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-2">{{ $upcomingAppointments ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-5xl text-green-100">event_available</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-xl shadow border-l-4 border-emerald-600 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Completed</p>
                    <h2 class="text-3xl font-bold text-emerald-600 mt-2">{{ $completedAppointments ?? 0 }}</h2>
                </div>
                <span class="material-symbols-outlined text-5xl text-emerald-100">check_circle</span>
            </div>
        </div>
    </div>

    <!-- Today's Appointments -->
    <div>
        <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined text-blue-600">today</span>
            Today's Appointments
        </h2>

        @if(isset($todayAppointments) && $todayAppointments->count())
            <div class="space-y-4">
                @foreach($todayAppointments as $appointment)
                    <div class="bg-white p-5 rounded-xl shadow flex justify-between items-center hover:shadow-md transition border-l-4 border-blue-400">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-blue-600 text-2xl">medical_services</span>
                            <div>
                                <p class="font-bold">{{ $appointment->medecin->user->name ?? 'Doctor' }}</p>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    {{ \Carbon\Carbon::parse($appointment->date_heure)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full font-semibold">
                            {{ $appointment->type_seance ?? 'Consultation' }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 text-center">
                <span class="material-symbols-outlined text-5xl text-blue-300 block mb-2">event_busy</span>
                <p class="text-gray-600">No appointments scheduled for today</p>
            </div>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <a href="{{ route('book') }}" class="bg-blue-600 text-white px-6 py-4 rounded-lg shadow hover:bg-blue-700 transition flex items-center justify-center gap-2 font-bold">
            <span class="material-symbols-outlined">add_circle</span>
            Book Appointment
        </a>
        <a href="{{ route('visits') }}" class="bg-gray-100 text-gray-800 px-6 py-4 rounded-lg border border-gray-200 hover:bg-gray-200 transition flex items-center justify-center gap-2 font-bold">
            <span class="material-symbols-outlined">assignment</span>
            My Visits
        </a>
    </div>

    <!-- Notifications Preview -->
    <div class="bg-gradient-to-br from-purple-50 to-blue-50 p-6 rounded-xl border border-purple-200">
        <h2 class="text-xl font-bold mb-3 flex items-center gap-2">
            <span class="material-symbols-outlined text-purple-600">notifications_active</span>
            Notifications
        </h2>
        <p class="text-gray-600 mb-3">You have <span class="font-bold text-purple-600">{{ $notificationsCount ?? 0 }}</span> new notifications</p>
        <a href="{{ route('notifications') }}" class="text-blue-600 font-medium hover:underline flex items-center gap-1">
            <span>View all</span>
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>

</div>

@endsection