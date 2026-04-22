<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Manage Patients - Clinical Clarity</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen">
<!-- SideNavBar Shell -->
<aside class="h-screen w-64 fixed left-0 top-0 rounded-none bg-slate-50 border-r border-slate-200 flex flex-col py-4 space-y-2 z-50">
<div class="px-6 mb-8">
<h1 class="font-['Manrope'] font-extrabold text-blue-600 text-xl tracking-tight">Clinical Clarity</h1>
<p class="text-[10px] text-slate-500 uppercase tracking-widest font-semibold mt-1">Medical Admin Portal</p>
</div>
<nav class="flex-1 flex flex-col space-y-1">
<a class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="leaderboard">leaderboard</span>
<span class="font-['Inter'] text-sm">Statistics</span>
</a>
<a class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="medical_services">medical_services</span>
<span class="font-['Inter'] text-sm">Doctors</span>
</a>
<!-- Active State: Patients -->
<a class="flex items-center px-6 py-3 bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600 transition-all duration-150 transform translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="person_filled" style="font-variation-settings: 'FILL' 1;">person_filled</span>
<span class="font-['Inter'] text-sm">Patients</span>
</a>
<a class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="calendar_today">calendar_today</span>
<span class="font-['Inter'] text-sm">Appointments</span>
</a>
</nav>
<div class="px-4 py-4">
<button class="w-full py-2.5 bg-blue-600 text-white rounded-lg font-semibold text-sm shadow-md hover:bg-blue-700 transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-lg" data-icon="add">add</span>
                Add New Record
            </button>
</div>
<div class="border-t border-slate-200 pt-4 flex flex-col space-y-1">
<a class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 transition-all" href="#">
<span class="material-symbols-outlined mr-3" data-icon="help">help</span>
<span class="font-['Inter'] text-sm">Support</span>
</a>
<a class="flex items-center px-6 py-3 text-slate-600 hover:bg-slate-100 transition-all" href="#">
<span class="material-symbols-outlined mr-3" data-icon="logout">logout</span>
<span class="font-['Inter'] text-sm">Log Out</span>
</a>
</div>
</aside>
<!-- TopAppBar Shell -->
<header class="bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm flex items-center justify-between px-6 h-16 w-full z-40 sticky top-0 pl-[272px]">
<div class="flex items-center flex-1 max-w-xl">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-transparent rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Search patients by name, ID or record..." type="text"/>
</div>
</div>
<div class="flex items-center space-x-4">
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="h-8 w-px bg-slate-200 mx-2"></div>
<div class="flex items-center gap-3 pl-2">
<div class="text-right">
<p class="text-xs font-bold text-slate-900 leading-none">Admin User</p>
<p class="text-[10px] text-slate-500 mt-1 uppercase tracking-tighter">Clinical Admin</p>
</div>
<img alt="Administrator Profile" class="w-9 h-9 rounded-full object-cover border border-slate-200" data-alt="professional portrait of a hospital administrator in white medical coat with stethoscope in a bright modern clinical setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD7a_2QZ9AKrMwUa_aZKES6lxOUZQqVpgFP_LEEIjyAZ8acKJcbdxnF5HNjKekQ730p6uTHms5dUYkdRz1kv9jutQH6F0P1CAS3fy6nuSwg7tvAHoKfUdppFBzch1OltTubzKWu-6ba9GEUQCu2ONaAiEPj1L6jxK0PCSCm_kUa9G1RlXW4GPUWbvkzv9WcLc0xyfulYKNL3a1pFBYZ55LI-_RsCeDdDrH3t9a_b3hZXruJyVW9Gfwq8bcN_gdOm9YVTfECcONmyrM"/>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="ml-64 p-8">
<div class="max-w-7xl mx-auto">
<!-- Page Header -->
<div class="flex items-end justify-between mb-8">
<div>
<nav class="flex items-center text-xs text-slate-500 mb-2 gap-2">
<a class="hover:text-blue-600" href="#">Dashboard</a>
<span class="material-symbols-outlined text-[14px]" data-icon="chevron_right">chevron_right</span>
<span class="font-semibold text-slate-900">Patient Management</span>
</nav>
<h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Patient Directory</h2>
<p class="text-slate-500 mt-1">Manage and monitor records for 1,284 registered patients.</p>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-semibold flex items-center gap-2 hover:bg-slate-50 transition-all shadow-sm">
<span class="material-symbols-outlined text-lg" data-icon="filter_list">filter_list</span>
                        Filter List
                    </button>
