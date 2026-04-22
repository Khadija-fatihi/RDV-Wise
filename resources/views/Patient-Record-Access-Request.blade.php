<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "outline-variant": "#c3c6d7",
                    "on-error": "#ffffff",
                    "on-background": "#191c1e",
                    "surface": "#f7f9fb",
                    "on-tertiary": "#ffffff",
                    "surface-bright": "#f7f9fb",
                    "inverse-on-surface": "#eff1f3",
                    "secondary-fixed": "#89f5e7",
                    "tertiary-fixed": "#c9e6ff",
                    "tertiary-container": "#0074a6",
                    "inverse-surface": "#2d3133",
                    "tertiary-fixed-dim": "#89ceff",
                    "secondary": "#006a61",
                    "on-tertiary-fixed-variant": "#004c6e",
                    "on-secondary-fixed-variant": "#005049",
                    "primary-container": "#2563eb",
                    "surface-container": "#eceef0",
                    "secondary-fixed-dim": "#6bd8cb",
                    "secondary-container": "#86f2e4",
                    "on-error-container": "#93000a",
                    "error": "#ba1a1a",
                    "outline": "#737686",
                    "on-primary": "#ffffff",
                    "background": "#f7f9fb",
                    "on-secondary-container": "#006f66",
                    "primary-fixed": "#dbe1ff",
                    "inverse-primary": "#b4c5ff",
                    "surface-container-highest": "#e0e3e5",
                    "on-secondary-fixed": "#00201d",
                    "error-container": "#ffdad6",
                    "surface-dim": "#d8dadc",
                    "on-primary-container": "#eeefff",
                    "on-tertiary-container": "#e4f2ff",
                    "on-surface": "#191c1e",
                    "surface-variant": "#e0e3e5",
                    "on-primary-fixed": "#00174b",
                    "on-tertiary-fixed": "#001e2f",
                    "surface-container-low": "#f2f4f6",
                    "surface-tint": "#0053db",
                    "on-secondary": "#ffffff",
                    "tertiary": "#005a82",
                    "on-surface-variant": "#434655",
                    "primary": "#004ac6",
                    "surface-container-high": "#e6e8ea",
                    "on-primary-fixed-variant": "#003ea8",
                    "surface-container-lowest": "#ffffff",
                    "primary-fixed-dim": "#b4c5ff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Manrope"],
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
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-background font-body text-on-background min-h-screen pb-24">
<!-- TopNavBar -->
<header class="bg-slate-50 dark:bg-slate-900 fixed top-0 w-full border-b border-slate-200 dark:border-slate-800 shadow-sm dark:shadow-none z-50">
<div class="flex justify-between items-center px-6 h-16 w-full">
<div class="flex items-center gap-8">
<span class="text-2xl font-bold text-blue-600 dark:text-blue-400 font-headline">MedConnect</span>
<nav class="hidden md:flex items-center gap-6">
<a class="text-slate-500 dark:text-slate-400 font-manrope font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors px-3 py-2 rounded-lg" href="#">Schedule</a>
<a class="text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 font-manrope font-semibold px-3 py-2" href="#">Patients</a>
<a class="text-slate-500 dark:text-slate-400 font-manrope font-semibold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors px-3 py-2 rounded-lg" href="#">Consults</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="relative hidden sm:block">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
<input class="pl-10 pr-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-full text-sm focus:ring-2 focus:ring-blue-500 outline-none w-64" placeholder="Search records..." type="text"/>
</div>
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
<span class="material-symbols-outlined">settings</span>
</button>
<img alt="Doctor profile avatar" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" data-alt="Professional headshot of a friendly middle-aged male doctor with a stethoscope around his neck in a clinical setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDg85J2osa2uoJ8oK4Ls0VLq553NHH2_dkfbcDu0KFQuATOxtODSEo8rWgqlNPgKP_qMp7e8xpFVZA89wPEd0cpbisICJvpZ4G26MLDW12UYsfYetvCGz4FaZr5rGJQ616V74Cng2oOckmku7MUH7Ih5GbVoI7r6BLp5_Z6U4aCqIHiQcAqCBitSD73Q3exYzlzfZUNl7WsbgTxVu0vniv5_kqp4KeO9nWVbPb6HjqmHQ3uNC8cWu8ikJtldMJdA0lsKmlaKpG-V3A"/>
</div>
</div>
</header>
<main class="pt-24 px-6 max-w-7xl mx-auto">
<!-- Patient Header Section -->
<section class="mb-8">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 p-8 rounded-xl bg-white shadow-sm border border-slate-100">
<div class="flex items-start gap-6">
<div class="w-24 h-24 rounded-2xl bg-primary-fixed flex items-center justify-center text-primary overflow-hidden">
<img alt="Patient portrait" class="w-full h-full object-cover" data-alt="Candid portrait of a woman in her late 30s with light brown hair looking calmly at the camera in soft natural light" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5AzrQj7fOAxwE7tsOU2FAzt1dh-OHhGGel0_zDEXVyqmUIV2JCm11QLoSFqO_WRUb7gzfEuiE1ePAKUMj1oWbpDLPanC6-D2V1kMcfKFYDJTSe_ZhQQ9eAWJ_tVq7mQDfxyZuoDkV4vFBNVYIvpX1uk9-uWyhcJUkHlsH_qv5OX2cVE8wXSxuiSaZOpvbLdOVpaPInR8BjUJMeIfZvBw4Ipx2lG64zQK84w93cfKd9zJR67gf1U0L1Db656AXz6i_Z1_qPNTDXSk"/>
</div>
<div>
<div class="flex items-center gap-3 mb-1">
<h1 class="text-3xl font-headline font-extrabold text-on-surface">Sarah J. Miller</h1>
<span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full uppercase tracking-wider">Active Patient</span>
</div>
<p class="text-slate-500 font-medium mb-4">Patient ID: #MC-9920-881</p>
<div class="flex flex-wrap gap-4 text-sm font-medium">
<div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg">
<span class="material-symbols-outlined text-primary scale-75">person</span>
<span>34 Years Old</span>
</div>
<div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg">
<span class="material-symbols-outlined text-primary scale-75">fingerprint</span>
<span>CIN: 8829-102-X</span>
</div>
<div class="flex items-center gap-2 px-3 py-2 bg-surface-container rounded-lg">
<span class="material-symbols-outlined text-primary scale-75">location_on</span>
<span>Portland, OR</span>
</div>
</div>
</div>
</div>
<div class="flex flex-col gap-2 min-w-[240px]">
<div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
<p class="text-xs text-blue-600 font-bold mb-1">Last Update</p>
<p class="text-sm font-semibold">October 14, 2023</p>
</div>
</div>
</div>
</section>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Left Column: Public Info & Vital Stats -->
<div class="lg:col-span-1 space-y-8">
<!-- Public Info Card -->
<div class="p-6 rounded-xl bg-white border border-slate-100 shadow-sm">
<h2 class="text-lg font-headline font-bold mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary">info</span>
                        Public Health Information
                    </h2>
