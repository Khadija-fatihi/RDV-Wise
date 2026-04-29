<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin Dashboard - RDV Wise</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: { extend: { colors: { "primary-container": "#2563eb", "on-primary-container": "#eeefff", "background": "#f7f9fb", "on-background": "#191c1e", "primary": "#004ac6", "secondary": "#006a61", "tertiary": "#005a82", "error": "#ba1a1a" }, fontFamily: { "headline": ["Manrope"], "body": ["Inter"] } } }
    }
</script>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3, h4 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-background font-body text-on-background">

<!-- Sidebar -->
<aside class="h-screen w-64 fixed left-0 top-0 border-r border-slate-200 bg-slate-50 flex flex-col py-4 z-50">
    <div class="px-6 mb-8">
        <h1 class="font-extrabold text-blue-600 text-2xl tracking-tight" style="font-family:'Manrope'">RDV Wise</h1>
        <p class="text-xs text-slate-500 font-medium mt-1">Global Overview</p>
    </div>
    <nav class="flex-1 px-4 space-y-1">
        <a href="{{ route('admin.statistics') }}" class="bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600 flex items-center px-4 py-3 cursor-pointer hover:translate-x-1 transition-all duration-200">
            <span class="material-symbols-outlined mr-3">leaderboard</span><span class="text-sm">Statistics</span>
        </a>
        <a href="{{ route('admin.doctors') }}" class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-3 cursor-pointer hover:translate-x-1 transition-all duration-200">
            <span class="material-symbols-outlined mr-3">medical_services</span><span class="text-sm">Doctors</span>
        </a>
        <a href="{{ route('admin.patients') }}" class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-3 cursor-pointer hover:translate-x-1 transition-all duration-200">
            <span class="material-symbols-outlined mr-3">person</span><span class="text-sm">Patients</span>
        </a>
        <a href="{{ route('admin.appointments') }}" class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-3 cursor-pointer hover:translate-x-1 transition-all duration-200">
            <span class="material-symbols-outlined mr-3">calendar_today</span><span class="text-sm">Appointments</span>
        </a>
    </nav>
    <div class="px-4 py-4 mt-auto space-y-1 border-t border-slate-200">
        <a href="{{ route('admin.notifications') }}" class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-2 cursor-pointer transition-all duration-150">
            <span class="material-symbols-outlined mr-3">notifications</span><span class="text-sm">Notifications</span>
        </a>
        <a href="{{ route('admin.support') }}" class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-2 cursor-pointer transition-all duration-150">
            <span class="material-symbols-outlined mr-3">help</span><span class="text-sm">Support</span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-2 cursor-pointer transition-all duration-150">
                <span class="material-symbols-outlined mr-3">logout</span><span class="text-sm">Log Out</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Wrapper -->
