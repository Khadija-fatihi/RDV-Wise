<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Manage Patients - Clinical Clarity</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: { extend: { colors: { "primary-container": "#2563eb", "on-primary-container": "#eeefff", "background": "#f7f9fb", "on-background": "#191c1e", "error": "#ba1a1a", "secondary": "#006a61", "tertiary-container": "#0074a6" }, fontFamily: { "headline": ["Manrope"], "body": ["Inter"] } } }
    }
</script>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-background text-on-background min-h-screen">

<!-- Sidebar -->
<aside class="h-screen w-64 fixed left-0 top-0 bg-slate-50 border-r border-slate-200 flex flex-col py-4 z-50">
    <div class="px-6 mb-8">
        <h1 class="font-extrabold text-blue-600 text-xl tracking-tight" style="font-family:'Manrope'">Clinical Clarity</h1>
        <p class="text-xs text-slate-500 uppercase tracking-widest font-semibold mt-1">Medical Admin Portal</p>
    </div>
    <nav class="flex-1 flex flex-col space-y-1">
        <a href="{{ route('admin.statistics') }}" class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">leaderboard</span><span class="text-sm">Statistics</span>
        </a>
        <a href="{{ route('admin.doctors') }}" class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">medical_services</span><span class="text-sm">Doctors</span>
        </a>
        <a href="{{ route('admin.patients') }}" class="flex items-center px-6 py-3 bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600">
            <span class="material-symbols-outlined mr-3" style="font-variation-settings:'FILL' 1">person</span><span class="text-sm">Patients</span>
        </a>
        <a href="{{ route('admin.appointments') }}" class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">calendar_today</span><span class="text-sm">Appointments</span>
        </a>
    </nav>
    <div class="px-4 py-4 border-t border-slate-200 space-y-1">
        <a href="{{ route('admin.notifications') }}" class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 transition-all">
            <span class="material-symbols-outlined mr-3">notifications</span><span class="text-sm">Notifications</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 transition-all">
                <span class="material-symbols-outlined mr-3">logout</span><span class="text-sm">Log Out</span>
            </button>
        </form>
    </div>
</aside>

<!-- Top Bar -->
<header class="bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm flex items-center justify-between px-6 h-16 w-full z-40 sticky top-0 pl-[272px]">
    <div class="relative w-full max-w-xl">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
        <input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-transparent rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 transition-all outline-none" placeholder="Search patients by name, ID or record..." type="text"/>
    </div>
    <div class="flex items-center space-x-4">
        <a href="{{ route('admin.notifications') }}" class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors relative">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
        </a>
        <div class="flex items-center gap-3 pl-2">
            <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name ?? 'Admin User' }}</p>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="ml-64 p-8">
    <div class="max-w-7xl mx-auto">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
        @endif

        <!-- Page Header -->
        <div class="flex items-end justify-between mb-8">
            <div>
                <nav class="flex items-center text-xs text-slate-500 mb-2 gap-2">
                    <a href="{{ route('admin.statistics') }}" class="hover:text-blue-600">Dashboard</a>
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                    <span class="font-semibold text-slate-900">Patient Management</span>
                </nav>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Patient Directory</h2>
                <p class="text-slate-500 mt-1">Manage and monitor records for {{ $totalPatients ?? 0 }} registered patients.</p>
            </div>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-semibold flex items-center gap-2 hover:bg-slate-50 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-lg">filter_list</span> Filter List
                </button>
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-semibold flex items-center gap-2 hover:bg-slate-50 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-lg">download</span> Export Data
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined">groups</span>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Total Patients</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $totalPatients ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined">calendar_add_on</span>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">New This Week</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $newThisWeek ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined">medical_information</span>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Critical Alerts</p>
                    <p class="text-2xl font-bold text-red-600">{{ $criticalAlerts ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-slate-50 text-slate-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined">history</span>
                </div>
                <div>
                    <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Avg. Sessions/Week</p>
                    <p class="text-2xl font-bold text-slate-900">{{ $avgSessions ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Patient ID</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Last Visit</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($patients ?? [] as $patient)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200 text-slate-600 font-bold text-sm">
                                    {{ strtoupper(substr($patient->user->name ?? 'P', 0, 2)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">{{ $patient->user->name ?? 'Unknown' }}</p>
                                    <p class="text-xs text-slate-500">{{ $patient->user->email ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm text-slate-600 bg-slate-100 px-2 py-1 rounded">PT-{{ str_pad($patient->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ $patient->last_visit ? \Carbon\Carbon::parse($patient->last_visit)->format('M d, Y') : 'Never' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.patients.show', $patient->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View History">
                                    <span class="material-symbols-outlined">history_edu</span>
                                </a>
                                <a href="{{ route('admin.patients.edit', $patient->id) }}" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors" title="Manage Account">
                                    <span class="material-symbols-outlined">more_vert</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">No patients found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="bg-slate-50 px-6 py-4 border-t border-slate-200 flex items-center justify-between">
                <p class="text-sm text-slate-500">
                    @if(isset($patients) && method_exists($patients, 'total'))
                        Showing {{ $patients->firstItem() }} to {{ $patients->lastItem() }} of {{ $patients->total() }} entries
                    @endif
                </p>
                @if(isset($patients) && method_exists($patients, 'links'))
                    {{ $patients->links() }}
                @endif
            </div>
        </div>
    </div>
</main>
</body>
</html>