<div class="space-y-6">
<div>
<label class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-2">Blood Type</label>
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center text-red-600">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bloodtype</span>
</div>
<span class="text-xl font-bold">O Negative (O-)</span>
</div>
</div>
<div>
<label class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-2">Known Allergies</label>
<div class="flex flex-wrap gap-2">
<span class="px-3 py-1.5 bg-red-100 text-red-700 text-sm font-semibold rounded-lg border border-red-200">Penicillin</span>
<span class="px-3 py-1.5 bg-orange-100 text-orange-700 text-sm font-semibold rounded-lg border border-orange-200">Peanuts</span>
<span class="px-3 py-1.5 bg-slate-100 text-slate-600 text-sm font-semibold rounded-lg border border-slate-200">Latex</span>
</div>
</div>
<div>
<label class="text-xs font-bold text-slate-400 uppercase tracking-widest block mb-2">Current Medications</label>
<ul class="space-y-2">
<li class="flex items-center gap-3 text-sm font-medium p-2 rounded-lg hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-slate-400 scale-75">pill</span>
                                    Lisinopril 10mg
                                </li>
<li class="flex items-center gap-3 text-sm font-medium p-2 rounded-lg hover:bg-slate-50 transition-colors">
<span class="material-symbols-outlined text-slate-400 scale-75">pill</span>
                                    Vitamin D3 2000IU
                                </li>
</ul>
</div>
</div>
</div>
<!-- Emergency Contact -->
<div class="p-6 rounded-xl bg-slate-900 text-white shadow-lg overflow-hidden relative">
<div class="absolute -right-4 -top-4 opacity-10">
<span class="material-symbols-outlined text-[120px]">contact_emergency</span>
</div>
<h2 class="text-lg font-headline font-bold mb-4 relative z-10">Emergency Contact</h2>
<div class="relative z-10">
<p class="font-bold text-lg mb-1">Robert Miller</p>
<p class="text-slate-400 text-sm mb-4">Spouse</p>
<a class="flex items-center gap-2 text-primary-fixed hover:text-white transition-colors font-medium" href="tel:+15035550123">
<span class="material-symbols-outlined scale-75">call</span>
                            (503) 555-0123
                        </a>
