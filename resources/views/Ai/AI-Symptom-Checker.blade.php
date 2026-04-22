<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AI Smart Diagnostic | RDV Wise</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@700;800&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-primary-container": "#eeefff",
                        "on-surface": "#191c1e",
                        "primary-container": "#2563eb",
                        "on-tertiary-fixed-variant": "#004c6e",
                        "on-tertiary-fixed": "#001e2f",
                        "surface-container-highest": "#e0e3e5",
                        "on-error-container": "#93000a",
                        "surface-container-low": "#f2f4f6",
                        "on-secondary-container": "#006f66",
                        "outline": "#737686",
                        "tertiary-fixed-dim": "#89ceff",
                        "error": "#ba1a1a",
                        "on-surface-variant": "#434655",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#86f2e4",
                        "surface-dim": "#d8dadc",
                        "surface-tint": "#0053db",
                        "on-background": "#191c1e",
                        "on-primary-fixed-variant": "#003ea8",
                        "primary-fixed-dim": "#b4c5ff",
                        "on-error": "#ffffff",
                        "inverse-primary": "#b4c5ff",
                        "on-secondary-fixed": "#00201d",
                        "surface-variant": "#e0e3e5",
                        "surface-container": "#eceef0",
                        "surface-bright": "#f7f9fb",
                        "tertiary": "#005a82",
                        "on-tertiary-container": "#e4f2ff",
                        "surface": "#f7f9fb",
                        "inverse-surface": "#2d3133",
                        "on-primary": "#ffffff",
                        "tertiary-fixed": "#c9e6ff",
                        "error-container": "#ffdad6",
                        "tertiary-container": "#0074a6",
                        "primary": "#004ac6",
                        "primary-fixed": "#dbe1ff",
                        "inverse-on-surface": "#eff1f3",
                        "background": "#f7f9fb",
                        "secondary-fixed": "#89f5e7",
                        "on-secondary": "#ffffff",
                        "surface-container-high": "#e6e8ea",
                        "on-primary-fixed": "#00174b",
                        "on-secondary-fixed-variant": "#005049",
                        "on-tertiary": "#ffffff",
                        "outline-variant": "#c3c6d7",
                        "secondary-fixed-dim": "#6bd8cb",
                        "secondary": "#006a61"
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
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .signature-gradient {
            background: linear-gradient(135deg, #004ac6 0%, #2563eb 100%);
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-surface font-body text-on-surface antialiased pb-32">
<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 bg-[#f7f9fb] flex justify-between items-center px-6 py-4 w-full">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full overflow-hidden bg-surface-container-high">
<img alt="User profile" class="w-full h-full object-cover" data-alt="Professional studio headshot of a friendly man with a warm smile against a soft neutral background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3a4p0Io-Nc_G0ZDWDQ7_1FOJnRNUbNAvRY5rHZd7NiL8FBD6DyekpVJHLSFyUz6ZnaDsX-izp6I8WkSk_vv2q7vWCw9W8r-hKDq3sdQVfSgxzQkhxuR_-C29nfUtDCXugrmMcf8TDgOsmei_dLplkqd7ujd_D9XjwuKtAGfuYGNRbd3xiTqEJ-rvzv_LYgNMmu0GKD-GdWvPvhNP5ygoK_E8Bp_L2W6nH3JMUAk6mJ2ZOP8DkEKd7lxlkFY15v2vQzJg8ltIlK6w"/>
</div>
<span class="text-xl font-extrabold text-[#004ac6] font-headline tracking-tight">RDV Wise</span>
</div>
<button class="w-10 h-10 flex items-center justify-center rounded-full text-slate-500 hover:bg-[#e6e8ea] transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
</header>
<main class="pt-24 px-6 max-w-4xl mx-auto">
<!-- Hero Section -->
<section class="mb-12">
<h1 class="text-[32px] font-extrabold font-headline text-on-surface leading-tight tracking-tight mb-2">AI Smart Diagnostic</h1>
<p class="text-on-surface-variant body-lg max-w-md">Describe your symptoms with precision. Our clinical engine will guide you to the right care path.</p>
</section>
<!-- Search & Selection Area -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
<div class="md:col-span-7 space-y-8">
<!-- Search Component -->
<div class="relative group">
<div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-outline">
<span class="material-symbols-outlined" data-icon="search">search</span>
</div>
<input class="w-full pl-12 pr-4 py-4 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface placeholder:text-outline transition-all" placeholder="Search symptoms (e.g. Headache...)" type="text"/>
</div>
<!-- Chips Selection (Multi-select) -->
<div>
<h3 class="text-sm font-semibold font-headline mb-4 uppercase tracking-wider text-outline">Common Symptoms</h3>
<div class="flex flex-wrap gap-3">
<button class="px-4 py-2 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center gap-2 transition-all active:scale-95">
<span>Headache</span>
<span class="material-symbols-outlined text-[18px]" data-icon="close">close</span>
</button>
<button class="px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-surface-container-highest transition-colors">Fever</button>
<button class="px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-surface-container-highest transition-colors">Fatigue</button>
<button class="px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-surface-container-highest transition-colors">Cough</button>
<button class="px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-surface-container-highest transition-colors">Nausea</button>
<button class="px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant hover:bg-surface-container-highest transition-colors">Chest Pain</button>
</div>
</div>
<!-- Primary CTA -->
<button class="w-full signature-gradient text-on-primary py-5 rounded-xl font-bold font-headline text-lg shadow-[0_12px_32px_rgba(0,74,198,0.15)] flex items-center justify-center gap-3 active:scale-[0.98] transition-transform">
<span class="material-symbols-outlined" data-icon="clinical_notes">clinical_notes</span>
                    Analyze My Symptoms
                </button>
</div>
<!-- Bento Result Section -->
<div class="md:col-span-5 space-y-6">
<div class="bg-surface-container-lowest p-8 rounded-[2rem] shadow-[0_12px_32px_rgba(0,74,198,0.04)] relative overflow-hidden group">
<!-- Subtle decorative gradient -->
<div class="absolute -top-24 -right-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/10 transition-colors"></div>
<div class="relative z-10">
<div class="flex items-center gap-2 mb-6">
<span class="p-2 bg-secondary/10 rounded-lg">
<span class="material-symbols-outlined text-secondary" data-icon="health_and_safety">health_and_safety</span>
</span>
<span class="text-xs font-bold font-headline uppercase tracking-widest text-secondary">Diagnostic Insight</span>
</div>
<!-- Probable Cause -->
<div class="mb-8">
<label class="text-[11px] font-semibold text-outline uppercase tracking-widest mb-1 block">Probable Cause</label>
<p class="text-xl font-bold font-headline text-on-surface">Tension-Type Headache</p>
<p class="text-sm text-on-surface-variant mt-2 leading-relaxed">Commonly caused by stress, poor posture, or lack of sleep. Monitor for changes in intensity.</p>
</div>
<!-- Specialty & Doctor Recommendation -->
<div class="space-y-6">
<div class="flex justify-between items-end border-b border-surface-container pb-4">
<div>
<label class="text-[11px] font-semibold text-outline uppercase tracking-widest mb-1 block">Specialty</label>
<p class="font-bold text-tertiary">Neurology</p>
</div>
<span class="material-symbols-outlined text-outline-variant" data-icon="chevron_right">chevron_right</span>
</div>
<div class="pt-2">
<label class="text-[11px] font-semibold text-outline uppercase tracking-widest mb-3 block">Suggested Specialist</label>
<div class="bg-surface-container-low p-4 rounded-2xl flex items-center gap-4">
<div class="w-12 h-12 rounded-xl overflow-hidden shadow-sm">
<img alt="Dr. Sarah Jenkins" class="w-full h-full object-cover" data-alt="Close up portrait of a professional female doctor in a white lab coat with a stethoscope around her neck, smiling confidently" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVM4OLo9CM75Ow8U9v1DcymPJQFPsiNaPHn-IUQ4X_y5GCUIvxMcaFAGeCWQAvp-9NHAhb5uSZ5kuXp4aC2gTgdyYx-oD-7w2vxfl1i4mFdPugoabJN_yGkbA4kuf0QHkgn7AcUkoCcmEkoag4p9vPSr-1AUEXPlnskoL-tvEWRUh_1Sl3pr7sORNU-0gf_xSPQXmdBtwGNGDDOyMnZzVmI4hSLE4JdiMDq8DRRAV62ymUwGpBUuX-_xh14tSZyz9IhwZWLu7-NZw"/>
</div>
<div class="flex-1">
<p class="font-bold text-sm">Dr. Sarah Jenkins</p>
<p class="text-[12px] text-on-surface-variant">Available Today</p>
</div>
<button class="bg-primary text-on-primary px-4 py-2 rounded-lg text-xs font-bold hover:opacity-90 active:scale-95 transition-all">
                                        Book Now
                                    </button>
</div>
</div>
</div>
</div>
</div>
<!-- Informational Disclaimer -->
<div class="p-4 rounded-2xl bg-surface-container flex gap-3 items-start">
<span class="material-symbols-outlined text-outline text-[20px] mt-0.5" data-icon="info">info</span>
<p class="text-[11px] text-on-surface-variant leading-normal font-medium">
                        This AI assessment is for informational purposes only and does not replace professional medical advice. If you experience severe symptoms, contact emergency services immediately.
                    </p>
</div>
</div>
</div>
<!-- Asymmetric Background Decorative Elements -->
<div class="fixed -bottom-20 -left-20 w-64 h-64 bg-secondary/5 rounded-full blur-[80px] -z-10"></div>
<div class="fixed top-40 right-10 w-96 h-96 bg-primary/5 rounded-full blur-[100px] -z-10"></div>
</main>
<!-- BottomNavBar -->
<nav class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-6 pt-3 bg-white/80 backdrop-blur-xl z-50 rounded-t-3xl shadow-[0_-12px_32px_rgba(0,74,198,0.06)]">
<button class="flex flex-col items-center justify-center text-slate-400 px-4 py-2 hover:text-[#2563eb] transition-colors">
<span class="material-symbols-outlined" data-icon="home">home</span>
<span class="font-medium text-[11px] mt-1">Home</span>
</button>
<button class="flex flex-col items-center justify-center text-slate-400 px-4 py-2 hover:text-[#2563eb] transition-colors">
<span class="material-symbols-outlined" data-icon="calendar_add_on">calendar_add_on</span>
<span class="font-medium text-[11px] mt-1">Book</span>
</button>
<!-- Active Item: AI Check -->
<button class="flex flex-col items-center justify-center bg-[#2563eb]/10 text-[#004ac6] rounded-2xl px-4 py-2 active:scale-95 transition-transform duration-200">
<span class="material-symbols-outlined" data-icon="clinical_notes" style="font-variation-settings: 'FILL' 1;">clinical_notes</span>
<span class="font-medium text-[11px] mt-1">AI Check</span>
</button>
<button class="flex flex-col items-center justify-center text-slate-400 px-4 py-2 hover:text-[#2563eb] transition-colors">
<span class="material-symbols-outlined" data-icon="person">person</span>
<span class="font-medium text-[11px] mt-1">Profile</span>
</button>
</nav>
</body></html>