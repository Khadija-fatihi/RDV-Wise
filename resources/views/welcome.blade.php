<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>RDV Wise | Modern Healthcare Scheduling</title>
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
                        "surface-bright": "#f7f9fb",
                        "surface-dim": "#d8dadc",
                        "secondary-container": "#86f2e4",
                        "surface": "#f7f9fb",
                        "on-surface": "#191c1e",
                        "on-primary-fixed-variant": "#003ea8",
                        "on-background": "#191c1e",
                        "on-secondary-fixed": "#00201d",
                        "primary-fixed": "#dbe1ff",
                        "on-tertiary-container": "#e4f2ff",
                        "on-primary-fixed": "#00174b",
                        "tertiary-fixed": "#c9e6ff",
                        "inverse-surface": "#2d3133",
                        "surface-variant": "#e0e3e5",
                        "on-tertiary": "#ffffff",
                        "on-primary": "#ffffff",
                        "on-tertiary-fixed-variant": "#004c6e",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-container": "#eeefff",
                        "tertiary": "#005a82",
                        "error": "#ba1a1a",
                        "on-secondary-container": "#006f66",
                        "primary-container": "#2563eb",
                        "tertiary-container": "#0074a6",
                        "secondary": "#006a61",
                        "primary": "#004ac6",
                        "inverse-on-surface": "#eff1f3",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#89f5e7",
                        "surface-tint": "#0053db",
                        "on-surface-variant": "#434655",
                        "on-secondary-fixed-variant": "#005049",
                        "on-tertiary-fixed": "#001e2f",
                        "tertiary-fixed-dim": "#89ceff",
                        "on-error-container": "#93000a",
                        "primary-fixed-dim": "#b4c5ff",
                        "outline": "#737686",
                        "surface-container": "#eceef0",
                        "inverse-primary": "#b4c5ff",
                        "secondary-fixed-dim": "#6bd8cb",
                        "on-secondary": "#ffffff",
                        "background": "#f7f9fb",
                        "surface-container-highest": "#e0e3e5",
                        "surface-container-low": "#f2f4f6",
                        "surface-container-high": "#e6e8ea",
                        "outline-variant": "#c3c6d7",
                        "on-error": "#ffffff"
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
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-surface-bright text-on-surface">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 border-b border-slate-200 bg-[#F8FAFC] shadow-sm">
<div class="flex justify-between items-center h-20 px-6 lg:px-12 max-w-7xl mx-auto">
<div class="text-2xl font-black text-[#2563EB]">RDV Wise</div>
<nav class="hidden md:flex items-center space-x-8">
<a class="text-[#2563EB] border-b-2 border-[#2563EB] pb-1 font-medium font-['Manrope'] tracking-tight" href="#">Services</a>
<a class="text-slate-600 font-medium font-['Manrope'] tracking-tight hover:text-[#2563EB] transition-all" href="#">Specialties</a>
<a class="text-slate-600 font-medium font-['Manrope'] tracking-tight hover:text-[#2563EB] transition-all" href="#">About Us</a>
</nav>
<div class="flex items-center gap-4">
<button class="px-6 py-2 rounded-lg font-bold text-[#2563EB] hover:bg-primary-fixed active:scale-95 transition-all">  Sign In<a href="{{ route('login') }}"
></button>
<button class="px-6 py-2 rounded-lg font-bold bg-primary-container text-white shadow-lg active:scale-95 transition-all"> Get Started<a href="{{ route('login') }}"
> </button>
</div>
</div>
</header>
<main class="pt-20">
<!-- Hero Section -->
<section class="relative overflow-hidden bg-white py-24 lg:py-32">
<div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
<div class="z-10">
<span class="inline-block px-4 py-1.5 mb-6 text-sm font-semibold tracking-wide text-primary uppercase bg-primary-fixed rounded-full">
                        Intelligence in Care
                    </span>
<h1 class="text-5xl lg:text-7xl font-extrabold text-on-surface leading-tight tracking-tight mb-8">
                        Your Health Journey, <span class="text-primary-container">Simplified</span> with Intelligence.
                    </h1>
