<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Supervise Appointments - Clinical Clarity</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                        "surface-container": "#eceef0",
                        "primary-fixed": "#dbe1ff",
                        "primary": "#004ac6",
                        "on-tertiary-fixed-variant": "#004c6e",
                        "tertiary": "#005a82",
                        "surface-container-lowest": "#ffffff",
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
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex">
<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 rounded-none bg-slate-50 border-r border-slate-200 flex flex-col py-4 space-y-2 z-50">
<div class="px-6 mb-8">
<h1 class="font-['Manrope'] font-extrabold text-blue-600 text-xl">Clinical Clarity</h1>
<p class="text-xs text-slate-500 font-medium mt-1">Admin Dashboard</p>
</div>
<nav class="flex-1 px-3 space-y-1">
<a class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all duration-150 rounded-lg group transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="leaderboard">leaderboard</span>
<span class="font-['Inter'] text-sm antialiased">Statistics</span>
</a>
<a class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all duration-150 rounded-lg group transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="medical_services">medical_services</span>
<span class="font-['Inter'] text-sm antialiased">Doctors</span>
</a>
<a class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all duration-150 rounded-lg group transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="person_filled">person_filled</span>
<span class="font-['Inter'] text-sm antialiased">Patients</span>
</a>
<!-- Active State for Appointments -->
<a class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600 transition-all duration-150 rounded-l-lg group" href="#">
<span class="material-symbols-outlined mr-3" data-icon="calendar_today">calendar_today</span>
<span class="font-['Inter'] text-sm antialiased">Appointments</span>
</a>
</nav>
<div class="px-4 mt-auto space-y-4">
<button class="w-full bg-primary-container text-on-primary-container py-2.5 rounded-lg font-semibold text-sm shadow-sm flex items-center justify-center gap-2 hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span>
                Add New Record
            </button>
<div class="pt-4 border-t border-slate-200">
<a class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 transition-all duration-150 rounded-lg text-sm" href="#">
<span class="material-symbols-outlined mr-3" data-icon="help">help</span>
                    Support
                </a>
<a class="flex items-center px-3 py-2 text-slate-600 hover:bg-slate-100 transition-all duration-150 rounded-lg text-sm" href="#">
<span class="material-symbols-outlined mr-3" data-icon="logout">logout</span>
                    Log Out
                </a>
</div>
</div>
</aside>
<main class="flex-1 ml-64 relative">
<!-- TopAppBar -->
<header class="bg-white/80 backdrop-blur-md sticky top-0 w-full z-40 border-b border-slate-200 shadow-sm flex items-center justify-between px-8 h-16">
<div class="flex items-center gap-4 flex-1">
<div class="relative w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-none rounded-lg text-sm focus:ring-2 focus:ring-blue-600/20 placeholder:text-slate-500" placeholder="Search patients, doctors, or ID..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="h-8 w-px bg-slate-200 mx-2"></div>
<div class="flex items-center gap-3">
<div class="text-right">
<p class="text-sm font-semibold text-slate-900 leading-none">Admin User</p>
<p class="text-xs text-slate-500 mt-1">Super Admin</p>
</div>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" data-alt="professional portrait of a hospital administrator in business attire, clean bright medical office background, soft daylight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB53ZDy4jO5h_LBI4sDJ4Q-40oSwhz2wqJJGjxhsq-EAhRUjOXuigSbRFIyEIZ0bxhmImKMw0FSQbNLRO0iEcD722iAqyxqD3hNLp_y3JzSWeFZvDCDOETsuIQb2qBkgJUMshmdJh6WYjusxADV-a4H3Q1TzN11JrPMBOKSzUVZ8A_x6oBAWjN6FnSogDSdFn5BJugL_iGV0eVFt6yMo6PXCL3a8sOCceswYSizURdE7QYS-uwTotndYtrpeR9xXQauWqkLq5e9V8g"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<div class="p-8 space-y-8">
<!-- Page Header & Stats Summary -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
<div>
<nav class="flex text-xs font-medium text-slate-400 mb-2 gap-2">
<span>Dashboard</span>
<span>/</span>
<span class="text-blue-600">Appointments</span>
</nav>
<h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Supervise Appointments</h2>
<p class="text-slate-500 mt-1">Manage and audit all clinical consultations across the facility.</p>
</div>
<div class="flex gap-4">
<div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4 min-w-[160px]">
<div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
</div>
<div>
<p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Today</p>
<p class="text-xl font-extrabold text-slate-900">42</p>
</div>
</div>
<div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4 min-w-[160px]">
<div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
</div>
<div>
<p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Completed</p>
<p class="text-xl font-extrabold text-slate-900">18</p>
</div>
</div>
</div>
</div>
<!-- Advanced Filter Bar (Bento style) -->
<div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-4 bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
<div class="flex flex-col gap-1.5">
<label class="text-xs font-bold text-slate-500 px-1">Date Range</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm" data-icon="event">event</span>
<select class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm focus:ring-blue-600/20 focus:border-blue-600">
<option>Today, Oct 24</option>
<option>Tomorrow</option>
<option>Next 7 Days</option>
<option>Custom Range</option>
</select>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-bold text-slate-500 px-1">Department</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm" data-icon="account_tree">account_tree</span>
<select class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm focus:ring-blue-600/20 focus:border-blue-600">
<option>All Departments</option>
<option>Cardiology</option>
<option>Neurology</option>
<option>Pediatrics</option>
</select>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-bold text-slate-500 px-1">Doctor</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm" data-icon="medical_services">medical_services</span>
<input class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm focus:ring-blue-600/20 focus:border-blue-600" placeholder="Filter by name..." type="text"/>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="text-xs font-bold text-slate-500 px-1">Status</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm" data-icon="filter_list">filter_list</span>
<select class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border-slate-200 rounded-lg text-sm focus:ring-blue-600/20 focus:border-blue-600">
<option>All Statuses</option>
<option>Confirmed</option>
<option>Completed</option>
<option>Canceled</option>
</select>
</div>
</div>
<div class="flex items-end">
<button class="w-full bg-slate-900 text-white py-2.5 rounded-lg font-bold text-sm hover:bg-slate-800 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm" data-icon="tune">tune</span>
                        Apply Filters
                    </button>
