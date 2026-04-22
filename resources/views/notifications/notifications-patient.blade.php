@extends('layouts.app')

@section('title', 'Notifications - RDV Wise')

@section('content')

<main class="max-w-7xl mx-auto px-4 py-8 md:px-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">

        <!-- Sidebar Filter -->
        <aside class="md:col-span-3 space-y-6">
            <div class="bg-surface-container-lowest p-6 rounded-xl shadow-sm border border-outline-variant/30">
                <h2 class="text-lg font-bold mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">filter_list</span>
                    Filters
                </h2>
                <ul class="space-y-2">
                    <li>
                        <button class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg bg-primary text-on-primary font-medium transition-all">
                            <span class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-xl">all_inclusive</span>
                                All
                            </span>
                            <span class="text-xs bg-white/20 px-2 py-0.5 rounded-full">12</span>
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-all">
                            <span class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-xl">calendar_today</span>
                                Appointments
                            </span>
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-all">
                            <span class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-xl">description</span>
                                Records
                            </span>
                        </button>
                    </li>
                    <li>
                        <button class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-all">
                            <span class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-xl">security</span>
                                Security
                            </span>
                        </button>
                    </li>
                </ul>
            </div>

            <div class="relative overflow-hidden bg-gradient-to-br from-primary to-tertiary p-6 rounded-xl text-white shadow-lg">
                <div class="relative z-10">
                    <h3 class="font-bold text-lg leading-tight mb-2">Need help?</h3>
                    <p class="text-white/80 text-sm mb-4">Our support team is available 24/7 for medical emergencies.</p>
                    <button class="bg-white text-primary px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors">Contact Support</button>
                </div>
                <span class="absolute -bottom-4 -right-4 material-symbols-outlined text-9xl opacity-10 pointer-events-none">medical_services</span>
            </div>
        </aside>

        <!-- Notification Feed -->
        <section class="md:col-span-9 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold tracking-tight">Notification Center</h1>
                    <p class="text-on-surface-variant">Stay updated with your healthcare activities.</p>
                </div>
                <button class="text-primary font-semibold text-sm hover:underline">Mark all as read</button>
            </div>

            <div class="space-y-4">
                <!-- Appointment Confirmed -->
                <article class="group relative bg-surface-container-lowest p-5 rounded-xl shadow-sm border-l-4 border-l-primary border border-outline-variant/30 hover:shadow-md transition-all flex flex-col md:flex-row gap-5 items-start">
                    <div class="p-3 rounded-xl bg-primary-fixed text-on-primary-fixed">
                        <span class="material-symbols-outlined text-2xl">event_available</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-lg text-on-surface">Appointment Confirmed</h3>
                            <span class="text-xs text-on-surface-variant bg-surface-container px-2 py-1 rounded">2h ago</span>
                        </div>
                        <p class="text-on-surface-variant mb-4 leading-relaxed">
                            Your visit with <span class="font-semibold text-on-surface">Dr. Sarah Johnson</span> at Central Health Clinic has been confirmed for Tuesday, Oct 24th at 10:30 AM.
                        </p>
                        <div class="flex gap-3">
                            <button class="px-4 py-2 bg-primary text-on-primary rounded-lg text-sm font-semibold hover:opacity-90 transition-opacity">View Details</button>
                            <button class="px-4 py-2 border border-outline text-on-surface-variant rounded-lg text-sm font-semibold hover:bg-surface-container-high transition-colors">Add to Calendar</button>
                        </div>
                    </div>
                </article>

                <!-- Records Request -->
                <article class="group relative bg-surface-container-lowest p-5 rounded-xl shadow-sm border-l-4 border-l-secondary border border-outline-variant/30 hover:shadow-md transition-all flex flex-col md:flex-row gap-5 items-start">
                    <div class="p-3 rounded-xl bg-secondary-container text-on-secondary-container">
                        <span class="material-symbols-outlined text-2xl">folder_shared</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-lg text-on-surface">Medical Records Request</h3>
                            <span class="text-xs text-on-surface-variant bg-surface-container px-2 py-1 rounded">5h ago</span>
                        </div>
                        <p class="text-on-surface-variant mb-4 leading-relaxed">
                            <span class="font-semibold text-on-surface">Dr. Miller</span> has requested temporary access to your medical history for your upcoming consultation.
                        </p>
                        <div class="flex gap-3">
                            <button class="px-4 py-2 bg-secondary text-on-secondary rounded-lg text-sm font-semibold hover:opacity-90 transition-opacity">Approve Access</button>
                            <button class="px-4 py-2 border border-outline text-on-surface-variant rounded-lg text-sm font-semibold hover:bg-surface-container-high transition-colors">Decline</button>
                        </div>
                    </div>
                </article>

                <!-- Security Alert -->
                <article class="group relative bg-surface-container-lowest p-5 rounded-xl shadow-sm border-l-4 border-l-error border border-outline-variant/30 hover:shadow-md transition-all flex flex-col md:flex-row gap-5 items-start">
                    <div class="p-3 rounded-xl bg-error-container text-on-error-container">
                        <span class="material-symbols-outlined text-2xl">lock_reset</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-lg text-on-surface">New Login Detected</h3>
                            <span class="text-xs text-on-surface-variant bg-surface-container px-2 py-1 rounded">Yesterday</span>
                        </div>
                        <p class="text-on-surface-variant mb-4 leading-relaxed">
                            A new login was detected from <span class="font-semibold text-on-surface">Safari on MacOS</span>. If this wasn't you, please secure your account immediately.
                        </p>
                        <div class="flex gap-3">
                            <button class="px-4 py-2 bg-error text-on-error rounded-lg text-sm font-semibold hover:opacity-90 transition-opacity">This wasn't me</button>
                            <button class="px-4 py-2 border border-outline text-on-surface-variant rounded-lg text-sm font-semibold hover:bg-surface-container-high transition-colors">View Login Activity</button>
                        </div>
                    </div>
                </article>

                <!-- Older Notification -->
                <article class="group relative bg-surface-container-low/50 p-5 rounded-xl border border-outline-variant/20 flex gap-5 items-start opacity-75">
                    <div class="p-3 rounded-xl bg-surface-container-highest text-on-surface-variant">
                        <span class="material-symbols-outlined text-2xl">lab_profile</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-semibold text-on-surface">Lab Results Ready</h3>
                            <span class="text-xs text-on-surface-variant">2 days ago</span>
                        </div>
                        <p class="text-on-surface-variant text-sm">Your blood work results from October 15th are now available in the portal.</p>
                    </div>
                </article>
            </div>
        </section>
    </div>
</main>

@endsection