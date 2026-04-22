<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>RDV Wise - Admin Notification Center</title>
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
                    "tertiary-fixed-dim": "#89ceff",
                    "on-primary-fixed": "#00174b",
                    "secondary-container": "#86f2e4",
                    "tertiary": "#005a82",
                    "error-container": "#ffdad6",
                    "surface-dim": "#d8dadc",
                    "on-primary": "#ffffff",
                    "inverse-surface": "#2d3133",
                    "inverse-primary": "#b4c5ff",
                    "error": "#ba1a1a",
                    "on-secondary-fixed-variant": "#005049",
                    "outline": "#737686",
                    "inverse-on-surface": "#eff1f3",
                    "on-surface": "#191c1e",
                    "tertiary-fixed": "#c9e6ff",
                    "primary": "#004ac6",
                    "surface-container-high": "#e6e8ea",
                    "on-tertiary": "#ffffff",
                    "surface-variant": "#e0e3e5",
                    "surface-container-lowest": "#ffffff",
                    "surface-tint": "#0053db",
                    "on-tertiary-container": "#e4f2ff",
                    "on-primary-container": "#eeefff",
                    "on-error-container": "#93000a",
                    "surface-container-low": "#f2f4f6",
                    "primary-fixed": "#dbe1ff",
                    "on-secondary-fixed": "#00201d",
                    "outline-variant": "#c3c6d7",
                    "secondary-fixed": "#89f5e7",
                    "primary-container": "#2563eb",
                    "on-error": "#ffffff",
                    "background": "#f7f9fb",
                    "on-tertiary-fixed-variant": "#004c6e",
                    "on-secondary-container": "#006f66",
                    "tertiary-container": "#0074a6",
                    "on-primary-fixed-variant": "#003ea8",
                    "on-background": "#191c1e",
                    "surface-bright": "#f7f9fb",
                    "surface": "#f7f9fb",
                    "on-secondary": "#ffffff",
                    "surface-container-highest": "#e0e3e5",
                    "secondary-fixed-dim": "#6bd8cb",
                    "primary-fixed-dim": "#b4c5ff",
                    "secondary": "#006a61",
                    "surface-container": "#eceef0",
                    "on-tertiary-fixed": "#001e2f",
                    "on-surface-variant": "#434655"
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopNavBar -->
<header class="fixed top-0 z-50 w-full bg-[#F8FAFC] dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 shadow-sm flex justify-between items-center px-6 py-3 font-['Manrope'] antialiased">
<div class="flex items-center gap-8">
<span class="text-xl font-extrabold text-[#2563EB] dark:text-blue-400 tracking-tight">RDV Wise</span>
<div class="relative hidden md:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" data-icon="search">search</span>
<input class="pl-10 pr-4 py-1.5 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-container/20 w-64" placeholder="Search notifications..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors active:scale-95 duration-150 relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<button class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors active:scale-95 duration-150">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="flex items-center gap-3 pl-4 border-l border-slate-200 ml-2">
<img alt="Admin profile photo" class="w-8 h-8 rounded-full border-2 border-primary-container" data-alt="professional portrait of a hospital administrator in business attire, clean background, soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApK3QseST_WlZTlCWB0G7S_e544N3UAsxYHYt2dtMRpAQyJyElqH2CPnkbiiZebTWjZ8je97l9CeVxENRiMPEafixyWH1ZZmwqamfkxuUK_FeO7Y-5_N6w-UkPAkbf2gWFUM7ba2moragKQaXIoaZJuxbg3syn2v1YXloERInH58UxlXN1bULOX0t_cfkRO6RP4OJ_PthdIBX6Cx2uvnh-adUlYjPUyPsYPQjG6p28kkFdUFh6M4C9xAGeqt615jWp1YG8I0XQfRo"/>
</div>
</div>
</header>
<!-- Sidebar Wrapper -->
<div class="flex pt-[60px]">
<!-- SideNavBar -->
<aside class="h-[calc(100vh-60px)] w-64 border-r fixed left-0 bg-white dark:bg-slate-900 border-slate-200 dark:border-slate-800 flex flex-col p-4 space-y-2 font-['Inter'] text-sm z-40">
<div class="mb-6 px-2">
<h2 class="text-lg font-bold text-slate-900 dark:text-slate-100">Admin Portal</h2>
<p class="text-xs text-slate-500">rdv-wise-system</p>
</div>
<nav class="flex-1 space-y-1">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-all cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="monitoring">monitoring</span>
<span>Statistics</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-all cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="medical_services">medical_services</span>
<span>Doctors</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-all cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span>Patients</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-all cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
<span>Appointments</span>
</a>
<a class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 dark:bg-blue-900/30 text-[#2563EB] dark:text-blue-300 font-semibold rounded-lg cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="notifications_active">notifications_active</span>
<span>Notifications</span>
</a>
</nav>
<div class="pt-4 border-t border-slate-100">
<a class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-all cursor-pointer" href="#">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
<span>Logout</span>
</a>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 ml-64 p-8 min-h-screen">
<!-- Header & Actions -->
<div class="flex justify-between items-end mb-8">
<div>
<h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Notification Center</h1>
<p class="text-slate-500">Monitor and manage all system communication</p>
</div>
<button class="flex items-center gap-2 bg-primary-container hover:bg-primary-container/90 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg shadow-primary-container/20 transition-all active:scale-95">
<span class="material-symbols-outlined text-[20px]" data-icon="campaign">campaign</span>
                    Broadcast Notification
                </button>
</div>
<!-- Bento Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-blue-50 rounded-lg text-primary">
<span class="material-symbols-outlined" data-icon="drafts">drafts</span>
</div>
<span class="text-xs font-bold text-slate-400">TOTAL</span>
</div>
<div class="text-2xl font-bold text-slate-900">1,284</div>
<p class="text-xs text-slate-500 mt-1">Across all categories</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-amber-50 rounded-lg text-amber-600">
<span class="material-symbols-outlined" data-icon="mark_email_unread">mark_email_unread</span>
</div>
<span class="text-xs font-bold text-slate-400">UNREAD</span>
</div>
<div class="text-2xl font-bold text-slate-900">12</div>
<p class="text-xs text-amber-600 mt-1">Requires attention</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-emerald-50 rounded-lg text-emerald-600">
<span class="material-symbols-outlined" data-icon="person_check">person_check</span>
</div>
<span class="text-xs font-bold text-slate-400">DELIVERED</span>
</div>
<div class="text-2xl font-bold text-slate-900">99.8%</div>
<p class="text-xs text-emerald-600 mt-1">Successful delivery rate</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
<div class="flex justify-between items-start mb-4">
<div class="p-2 bg-rose-50 rounded-lg text-rose-600">
<span class="material-symbols-outlined" data-icon="report">report</span>
</div>
<span class="text-xs font-bold text-slate-400">SYSTEM CRITICAL</span>
</div>
<div class="text-2xl font-bold text-slate-900">0</div>
<p class="text-xs text-slate-500 mt-1">System healthy</p>
</div>
</div>
<!-- Content Container -->
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
<!-- Filters -->
<div class="px-6 py-4 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
<div class="flex bg-slate-100 p-1 rounded-xl w-fit">
<button class="px-4 py-1.5 text-sm font-semibold bg-white text-primary rounded-lg shadow-sm">All</button>
<button class="px-4 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-700">Doctor Alerts</button>
<button class="px-4 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-700">Patient Alerts</button>
<button class="px-4 py-1.5 text-sm font-medium text-slate-500 hover:text-slate-700">System</button>
</div>
<div class="flex items-center gap-2">
<button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50">
<span class="material-symbols-outlined text-[18px]" data-icon="filter_list">filter_list</span>
                            Sort by: Newest
                        </button>
<button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50">
                            Mark all as read
                        </button>
</div>
</div>
<!-- Notification Feed -->
<div class="divide-y divide-slate-100">
<!-- Notification Item 1: Doctor Alert -->
<div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors">
<div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="medical_services">medical_services</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h3 class="font-bold text-slate-900">New Practitioner Registration</h3>
<span class="text-xs font-medium text-slate-400">2 mins ago</span>
</div>
<p class="text-sm text-slate-600 mb-3">Dr. Sarah Jenkins has submitted their credentials for verification. Please review the documentation in the pending doctor portal.</p>
<div class="flex items-center gap-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-blue-100 text-blue-700">Doctor Alerts</span>
<span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600">
<span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                    Unread
                                </span>
</div>
</div>
<div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all" title="Mark as read">
<span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all" title="Delete">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</div>
<!-- Notification Item 2: System -->
<div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors">
<div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="settings_suggest">settings_suggest</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h3 class="font-bold text-slate-900">System Maintenance Scheduled</h3>
<span class="text-xs font-medium text-slate-400">1 hour ago</span>
</div>
<p class="text-sm text-slate-600 mb-3">The system will undergo routine maintenance on Sunday, Oct 24th from 02:00 to 04:00 AM UTC. Service may be intermittent.</p>
<div class="flex items-center gap-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700">System</span>
<span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400">
                                    Read
                                </span>
</div>
</div>
<div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all" title="Delete">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</div>
<!-- Notification Item 3: Patient Alert -->
<div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors">
<div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="person_alert">person_alert</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h3 class="font-bold text-slate-900">Emergency Contact Update</h3>
<span class="text-xs font-medium text-slate-400">4 hours ago</span>
</div>
<p class="text-sm text-slate-600 mb-3">Patient ID #8842 has requested an immediate update to their emergency contact information following a change in residency.</p>
<div class="flex items-center gap-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-teal-100 text-teal-700">Patient Alerts</span>
<span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600">
<span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                    Unread
                                </span>
</div>
</div>
<div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all" title="Mark as read">
<span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all" title="Delete">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</div>
<!-- Notification Item 4: Doctor Alert -->
<div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors border-l-4 border-error">
<div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="warning">warning</span>
</div>
<div class="flex-1">
<div class="flex justify-between items-start mb-1">
<h3 class="font-bold text-slate-900">Overdue Lab Results - Urgent</h3>
<span class="text-xs font-medium text-slate-400">Today, 09:15 AM</span>
</div>
<p class="text-sm text-slate-600 mb-3">Dr. Miller has 5 pending lab result reviews that are over 48 hours overdue. System-triggered reminder has been sent to the practitioner.</p>
<div class="flex items-center gap-4">
<span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-rose-100 text-rose-700">Doctor Alerts</span>
<span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600">
<span class="w-2 h-2 rounded-full bg-amber-600"></span>
                                    Unread
                                </span>
</div>
</div>
<div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all" title="Mark as read">
<span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
</button>
<button class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all" title="Delete">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</div>
</div>
<!-- Footer Load More -->
<div class="p-4 bg-slate-50/50 flex justify-center">
<button class="text-sm font-semibold text-primary hover:underline transition-all">Load older notifications</button>
</div>
</div>
<!-- Asymmetric Support Grid -->
<div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
<div class="lg:col-span-2 bg-gradient-to-br from-primary to-blue-700 p-8 rounded-2xl text-white relative overflow-hidden">
<div class="relative z-10">
<h2 class="text-2xl font-bold mb-2">Automate Your Workflow</h2>
<p class="text-blue-100 mb-6 max-w-md">Set up smart triggers to automatically notify doctors or patients based on specific appointment events or diagnostic updates.</p>
<button class="bg-white text-primary px-6 py-2 rounded-lg font-bold hover:bg-blue-50 transition-colors">Configure Triggers</button>
</div>
<span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[180px] opacity-10 pointer-events-none" data-icon="auto_awesome">auto_awesome</span>
</div>
<div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-center items-center text-center">
<div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-[32px]" data-icon="shield_person">shield_person</span>
</div>
<h3 class="font-bold text-slate-900 mb-2">Security Audit Log</h3>
<p class="text-sm text-slate-500 mb-4">Review login attempts and system access logs for administrative security compliance.</p>
<button class="text-sm font-bold text-primary hover:text-primary/80 transition-colors">View Security Logs →</button>
</div>
</div>
</main>
</div>
</body></html>