<button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-semibold flex items-center gap-2 hover:bg-slate-50 transition-all shadow-sm">
<span class="material-symbols-outlined text-lg" data-icon="download">download</span>
                        Export Data
                    </button>
</div>
</div>
<!-- Bento Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
<div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="groups">groups</span>
</div>
<div>
<p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Total Patients</p>
<p class="text-2xl font-bold text-slate-900 leading-tight">1,284</p>
</div>
</div>
<div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-secondary-container/20 text-secondary rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="calendar_add_on">calendar_add_on</span>
</div>
<div>
<p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">New This Week</p>
<p class="text-2xl font-bold text-slate-900 leading-tight">42</p>
</div>
</div>
<div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-tertiary-container/10 text-tertiary-container rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="medical_information">medical_information</span>
</div>
<div>
<p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Critical Alerts</p>
<p class="text-2xl font-bold text-error leading-tight">7</p>
</div>
</div>
<div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-slate-50 text-slate-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined" data-icon="history">history</span>
</div>
<div>
<p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Avg. Stay</p>
<p class="text-2xl font-bold text-slate-900 leading-tight">3.2d</p>
</div>
</div>
</div>
<!-- Table Section -->
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
<!-- Patient Row 1 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
<img alt="Sarah Jenkins" class="w-full h-full object-cover" data-alt="portrait of a professional middle aged woman with a gentle smile in soft natural daylight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBs9ccWRu6cYL9ybQRS1bUXwkcJyIo8mmBIZldSqPxkwAfQ0a3NsEWaltTSirt0FV_WlRa5gyPdzNtfVRcZJVuMJ6BrBJ_ks83m6YDvMtbfTXTs6OTREh9KY5G7yKjMcbJex60rcMzzVp9ghGmwg-WHJW3IGCWe9WfPiMU3iB3FWkyodjc-KV8Ee2zpHuNYrWjUIOQaxBI2rlUAyNcZF3G55Jr-0pQcg4MsUX696fH40L-i4lZ9No88AB63JNwchwcR3R_IiO9mEPQ"/>
</div>
<div>
<p class="font-bold text-slate-900">Sarah Jenkins</p>
<p class="text-xs text-slate-500">sarah.j@example.com</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="font-mono text-sm text-slate-600 bg-slate-100 px-2 py-1 rounded">PT-2023-0041</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600">
                                Oct 24, 2023
                            </td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View History">
<span class="material-symbols-outlined" data-icon="history_edu">history_edu</span>
</button>
<button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors" title="Manage Account">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Patient Row 2 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
<img alt="Michael Chen" class="w-full h-full object-cover" data-alt="portrait of an asian man with glasses wearing a casual sweater against a clean grey background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-Xu1lb1yhNmbgUE-Hfx8P8p0Ug-SK-vnKYzSc-nN8OWeS6-4qYM9nXN8G-D6tret5XHhIdtumyeLxqDaJW5iMbfqm0nIIyn81NHylShebof1VFerG8oIrmXa9JY0n6SvS-Lw5ca5WvE-HeRzhv-89rdU8_USkRx4QQNSZ7PSMvvzrFJpgFT84-48Nk0bTSgjsiyTV4vAD5-3DzNt2PoJaiOgttSPWDYe1bBMrTQAg0s2fCI2pFCbr0LsJSalDVlEVAZp_KqlvO1E"/>
</div>
<div>
<p class="font-bold text-slate-900">Michael Chen</p>
<p class="text-xs text-slate-500">m.chen@hospital.com</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="font-mono text-sm text-slate-600 bg-slate-100 px-2 py-1 rounded">PT-2023-0892</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600">
                                Oct 26, 2023
                            </td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    Pending
                                </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View History">
<span class="material-symbols-outlined" data-icon="history_edu">history_edu</span>
</button>
<button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors" title="Manage Account">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Patient Row 3 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
<img alt="Elena Rodriguez" class="w-full h-full object-cover" data-alt="portrait of a confident black woman with natural hair in a clean professional environment" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCE6UAwH-KabJ_S_ECt10au8lYKo2hMYCv2U8OeDavDZ3ef1WMHuVUosFNPZKQ8CoCykwhKiMnn4jsHfizraR72p9zLfRwZOZY--SHDMs7gknwmHoxtD6tpt4JFkhJ0yXI76XpByGduPo6FVJSPKSpl9DYRMFQ2mJlykSVkUYD0ngjX33sLgOAcu2Y2v1cgRC3GJ9iv76BmTzOP3U74uu2kzzfTZsI1wCEDid80RT0ujJ_qCDdu2kBl6bjZO0c1CWcuxgYmvdVysXU"/>
</div>
<div>
<p class="font-bold text-slate-900">Elena Rodriguez</p>
<p class="text-xs text-slate-500">e.rodriguez@domain.org</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="font-mono text-sm text-slate-600 bg-slate-100 px-2 py-1 rounded">PT-2023-0115</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600">
                                Oct 15, 2023
                            </td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Active
                                </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View History">
