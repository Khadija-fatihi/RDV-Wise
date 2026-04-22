<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Access Request Response | MedSync</title>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "outline": "#737686",
                    "surface-container-highest": "#e0e3e5",
                    "surface-container-high": "#e6e8ea",
                    "on-secondary-container": "#006f66",
                    "primary": "#004ac6",
                    "surface-container-lowest": "#ffffff",
                    "on-tertiary-fixed": "#001e2f",
                    "on-secondary-fixed": "#00201d",
                    "on-secondary": "#ffffff",
                    "surface-variant": "#e0e3e5",
                    "on-tertiary-container": "#e4f2ff",
                    "surface": "#f7f9fb",
                    "primary-fixed-dim": "#b4c5ff",
                    "background": "#f7f9fb",
                    "on-primary-fixed-variant": "#003ea8",
                    "surface-bright": "#f7f9fb",
                    "on-primary": "#ffffff",
                    "surface-container": "#eceef0",
                    "tertiary-container": "#0074a6",
                    "secondary-fixed-dim": "#6bd8cb",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#434655",
                    "surface-container-low": "#f2f4f6",
                    "tertiary-fixed": "#c9e6ff",
                    "primary-container": "#2563eb",
                    "on-background": "#191c1e",
                    "surface-dim": "#d8dadc",
                    "secondary-fixed": "#89f5e7",
                    "error-container": "#ffdad6",
                    "surface-tint": "#0053db",
                    "tertiary": "#005a82",
                    "on-error-container": "#93000a",
                    "error": "#ba1a1a",
                    "outline-variant": "#c3c6d7",
                    "inverse-surface": "#2d3133",
                    "on-surface": "#191c1e",
                    "on-secondary-fixed-variant": "#005049",
                    "on-error": "#ffffff",
                    "tertiary-fixed-dim": "#89ceff",
                    "secondary-container": "#86f2e4",
                    "on-primary-fixed": "#00174b",
                    "secondary": "#006a61",
                    "on-tertiary-fixed-variant": "#004c6e",
                    "primary-fixed": "#dbe1ff",
                    "inverse-on-surface": "#eff1f3",
                    "on-primary-container": "#eeefff",
                    "inverse-primary": "#b4c5ff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Manrope", "sans-serif"],
                    "body": ["Inter", "sans-serif"],
                    "label": ["Inter", "sans-serif"]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface min-h-screen flex flex-col">
<!-- TopNavBar (Updated to match SCREEN_44 style) -->
<header class="bg-white border-b border-slate-100 sticky top-0 z-50 w-full">
<nav class="flex items-center justify-center h-20 w-full max-w-7xl mx-auto px-6">
<div class="flex items-center justify-between w-full">
<!-- Branding -->
<div class="text-2xl font-black tracking-tight text-blue-600 font-headline">RDV Wise</div>
<!-- Main Navigation Links -->
<div class="hidden md:flex items-center space-x-12">
<a class="flex flex-col items-center gap-1 group" href="#">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors" data-icon="description">description</span>
<span class="text-xs font-bold text-slate-400 group-hover:text-primary uppercase tracking-wider">Records</span>
</a>
<a class="flex flex-col items-center gap-1 bg-slate-50 px-6 py-2 rounded-xl" href="#">
<span class="material-symbols-outlined text-secondary font-bold" data-icon="key" style="font-variation-settings: 'wght' 600;">key</span>
<span class="text-xs font-bold text-secondary uppercase tracking-wider">Permissions</span>
</a>
<a class="flex flex-col items-center gap-1 group" href="#">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors" data-icon="calendar_today">calendar_today</span>
<span class="text-xs font-bold text-slate-400 group-hover:text-primary uppercase tracking-wider">Appointments</span>
</a>
<a class="flex flex-col items-center gap-1 group" href="#">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors" data-icon="forum">forum</span>
<span class="text-xs font-bold text-slate-400 group-hover:text-primary uppercase tracking-wider">Messages</span>
</a>
</div>
<!-- Right Actions -->
<div class="flex items-center space-x-4">
<button class="material-symbols-outlined text-slate-400 hover:text-slate-600" data-icon="notifications">notifications</button>
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden border border-slate-200">
<span class="material-symbols-outlined text-slate-400" data-icon="account_circle">account_circle</span>
</div>
</div>
</div>
</nav>
</header>
<!-- Main Content -->
<main class="flex-grow w-full max-w-5xl mx-auto px-6 py-8 md:py-12">
<!-- Notification Banner -->
<div class="mb-8 p-4 bg-tertiary-container text-on-tertiary-container rounded-xl flex items-center gap-4 shadow-sm">
<span class="material-symbols-outlined text-3xl" data-icon="pending_actions">pending_actions</span>
<div class="flex-grow">
<p class="font-headline font-bold text-lg">Action Required</p>
<p class="text-sm opacity-90 font-body">A healthcare provider has requested access to your clinical records.</p>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- Left Column: Doctor Profile & Purpose -->
<div class="lg:col-span-7 space-y-6">
<section class="bg-white p-8 rounded-2xl shadow-sm border border-surface-container">
<h2 class="text-2xl font-extrabold font-headline text-on-surface mb-6 tracking-tight">Request Details</h2>
<div class="flex items-start gap-6 mb-8">
<div class="relative">
<img alt="Dr. Sarah Johnson" class="w-24 h-24 rounded-2xl object-cover shadow-md" data-alt="professional portrait of a female doctor with friendly expression in clinical environment with soft bright lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAicYLvNqcmscMNw7_6cboW40a07PEpxCVW8sVGDukMt4TQNCCywn-2NhdKKq1QvhXV03oQ4hTAkhDRYqV4GoM-XlT5u2u6SsrdNXY-i4ritNrUPePsY-Xk6YwayLI9YmjYJN4ep61imdvc12g-AHpmjUoNGqvsXFz9YjpKv98mOlfR0pcuxQm4q6LkK5-I9jmydg8EKk38RDl5RzEUl_kavcPEm9uW2Dgy7MZMPQI6Qy0AjhWtD9HXCOeEoT0h10igHT_4yDDmpAc"/>
<div class="absolute -bottom-2 -right-2 bg-secondary p-1.5 rounded-lg text-white shadow-lg">
<span class="material-symbols-outlined text-sm" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
</div>
<div>
<p class="text-primary font-bold font-headline text-xl">Dr. Sarah Johnson</p>
<p class="text-on-surface-variant font-medium">Dermatologist</p>
<div class="mt-2 flex items-center gap-2 text-outline text-sm">
<span class="material-symbols-outlined text-base" data-icon="location_on">location_on</span>
<span>City General Hospital &amp; Wellness Clinic</span>
</div>
</div>
</div>
<div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30">
<div class="flex items-center gap-2 mb-3 text-secondary">
<span class="material-symbols-outlined" data-icon="info" style="font-variation-settings: 'FILL' 1;">info</span>
<span class="font-headline font-bold uppercase tracking-wider text-xs">Purpose of Request</span>
</div>
<p class="text-on-surface font-body leading-relaxed">
                        "To review your previous dermatological history and laboratory results for your upcoming consultation on October 24th, 2024. This will ensure we have the most accurate picture of your skin health before your visit."
                    </p>
