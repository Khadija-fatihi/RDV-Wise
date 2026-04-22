@extends('layouts.app')

@section('title', 'Profile - RDV Wise')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-extrabold tracking-tight text-on-surface">Patient Profile</h1>
    <p class="text-on-surface-variant mt-1">Manage your health data, account security, and app preferences.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Left Column -->
    <div class="lg:col-span-4 space-y-8">
        <div class="bg-white rounded-xl shadow-sm border border-outline-variant p-8 flex flex-col items-center text-center">
            <div class="relative group">
                <div class="w-32 h-32 rounded-full border-4 border-primary-container overflow-hidden mb-4 shadow-md">
                    <div class="w-full h-full flex items-center justify-center bg-primary-fixed text-primary text-4xl font-extrabold uppercase">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                    </div>
                </div>
                <button class="absolute bottom-2 right-2 bg-primary text-on-primary w-10 h-10 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-sm">edit</span>
                </button>
            </div>
            <h2 class="text-xl font-bold text-on-surface">{{ auth()->user()->name ?? 'Patient Name' }}</h2>
            <p class="text-on-surface-variant">Member since {{ auth()->user()->created_at?->format('M Y') ?? 'Jan 2023' }}</p>
            <div class="mt-6 flex flex-wrap gap-2 justify-center">
                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold border border-blue-100">Blood Type: O+</span>
                <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-xs font-semibold border border-teal-100">Verified Identity</span>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="lg:col-span-8 space-y-8">
        <!-- Personal Information -->
        <div class="bg-white rounded-xl shadow-sm border border-outline-variant">
            <div class="p-6 border-b border-outline-variant flex justify-between items-center">
                <h3 class="text-lg font-bold">Personal Information</h3>
                <button class="text-primary font-bold text-sm">Save Changes</button>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Full Name</label>
                    <input class="w-full bg-surface border-outline-variant rounded-lg p-3 focus:ring-primary focus:border-primary" type="text" value="{{ auth()->user()->name ?? '' }}"/>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Email Address</label>
                    <input class="w-full bg-surface border-outline-variant rounded-lg p-3 focus:ring-primary focus:border-primary" type="email" value="{{ auth()->user()->email ?? '' }}"/>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">CIN / National ID</label>
                    <input class="w-full bg-surface border-outline-variant rounded-lg p-3 focus:ring-primary focus:border-primary" type="text" value="{{ auth()->user()->patient->cin ?? '' }}"/>
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Phone Number</label>
                    <input class="w-full bg-surface border-outline-variant rounded-lg p-3 focus:ring-primary focus:border-primary" type="tel" value="{{ auth()->user()->phone ?? '' }}"/>
                </div>
            </div>
        </div>

        <!-- Health Preferences -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant overflow-hidden">
                <div class="p-4 bg-error-container/20 border-b border-error-container/30 flex items-center gap-2">
                    <span class="material-symbols-outlined text-error">warning</span>
                    <span class="font-bold text-error">Allergies</span>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-surface-container px-3 py-1.5 rounded-lg flex items-center gap-2 text-sm">
                            Penicillin <button class="text-on-surface-variant">×</button>
                        </span>
                        <span class="bg-surface-container px-3 py-1.5 rounded-lg flex items-center gap-2 text-sm">
                            Latex <button class="text-on-surface-variant">×</button>
                        </span>
                    </div>
                    <button class="text-sm font-bold text-primary flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">add</span> Add Allergy
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-outline-variant overflow-hidden">
                <div class="p-4 bg-tertiary-container/10 border-b border-tertiary-container/20 flex items-center gap-2">
                    <span class="material-symbols-outlined text-tertiary">medical_services</span>
                    <span class="font-bold text-tertiary">Chronic Conditions</span>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-surface-container px-3 py-1.5 rounded-lg flex items-center gap-2 text-sm">
                            Asthma <button class="text-on-surface-variant">×</button>
                        </span>
                    </div>
                    <button class="text-sm font-bold text-primary flex items-center gap-1">
                        <span class="material-symbols-outlined text-base">add</span> Add Condition
                    </button>
                </div>
            </div>
        </div>

        <!-- Notification Preferences -->
        <div class="bg-white rounded-xl shadow-sm border border-outline-variant p-6">
            <h3 class="text-lg font-bold mb-6">Notification Preferences</h3>
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-sm">Appointment Reminders</h4>
                        <p class="text-xs text-on-surface-variant">Get notified 24h before your scheduled visit</p>
                    </div>
                    <div class="relative inline-flex items-center cursor-pointer">
                        <div class="w-11 h-6 bg-primary-container rounded-full"></div>
                        <div class="absolute left-6 top-1 w-4 h-4 bg-white rounded-full"></div>
                    </div>
                </div>
                <div class="flex items-center justify-between border-t border-surface pt-6">
                    <div>
                        <h4 class="font-bold text-sm">Email Marketing</h4>
                        <p class="text-xs text-on-surface-variant">Receive newsletters and health tips</p>
                    </div>
                    <div class="relative inline-flex items-center cursor-pointer">
                        <div class="w-11 h-6 bg-outline-variant rounded-full"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-sm"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="p-6 bg-error-container/10 rounded-xl border border-error/20 flex items-center justify-between">
            <div>
                <h4 class="text-error font-bold text-sm">Deactivate Account</h4>
                <p class="text-xs text-on-surface-variant">Temporarily disable your profile and data</p>
            </div>
            <button class="px-4 py-2 border border-error text-error text-sm font-bold rounded-lg hover:bg-error hover:text-on-error transition-colors">
                Deactivate
            </button>
        </div>
    </div>
</div>

@endsection