<p class="text-xl text-on-surface-variant leading-relaxed mb-10 max-w-xl">
                        The modern way to manage medical appointments, consultations, and health records with AI-driven insights.
                    </p>
<div class="flex flex-wrap gap-4">
<button class="px-8 py-4 bg-primary-container text-white font-bold rounded-xl shadow-xl shadow-blue-200 hover:brightness-110 active:scale-95 transition-all">
                            Get Started
                        </button>
<button class="px-8 py-4 bg-surface-container text-on-surface font-bold rounded-xl hover:bg-surface-container-high active:scale-95 transition-all flex items-center gap-2">
                            Learn More
                            <span class="material-symbols-outlined">arrow_forward</span>
</button>
</div>
</div>
<div class="relative">
<div class="absolute -top-12 -left-12 w-64 h-64 bg-secondary-container opacity-20 rounded-full blur-3xl"></div>
<div class="absolute -bottom-12 -right-12 w-64 h-64 bg-primary-fixed opacity-30 rounded-full blur-3xl"></div>
<div class="relative rounded-2xl overflow-hidden shadow-2xl border-8 border-white">
<img alt="Healthcare professional using a tablet" class="w-full h-[500px] object-cover" data-alt="Modern healthcare professional in a bright clinic setting using a digital tablet with a calm and confident expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4gjGO0ZcJAg16xfBxLr80dllnQNQGGDvL9hmK0wHP3OTMkLwcGdHV7AJ-KTK0QklvcqC4iyhDAVPjQmISy_vs58rw7Xc0iXvKvWKI-FAy3-HrA88sTT9j9mwwprCJ5F6pXY_tnaBmOkQFpDcmPee-PzoY6piFv9RPjfx9KLXRUILKRpWMI-Vb1ZeEhpVTvQ1312p5oiMGbUq34Of6Tgc641BN_8HUlKouSul1lQzR2o-_yijFtlccL9Y_BfhST8CNhJ6iv2fEZcc"/>
</div>
</div>
</div>
</section>
<!-- Features Bento Grid -->
<section class="py-24 bg-surface-container-lowest">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="text-center mb-16">
<h2 class="text-4xl font-extrabold text-on-surface mb-4">Why Choose RDV Wise?</h2>
<p class="text-on-surface-variant max-w-2xl mx-auto">Precision technology meets patient-first care to redefine your medical experience.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Feature 1 -->
<div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
<div class="w-14 h-14 bg-primary-fixed flex items-center justify-center rounded-xl mb-6 group-hover:bg-primary-container transition-colors">
<span class="material-symbols-outlined text-primary-container group-hover:text-white" data-icon="calendar_month">calendar_month</span>
</div>
<h3 class="text-xl font-bold mb-4 text-on-surface">Smart Scheduling</h3>
<p class="text-on-surface-variant leading-relaxed mb-6">Find and book doctors in seconds with real-time availability and smart matching.</p>
<img alt="Digital calendar and medical interface" class="w-full h-40 object-cover rounded-lg" data-alt="Clean and minimal digital interface showing a calendar and medical appointment details with soft blue lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgyBu6ZrMppOucQMUIZwlesj76sinY_loKaM37RzyxUtCxSLDfb5agxINBztPeoSp4mMR0xJ4eiWwf76k3CNhWgwFBCPFTxg8KMbaFDh7O9YkWMRtibZCjOizx5QCBR1UezCcelaaK0r5vmyghiSSsr5ZrzdYgvuGtaOembNjPyqkbfY4eGwZzpXiJD13ae2T6QVziXpmcU8vchkGFIeRiouueywetacooqFqB2pwGUjKH_03LR-1hUAjuvSBropM0Q8vSLDdCong"/>
</div>
<!-- Feature 2 -->
<div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
<div class="w-14 h-14 bg-secondary-fixed flex items-center justify-center rounded-xl mb-6 group-hover:bg-secondary transition-colors">
<span class="material-symbols-outlined text-on-secondary-container group-hover:text-white" data-icon="neurology" style="font-variation-settings: 'FILL' 1;">neurology</span>
</div>
<h3 class="text-xl font-bold mb-4 text-on-surface">AI-Symptom Checker</h3>
<p class="text-on-surface-variant leading-relaxed mb-6">Get initial guidance and specialty recommendations using our advanced diagnostic engine.</p>
<img alt="AI data visualization" class="w-full h-40 object-cover rounded-lg" data-alt="Abstract digital representation of neural networks and data points in shades of teal and white representing AI intelligence" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTn4tZ51wYJwGNifjGEWqr3V04S4wohlbjxNd6cd17thLTOHNv9Ska3Vk8ugdaJLpZmEjZJh2CyF-2ML5q5V730XPw3xG4EnWKn8YRB77v1fV0OrO-8oMmCcPHFJ0mbbnL_xwmBKZGWGTm6FzgIOn9pouiSLqGR28fexhkev2-Rxy4PAD5kQqY2Be2tMYgI8QaynuQA3vzOkilxp86QJA5C4_bkops2KDJ5z3x0IecakxqX-FCCxKhUHqJmLbJxpzoeUd3NC0PQeI"/>
</div>
<!-- Feature 3 -->
<div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow group">
<div class="w-14 h-14 bg-tertiary-fixed flex items-center justify-center rounded-xl mb-6 group-hover:bg-tertiary transition-colors">
<span class="material-symbols-outlined text-on-tertiary-fixed-variant group-hover:text-white" data-icon="verified_user">verified_user</span>
</div>
<h3 class="text-xl font-bold mb-4 text-on-surface">Secure Health Records</h3>
<p class="text-on-surface-variant leading-relaxed mb-6">Full control over your medical history and doctor access with end-to-end encryption.</p>
<img alt="Digital security and data" class="w-full h-40 object-cover rounded-lg" data-alt="Close-up of a tablet screen showing medical charts and data visualizations with a focus on security and clarity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB2iWQJufB-WGlDay2GhGyFoicnz0Q54gYbpHcPgKuetoqe7z-oUOKu40tHEXFKc6E_t9WIKqSDMzWfylL46Jancdu4Cy1M8UAnf9pcsRGk_r5_ixSlILsgCFUo0gumE-bQ_mwSrBfoZmqEPssF6aujSVfBCcD2SIFh4-92KeKgwIfx2ce_2ry7Ub8ZqjqhzdLKB4DO3JFdxlFxzv7YBg6xNmegGEzSdM8DowbP5wGAHGQLuN74soxbECSB6W9QDkQRz2juF8D-LeE"/>
</div>
</div>
</div>
</section>
<!-- Testimonial Section -->
<section class="py-24 overflow-hidden">
<div class="max-w-7xl mx-auto px-6 lg:px-12">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
<div class="relative p-12 bg-primary-container rounded-[2rem] text-white overflow-hidden shadow-2xl">
<span class="material-symbols-outlined text-8xl absolute -top-4 -left-4 opacity-10" data-icon="format_quote">format_quote</span>
<div class="relative z-10">
<p class="text-2xl font-medium leading-relaxed italic mb-8">
                                "RDV Wise has completely transformed our clinic's workflow. The AI scheduling reduces no-shows by 40% and allows me to focus purely on patient care."
                            </p>
