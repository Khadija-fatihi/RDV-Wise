<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Supervise Appointments - Clinical Clarity</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: { extend: { colors: { "primary-container": "#2563eb", "on-primary-container": "#eeefff", "background": "#f7f9fb", "on-background": "#191c1e", "primary": "#004ac6", "error": "#ba1a1a" }, fontFamily: { "headline": ["Manrope"], "body": ["Inter"] } } }
    }
</script>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-background text-on-background min-h-screen flex">

<!-- Sidebar -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-slate-50 border-r border-slate-200 flex flex-col py-4 z-50">
    <div class="px-6 mb-8">
        <h1 class="font-extrabold text-blue-600 text-xl" style="font-family:'Manrope'">Clinical Clarity</h1>
        <p class="text-xs text-slate-500 font-medium mt-1">Admin Dashboard</p>
    </div>
    <nav class="flex-1 px-3 space-y-1">
        <a href="{{ route('admin.statistics') }}" class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all rounded-lg hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">leaderboard</span><span class="text-sm">Statistics</span>
        </a>
        <a href="{{ route('admin.doctors') }}" class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all rounded-lg hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">medical_services</span><span class="text-sm">Doctors</span>
        </a>
        <a href="{{ route('admin.patients') }}" class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all rounded-lg hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">person</span><span class="text-sm">Patients</span>
        </a>
        <a href="{{ route('admin.appointments') }}" class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600 rounded-l-lg">
            <span class="material-symbols-outlined mr-3">calendar_today</span><span class="text-sm">Appointments</span>
        </a>
    </nav>
    <div class="px-4 mt-auto space-y-1 border-t border-slate-200 pt-4">
        <a href="{{ route('admin.notifications') }}" class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 transition-all rounded-lg text-sm">
            <span class="material-symbols-outlined mr-3">notifications</span> Notifications
        </a>
        <a href="{{ route('admin.support') }}" class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 transition-all rounded-lg text-sm">
            <span class="material-symbols-outlined mr-3">help</span> Support
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 transition-all rounded-lg text-sm">
                <span class="material-symbols-outlined mr-3">logout</span> Log Out
            </button>
        </form>
    </div>
</aside>

<main class="flex-1 ml-64 relative">
    <!-- TopBar -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 w-full z-40 border-b border-slate-200 shadow-sm flex items-center justify-between px-8 h-16">
        <div class="relative w-96">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-600/20" placeholder="Search patients, doctors..."/>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.notifications') }}" class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors relative">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
            </a>
            <div class="h-8 w-px bg-slate-200 mx-2"></div>
            <div class="text-right">
                <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name ?? 'Admin User' }}</p>
                <p class="text-xs text-slate-500">Super Admin</p>
            </div>
        </div>
    </header>

    <div class="p-8 space-y-8">
        @if(session('success'))
            <div class="p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
        @endif

        <!-- Page Header -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
            <div>
                <nav class="flex text-xs font-medium text-slate-400 mb-2 gap-2">
                    <a href="{{ route('admin.statistics') }}">Dashboard</a>
                    <span>/</span>
                    <span class="text-blue-600">Appointments</span>
                </nav>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Supervise Appointments</h2>
                <p class="text-slate-500 mt-1">Manage and audit all clinical consultations.</p>
            </div>
            <div class="flex gap-4">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4 min-w-[160px]">
                    <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">calendar_month</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Today</p>
                        <p class="text-xl font-extrabold text-slate-900">{{ $todayCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4 min-w-[160px]">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Completed</p>
                        <p class="text-xl font-extrabold text-slate-900">{{ $completedCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-slate-500 px-1">Department</label>
                <select class="w-full px-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm focus:ring-blue-600/20">
                    <option>All Departments</option>
                    <option>Cardiology</option>
                    <option>Nephrology</option>
                    <option>Pediatrics</option>
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-slate-500 px-1">Status</label>
                <select class="w-full px-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm focus:ring-blue-600/20">
                    <option>All Statuses</option>
                    <option>Confirmed</option>
                    <option>Completed</option>
                    <option>Canceled</option>
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-slate-500 px-1">Doctor</label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm" placeholder="Filter by name..."/>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-slate-500 px-1">Date</label>
                <input type="date" class="w-full px-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm"/>
            </div>
            <div class="flex items-end">
                <button class="w-full bg-slate-900 text-white py-2.5 rounded-lg font-bold text-sm hover:bg-slate-800 transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">tune</span> Apply Filters
                </button>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-2">
                    <h3 class="font-bold text-slate-900">Live Schedule</h3>
                    <span class="bg-blue-100 text-blue-700 text-xs font-black px-2 py-0.5 rounded-full uppercase">Real-time</span>
                </div>
                <div class="flex gap-2">
                    <button class="p-1.5 text-slate-400 hover:text-slate-600"><span class="material-symbols-outlined">download</span></button>
                    <button class="p-1.5 text-slate-400 hover:text-slate-600"><span class="material-symbols-outlined">print</span></button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-xs font-black text-slate-400 uppercase tracking-widest bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4">Patient Information</th>
                            <th class="px-6 py-4">Assigned Doctor</th>
                            <th class="px-6 py-4">Schedule</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($appointments ?? [] as $appointment)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                        {{ strtoupper(substr($appointment->patient->user->name ?? 'P', 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">{{ $appointment->patient->user->name ?? 'Unknown' }}</p>
                                        <p class="text-xs text-slate-500 mt-1">PID-{{ $appointment->patient_id }} • {{ $appointment->type_seance ?? 'Consultation' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-medium text-slate-700">Dr. {{ $appointment->medecin->user->name ?? 'Unknown' }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-slate-900">{{ \Carbon\Carbon::parse($appointment->date_heure)->format('h:i A') }}</p>
                                <p class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($appointment->date_heure)->format('M d, Y') }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @php $status = $appointment->statut ?? 'confirmed'; @endphp
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold
                                    {{ $status === 'completed' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' :
                                      ($status === 'cancelled' ? 'bg-red-50 text-red-700 border border-red-100' :
                                       'bg-amber-50 text-amber-700 border border-amber-100') }}">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        {{ $status === 'completed' ? 'bg-emerald-500' : ($status === 'cancelled' ? 'bg-red-500' : 'bg-amber-500') }}"></span>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.appointments.reschedule', $appointment->id) }}" class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 text-xs font-bold rounded-md hover:bg-slate-50">Reschedule</a>
                                    <form method="POST" action="{{ route('admin.appointments.cancel', $appointment->id) }}" onsubmit="return confirm('Cancel this appointment?')">
                                        @csrf @method('PATCH')
                                        <button class="px-3 py-1.5 bg-red-50 text-red-600 text-xs font-bold rounded-md hover:bg-red-100">Cancel</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">No appointments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
                <p class="text-xs font-medium text-slate-500 italic">
                    @if(isset($appointments) && method_exists($appointments, 'total'))
                        Showing {{ $appointments->firstItem() }}-{{ $appointments->lastItem() }} of {{ $appointments->total() }} appointments
                    @endif
                </p>
                @if(isset($appointments) && method_exists($appointments, 'links'))
                    {{ $appointments->links() }}
                @endif
            </div>
        </div>
    </div>
</main>

<!-- FAB Emergency -->
<button class="fixed bottom-8 right-8 w-14 h-14 bg-red-600 text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50 group">
    <span class="material-symbols-outlined">emergency_home</span>
    <span class="absolute right-full mr-4 bg-slate-900 text-white px-3 py-1.5 rounded-lg text-xs font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">Emergency Broadcast</span>
</button>
</body>
</html>