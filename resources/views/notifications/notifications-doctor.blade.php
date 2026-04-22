@extends('layouts.app')

@section('title', 'Notifications - RDV Wise')

@section('content')

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row gap-8">

        <!-- Sidebar Navigation -->
        <aside class="w-full md:w-64 space-y-6">
            <div>
                <h1 class="text-2xl font-extrabold text-on-surface mb-6">Notification Center</h1>
                <nav class="space-y-1">
                    <a class="flex items-center gap-3 px-4 py-3 bg-primary text-white rounded-xl shadow-md transition-all" href="#">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">notifications</span>
                        <span class="font-semibold">All Notifications</span>
                        <span class="ml-auto bg-white/20 text-xs px-2 py-0.5 rounded-full">12</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container transition-colors rounded-xl group" href="#">
                        <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">event</span>
                        <span class="font-medium">Appointments</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container transition-colors rounded-xl group" href="#">
                        <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">person_add</span>
                        <span class="font-medium">Patient Requests</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 text-on-surface-variant hover:bg-surface-container transition-colors rounded-xl group" href="#">
                        <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">settings_suggest</span>
                        <span class="font-medium">System</span>
                    </a>
                </nav>
            </div>

            <div class="bg-secondary-container p-5 rounded-xl border border-secondary/20">
                <p class="text-secondary text-sm font-bold uppercase tracking-wider mb-2">Weekly Summary</p>
                <div class="flex items-end justify-between">
                    <span class="text-3xl font-extrabold text-on-secondary-container">84%</span>
                    <span class="text-xs text-on-secondary-container/70 mb-1">Response Rate</span>
                </div>
                <div class="w-full bg-on-secondary-container/10 h-1.5 rounded-full mt-3 overflow-hidden">
                    <div class="bg-secondary h-full w-[84%]"></div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 space-y-4">
            <!-- Filter Bar -->
            <div class="flex items-center justify-between bg-surface-container-lowest p-4 rounded-2xl shadow-sm border border-outline-variant/30">
                <div class="flex gap-2">
                    <span class="px-3 py-1 bg-surface-container text-xs font-bold rounded-full text-on-surface-variant uppercase tracking-tighter">Today</span>
                    <span class="px-3 py-1 bg-white text-xs font-bold rounded-full text-outline border border-outline-variant/30 uppercase tracking-tighter">This Week</span>
                </div>
                <button class="text-primary text-sm font-semibold hover:underline">Mark all as read</button>
            </div>

            <!-- Notifications List -->
            <div class="grid gap-4">
                <!-- Notification 1: Appointment Request -->
                <div class="group bg-surface-container-lowest p-5 rounded-2xl border-l-4 border-l-primary shadow-sm hover:shadow-md transition-all flex gap-5 items-start">
                    <div class="w-12 h-12 bg-primary-fixed flex items-center justify-center rounded-xl shrink-0">
                        <span class="material-symbols-outlined text-primary">event_available</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-on-surface">Appointment Request</h3>
                            <span class="text-xs font-medium text-outline">10m ago</span>
                        </div>
                        <p class="text-on-surface-variant leading-relaxed">
                            <span class="font-semibold text-on-surface">Sarah J. Miller</span> requested a follow-up for <span class="text-primary font-medium">Oct 25th</span>.
                        </p>
                        <div class="mt-4 flex gap-3">
                            <button class="px-4 py-1.5 bg-primary text-white text-sm font-semibold rounded-lg hover:brightness-110 active:scale-95 transition-all">Accept</button>
                            <button class="px-4 py-1.5 bg-surface-container text-on-surface-variant text-sm font-semibold rounded-lg hover:bg-surface-container-highest transition-all">Reschedule</button>
                        </div>
                    </div>
                </div>

                <!-- Notification 2: Record Access -->
                <div class="group bg-surface-container-lowest p-5 rounded-2xl border-l-4 border-l-secondary shadow-sm hover:shadow-md transition-all flex gap-5 items-start">
                    <div class="w-12 h-12 bg-secondary-container flex items-center justify-center rounded-xl shrink-0">
                        <span class="material-symbols-outlined text-secondary">folder_shared</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-on-surface">Record Access Approved</h3>
                            <span class="text-xs font-medium text-outline">2h ago</span>
                        </div>
                        <p class="text-on-surface-variant leading-relaxed">
                            <span class="font-semibold text-on-surface">James Wilson</span> granted access to his historical records. Documents are now ready for review.
                        </p>
                        <div class="mt-3 flex items-center gap-2 text-secondary text-sm font-bold">
                            <span class="material-symbols-outlined text-[18px]">visibility</span>
                            <a class="hover:underline" href="#">View Records</a>
                        </div>
                    </div>
                </div>

                <!-- Notification 3: System Alert -->
                <div class="group bg-surface-container-low p-5 rounded-2xl border-l-4 border-l-tertiary shadow-sm flex gap-5 items-start">
                    <div class="w-12 h-12 bg-tertiary-container flex items-center justify-center rounded-xl shrink-0">
                        <span class="material-symbols-outlined text-on-tertiary-container">security_update_good</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-on-surface">System Alert</h3>
                            <span class="text-xs font-medium text-outline">4h ago</span>
                        </div>
                        <p class="text-on-surface-variant leading-relaxed">
                            New security patch <span class="font-mono bg-tertiary-fixed text-[11px] px-1.5 py-0.5 rounded">v2.4.1</span> deployed successfully. End-to-end encryption protocols updated.
                        </p>
                    </div>
                </div>

                <!-- Notification 4: Reminder -->
                <div class="group bg-surface-container-lowest p-5 rounded-2xl border-l-4 border-l-error shadow-sm hover:shadow-md transition-all flex gap-5 items-start">
                    <div class="w-12 h-12 bg-error-container flex items-center justify-center rounded-xl shrink-0">
                        <span class="material-symbols-outlined text-error">history_edu</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-on-surface">Reminder</h3>
                            <span class="text-xs font-medium text-outline">6h ago</span>
                        </div>
                        <p class="text-on-surface-variant leading-relaxed">
                            Complete diagnostic notes for <span class="font-semibold text-on-surface">Arthur McMillian's</span> morning session.
                        </p>
                        <div class="mt-4 flex items-center gap-4">
                            <button class="text-primary text-sm font-bold flex items-center gap-1">
                                Write Notes
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bento Bottom -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-primary to-blue-700 p-6 rounded-3xl text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <h4 class="text-lg font-bold mb-1">Patient Experience</h4>
                        <p class="text-blue-100 text-sm mb-4">You have 3 unread messages from your care team.</p>
                        <button class="bg-white text-primary px-4 py-2 rounded-xl text-sm font-bold shadow-lg">Check Inbox</button>
                    </div>
                    <span class="material-symbols-outlined absolute -bottom-4 -right-4 text-9xl text-white/10 rotate-12">forum</span>
                </div>
                <div class="bg-surface-container-high p-6 rounded-3xl flex flex-col justify-center">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="p-3 bg-white rounded-2xl shadow-sm">
                            <span class="material-symbols-outlined text-primary">analytics</span>
                        </div>
                        <div>
                            <h4 class="text-on-surface font-bold">Daily Insight</h4>
                            <p class="text-on-surface-variant text-xs">Patient volume is up 12% today.</p>
                        </div>
                    </div>
                    <div class="h-12 w-full flex items-end gap-1">
                        <div class="bg-primary/20 w-full h-[40%] rounded-t-sm"></div>
                        <div class="bg-primary/30 w-full h-[60%] rounded-t-sm"></div>
                        <div class="bg-primary/40 w-full h-[30%] rounded-t-sm"></div>
                        <div class="bg-primary/60 w-full h-[80%] rounded-t-sm"></div>
                        <div class="bg-primary w-full h-[95%] rounded-t-sm"></div>
                        <div class="bg-primary/50 w-full h-[50%] rounded-t-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection