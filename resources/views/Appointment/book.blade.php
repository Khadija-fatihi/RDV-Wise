@extends('layouts.app')

@section('title', 'Book Appointment - RDV Wise')

@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-2xl mx-auto pt-4 pb-32 px-4">
    <div class="bg-white rounded-2xl shadow-sm border border-surface-container-highest p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-on-surface tracking-tight font-headline">Book New Appointment</h1>
            <p class="text-on-surface-variant mt-1">Schedule your next medical consultation</p>
        </div>

        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Doctor Selection -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider">Select Doctor</label>
                <select name="doctor_id" class="w-full px-4 py-3 bg-surface-container-highest border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" required>
                    <option value="">Choose a doctor...</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->user->name }} - {{ $doctor->specialite }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Appointment Type -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider">Appointment Type</label>
                <select name="appointment_type" class="w-full px-4 py-3 bg-surface-container-highest border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" required>
                    <option value="consultation">Consultation</option>
                    <option value="hemodialyse">Hemodialyse</option>
                    <option value="dialyse_peritoneale">Dialyse Peritoneale</option>
                    <option value="suivi">Suivi</option>
                    <option value="urgence">Urgence</option>
                </select>
            </div>

            <!-- Date & Time -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider">Date & Time</label>
                <input name="appointment_date" type="datetime-local" min="{{ now()->addHour()->format('Y-m-d\TH:i') }}" class="w-full px-4 py-3 bg-surface-container-highest border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all" required/>
            </div>

            <!-- Reason for Visit -->
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider">Reason for Visit</label>
                <textarea name="reason_for_visit" rows="4" class="w-full px-4 py-3 bg-surface-container-highest border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all resize-none" placeholder="Describe your symptoms or reason for the appointment..."></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-primary hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg shadow-blue-200/50 active:scale-[0.98] transition-all">
                Book Appointment
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="{{ route('appointments.index') }}" class="text-primary font-semibold hover:underline">View My Appointments</a>
        </div>
    </div>
</div>

@endsection