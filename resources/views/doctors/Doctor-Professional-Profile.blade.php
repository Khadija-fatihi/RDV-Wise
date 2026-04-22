<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Dr. Sarah Jenkins - RDV Wise</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary": "#005a82",
                    "on-tertiary": "#ffffff",
                    "secondary-fixed": "#89f5e7",
                    "on-tertiary-container": "#e4f2ff",
                    "on-error-container": "#93000a",
                    "surface-tint": "#0053db",
                    "secondary-container": "#86f2e4",
                    "on-tertiary-fixed-variant": "#004c6e",
                    "on-secondary-fixed": "#00201d",
                    "on-error": "#ffffff",
                    "primary-fixed-dim": "#b4c5ff",
                    "surface-container-low": "#f2f4f6",
                    "surface-variant": "#e0e3e5",
                    "on-primary-container": "#eeefff",
                    "on-surface-variant": "#434655",
                    "tertiary-fixed-dim": "#89ceff",
                    "secondary": "#006a61",
                    "primary": "#004ac6",
                    "on-background": "#191c1e",
                    "on-primary-fixed-variant": "#003ea8",
                    "surface": "#f7f9fb",
                    "error-container": "#ffdad6",
                    "surface-bright": "#f7f9fb",
                    "outline-variant": "#c3c6d7",
                    "on-primary": "#ffffff",
                    "on-secondary": "#ffffff",
                    "on-secondary-container": "#006f66",
                    "on-surface": "#191c1e",
                    "primary-fixed": "#dbe1ff",
                    "on-secondary-fixed-variant": "#005049",
                    "surface-container": "#eceef0",
                    "inverse-primary": "#b4c5ff",
                    "error": "#ba1a1a",
                    "background": "#f7f9fb",
                    "surface-container-highest": "#e0e3e5",
                    "primary-container": "#2563eb",
                    "secondary-fixed-dim": "#6bd8cb",
                    "tertiary-fixed": "#c9e6ff",
                    "tertiary-container": "#0074a6",
                    "surface-container-lowest": "#ffffff",
                    "inverse-surface": "#2d3133",
                    "inverse-on-surface": "#eff1f3",
                    "surface-container-high": "#e6e8ea",
                    "surface-dim": "#d8dadc",
                    "on-primary-fixed": "#00174b",
                    "outline": "#737686",
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
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
          },
        }
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4 { font-family: 'Manrope', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- TopNavBar (Updated to match IMAGE_36 style) -->
<header class="bg-white border-b border-slate-100 fixed top-0 z-50 w-full">
<nav class="flex items-center justify-center h-20 w-full max-w-7xl mx-auto px-6">
<div class="flex items-center justify-between w-full">
<!-- Branding -->
<div class="text-2xl font-black tracking-tight text-blue-600">RDV Wise</div>
<!-- Main Navigation Links -->
<div class="flex items-center space-x-12">
<a class="flex flex-col items-center gap-1 group" href="#">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">calendar_today</span>
<span class="text-xs font-bold text-slate-400 group-hover:text-primary uppercase tracking-wider">Schedule</span>
</a>
<a class="flex flex-col items-center gap-1 group" href="#">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">group</span>
<span class="text-xs font-bold text-slate-400 group-hover:text-primary uppercase tracking-wider">Patients</span>
</a>
<a class="flex flex-col items-center gap-1 group" href="#">
<span class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">video_chat</span>
<span class="text-xs font-bold text-slate-400 group-hover:text-primary uppercase tracking-wider">Consults</span>
</a>
<a class="flex flex-col items-center gap-1 bg-slate-50 px-6 py-2 rounded-xl" href="#">
<span class="material-symbols-outlined text-secondary font-bold" style="font-variation-settings: 'wght' 600;">person</span>
<span class="text-xs font-bold text-secondary uppercase tracking-wider">Profile</span>
</a>
</div>
<!-- Right Actions -->
<div class="flex items-center space-x-4">
<button class="material-symbols-outlined text-slate-400 hover:text-slate-600">notifications</button>
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden border border-slate-200">
<span class="material-symbols-outlined text-slate-400">account_circle</span>
</div>
</div>
</div>
</nav>
</header>
<main class="max-w-7xl mx-auto px-6 pt-32 pb-32">
<!-- Breadcrumb & Navigation Back -->
<div class="flex items-center gap-2 text-slate-500 text-sm mb-6">
<span class="material-symbols-outlined text-sm">arrow_back</span>
<span class="cursor-pointer hover:underline">Back to Dermatologists</span>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
<!-- Left Column: Doctor Profile Info -->
<div class="lg:col-span-8 space-y-8">
<!-- Doctor Identity Card (Bento Style) -->
<div class="bg-surface-container-lowest p-8 rounded-xl shadow-sm border border-outline-variant flex flex-col md:flex-row gap-8">
<div class="shrink-0">
<img alt="Professional headshot of a friendly female doctor in her 40s wearing a white clinical coat and a stethoscope, bright medical office background" class="w-48 h-48 rounded-xl object-cover shadow-md border-4 border-white" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAprZFwP3Zl3V6EopAc5UGkiFIOoysW-HrmhEkIXYks4l2sAGhQz9eRaD11SNvTPAkXTbkA8TxJdCbfNYXrjypl3Wv7CA1F969fObzOaDC63eR1hKNwwFq5H6yUHKMiI8EP9dZ-j3YrhKV61uA6az--im4RV_a6nYftQWJSpCzoJI4U4MODxgVCUSDywwt8sOu8bhg2dd6ceOCAiEIZOrswROyNIcgmQGAVWKy12gceCjxGVwNb_Eduxjwcgf_H6P_g3ewLElYUOJk"/>
</div>
<div class="flex-1 space-y-4">
<div>
<span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2 inline-block">Top Rated Specialist</span>
<h1 class="text-4xl font-extrabold text-on-surface tracking-tight">Dr. Sarah Jenkins</h1>
<p class="text-xl text-primary font-semibold">Senior Dermatologist</p>
</div>
<div class="flex flex-wrap gap-6 items-center">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-bold text-lg">4.9</span>
<span class="text-slate-500 text-sm">(1,240 Reviews)</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified</span>
<span class="text-slate-600 font-medium">Board Certified</span>
</div>
</div>
<div class="grid grid-cols-3 gap-4 pt-4 border-t border-slate-100">
<div>
<p class="text-slate-400 text-xs font-semibold uppercase">Experience</p>
<p class="text-on-surface font-bold text-lg">12+ Years</p>
</div>
<div>
<p class="text-slate-400 text-xs font-semibold uppercase">Patients</p>
<p class="text-on-surface font-bold text-lg">2.5k+</p>
</div>
<div>
<p class="text-slate-400 text-xs font-semibold uppercase">Clinic</p>
<p class="text-on-surface font-bold text-lg">MedHub NY</p>
</div>
</div>
</div>
</div>
<!-- Professional Bio -->
<div class="bg-surface-container-lowest p-8 rounded-xl border border-outline-variant">
<h3 class="text-2xl font-bold mb-4 text-on-surface">About Dr. Jenkins</h3>
<p class="text-slate-600 leading-relaxed text-lg font-body">
                        Dr. Sarah Jenkins is a board-certified dermatologist with over 12 years of experience specializing in medical and aesthetic dermatology. Her clinical focus includes advanced treatments for acne, eczema, and skin cancer screening. She believes in a patient-centered philosophy of care, combining cutting-edge medical technology with a personalized approach to ensure the best outcomes for skin health and confidence.
                    </p>
</div>
<!-- Education & Certifications -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant">
<div class="flex items-center gap-3 mb-4">
<span class="material-symbols-outlined text-primary">school</span>
<h3 class="text-xl font-bold">Education</h3>
</div>
<ul class="space-y-4">
<li class="flex gap-4">
<div class="w-1 h-12 bg-blue-100 rounded-full"></div>
<div>
<p class="font-bold">Stanford University</p>
<p class="text-sm text-slate-500">M.D. in Dermatology, 2011</p>
</div>
</li>
<li class="flex gap-4">
<div class="w-1 h-12 bg-blue-100 rounded-full"></div>
<div>
<p class="font-bold">Johns Hopkins University</p>
<p class="text-sm text-slate-500">B.S. in Biology, 2007</p>
</div>
</li>
</ul>
</div>
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant">
<div class="flex items-center gap-3 mb-4">
<span class="material-symbols-outlined text-primary">verified_user</span>
<h3 class="text-xl font-bold">Certifications</h3>
</div>
<ul class="space-y-3">
<li class="flex items-center gap-3 text-slate-600">
<span class="material-symbols-outlined text-emerald-500 text-sm">check_circle</span>
<span>American Board of Dermatology</span>
</li>
<li class="flex items-center gap-3 text-slate-600">
<span class="material-symbols-outlined text-emerald-500 text-sm">check_circle</span>
<span>Laser Therapy Specialist Certification</span>
</li>
<li class="flex items-center gap-3 text-slate-600">
<span class="material-symbols-outlined text-emerald-500 text-sm">check_circle</span>
<span>Advanced Dermatoscopy Training</span>
</li>
</ul>
</div>
</div>
<!-- Patient Reviews -->
<div class="space-y-6">
<div class="flex justify-between items-end">
<h3 class="text-2xl font-bold">Patient Reviews</h3>
<a class="text-primary font-bold text-sm hover:underline" href="#">See all 1.2k reviews</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Review 1 -->
<div class="bg-surface-container-low p-6 rounded-xl">
<div class="flex items-center gap-1 mb-3">
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="text-on-surface font-medium mb-3 italic">"Dr. Jenkins was extremely thorough and explained my condition in a way that was easy to understand. Truly caring professional."</p>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-200"></div>
<span class="text-slate-500 text-sm">— Mark R., Verified Patient</span>
</div>
</div>
<!-- Review 2 -->
<div class="bg-surface-container-low p-6 rounded-xl">
<div class="flex items-center gap-1 mb-3">
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-slate-300 text-sm">star</span>
</div>
<p class="text-on-surface font-medium mb-3 italic">"Very modern clinic and helpful staff. Dr. Jenkins took her time and didn't rush through the appointment."</p>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-200"></div>
<span class="text-slate-500 text-sm">— Emily S., Verified Patient</span>
</div>
</div>
</div>
</div>
</div>
<!-- Right Column: Booking Widget & Clinic Details -->
<div class="lg:col-span-4 space-y-8">
<!-- Availability & Booking Card -->
<div class="bg-surface-container-lowest p-6 rounded-xl shadow-lg border-2 border-primary/10 sticky top-24">
<h3 class="text-xl font-bold mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">event</span>
                        Book Appointment
                    </h3>
<div class="space-y-6">
<div>
<p class="text-sm font-bold text-slate-500 uppercase mb-3">Next Available Slots</p>
<div class="grid grid-cols-3 gap-2">
<button class="p-2 border border-slate-200 rounded-lg text-sm hover:bg-primary hover:text-white transition-colors">Mon 9:00</button>
<button class="p-2 border border-slate-200 rounded-lg text-sm hover:bg-primary hover:text-white transition-colors">Mon 10:30</button>
<button class="p-2 border border-primary bg-primary-container text-on-primary-container rounded-lg text-sm font-bold">Tue 11:15</button>
<button class="p-2 border border-slate-200 rounded-lg text-sm hover:bg-primary hover:text-white transition-colors">Wed 14:00</button>
<button class="p-2 border border-slate-200 rounded-lg text-sm hover:bg-primary hover:text-white transition-colors">Fri 09:30</button>
<button class="p-2 border border-slate-200 rounded-lg text-sm hover:bg-primary hover:text-white transition-colors">Fri 16:00</button>
</div>
</div>
<div class="bg-slate-50 p-4 rounded-xl space-y-3">
<div class="flex justify-between text-sm">
<span class="text-slate-500">Consultation Fee</span>
<span class="font-bold text-on-surface">$120</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-slate-500">Duration</span>
<span class="font-bold text-on-surface">30 Mins</span>
</div>
</div>
<button class="w-full bg-primary-container text-on-primary-container py-4 rounded-xl font-bold shadow-md hover:opacity-90 active:scale-95 transition-all text-center">
                            Book Consultation
                        </button>
<p class="text-[10px] text-center text-slate-400">Cancel for free up to 24 hours before the appointment.</p>
</div>
</div>
<!-- Clinic Details & Map -->
<div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant space-y-6">
<h3 class="text-xl font-bold">Clinic Details</h3>
<div class="h-40 bg-slate-200 rounded-lg overflow-hidden relative group">
<img alt="Modern high-resolution map interface showing Manhattan street layout with a blue location pin for a medical office" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyKJ1ZPzbS6vo2Q-TPhls_pszmLQjoNkZ6Cn9KXCY-EIZmfop4_4rDXTxLipovR_ypx3waKtPQ-O3_InK0u9Qsbk_NIXRnnsnctYd9PfTfj59FaQTwKzEFUzFLU9HDuKZfVevaRD6ulfkgacYEhdiqEtqkcja2WVLHeAaxAP3zZkvuAfTrcogcm946XDi70Tb1O-ElmxUHbx1Dnm4sFSWvtxTfMWfEntb5Q7zOTKEdzGkJ7ZBt3ieiH6VJ1c-jzVcin_t0jpsJKDo"/>
<div class="absolute inset-0 bg-black/5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<button class="bg-white text-on-surface px-4 py-2 rounded-lg text-sm font-bold shadow-xl">Open Maps</button>
</div>
</div>
<div class="space-y-4">
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary">location_on</span>
<div>
<p class="font-bold">MedHub Specialists Plaza</p>
<p class="text-sm text-slate-500 leading-tight">450 Lexington Ave, Suite 301<br/>New York, NY 10017</p>
</div>
</div>
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary">call</span>
<p class="font-bold">+1 (212) 555-0198</p>
</div>
<div class="flex gap-4">
<span class="material-symbols-outlined text-primary">schedule</span>
<div class="text-sm">
<p class="font-bold">Mon - Fri</p>
<p class="text-slate-500">08:00 AM - 06:00 PM</p>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="fixed bottom-0 w-full z-50 flex justify-around items-center px-4 py-2 lg:hidden bg-white/95 backdrop-blur-lg border-t border-slate-100 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] rounded-t-2xl">
<div class="flex flex-col items-center justify-center text-slate-400">
<span class="material-symbols-outlined">search</span>
<span class="text-[10px] font-semibold font-manrope">Search</span>
</div>
<div class="flex flex-col items-center justify-center text-blue-600 bg-blue-50 rounded-xl px-3 py-1">
<span class="material-symbols-outlined">event_available</span>
<span class="text-[10px] font-semibold font-manrope">Bookings</span>
</div>
<div class="flex flex-col items-center justify-center text-slate-400">
<span class="material-symbols-outlined">rate_review</span>
<span class="text-[10px] font-semibold font-manrope">Reviews</span>
</div>
<div class="flex flex-col items-center justify-center text-slate-400">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-semibold font-manrope">Profile</span>
</div>
</nav>
</body></html>