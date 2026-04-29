<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>RDV Wise - Admin Notification Center</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: { extend: { colors: { "primary-container": "#2563eb", "on-primary-container": "#eeefff", "background": "#f7f9fb", "on-surface": "#191c1e", "primary": "#004ac6", "error": "#ba1a1a" }, fontFamily: { "headline": ["Manrope"], "body": ["Inter"] } } }
    }
</script>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-background text-on-surface">

<!-- TopNavBar -->
<header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200 shadow-sm flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-8">
        <span class="text-xl font-extrabold text-blue-600 tracking-tight" style="font-family:'Manrope'">RDV Wise</span>
        <div class="relative hidden md:block">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input class="pl-10 pr-4 py-1.5 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-600/20 w-64" placeholder="Search notifications..."/>
        </div>
    </div>
    <div class="flex items-center gap-4">
        <button class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors relative">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>
        <div class="flex items-center gap-3 pl-4 border-l border-slate-200 ml-2">
            <span class="text-sm font-semibold text-slate-900">{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </div>
</header>

<div class="flex pt-[60px]">
    <!-- Sidebar -->
    <aside class="h-[calc(100vh-60px)] w-64 border-r fixed left-0 bg-white border-slate-200 flex flex-col p-4 space-y-2 text-sm z-40">
        <div class="mb-6 px-2">
            <h2 class="text-lg font-bold text-slate-900" style="font-family:'Manrope'">Admin Portal</h2>
        </div>
        <nav class="flex-1 space-y-1">
            <a href="{{ route('admin.statistics') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">monitoring</span><span>Statistics</span>
            </a>
            <a href="{{ route('admin.doctors') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">medical_services</span><span>Doctors</span>
            </a>
            <a href="{{ route('admin.patients') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">group</span><span>Patients</span>
            </a>
            <a href="{{ route('admin.appointments') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">calendar_today</span><span>Appointments</span>
            </a>
            <a href="{{ route('admin.notifications') }}" class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 text-blue-600 font-semibold rounded-lg">
                <span class="material-symbols-outlined">notifications_active</span><span>Notifications</span>
            </a>
        </nav>
        <div class="pt-4 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                    <span class="material-symbols-outlined">logout</span><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 min-h-screen">
        <!-- Header -->
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Notification Center</h1>
                <p class="text-slate-500">Monitor and manage all system communication</p>
            </div>
            <button class="flex items-center gap-2 bg-primary-container hover:opacity-90 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg transition-all active:scale-95">
                <span class="material-symbols-outlined text-xl">campaign</span> Broadcast Notification
            </button>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-blue-50 rounded-lg text-blue-600"><span class="material-symbols-outlined">drafts</span></div>
                    <span class="text-xs font-bold text-slate-400">TOTAL</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">{{ $totalNotifications ?? 0 }}</div>
                <p class="text-xs text-slate-500 mt-1">Across all categories</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-amber-50 rounded-lg text-amber-600"><span class="material-symbols-outlined">mark_email_unread</span></div>
                    <span class="text-xs font-bold text-slate-400">UNREAD</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">{{ $unreadCount ?? 0 }}</div>
                <p class="text-xs text-amber-600 mt-1">Requires attention</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-emerald-50 rounded-lg text-emerald-600"><span class="material-symbols-outlined">person_check</span></div>
                    <span class="text-xs font-bold text-slate-400">DELIVERED</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">99.8%</div>
                <p class="text-xs text-emerald-600 mt-1">Successful delivery rate</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-rose-50 rounded-lg text-rose-600"><span class="material-symbols-outlined">report</span></div>
                    <span class="text-xs font-bold text-slate-400">CRITICAL</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">{{ $criticalCount ?? 0 }}</div>
                <p class="text-xs text-slate-500 mt-1">System healthy</p>
            </div>
        </div>

        <!-- Notification Feed -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex bg-slate-100 p-1 rounded-xl w-fit">
                    <button class="px-4 py-1.5 text-sm font-semibold bg-white text-blue-600 rounded-lg shadow-sm">All</button>
                    <button class="px-4 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-700">Doctor Alerts</button>
                    <button class="px-4 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-700">Patient Alerts</button>
                    <button class="px-4 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-700">System</button>
                </div>
                <div class="flex items-center gap-2">
                    <button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50">
                        <span class="material-symbols-outlined text-lg">filter_list</span> Sort by: Newest
                    </button>
                    <button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50">
                        Mark all as read
                    </button>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($notifications ?? [] as $notification)
                <div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors">
                    <div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">notifications</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-slate-900">{{ $notification->title ?? 'Notification' }}</h3>
                            <span class="text-xs font-medium text-slate-400">{{ $notification->created_at?->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-slate-600 mb-3">{{ $notification->message ?? '' }}</p>
                    </div>
                    <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                            <span class="material-symbols-outlined">check_circle</span>
                        </button>
                        <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>
                </div>
                @empty
                {{-- Static example notifications when no data --}}
                <div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors">
                    <div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">medical_services</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-slate-900">New Practitioner Registration</h3>
                            <span class="text-xs font-medium text-slate-400">2 mins ago</span>
                        </div>
                        <p class="text-sm text-slate-600 mb-3">A new doctor has submitted credentials for verification.</p>
                        <div class="flex items-center gap-4">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold uppercase tracking-wider bg-blue-100 text-blue-700">Doctor Alerts</span>
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600">
                                <span class="w-2 h-2 rounded-full bg-amber-600"></span> Unread
                            </span>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            <div class="p-4 bg-slate-50/50 flex justify-center">
                <button class="text-sm font-semibold text-blue-600 hover:underline transition-all">Load older notifications</button>
            </div>
        </div>

        <!-- Bottom Grid -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-gradient-to-br from-blue-600 to-blue-700 p-8 rounded-2xl text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-2xl font-bold mb-2" style="font-family:'Manrope'">Automate Your Workflow</h2>
                    <p class="text-blue-100 mb-6 max-w-md">Set up smart triggers to automatically notify doctors or patients.</p>
                    <button class="bg-white text-blue-600 px-6 py-2 rounded-lg font-bold hover:bg-blue-50 transition-colors">Configure Triggers</button>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[180px] opacity-10 pointer-events-none">auto_awesome</span>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-center items-center text-center">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-3xl">shield_person</span>
                </div>
                <h3 class="font-bold text-slate-900 mb-2" style="font-family:'Manrope'">Security Audit Log</h3>
                <p class="text-sm text-slate-500 mb-4">Review login attempts and system access logs.</p>
                <button class="text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors">View Security Logs →</button>
            </div>
        </div>
    </main>
</div>
</body>
</html>