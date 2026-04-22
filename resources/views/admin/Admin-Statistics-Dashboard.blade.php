<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
                  "on-error-container": "#93000a",
                  "background": "#f7f9fb",
                  "surface": "#f7f9fb",
                  "secondary-container": "#86f2e4",
                  "on-surface-variant": "#434655",
                  "outline-variant": "#c3c6d7",
                  "on-surface": "#191c1e",
                  "inverse-on-surface": "#eff1f3",
                  "on-secondary-fixed": "#00201d",
                  "error-container": "#ffdad6",
                  "inverse-surface": "#2d3133",
                  "secondary-fixed-dim": "#6bd8cb",
                  "on-primary-fixed-variant": "#003ea8",
                  "tertiary-fixed-dim": "#89ceff",
                  "primary-container": "#2563eb",
                  "on-tertiary-container": "#e4f2ff",
                  "on-primary-fixed": "#00174b",
                  "inverse-primary": "#b4c5ff",
                  "on-tertiary": "#ffffff",
                  "surface-container-highest": "#e0e3e5",
                  "surface-bright": "#f7f9fb",
                  "tertiary-fixed": "#c9e6ff",
                  "surface-tint": "#0053db",
                  "surface-container-low": "#f2f4f6",
                  "tertiary-container": "#0074a6",
                  "surface-container-high": "#e6e8ea",
                  "on-secondary-fixed-variant": "#005049",
                  "on-primary": "#ffffff",
                  "secondary-fixed": "#89f5e7",
                  "on-secondary": "#ffffff",
                  "on-primary-container": "#eeefff",
                  "secondary": "#006a61",
                  "on-secondary-container": "#006f66",
                  "on-background": "#191c1e",
                  "surface-dim": "#d8dadc",
                  "outline": "#737686",
                  "on-error": "#ffffff",
                  "surface-variant": "#e0e3e5",
                  "error": "#ba1a1a",
                  "surface-container-lowest": "#ffffff",
                  "primary-fixed": "#dbe1ff",
                  "primary": "#004ac6",
                  "on-tertiary-fixed-variant": "#004c6e",
                  "tertiary": "#005a82",
                  "surface-container": "#eceef0",
                  "primary-fixed-dim": "#b4c5ff",
                  "on-tertiary-fixed": "#001e2f"
          },
          "borderRadius": {
                  "DEFAULT": "0.25rem",
                  "lg": "0.5rem",
                  "xl": "0.75rem",
                  "full": "9999px"
          },
          "fontFamily": {
                  "headline": ["Manrope"],
                  "display": ["Manrope"],
                  "body": ["Inter"],
                  "label": ["Inter"]
          }
        },
      },
    }
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .chart-bar { transition: height 0.3s ease; }
    .glass-effect { backdrop-filter: blur(8px); background-color: rgba(255, 255, 255, 0.7); }
  </style>
</head>
<body class="bg-background font-body text-on-background">
<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 rounded-none border-r border-slate-200 bg-slate-50 flex flex-col py-4 space-y-2 z-50">
<div class="px-6 mb-8">
<h1 class="font-headline font-extrabold text-blue-600 text-2xl tracking-tight">RDV Wise</h1>
<p class="text-xs text-slate-500 font-medium mt-1">Global Overview</p>
</div>
<nav class="flex-1 px-4 space-y-1">
<div class="bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600 flex items-center px-4 py-3 rounded-sm cursor-pointer transform hover:translate-x-1 transition-all duration-200">
<span class="material-symbols-outlined mr-3" data-icon="leaderboard">leaderboard</span>
<span class="text-sm">Statistics</span>
</div>
<div class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-3 rounded-sm cursor-pointer transform hover:translate-x-1 transition-all duration-200">
<span class="material-symbols-outlined mr-3" data-icon="medical_services">medical_services</span>
<span class="text-sm">Doctors</span>
</div>
<div class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-3 rounded-sm cursor-pointer transform hover:translate-x-1 transition-all duration-200">
<span class="material-symbols-outlined mr-3" data-icon="person_filled">person_filled</span>
<span class="text-sm">Patients</span>
</div>
<div class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-3 rounded-sm cursor-pointer transform hover:translate-x-1 transition-all duration-200">
<span class="material-symbols-outlined mr-3" data-icon="calendar_today">calendar_today</span>
<span class="text-sm">Appointments</span>
</div>
</nav>
<div class="px-4 py-4 mt-auto space-y-1">
<button class="w-full bg-primary-container text-on-primary-container py-2.5 rounded-lg font-semibold text-sm mb-4 flex items-center justify-center gap-2 hover:opacity-90 transition-all">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span>
        Add New Record
      </button>