<main class="ml-64 flex flex-col min-h-screen">
    <!-- TopBar -->
    <header class="flex items-center justify-between px-8 h-16 w-full z-40 bg-white/80 backdrop-blur-md sticky top-0 border-b border-slate-200 shadow-sm">
        <div class="relative w-full max-w-md">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input class="w-full pl-10 pr-4 py-1.5 bg-slate-100 border-none rounded-full text-sm focus:ring-2 focus:ring-blue-500 transition-all outline-none" placeholder="Search analytics..."/>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.notifications') }}" class="p-2 text-slate-500 hover:bg-slate-100 rounded-full cursor-pointer transition-colors relative">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
            </a>
            <div class="h-8 w-px bg-slate-200 mx-2"></div>
            <div class="text-right">
                <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name ?? 'Admin User' }}</p>
                <p class="text-xs text-slate-500 uppercase tracking-wider font-bold">Administrator</p>
            </div>
        </div>
    </header>

    <!-- Dashboard Content -->
    <div class="p-8 space-y-8">
        <!-- Welcome Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold text-slate-900" style="font-family:'Manrope'">Dashboard Overview</h2>
                <p class="text-slate-500 mt-1">Real-time clinical performance and patient metrics.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="bg-white px-4 py-2 rounded-lg border border-slate-200 flex items-center gap-2 cursor-pointer hover:bg-slate-50">
                    <span class="material-symbols-outlined text-slate-400 text-sm">calendar_month</span>
                    <span class="text-sm font-medium text-slate-700">Last 30 Days</span>
                </div>
                <button class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium text-sm flex items-center gap-2 shadow-lg hover:bg-blue-700 transition-all">
                    <span class="material-symbols-outlined text-sm">file_download</span> Export Data
                </button>
            </div>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <div class="flex items-center text-emerald-500 text-sm font-bold">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 12.5%
                    </div>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Users</p>
                <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalUsers ?? 0 }}</h3>
            </div>
            <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-teal-50 text-teal-600 rounded-lg">
                        <span class="material-symbols-outlined">stethoscope</span>
                    </div>
                    <div class="flex items-center text-emerald-500 text-sm font-bold">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 8.2%
                    </div>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Consultations</p>
                <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalConsultations ?? 0 }}</h3>
            </div>
            <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-lg">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <div class="flex items-center text-emerald-500 text-sm font-bold">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 18.4%
                    </div>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Appointments</p>
                <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ $totalAppointments ?? 0 }}</h3>
            </div>
            <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-sky-50 text-sky-600 rounded-lg">
                        <span class="material-symbols-outlined">analytics</span>
                    </div>
                    <div class="flex items-center text-amber-500 text-sm font-bold">
                        <span class="material-symbols-outlined text-xs">trending_flat</span> 2.1%
                    </div>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Platform Growth</p>
                <h3 class="text-3xl font-bold text-slate-900 mt-1">+24.5%</h3>
            </div>
        </div>

        <!-- Chart + Sidebar -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-8 flex flex-col">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h4 class="text-lg font-bold text-slate-900" style="font-family:'Manrope'">Monthly Appointment Trends</h4>
                        <p class="text-sm text-slate-500">Scheduled vs. completed sessions</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-blue-600"></div><span class="text-xs text-slate-600">Scheduled</span></div>
                        <div class="flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-blue-200"></div><span class="text-xs text-slate-600">Completed</span></div>
                    </div>
                </div>
                <div class="flex-1 flex items-end justify-between gap-4 min-h-[300px]">
                    @foreach(['Jan','Feb','Mar','Apr','May','Jun'] as $month)
                    <div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
                        <div class="w-full flex items-end gap-1 px-1 h-full">
                            <div class="bg-blue-200 w-full rounded-t-sm" ></div>
                            <div class="bg-blue-600 w-full rounded-t-sm" ></div>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase">{{ $month }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-8">
                <!-- Specialty Demand -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                    <h4 class="font-bold text-slate-900 mb-6" style="font-family:'Manrope'">Specialty Demand</h4>
                    <div class="space-y-5">
                        @foreach($specialtyStats ?? [['name'=>'Cardiology','pct'=>38],['name'=>'Nephrology','pct'=>24],['name'=>'Pediatrics','pct'=>18]] as $s)
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600">{{ $s['name'] }}</span>
                                <span class="font-bold text-slate-900">{{ $s['pct'] }}%</span>
                            </div>
                            <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-600 rounded-full"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Insight Card -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-xl">
                    <h4 class="font-bold mb-2" style="font-family:'Manrope'">Efficiency Insight</h4>
                    <p class="text-blue-100 text-sm mb-6">Average patient wait time decreased by 4 minutes this month.</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white">auto_awesome</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-blue-200">Optimization Goal</p>
                            <p class="text-sm font-medium">Reach 95% satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Activity -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="font-bold text-slate-900" style="font-family:'Manrope'">Patient Demographics</h4>
                </div>
                <p class="text-slate-400 text-sm text-center py-8">Connect backend to display real demographic data.</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="font-bold text-slate-900" style="font-family:'Manrope'">System Activity</h4>
                    <a href="#" class="text-xs text-blue-600 font-semibold">View Audit Logs</a>
                </div>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-sm text-blue-600">add_circle</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">System ready</p>
                            <p class="text-xs text-slate-500">Now • Auto</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>