</div>
</div>
</div>
<!-- Right Column: Protected Content -->
<div class="lg:col-span-2">
<div class="relative h-full">
<!-- Locked Records View -->
<div class="p-8 rounded-xl bg-white border border-slate-100 shadow-sm h-full relative overflow-hidden">
<div class="flex items-center justify-between mb-8">
<h2 class="text-xl font-headline font-bold">Historical Medical Records</h2>
<span class="px-4 py-1.5 bg-amber-100 text-amber-700 text-xs font-bold rounded-full flex items-center gap-2">
<span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">lock</span>
                                Restricted Access
                            </span>
</div>
<!-- Obfuscated List Preview -->
<div aria-hidden="true" class="space-y-4 opacity-20 select-none blur-[2px]">
<div class="p-5 border border-slate-100 rounded-xl flex items-center justify-between">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-slate-100 rounded-lg"></div>
<div class="space-y-2">
<div class="h-4 w-32 bg-slate-200 rounded"></div>
<div class="h-3 w-48 bg-slate-100 rounded"></div>
</div>
</div>
<div class="h-8 w-24 bg-slate-100 rounded-lg"></div>
</div>
<div class="p-5 border border-slate-100 rounded-xl flex items-center justify-between">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-slate-100 rounded-lg"></div>
<div class="space-y-2">
<div class="h-4 w-40 bg-slate-200 rounded"></div>
<div class="h-3 w-32 bg-slate-100 rounded"></div>
</div>
</div>
<div class="h-8 w-24 bg-slate-100 rounded-lg"></div>
</div>
<div class="p-5 border border-slate-100 rounded-xl flex items-center justify-between">
<div class="flex items-center gap-4">
<div class="w-12 h-12 bg-slate-100 rounded-lg"></div>
<div class="space-y-2">
<div class="h-4 w-28 bg-slate-200 rounded"></div>
<div class="h-3 w-56 bg-slate-100 rounded"></div>
</div>
</div>
<div class="h-8 w-24 bg-slate-100 rounded-lg"></div>
</div>
</div>
<!-- CTA Overlay -->
<div class="absolute inset-0 flex items-center justify-center p-8 bg-gradient-to-t from-white via-white/80 to-transparent">
<div class="max-w-md text-center">
<div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 text-blue-600 shadow-inner">
<span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1;">privacy_tip</span>
</div>
<h3 class="text-2xl font-headline font-bold text-on-surface mb-3">Access Request for Sarah J. Miller</h3>
<p class="text-slate-500 mb-8 leading-relaxed">A healthcare provider has requested access to the clinical records of Sarah J. Miller. To protect patient privacy, detailed consultation notes and specialist reports are hidden until approved through the MedConnect Patient Portal.</p>
<div class="flex flex-col gap-4">
<button class="w-full py-4 bg-primary text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-primary/90 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
<span class="material-symbols-outlined">key</span>
                                        Request Access to Records
                                    </button>
<p class="text-xs text-slate-400">Requests typically approved within 2-4 hours</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- BottomNavBar -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 pb-4 pt-2 bg-white/90 dark:bg-slate-950/90 backdrop-blur-md border-t border-slate-200 dark:border-slate-800 shadow-lg md:hidden">
<a class="flex flex-col items-center justify-center text-slate-500 dark:text-slate-400 px-3 py-1 hover:text-blue-500 transition-colors" href="#">
<span class="material-symbols-outlined">calendar_today</span>
<span class="text-[11px] font-manrope font-medium mt-1">Schedule</span>
</a>
<a class="flex flex-col items-center justify-center text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/30 rounded-xl px-3 py-1 active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined">groups</span>
<span class="text-[11px] font-manrope font-medium mt-1">Patients</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-500 dark:text-slate-400 px-3 py-1 hover:text-blue-500 transition-colors" href="#">
<span class="material-symbols-outlined">medical_services</span>
<span class="text-[11px] font-manrope font-medium mt-1">Consults</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-500 dark:text-slate-400 px-3 py-1 hover:text-blue-500 transition-colors" href="#">
<span class="material-symbols-outlined">account_circle</span>
<span class="text-[11px] font-manrope font-medium mt-1">Profile</span>
</a>
</nav>
</body></html>