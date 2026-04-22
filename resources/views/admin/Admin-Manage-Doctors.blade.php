<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Clinical Clarity - Manage Doctors</title>
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
<body class="bg-background text-on-background min-h-screen">
<!-- SideNavBar -->
<aside class="h-screen w-64 fixed left-0 top-0 rounded-none bg-slate-50 border-r border-slate-200 z-50 flex flex-col py-4 space-y-2 font-['Inter'] text-sm antialiased">
<div class="px-6 mb-8">
<h1 class="font-['Manrope'] font-extrabold text-blue-600 text-xl tracking-tight">Clinical Clarity</h1>
<p class="text-xs text-slate-500 mt-1 uppercase tracking-wider font-semibold">Admin Dashboard</p>
</div>
<nav class="flex-1 px-3 space-y-1">
<a class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="leaderboard">leaderboard</span>
                Statistics
            </a>
<a class="flex items-center px-3 py-2.5 bg-blue-50 text-blue-700 font-semibold border-r-4 border-blue-600 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="medical_services">medical_services</span>
                Doctors
            </a>
<a class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="person_filled">person_filled</span>
                Patients
            </a>
<a class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="calendar_today">calendar_today</span>
                Appointments
            </a>
</nav>
<div class="px-3 pt-4 pb-4 border-t border-slate-200">
<button class="w-full flex items-center justify-center gap-2 bg-primary-container text-white py-2.5 rounded-lg font-semibold hover:opacity-90 transition-all active:scale-95 shadow-md">
<span class="material-symbols-outlined text-sm" data-icon="add">add</span>
                Add New Record
            </button>
</div>
<div class="px-3 space-y-1 mt-auto">
<a class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="help">help</span>
                Support
            </a>
<a class="flex items-center px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all duration-150 transform hover:translate-x-1" href="#">
<span class="material-symbols-outlined mr-3" data-icon="logout">logout</span>
                Log Out
            </a>
</div>
</aside>
<!-- Main Content Area -->
<main class="ml-64 min-h-screen">
<!-- TopAppBar -->
<header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-slate-200 shadow-sm flex items-center justify-between px-6 h-16 w-full">
<div class="flex items-center gap-4 flex-1">
<div class="relative w-full max-w-md">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 border-transparent focus:bg-white focus:ring-2 focus:ring-blue-600/20 rounded-lg text-sm transition-all outline-none" placeholder="Search for doctors, specialties..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors relative cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors cursor-pointer active:opacity-70">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<div class="h-8 w-px bg-slate-200 mx-1"></div>
<div class="flex items-center gap-3">
<span class="text-sm font-semibold text-slate-700">Admin</span>
<img alt="Administrator Profile" class="w-10 h-10 rounded-full object-cover border border-slate-200" data-alt="professional portrait of a medical administrator in a modern hospital setting, confident expression, soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuArFvL_shIyOfjytRqSKa7M_cRFnAoyQe5zNr5FKxECVfbGk9N0zwUFMm0NikhDl3Urske6v2i4PgUrjEQIgRURO4dzuyGd0tqWHlVzmOKWhacJnu6i2VAtgvb8BhMNAN7YrkB5ofuHEQZiGo1-LDucqqU2u1yBjjU3otOeGejBWgdW68iOEeCPRyyFUvXopWhCNe5zQrzvXKeqPtPxPOHvyeJGP4_BkfTcaconfYI19Z4XKpyOL_1d4jUSabj9uRtK9vNp0djTdSw"/>
</div>
</div>
</header>
<!-- Content Canvas -->
<div class="p-8">
<!-- Header Section -->
<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
<div>
<h2 class="text-3xl font-extrabold text-slate-900 tracking-tight font-headline">Manage Doctors</h2>
<p class="text-slate-500 mt-1">Directory of all practicing medical professionals and consultants.</p>
</div>
<div class="flex items-center gap-3">
<button class="px-4 py-2.5 bg-white border border-slate-200 text-slate-700 font-semibold rounded-lg flex items-center gap-2 hover:bg-slate-50 transition-all shadow-sm">
<span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
                        Filter
                    </button>
<button class="px-5 py-2.5 bg-primary-container text-white font-bold rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-lg active:scale-95">
<span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                        Add New Doctor
                    </button>