<div class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-2 rounded-sm cursor-pointer transition-all duration-150">
<span class="material-symbols-outlined mr-3" data-icon="help">help</span>
<span class="text-sm">Support</span>
</div>
<div class="text-slate-600 hover:text-blue-600 hover:bg-slate-100 flex items-center px-4 py-2 rounded-sm cursor-pointer transition-all duration-150">
<span class="material-symbols-outlined mr-3" data-icon="logout">logout</span>
<span class="text-sm">Log Out</span>
</div>
</div>
</aside>
<!-- Main Content Wrapper -->
<main class="ml-64 flex flex-col min-h-screen">
<!-- TopAppBar -->
<header class="flex items-center justify-between px-8 h-16 w-full z-40 bg-white/80 backdrop-blur-md sticky top-0 border-b border-slate-200 shadow-sm">
<div class="flex items-center gap-4 flex-1">
<div class="relative w-full max-w-md">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-1.5 bg-slate-100 border-none rounded-full text-sm focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Search analytics..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-4">
<div class="p-2 text-slate-500 hover:bg-slate-100 rounded-full cursor-pointer transition-colors relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
</div>
<div class="p-2 text-slate-500 hover:bg-slate-100 rounded-full cursor-pointer transition-colors">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</div>
</div>
<div class="h-8 w-px bg-slate-200 mx-2"></div>
<div class="flex items-center gap-3 cursor-pointer group">
<div class="text-right">
<p class="text-sm font-semibold text-slate-900 group-hover:text-blue-600 transition-colors">Admin User</p>
<p class="text-[10px] text-slate-500 uppercase tracking-wider font-bold">Administrator</p>
</div>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full border-2 border-blue-100 object-cover" data-alt="Close up portrait of a professional female medical administrator in clinical setting with soft natural lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDT_au1O-1FDeq8E2tX3g6EKbDOD177FUC2VL_cEJsAWO3ed3hRPDdEl_Md6tVWpigTRl8-tlkfRX-KC7j_zPDitLLT6WXq87wfP-pq4B3-DV7wVBjzwYk5lcM1CkufcYdXMoK3nhDTGZAfZCb5FK4ezkWB9Z1wzf8IiLVIOx6I1yKoN9b4Kzx_cDoz1Lmhb6b4M2d2Bf1JGrjXCgB4c2DvThIUTErCEwppOmKGo-rTHpffIvCdFearMIz9jv_UtL0uTUEXrazb9I"/>
</div>
</div>
</header>
<!-- Dashboard Content -->
<div class="p-8 space-y-8">
<!-- Welcome Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<h2 class="text-3xl font-headline font-bold text-slate-900">Dashboard Overview</h2>
<p class="text-slate-500 mt-1">Real-time clinical performance and patient metrics.</p>
</div>
<div class="flex items-center gap-3">
<div class="bg-white px-4 py-2 rounded-lg border border-slate-200 flex items-center gap-2 cursor-pointer hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-slate-400 text-sm" data-icon="calendar_month">calendar_month</span>
<span class="text-sm font-medium text-slate-700">Last 30 Days</span>
<span class="material-symbols-outlined text-slate-400 text-sm" data-icon="expand_more">expand_more</span>
</div>
<button class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium text-sm flex items-center gap-2 shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">
<span class="material-symbols-outlined text-sm" data-icon="file_download">file_download</span>
            Export Data
          </button>