</div>
</div>
<!-- Appointments Data Grid -->
<div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
<div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
<div class="flex items-center gap-2">
<h3 class="font-bold text-slate-900">Live Schedule</h3>
<span class="bg-blue-100 text-blue-700 text-[10px] font-black px-2 py-0.5 rounded-full uppercase">Real-time</span>
</div>
<div class="flex gap-2">
<button class="p-1.5 text-slate-400 hover:text-slate-600 transition-colors">
<span class="material-symbols-outlined" data-icon="download">download</span>
</button>
<button class="p-1.5 text-slate-400 hover:text-slate-600 transition-colors">
<span class="material-symbols-outlined" data-icon="print">print</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="text-[11px] font-black text-slate-400 uppercase tracking-widest bg-slate-50/50 border-b border-slate-100">
<th class="px-6 py-4">Patient Information</th>
<th class="px-6 py-4">Assigned Doctor</th>
<th class="px-6 py-4">Schedule</th>
<th class="px-6 py-4">Status</th>
<th class="px-6 py-4 text-right">Emergency Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
<!-- Row 1 -->
<tr class="hover:bg-slate-50/80 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">SM</div>
<div>
<p class="text-sm font-bold text-slate-900 leading-none">Sarah Mitchell</p>
<p class="text-[11px] text-slate-500 mt-1">PID-88291 • General Checkup</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<img alt="Dr. Aris" class="w-6 h-6 rounded-full object-cover" data-alt="portrait of a confident middle-aged male doctor with a stethoscope in a modern clinic" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxRmG4oP0pMbbfpwMPAesBFDm4dAcPEbfvweQA4wX8F7lzSOg16YSSD4b7WvWU7aTFxlOwvUkx7bDh48Ypw3HBipWsxDFCZH9unPcVla3XDJdjfqj6PPeQjaKP1DU7sEZkLmW42dF13wuKCCO1IjmoolE0huDdqToOhh5BpF_5SFUsOD5XpdiLUp2qHi0pOCOb1tHT5OtcQYtwGHjlcLzwjB6oY4vNg15lbE_x0QmPoXrpoqkEqZr4sDnkEeajKwxKm-shx_mrHi8"/>
<span class="text-sm font-medium text-slate-700">Dr. Aris Thorne</span>
</div>
</td>
<td class="px-6 py-4">
<p class="text-sm font-bold text-slate-900">09:30 AM</p>
<p class="text-[11px] text-slate-500">Today, Room 402</p>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100">
<span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Confirmed
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="px-3 py-1.5 bg-white border border-slate-200 text-slate-700 text-xs font-bold rounded-md hover:bg-slate-50 transition-colors">Reschedule</button>
<button class="px-3 py-1.5 bg-red-50 text-red-600 text-xs font-bold rounded-md hover:bg-red-100 transition-colors">Cancel</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50/80 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Patient" class="w-10 h-10 rounded-full object-cover" data-alt="portrait of a senior man smiling gently, warm studio lighting, professional close-up" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyn46qHrY1I1Up_ogmHg1S03EfDHgWGfxRUFuRlPvGjA5bIZPMH3kN_FAIzskgjB0kgsvBYQHffUoIWIm6CYqnvJJWwNjVtLv_SPuS-tLm7e8BhY6KdkQLtVFZK9BHRZs0faqCoG13n0jzi2SeYZzm-p0g1bbMcqFN04u8h6ai2VC9mC67EjZJOeEDcBKBH499LAE0sWuBz6uXYSgW5mnm7MYpyPns6f-teilrVmYK8-Rm_NJfUtP_zv1hdlTpR7VNi128j4fxMgk"/>
<div>
<p class="text-sm font-bold text-slate-900 leading-none">James Wilson</p>
<p class="text-[11px] text-slate-500 mt-1">PID-90122 • Post-Op Review</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<img alt="Dr. Chen" class="w-6 h-6 rounded-full object-cover" data-alt="young female asian doctor with short hair wearing professional scrubs, bright medical background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuClDJwDXFlEvoXh1a8eQQU34B96Y_hK8Y2NENaLLuIzfmsgVZvAQaDaUD0lRiVwEoTEeXFNVceXhiB-Ld9RzJrGmd8XYHed3rX316IkNk32d9eWOJe868MLT3V2VMOPqmdn51cXQFpSv-3TFPGawDdZ6dsPjShCQp7OkTDZOusCtwUgyzDG9dsRYSra4NMjdqZz9m69-nkGLWscjLe1PO6W4bIAVPjbipjPHr4DtL2Tr6ECyhOqRrn0HYdTQ_5k2rivjdGCQpwSLi8"/>
<span class="text-sm font-medium text-slate-700">Dr. Elena Chen</span>
</div>
</td>
<td class="px-6 py-4">
<p class="text-sm font-bold text-slate-900">11:15 AM</p>
<p class="text-[11px] text-slate-500">Today, Room 105</p>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Completed
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<button class="p-2 text-slate-400 hover:text-slate-600 transition-colors">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50/80 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs">RK</div>
<div>
<p class="text-sm font-bold text-slate-900 leading-none">Robert Klose</p>
<p class="text-[11px] text-slate-500 mt-1">PID-11029 • Cardiology</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-2">
<img alt="Dr. Aris" class="w-6 h-6 rounded-full object-cover" data-alt="portrait of a young male doctor in white coat, bright clinical environment, soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbIaIgPHR7vCp0hRXXtG0zDnpmohCxO_QnH_0i9lA34JqjNKVIQPkKtX7VjJ1Q2UaY5CXdTsA52wAX6WWWIb_pOCvaCEw4jzKiTFRVsApZPt4APF71eSNUVShiAJDSj7XgfpzVDkF0sTXmk6ESZqVk4d1AYwMlpOmfkgUThtrROZKa8PJzao5haLmJZP9NkFglTtIIU5bv6a1owbIKEjqN-d-dNBgjDQXgE3HHmI6pJAyIEpZC4o60Gyc5tSTR5Bu99OwYYnuF9GI"/>
<span class="text-sm font-medium text-slate-700">Dr. Aris Thorne</span>
</div>
</td>
<td class="px-6 py-4">
<p class="text-sm font-bold text-slate-900">02:00 PM</p>
<p class="text-[11px] text-slate-500">Today, Room 402</p>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-50 text-red-700 border border-red-100">
<span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                        Canceled
                                    </span>
