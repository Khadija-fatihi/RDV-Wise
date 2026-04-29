<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Clinical Clarity - Manage Doctors</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary-container": "#2563eb",
                    "on-primary-container": "#eeefff",
                    "background": "#f7f9fb",
                    "on-background": "#191c1e",
                    "surface": "#f7f9fb",
                    "on-surface": "#191c1e",
                    "on-surface-variant": "#434655",
                    "outline-variant": "#c3c6d7",
                    "error": "#ba1a1a",
                },
                fontFamily: {
                    "headline": ["Manrope"],
                    "body": ["Inter"],
                }
            }
        }
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
<aside class="h-screen w-64 fixed left-0 top-0 bg-slate-50 border-r border-slate-200 z-50 flex flex-col py-4">
    <div class="px-6 mb-8">
        <h1 class="font-extrabold text-blue-600 text-xl tracking-tight" style="font-family:'Manrope'">Clinical Clarity</h1>
        <p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-semibold">Admin Dashboard</p>
    </div>
    <nav class="flex-1 px-3 space-y-1">
        <a href="{{ route('admin.statistics') }}" class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">leaderboard</span> Statistics
        </a>
        <a href="{{ route('admin.doctors') }}" class="flex items-center px-3 py-2.5 bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600">
            <span class="material-symbols-outlined mr-3">medical_services</span> Doctors
        </a>
        <a href="{{ route('admin.patients') }}" class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">person</span> Patients
        </a>
        <a href="{{ route('admin.appointments') }}" class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 hover:translate-x-1">
            <span class="material-symbols-outlined mr-3">calendar_today</span> Appointments
        </a>
    </nav>
    <div class="px-3 pt-4 pb-4 border-t border-slate-200 space-y-1">
        <a href="{{ route('admin.notifications') }}" class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all">
            <span class="material-symbols-outlined mr-3">notifications</span> Notifications
        </a>
        <a href="{{ route('admin.support') }}" class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all">
            <span class="material-symbols-outlined mr-3">help</span> Support
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all">
                <span class="material-symbols-outlined mr-3">logout</span> Log Out
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="ml-64 min-h-screen">
    <!-- Top Bar -->
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-slate-200 shadow-sm flex items-center justify-between px-6 h-16">
        <div class="relative w-full max-w-md">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
            <input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-transparent focus:bg-white focus:ring-2 focus:ring-blue-600/20 rounded-lg text-sm outline-none transition-all" placeholder="Search doctors..." type="text"/>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.notifications') }}" class="p-2 text-slate-500 hover:bg-slate-100 rounded-full relative">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
            </a>
            <span class="text-sm font-semibold text-slate-700">{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
    </header>

    <div class="p-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
        @endif

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Manage Doctors</h2>
                <p class="text-slate-500 mt-1">Directory of all practicing medical professionals.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2.5 bg-white border border-slate-200 text-slate-700 font-semibold rounded-lg flex items-center gap-2 hover:bg-slate-50 transition-all shadow-sm">
                    <span class="material-symbols-outlined">filter_list</span> Filter
                </button>
                <a href="{{ route('admin.doctors.create') }}" class="px-5 py-2.5 bg-primary-container text-white font-bold rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-lg active:scale-95">
                    <span class="material-symbols-outlined">person_add</span> Add New Doctor
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">groups</span>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Total Doctors</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $totalDoctors ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">verified</span>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Verified</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $verifiedDoctors ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">pending_actions</span>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Pending</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $pendingDoctors ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">star</span>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Top Rated</p>
                    <p class="text-2xl font-extrabold text-slate-900">{{ $topRatedDoctors ?? 0 }}</p>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-6 py-4 text-xs font-extrabold text-slate-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-xs font-extrabold text-slate-500 uppercase tracking-wider">Specialty</th>
                            <th class="px-6 py-4 text-xs font-extrabold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-extrabold text-slate-500 uppercase tracking-wider">Contact</th>
                            <th class="px-6 py-4 text-xs font-extrabold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($doctors ?? [] as $doctor)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">
                                        {{ strtoupper(substr($doctor->user->name ?? 'D', 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900">Dr. {{ $doctor->user->name ?? 'Unknown' }}</p>
                                        <p class="text-xs text-slate-500">ID: DOC-{{ $doctor->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">
                                    {{ $doctor->specialite ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($doctor->verified ?? false)
                                    <div class="flex items-center gap-1.5 text-emerald-600 font-semibold text-sm">
                                        <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">verified</span> Verified
                                    </div>
                                @else
                                    <div class="flex items-center gap-1.5 text-amber-600 font-semibold text-sm">
                                        <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">error</span> Pending
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <p class="text-slate-900 font-medium">{{ $doctor->user->email ?? 'N/A' }}</p>
                                    <p class="text-slate-500 text-xs">{{ $doctor->user->phone ?? 'N/A' }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    @if(!($doctor->verified ?? false))
                                        <form method="POST" action="{{ route('admin.doctors.verify', $doctor->id) }}">
                                            @csrf @method('PATCH')
                                            <button class="px-3 py-1.5 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700">Verify</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.doctors.destroy', $doctor->id) }}" onsubmit="return confirm('Delete this doctor?')">
                                        @csrf @method('DELETE')
                                        <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">No doctors found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="bg-slate-50 px-6 py-4 border-t border-slate-200 flex items-center justify-between">
                <p class="text-sm text-slate-500">
                    @if(isset($doctors) && method_exists($doctors, 'total'))
                        Showing {{ $doctors->firstItem() }} to {{ $doctors->lastItem() }} of {{ $doctors->total() }} doctors
                    @endif
                </p>
                @if(isset($doctors) && method_exists($doctors, 'links'))
                    {{ $doctors->links() }}
                @endif
            </div>
        </div>
    </div>
</main>
</body>
</html>