</div>
</div>
<!-- KPI Cards (Asymmetric Bento-like grid) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Total Users -->
<div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
<span class="material-symbols-outlined" data-icon="groups">groups</span>
</div>
<div class="flex items-center text-emerald-500 text-sm font-bold">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
              12.5%
            </div>
</div>
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Users</p>
<h3 class="text-3xl font-headline font-bold text-slate-900 mt-1">24,892</h3>
<div class="absolute -right-2 -bottom-2 opacity-[0.03] group-hover:scale-110 transition-transform duration-500">
<span class="material-symbols-outlined text-9xl" data-icon="groups">groups</span>
</div>
</div>
<!-- Total Consultations -->
<div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-teal-50 text-teal-600 rounded-lg">
<span class="material-symbols-outlined" data-icon="stethoscope">stethoscope</span>
</div>
<div class="flex items-center text-emerald-500 text-sm font-bold">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
              8.2%
            </div>
</div>
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Total Consultations</p>
<h3 class="text-3xl font-headline font-bold text-slate-900 mt-1">152,430</h3>
<div class="absolute -right-2 -bottom-2 opacity-[0.03] group-hover:scale-110 transition-transform duration-500">
<span class="material-symbols-outlined text-9xl" data-icon="stethoscope">stethoscope</span>
</div>
</div>
<!-- Revenue -->
<div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-indigo-50 text-indigo-600 rounded-lg">
<span class="material-symbols-outlined" data-icon="payments">payments</span>
</div>
<div class="flex items-center text-emerald-500 text-sm font-bold">
<span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span>
              18.4%
            </div>
</div>
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Revenue (USD)</p>
<h3 class="text-3xl font-headline font-bold text-slate-900 mt-1">$4.2M</h3>
<div class="absolute -right-2 -bottom-2 opacity-[0.03] group-hover:scale-110 transition-transform duration-500">
<span class="material-symbols-outlined text-9xl" data-icon="payments">payments</span>
</div>
</div>
<!-- Growth -->
<div class="bg-white p-6 rounded-xl border border-slate-100 shadow-sm relative overflow-hidden group">
<div class="flex justify-between items-start mb-4">
<div class="p-3 bg-sky-50 text-sky-600 rounded-lg">
<span class="material-symbols-outlined" data-icon="analytics">analytics</span>
</div>
<div class="flex items-center text-amber-500 text-sm font-bold">
<span class="material-symbols-outlined text-xs" data-icon="trending_flat">trending_flat</span>
              2.1%
            </div>