</td>
<td class="px-6 py-4 text-right text-[11px] text-slate-400 font-medium italic">
                                    Patient request via App
                                </td>
</tr>
</tbody>
</table>
</div>
<div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
<p class="text-xs font-medium text-slate-500 italic">Showing 1-10 of 42 appointments today</p>
<div class="flex gap-2">
<button class="w-8 h-8 rounded border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 rounded bg-blue-600 text-white flex items-center justify-center text-xs font-bold">1</button>
<button class="w-8 h-8 rounded border border-slate-200 flex items-center justify-center text-xs font-bold text-slate-600 hover:bg-slate-50">2</button>
<button class="w-8 h-8 rounded border border-slate-200 flex items-center justify-center text-xs font-bold text-slate-600 hover:bg-slate-50">3</button>
<button class="w-8 h-8 rounded border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Asymmetric Support Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Conflict Alerts -->
<div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
<div class="flex items-center justify-between mb-6">
<h4 class="font-bold text-slate-900 flex items-center gap-2">
<span class="material-symbols-outlined text-amber-500" data-icon="warning">warning</span>
                            Critical Schedule Conflicts
                        </h4>
<span class="text-[10px] font-bold text-slate-400 px-2 py-0.5 border border-slate-200 rounded">Review Required</span>
</div>
<div class="space-y-4">
<div class="flex items-start gap-4 p-4 rounded-xl bg-red-50/50 border border-red-100">
<div class="mt-1 w-2 h-2 rounded-full bg-red-500 shrink-0"></div>
<div class="flex-1">
<p class="text-sm font-bold text-slate-900">Dr. Aris Thorne - Double Booking</p>
<p class="text-xs text-slate-600 mt-0.5">Overlap detected at 02:00 PM today between Patients RK and LW.</p>
</div>
<button class="text-xs font-bold text-blue-600 hover:underline">Resolve Now</button>
</div>
<div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50/50 border border-amber-100">
<div class="mt-1 w-2 h-2 rounded-full bg-amber-500 shrink-0"></div>
<div class="flex-1">
<p class="text-sm font-bold text-slate-900">Equipment Shortage (MRI Suite 2)</p>
<p class="text-xs text-slate-600 mt-0.5">3 appointments scheduled for MRI-2, but maintenance is flagged for 03:00 PM.</p>
</div>
<button class="text-xs font-bold text-blue-600 hover:underline">Reschedule 1</button>
</div>
</div>
</div>
<!-- Quick Audit Log -->
<div class="bg-slate-900 text-white p-6 rounded-2xl shadow-xl flex flex-col">
<h4 class="font-bold mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-blue-400 text-sm" data-icon="history">history</span>
                        Recent Admin Actions
                    </h4>