</div>
</div>
<!-- Bento Statistics Row -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
<div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-2xl" data-icon="groups">groups</span>
</div>
<div>
<p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Total Doctors</p>
<p class="text-2xl font-extrabold text-slate-900">1,248</p>
</div>
</div>
<div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-2xl" data-icon="verified">verified</span>
</div>
<div>
<p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Verified</p>
<p class="text-2xl font-extrabold text-slate-900">1,192</p>
</div>
</div>
<div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-2xl" data-icon="pending_actions">pending_actions</span>
</div>
<div>
<p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Pending</p>
<p class="text-2xl font-extrabold text-slate-900">56</p>
</div>
</div>
<div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
<div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center">
<span class="material-symbols-outlined text-2xl" data-icon="star">star</span>
</div>
<div>
<p class="text-xs text-slate-500 font-bold uppercase tracking-wider">Top Rated</p>
<p class="text-2xl font-extrabold text-slate-900">84</p>
</div>
</div>
</div>
<!-- Doctor Data Table Section -->
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
<!-- Doctor Row 1 -->
<tr class="hover:bg-slate-50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Doctor Avatar" class="w-10 h-10 rounded-lg object-cover" data-alt="portrait of a confident male doctor in his 40s wearing a white lab coat and stethoscope, studio lighting, clean background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBj7siMUEesdT61YaP7MGvH5uFmVBPRPP768qhcHOGZGkB5qdGyCLVAlb3xY4o0Hl-4ci9CHI_x4bsbGR-0QSHaP69OlChQTcGfK2tcNp6LctYZXz9T0OV1nhdqpOLDpFquONNH8rgB05OyU_iOrH6dgUI7uGbYC40TH57VbvHpIdwwxAlWJbsHZx9kyI2QbBLhDFV-07UJeemctE94JMUgS1v3CU61KWtG13hlXv2LMc95sqU7wWcP1B1FPmYPf6jAJMT3wVCnjnA"/>
<div>
<p class="font-bold text-slate-900">Dr. Julian Sterling</p>
<p class="text-xs text-slate-500">ID: DOC-4921</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-semibold rounded-full border border-blue-100">Cardiology</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1.5 text-emerald-600 font-semibold text-sm">
<span class="material-symbols-outlined text-base" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
                                        Verified
                                    </div>
</td>
<td class="px-6 py-4">
<div class="text-sm">
<p class="text-slate-900 font-medium">julian.s@clinic.com</p>
<p class="text-slate-500 text-xs">+1 (555) 012-3456</p>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-end gap-2">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Remove">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Doctor Row 2 -->
<tr class="hover:bg-slate-50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Doctor Avatar" class="w-10 h-10 rounded-lg object-cover" data-alt="smiling female doctor with professional demeanor, wearing modern spectacles and white coat, bright clinical setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCffHAzHUOWhWjGsObownyuY-bFx6fz9Yh1OslkQb9C-_CXfTtzyHu_xMGiFQDvEJzWruPUvv4tmy1K8c7tnzmoeBC1ShwyvsiGmaP9lSVDpMt_io8FFIwcCfRdFhBDt9Vpp22V5N1OCCuySfn_9o2HkTjjqv8KxTyjh_9F35gWyBKgRgWho37qvIDfnyjm6SVVSRBsK8tSLZvWwliDmxmagBgrFxlmgKc5b-YR28qKpUb9J2ikQz3nTwHOeDDCcyGfo7MBwvCNWNE"/>
<div>
<p class="font-bold text-slate-900">Dr. Elena Rodriguez</p>
<p class="text-xs text-slate-500">ID: DOC-2287</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-teal-50 text-teal-700 text-xs font-semibold rounded-full border border-teal-100">Neurology</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1.5 text-amber-600 font-semibold text-sm">
<span class="material-symbols-outlined text-base" data-icon="error" style="font-variation-settings: 'FILL' 1;">error</span>
                                        Pending
                                    </div>