</div>
<p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Platform Growth</p>
<h3 class="text-3xl font-headline font-bold text-slate-900 mt-1">+24.5%</h3>
<div class="absolute -right-2 -bottom-2 opacity-[0.03] group-hover:scale-110 transition-transform duration-500">
<span class="material-symbols-outlined text-9xl" data-icon="analytics">analytics</span>
</div>
</div>
</div>
<!-- Main Analytics Row -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Large Chart Area -->
<div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-8 flex flex-col">
<div class="flex items-center justify-between mb-8">
<div>
<h4 class="text-lg font-headline font-bold text-slate-900">Monthly Appointment Trends</h4>
<p class="text-sm text-slate-500">Comparison between scheduled vs. completed sessions</p>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center gap-2">
<div class="w-3 h-3 rounded-full bg-blue-600"></div>
<span class="text-xs font-medium text-slate-600">Scheduled</span>
</div>
<div class="flex items-center gap-2">
<div class="w-3 h-3 rounded-full bg-blue-200"></div>
<span class="text-xs font-medium text-slate-600">Completed</span>
</div>
</div>
</div>
<div class="flex-1 flex items-end justify-between gap-4 min-h-[300px]">
<!-- Chart Bar 1 -->
<div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
<div class="w-full flex items-end gap-1 px-1 h-full">
<div class="bg-blue-200 w-full h-[60%] rounded-t-sm transition-all duration-300 group-hover:h-[65%]"></div>
<div class="bg-blue-600 w-full h-[85%] rounded-t-sm transition-all duration-300 group-hover:h-[90%]"></div>
</div>
<span class="text-[10px] font-bold text-slate-400 uppercase">Jan</span>
</div>
<!-- Chart Bar 2 -->
<div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
<div class="w-full flex items-end gap-1 px-1 h-full">
<div class="bg-blue-200 w-full h-[45%] rounded-t-sm transition-all duration-300 group-hover:h-[50%]"></div>
<div class="bg-blue-600 w-full h-[70%] rounded-t-sm transition-all duration-300 group-hover:h-[75%]"></div>
</div>
<span class="text-[10px] font-bold text-slate-400 uppercase">Feb</span>
</div>
<!-- Chart Bar 3 -->
<div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
<div class="w-full flex items-end gap-1 px-1 h-full">
<div class="bg-blue-200 w-full h-[55%] rounded-t-sm transition-all duration-300 group-hover:h-[60%]"></div>
<div class="bg-blue-600 w-full h-[80%] rounded-t-sm transition-all duration-300 group-hover:h-[85%]"></div>
</div>
<span class="text-[10px] font-bold text-slate-400 uppercase">Mar</span>
</div>
<!-- Chart Bar 4 -->
<div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
<div class="w-full flex items-end gap-1 px-1 h-full">
<div class="bg-blue-200 w-full h-[65%] rounded-t-sm transition-all duration-300 group-hover:h-[70%]"></div>
<div class="bg-blue-600 w-full h-[95%] rounded-t-sm transition-all duration-300 group-hover:h-[100%]"></div>
</div>
<span class="text-[10px] font-bold text-slate-400 uppercase">Apr</span>
</div>
<!-- Chart Bar 5 -->
<div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
<div class="w-full flex items-end gap-1 px-1 h-full">
<div class="bg-blue-200 w-full h-[40%] rounded-t-sm transition-all duration-300 group-hover:h-[45%]"></div>
<div class="bg-blue-600 w-full h-[65%] rounded-t-sm transition-all duration-300 group-hover:h-[70%]"></div>
</div>
<span class="text-[10px] font-bold text-slate-400 uppercase">May</span>
</div>
<!-- Chart Bar 6 -->
<div class="flex-1 flex flex-col items-center gap-3 group h-full justify-end">
<div class="w-full flex items-end gap-1 px-1 h-full">
<div class="bg-blue-200 w-full h-[70%] rounded-t-sm transition-all duration-300 group-hover:h-[75%]"></div>
<div class="bg-blue-600 w-full h-[90%] rounded-t-sm transition-all duration-300 group-hover:h-[95%]"></div>
</div>
<span class="text-[10px] font-bold text-slate-400 uppercase">Jun</span>
</div>
</div>
</div>
<!-- Sidebar Analytics Card -->
<div class="flex flex-col gap-8">
<!-- Specialty Demand -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
<div class="flex items-center justify-between mb-6">
<h4 class="font-headline font-bold text-slate-900">Specialty Demand</h4>
<span class="material-symbols-outlined text-slate-400 cursor-pointer" data-icon="more_horiz">more_horiz</span>
</div>
<div class="space-y-5">
<div class="space-y-2">
<div class="flex justify-between text-sm">
<span class="text-slate-600">Cardiology</span>
<span class="font-bold text-slate-900">38%</span>
</div>
<div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-blue-600 rounded-full w-[38%]"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between text-sm">
<span class="text-slate-600">Dermatology</span>
<span class="font-bold text-slate-900">24%</span>
</div>
<div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-teal-500 rounded-full w-[24%]"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between text-sm">
<span class="text-slate-600">Pediatrics</span>
<span class="font-bold text-slate-900">18%</span>
</div>
<div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-sky-400 rounded-full w-[18%]"></div>
</div>
</div>
<div class="space-y-2">
<div class="flex justify-between text-sm">
<span class="text-slate-600">Neurology</span>
<span class="font-bold text-slate-900">12%</span>
</div>
<div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-indigo-500 rounded-full w-[12%]"></div>
</div>
</div>
</div>
<button class="w-full mt-6 text-sm font-semibold text-blue-600 hover:text-blue-700 transition-colors">View All Specialties</button>
</div>
<!-- Quick Actions / Mini Insight -->
<div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-xl shadow-blue-200">
<h4 class="font-headline font-bold mb-2">Efficiency Insight</h4>
<p class="text-blue-100 text-sm mb-6 leading-relaxed">The average patient wait time has decreased by 4 minutes this month due to improved scheduling algorithms.</p>
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
<span class="material-symbols-outlined text-white" data-icon="auto_awesome">auto_awesome</span>
</div>
<div>
<p class="text-xs font-bold uppercase tracking-widest text-blue-200">Optimization Goal</p>
<p class="text-sm font-medium">Reach 95% satisfaction</p>
</div>
</div>
</div>
</div>
</div>
<!-- Bottom Grid Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<!-- Patient Demographics Distribution -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 overflow-hidden">
<div class="flex items-center justify-between mb-8">
<h4 class="font-headline font-bold text-slate-900">Patient Demographics</h4>
<select class="text-xs font-bold bg-slate-100 border-none rounded px-3 py-1.5 focus:ring-0">
<option>Age Distribution</option>
<option>Gender Distribution</option>
</select>
</div>
<div class="relative h-64 flex items-center justify-center">
<!-- Circular Progress Visualization (Decorative Simulation) -->
<div class="relative w-48 h-48 rounded-full border-[16px] border-slate-100 flex items-center justify-center">
<div class="absolute inset-0 rounded-full border-[16px] border-blue-600 border-t-transparent border-r-transparent transform -rotate-45"></div>
<div class="absolute inset-0 rounded-full border-[16px] border-teal-500 border-l-transparent border-t-transparent border-b-transparent transform rotate-45"></div>
<div class="text-center">
<p class="text-2xl font-bold text-slate-900">12k+</p>
<p class="text-[10px] text-slate-500 font-bold uppercase">New Patients</p>
</div>
</div>
<!-- Legend -->
<div class="absolute right-0 top-1/2 -translate-y-1/2 space-y-4">
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-blue-600"></div>
<span class="text-xs text-slate-600">18-35 yrs</span>
</div>
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-teal-500"></div>
<span class="text-xs text-slate-600">36-55 yrs</span>
</div>
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-slate-200"></div>
<span class="text-xs text-slate-600">55+ yrs</span>
</div>
</div>
</div>
</div>
<!-- Recent Platform Activity -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
<div class="flex items-center justify-between mb-6">
<h4 class="font-headline font-bold text-slate-900">System Activity</h4>
<span class="text-xs text-blue-600 font-semibold cursor-pointer">View Audit Logs</span>
</div>
<div class="space-y-6">
<div class="flex gap-4">
<div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-sm text-blue-600" data-icon="add_circle">add_circle</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900">New specialty "Neurology" added</p>
<p class="text-xs text-slate-500">2 hours ago • Admin: Sarah J.</p>
</div>
</div>
<div class="flex gap-4">
<div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-sm text-teal-600" data-icon="sync">sync</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900">Server synchronization completed</p>
<p class="text-xs text-slate-500">5 hours ago • System Auto</p>
</div>
</div>
<div class="flex gap-4">
<div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-sm text-amber-600" data-icon="warning">warning</span>
</div>
<div>
<p class="text-sm font-semibold text-slate-900">Failed login attempt detected</p>
<p class="text-xs text-slate-500">Yesterday at 11:30 PM • IP: 192.168.1.1</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Footer Space -->
<footer class="mt-auto px-8 py-6 border-t border-slate-200 text-center">
<p class="text-slate-400 text-xs">© 2024 Clinical Clarity Administration Portal. All rights reserved. Version 2.4.1-stable</p>
</footer>
</main>
<!-- Mobile Overlay (Hidden) -->
<div class="md:hidden fixed inset-0 bg-black/50 z-[100] hidden" id="mobile-sidebar-overlay"></div>
</body></html>