<span class="material-symbols-outlined" data-icon="history_edu">history_edu</span>
</button>
<button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors" title="Manage Account">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</td>
</tr>
<!-- Patient Row 4 -->
<tr class="hover:bg-slate-50 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
<img alt="David Wilson" class="w-full h-full object-cover" data-alt="portrait of a young adult man with short hair looking thoughtfully away from the camera" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgHTg8sTmo2Sq7qfPbyauEzMUyPIfelcTkGjlipQttcd8d-VeNABtB8IqINRPbaXHUlljEtScM8y56EnUkpri_szbFWJ0iBf_3jTPxHL-9WuhrD2JMEK3bzViOH4Hu6zRIq4T8MGjYXqDF2OW8IbeeErTgRwieTo279o0uby9pHWZo3vsj4Y_s0DhxLszeUboll0SwuAziAZ6mbASZkLLPWtxLuJGsfQ_BMWZoosQrS8gJruMjW6_uWE_7CB1Gwgyb6khi2KMtc9Y"/>
</div>
<div>
<p class="font-bold text-slate-900">David Wilson</p>
<p class="text-xs text-slate-500">d.wilson@webmail.com</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="font-mono text-sm text-slate-600 bg-slate-100 px-2 py-1 rounded">PT-2023-1102</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600">
                                Sept 29, 2023
                            </td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                    Discharged
                                </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View History">
<span class="material-symbols-outlined" data-icon="history_edu">history_edu</span>
</button>
<button class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg transition-colors" title="Manage Account">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
<!-- Pagination Footer -->
<div class="bg-slate-50 px-6 py-4 border-t border-slate-200 flex items-center justify-between">
<p class="text-sm text-slate-500">Showing <span class="font-semibold text-slate-900">1 to 4</span> of <span class="font-semibold text-slate-900">1,284</span> entries</p>
<div class="flex items-center gap-1">
<button class="p-2 rounded hover:bg-slate-200 text-slate-400 disabled:opacity-50" disabled="">
<span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
</button>
<button class="px-3 py-1 text-sm font-semibold bg-blue-600 text-white rounded">1</button>
<button class="px-3 py-1 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded">2</button>
<button class="px-3 py-1 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded">3</button>
<span class="px-2 text-slate-400">...</span>
<button class="px-3 py-1 text-sm font-semibold text-slate-600 hover:bg-slate-200 rounded">32</button>
<button class="p-2 rounded hover:bg-slate-200 text-slate-600">
<span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Contextual Help / Shortcuts Card -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="bg-blue-600 rounded-xl p-6 text-white flex items-center gap-6 shadow-lg shadow-blue-200">
<div class="flex-1">
<h3 class="text-lg font-bold mb-1">Import Batch Patient Records</h3>
<p class="text-blue-100 text-sm mb-4">Upload clinical data from CSV or HL7 standard files directly into the system.</p>
<button class="bg-white text-blue-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-blue-50 transition-colors">Start Import</button>
</div>
<div class="hidden lg:block">
<span class="material-symbols-outlined text-6xl opacity-20" data-icon="upload_file">upload_file</span>
</div>
</div>
<div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm flex items-center gap-6">
<div class="flex-1">
<h3 class="text-lg font-bold text-slate-900 mb-1">Quick Patient Search</h3>
<p class="text-slate-500 text-sm mb-4">Use keyboard shortcut <kbd class="px-1.5 py-0.5 rounded bg-slate-100 border border-slate-200 text-xs font-mono">⌘ + K</kbd> to focus the global search bar at any time.</p>
<div class="flex gap-2">
<span class="px-2 py-1 rounded bg-slate-50 border border-slate-100 text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Keyboard Hint</span>
<span class="px-2 py-1 rounded bg-slate-50 border border-slate-100 text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Fast Navigation</span>
</div>
</div>
</div>
</div>
</div>
</main>
</body></html>