<div class="flex items-center gap-4">
<img alt="Doctor portrait" class="w-16 h-16 rounded-full object-cover border-2 border-white/30" data-alt="Professional portrait of a male doctor in a white coat smiling with a blurred medical background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8W3NW7I5mZpeMCa6gzS4TEnqndVeZQWfDHSBvxB2qqyw-PulDAx-BhyL3-KPmyR30Jp_NgzuVsxWNgM_RkvJp8MCVTbovIsw2y4wjMYgwv512-NqSnmhQQGUHfucxJwgyDl3mGEFLupazwXp3QReWGRGaK1n6p8VsLx9m9acJ9ZSdVwaAQl59b-ubMCIVAvWPpbtF7qeoRUL_j2JwSmJ80lnPLBBUQb0czzggi6CZx2cY9_U3Rxx0x-cOejuLXFJ0kd_kjj5i7Sk"/>
<div>
<h4 class="font-bold text-lg">Dr. Marcus Chen</h4>
<p class="text-white/80">Chief of Medicine, Northside Clinic</p>
</div>
</div>
</div>
</div>
<div class="relative p-12 bg-white rounded-[2rem] text-on-surface border border-slate-100 shadow-xl overflow-hidden">
<span class="material-symbols-outlined text-8xl absolute -top-4 -left-4 text-slate-100" data-icon="format_quote">format_quote</span>
<div class="relative z-10">
<p class="text-2xl font-medium leading-relaxed italic mb-8">
                                "I used to spend hours calling different offices. With RDV Wise, I booked my specialist appointment in two minutes. The medical records sync is a lifesaver."
                            </p>