</div>
</section>
<section class="bg-white p-8 rounded-2xl shadow-sm border border-surface-container">
<h3 class="font-headline font-bold text-lg mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary" data-icon="visibility">visibility</span>
                    Data Included in Request
                </h3>
<ul class="space-y-4">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-on-secondary-container mt-0.5" data-icon="check_circle">check_circle</span>
<div>
<p class="font-semibold text-on-surface">Consultation History</p>
<p class="text-sm text-on-surface-variant">Past clinical notes and diagnoses from all specialties.</p>
</div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-on-secondary-container mt-0.5" data-icon="check_circle">check_circle</span>
<div>
<p class="font-semibold text-on-surface">Lab Results</p>
<p class="text-sm text-on-surface-variant">Blood work, skin swabs, and pathology reports from the last 5 years.</p>
</div>
</li>
</ul>
</section>
</div>
<!-- Right Column: Decision Box -->
<div class="lg:col-span-5 sticky top-24">
<div class="bg-white p-8 rounded-2xl shadow-xl border-t-4 border-primary">
<h2 class="font-headline font-bold text-xl mb-6">Your Decision</h2>
<p class="text-sm text-on-surface-variant mb-8 leading-relaxed">
                    Approving this request will grant Dr. Sarah Johnson <span class="font-bold text-on-surface">temporary 24-hour access</span> to the data listed. You can revoke this access at any time from your Permissions dashboard.
                </p>
<div class="space-y-4">
<button class="w-full py-4 px-6 bg-primary-container text-white font-headline font-bold rounded-xl shadow-lg hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined" data-icon="lock_open">lock_open</span>
                        Approve Access
                    </button>
<button class="w-full py-4 px-6 bg-white text-error border-2 border-error/20 font-headline font-bold rounded-xl hover:bg-error-container/20 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined" data-icon="block">block</span>
                        Deny Access
                    </button>
</div>
<div class="mt-8 pt-6 border-t border-surface-container-highest">
<div class="flex items-center gap-3 text-outline text-xs">
<span class="material-symbols-outlined text-sm" data-icon="shield">shield</span>
<p>This request is encrypted and compliant with HIPAA and GDPR regulations.</p>
</div>
</div>
</div>
<div class="mt-6 px-4">
<a class="text-primary text-sm font-semibold flex items-center gap-1 hover:underline" href="#">
<span class="material-symbols-outlined text-sm" data-icon="help">help</span>
                    How does data sharing work?
                </a>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-slate-50 dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800">
<div class="flex flex-col md:flex-row justify-between items-center px-8 py-12 w-full max-w-7xl mx-auto mt-auto">
<div class="mb-6 md:mb-0">
<span class="text-lg font-bold text-slate-900 dark:text-slate-100 font-headline">MedSync</span>
<p class="font-inter text-sm text-slate-500 dark:text-slate-500 mt-2">© 2024 MedSync Healthcare Systems. All rights reserved.</p>
</div>
<div class="flex flex-wrap justify-center gap-6 font-inter text-sm">
<a class="text-slate-500 dark:text-slate-500 hover:text-teal-600 dark:hover:text-teal-400 transition-opacity duration-200" href="#">Privacy Policy</a>
<a class="text-slate-500 dark:text-slate-500 hover:text-teal-600 dark:hover:text-teal-400 transition-opacity duration-200" href="#">Terms of Service</a>
<a class="text-slate-500 dark:text-slate-500 hover:text-teal-600 dark:hover:text-teal-400 transition-opacity duration-200" href="#">Help Center</a>
<a class="text-slate-500 dark:text-slate-500 hover:text-teal-600 dark:hover:text-teal-400 transition-opacity duration-200" href="#">Contact Support</a>
</div>
</div>
</footer>
</body></html>