</td>
<td class="px-6 py-4">
<div class="text-sm">
<p class="text-slate-900 font-medium">e.rodriguez@clinic.com</p>
<p class="text-slate-500 text-xs">+1 (555) 987-6543</p>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-end gap-2">
<button class="px-3 py-1.5 bg-emerald-600 text-white text-xs font-bold rounded-lg hover:bg-emerald-700 transition-colors shadow-sm">Verify</button>
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Remove">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Doctor Row 3 -->
<tr class="hover:bg-slate-50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Doctor Avatar" class="w-10 h-10 rounded-lg object-cover" data-alt="middle-aged male surgeon in blue medical scrubs, looking focused and professional, blurred operating room background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAn-qo5lHZC6nZ7BNgy5QptNHpno55z4ZmskcYZ61XPfM1Drd-sRB2Mg5eAMy-ICmzPWKL4IncGtwbP_nNdKeDLEl7UQI7dTxUYVVGyLRyRu5O_CB8a4Tk5daumZg4nXq9lvBbteekZXx6WDfXfvA-1ZgSomMyAcBrCt16LDAr2JBOSwTurWvUkvdcxaPre_OocKmrqF-v-SAotmS1qunwepVZ5KlnKyNr1NLtmbuMtldKhQY3U3YYVXuGIa9xQpC-AL0BebsIjZmk"/>
<div>
<p class="font-bold text-slate-900">Dr. Michael Chen</p>
<p class="text-xs text-slate-500">ID: DOC-8104</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-sky-50 text-sky-700 text-xs font-semibold rounded-full border border-sky-100">Pediatrics</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1.5 text-emerald-600 font-semibold text-sm">
<span class="material-symbols-outlined text-base" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
                                        Verified
                                    </div>
</td>
<td class="px-6 py-4">
<div class="text-sm">
<p class="text-slate-900 font-medium">m.chen@clinic.com</p>
<p class="text-slate-500 text-xs">+1 (555) 456-7890</p>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-end gap-2">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Remove">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
<!-- Doctor Row 4 -->
<tr class="hover:bg-slate-50 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Doctor Avatar" class="w-10 h-10 rounded-lg object-cover" data-alt="professional female specialist in dermatologist setting, holding medical chart, warm natural light, friendly expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBCKS_5LhI9E8bWDWpa_VBUrYGPlbOrFCUs4sZjyS4RBE-yjKFMFer8OJDLN9dpYDhM4WW-Vd2vLKPp6EJ3S1jHJsPUFPpdPeU0OhNuKX9im1JP8ER8eSJwkrgnaVY2i5eiG1aP393fkTm7ksFiEyrsZbZj7ulDQeudVIL9AGilCwQzqFC4vWGJtQt5gghlnqMhPiFBxyhxg3GkI3HhpAMj7KzI7CHhGOfNuWpRGvsNCNuFa2wZNLYVV6yvwgdQI1iQJjtItifaBHI"/>
<div>
<p class="font-bold text-slate-900">Dr. Sarah Thompson</p>
<p class="text-xs text-slate-500">ID: DOC-1193</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="px-3 py-1 bg-purple-50 text-purple-700 text-xs font-semibold rounded-full border border-purple-100">Dermatology</span>
</td>
<td class="px-6 py-4">
<div class="flex items-center gap-1.5 text-emerald-600 font-semibold text-sm">
<span class="material-symbols-outlined text-base" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
                                        Verified
                                    </div>
</td>
<td class="px-6 py-4">
<div class="text-sm">
<p class="text-slate-900 font-medium">s.thompson@clinic.com</p>
<p class="text-slate-500 text-xs">+1 (555) 234-5678</p>
</div>
</td>
<td class="px-6 py-4">
<div class="flex items-center justify-end gap-2">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
<span class="material-symbols-outlined" data-icon="edit">edit</span>
</button>
<button class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Remove">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="bg-slate-50 px-6 py-4 border-t border-slate-200 flex items-center justify-between">
<p class="text-sm text-slate-500 font-medium">Showing <span class="text-slate-900">1 to 4</span> of <span class="text-slate-900">1,248</span> doctors</p>
<div class="flex items-center gap-1">
<button class="p-2 text-slate-400 hover:bg-white hover:text-slate-700 rounded transition-all">
<span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-8 h-8 flex items-center justify-center bg-primary-container text-white text-sm font-bold rounded">1</button>
<button class="w-8 h-8 flex items-center justify-center text-slate-600 text-sm font-bold hover:bg-white rounded transition-all">2</button>
<button class="w-8 h-8 flex items-center justify-center text-slate-600 text-sm font-bold hover:bg-white rounded transition-all">3</button>
<span class="px-1 text-slate-400">...</span>
<button class="w-8 h-8 flex items-center justify-center text-slate-600 text-sm font-bold hover:bg-white rounded transition-all">312</button>
<button class="p-2 text-slate-400 hover:bg-white hover:text-slate-700 rounded transition-all">
<span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
</main>
</body></html>