<div class="flex items-center gap-4">
<img alt="Patient portrait" class="w-16 h-16 rounded-full object-cover border-2 border-primary-fixed" data-alt="Friendly portrait of a woman in casual attire smiling confidently in a bright urban setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuASTrVke1njpWfhJAPZkjAOc8gyOL_WYncP7Iha06f9EWDjaXczz8fYc4LpCNuUOvxvhV2xyIzjeBTiXncn1x-YNMXRYMl9UrL6uGkAsgEpALiDp4UvqrkfM3O1B6su9edXdCeaxbgITtnbB5ZduxRU0Z9h3LupBixYDjODrQScwo_nUsYrxcXeWfZDiDXrpyXjtUgDK4LMSgfaP5oV9pmhWPlyUz8-2-fJtmwl3lQ1CK9ZLvf-iGCJ1qDf9-4tS0ovjPKP2irB3JU"/>
<div>
<h4 class="font-bold text-lg">Sarah Jenkins</h4>
<p class="text-on-surface-variant">RDV Wise Patient since 2023</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Final CTA Section -->
<section class="py-24 px-6">
<div class="max-w-5xl mx-auto rounded-3xl bg-slate-900 p-12 lg:p-20 text-center relative overflow-hidden">
<div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
<div class="relative z-10">
<h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6">Ready to join the modern healthcare network?</h2>
<p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto">Experience the future of medical management today. Join thousands of users who have simplified their health journey.</p>
<button class="px-10 py-5 bg-primary-container text-white font-black text-lg rounded-xl shadow-2xl hover:shadow-blue-500/20 active:scale-95 transition-all">
                        <a href="{{ route('login') }}" class="text-white no-underline"> Create Account</a>
                    </button>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="w-full border-t border-slate-200 bg-slate-50 rounded-none">
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-6 py-12 lg:px-12 max-w-7xl mx-auto">
<div class="flex flex-col gap-4">
<div class="text-lg font-bold text-slate-900">RDV Wise</div>
<p class="font-['Inter'] text-sm leading-relaxed text-slate-500 max-w-xs">
                    © 2024 RDV Wise. Modern healthcare scheduling.
                </p>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="flex flex-col gap-3">
<a class="text-slate-500 text-sm font-medium hover:text-[#0D9488] underline transition-all" href="#">Privacy Policy</a>
<a class="text-slate-500 text-sm font-medium hover:text-[#0D9488] underline transition-all" href="#">Terms of Service</a>
</div>
<div class="flex flex-col gap-3">
<a class="text-slate-500 text-sm font-medium hover:text-[#0D9488] underline transition-all" href="#">Help Center</a>
<a class="text-slate-500 text-sm font-medium hover:text-[#0D9488] underline transition-all" href="#">Contact</a>
</div>
</div>
<div class="flex flex-col items-start md:items-end gap-4">
<div class="flex gap-4">
<span class="material-symbols-outlined text-slate-400 cursor-pointer hover:text-primary transition-colors" data-icon="share">share</span>
<span class="material-symbols-outlined text-slate-400 cursor-pointer hover:text-primary transition-colors" data-icon="notifications">notifications</span>
</div>
<p class="text-xs text-slate-400 italic">Built for a healthier tomorrow.</p>
</div>
</div>
</footer>
</body></html>