<div class="space-y-6 relative before:absolute before:left-[7px] before:top-2 before:bottom-2 before:w-px before:bg-slate-700">
<div class="relative pl-6">
<div class="absolute left-0 top-1.5 w-3.5 h-3.5 rounded-full bg-blue-500 ring-4 ring-slate-900"></div>
<p class="text-xs font-bold">Rescheduled Appointment</p>
<p class="text-[10px] text-slate-400 mt-0.5">Admin updated PID-8821 for Dr. Thorne</p>
<p class="text-[10px] text-slate-500 mt-1">2 mins ago</p>
</div>
<div class="relative pl-6">
<div class="absolute left-0 top-1.5 w-3.5 h-3.5 rounded-full bg-slate-600 ring-4 ring-slate-900"></div>
<p class="text-xs font-bold">Batch Notification Sent</p>
<p class="text-[10px] text-slate-400 mt-0.5">Reminder SMS for Cardiology patients</p>
<p class="text-[10px] text-slate-500 mt-1">1 hour ago</p>
</div>
<div class="relative pl-6">
<div class="absolute left-0 top-1.5 w-3.5 h-3.5 rounded-full bg-red-500 ring-4 ring-slate-900"></div>
<p class="text-xs font-bold">Manual Cancellation</p>
<p class="text-[10px] text-slate-400 mt-0.5">Dr. Elena Chen - Emergency leave</p>
<p class="text-[10px] text-slate-500 mt-1">3 hours ago</p>
</div>
</div>
<button class="mt-auto w-full py-2 bg-slate-800 hover:bg-slate-700 rounded-lg text-[11px] font-bold transition-colors">View Full Activity Log</button>
</div>
</div>
</div>
</main>
<!-- FAB for quick emergency cancel (Only if strictly needed per instructions, contextual on Dashboard) -->
<button class="fixed bottom-8 right-8 w-14 h-14 bg-red-600 text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50 group">
<span class="material-symbols-outlined" data-icon="emergency_home">emergency_home</span>
<span class="absolute right-full mr-4 bg-slate-900 text-white px-3 py-1.5 rounded-lg text-xs font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">Emergency Broadcast</span>
</button>
</body></html>