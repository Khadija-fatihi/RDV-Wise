<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>User Identify - RDV Wise</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        tertiary: "#005a82",
                        background: "#f7f9fb",
                        "surface-dim": "#d8dadc",
                        "outline-variant": "#c3c6d7",
                        "tertiary-fixed": "#c9e6ff",
                        "on-surface-variant": "#434655",
                        "on-secondary-fixed": "#00201d",
                        "tertiary-container": "#0074a6",
                        "secondary-fixed-dim": "#6bd8cb",
                        "inverse-on-surface": "#eff1f3",
                        outline: "#737686",
                        "tertiary-fixed-dim": "#89ceff",
                        "surface-variant": "#e0e3e5",
                        "surface-container-high": "#e6e8ea",
                        "on-primary-container": "#eeefff",
                        "on-primary-fixed": "#00174b",
                        "on-tertiary": "#ffffff",
                        "on-primary-fixed-variant": "#003ea8",
                        "inverse-surface": "#2d3133",
                        "surface-bright": "#f7f9fb",
                        surface: "#f7f9fb",
                        "secondary-fixed": "#89f5e7",
                        "on-error": "#ffffff",
                        "primary-fixed-dim": "#b4c5ff",
                        "on-tertiary-container": "#e4f2ff",
                        "inverse-primary": "#b4c5ff",
                        "surface-container": "#eceef0",
                        "on-primary": "#ffffff",
                        "on-background": "#191c1e",
                        "on-tertiary-fixed": "#001e2f",
                        "secondary-container": "#86f2e4",
                        "on-secondary": "#ffffff",
                        "surface-tint": "#0053db",
                        "surface-container-low": "#f2f4f6",
                        primary: "#004ac6",
                        "on-secondary-fixed-variant": "#005049",
                        "on-surface": "#191c1e",
                        error: "#ba1a1a",
                        "on-tertiary-fixed-variant": "#004c6e",
                        "surface-container-highest": "#e0e3e5",
                        "surface-container-lowest": "#ffffff",
                        "primary-container": "#2563eb",
                        "error-container": "#ffdad6",
                        "primary-fixed": "#dbe1ff",
                        "on-secondary-container": "#006f66",
                        secondary: "#006a61",
                        "on-error-container": "#93000a"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    fontFamily: {
                        headline: ["Manrope"],
                        body: ["Inter"],
                        label: ["Inter"]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .font-manrope { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
<header class="fixed top-0 left-0 w-full z-50 flex items-center px-4 h-16 bg-slate-50 border-b border-slate-200 shadow-sm">
<div class="flex items-center gap-4 w-full">
<a href="{{ route('login') }}" class="p-2 text-blue-600 hover:bg-slate-100 rounded-xl transition-colors active:scale-95 duration-150">
<span class="material-symbols-outlined">arrow_back</span>
</a>
<h1 class="font-manrope font-bold text-lg text-blue-600">User Identify</h1>
</div>
</header>
<main class="flex-grow flex flex-col items-center justify-center px-6 pt-24 pb-32 max-w-4xl mx-auto w-full">
<div class="text-center mb-12">
<div class="inline-flex items-center justify-center w-20 h-20 mb-6 rounded-2xl bg-primary-container/10">
<span class="material-symbols-outlined text-primary text-4xl">health_and_safety</span>
</div>
<h2 class="font-headline font-extrabold text-3xl md:text-4xl text-on-surface mb-3 tracking-tight">Welcome to RDV Wise</h2>
<p class="font-body text-on-surface-variant text-lg">Please select your profile type to continue</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-3xl">
<a href="{{ route('auth.signup.patient') }}" class="group relative flex flex-col items-center p-8 bg-surface-container-lowest border-2 border-transparent hover:border-primary-container transition-all duration-300 rounded-xl shadow-sm hover:shadow-xl active:scale-98">
<div class="w-24 h-24 mb-6 rounded-full bg-blue-50 flex items-center justify-center group-hover:bg-primary-container group-hover:text-white transition-colors duration-300">
<span class="material-symbols-outlined text-5xl">person</span>
</div>
<h3 class="font-headline font-bold text-xl mb-2 text-on-surface">I am a Patient</h3>
<p class="font-body text-sm text-on-surface-variant text-center leading-relaxed">Book appointments, manage your health records, and connect with specialists.</p>
<div class="mt-6 flex items-center text-primary font-semibold text-sm">
                    Continue as Patient
                    <span class="material-symbols-outlined ml-1 text-sm">chevron_right</span>
</div>
</a>
<a href="{{ route('auth.doctor') }}" class="group relative flex flex-col items-center p-8 bg-surface-container-lowest border-2 border-transparent hover:border-secondary transition-all duration-300 rounded-xl shadow-sm hover:shadow-xl active:scale-98">
<div class="w-24 h-24 mb-6 rounded-full bg-teal-50 flex items-center justify-center group-hover:bg-secondary group-hover:text-white transition-colors duration-300">
<span class="material-symbols-outlined text-5xl">medical_services</span>
</div>
<h3 class="font-headline font-bold text-xl mb-2 text-on-surface">I am a Doctor</h3>
<p class="font-body text-sm text-on-surface-variant text-center leading-relaxed">Manage your schedule, view patient histories, and streamline your practice.</p>
<div class="mt-6 flex items-center text-secondary font-semibold text-sm">
                    Continue as Doctor
                    <span class="material-symbols-outlined ml-1 text-sm">chevron_right</span>
</div>
</a>
</div>
<div class="mt-12 text-center">
<p class="text-sm text-on-surface-variant">
                Already have an account? <a class="text-primary font-semibold hover:underline" href="{{ route('login') }}">Log in here</a>
</p>
</div>
</main>
<div class="fixed bottom-0 left-0 w-full p-4 pointer-events-none">
<div class="max-w-md mx-auto aspect-video rounded-xl overflow-hidden shadow-2xl opacity-10 blur-sm pointer-events-none">
<img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuADSNju6rRTbaqXbyv7ojQ98FJmwUGWDhY7J5ab9ZCUfuZIPbaX6GciM9W4MDpnp9Skus22RjnDY1Fyg9TQkWv6JfDQ2Z32x157qVSHoqzdp5Cp9t1a9cMLvcDrZ0Iq1MhfOG_MLdr26BTeI69cpyBzMcJD_9HXNbrfVQGaegQ1UrtOkFUfXtaQcFZ75Tzkno4A6-Vi3sQBek8rxMWHK5XkBTcUDu0ys5RlEq9XyGU9CDXDALwEAejBC97OgRpO_9ygOoSMkKdE1YU" alt="clean modern medical clinic interior with soft blue ambient lighting and glass partitions for a professional healthcare atmosphere"/>
</div>
</div>
<nav class="fixed bottom-0 w-full z-50 flex justify-around items-center px-6 pb-4 pt-2 bg-white border-t border-slate-200 shadow-lg">
<a class="flex flex-col items-center justify-center text-slate-500 p-2 font-inter text-xs font-medium hover:text-blue-600 active:opacity-80 transition-opacity" href="#">
<span class="material-symbols-outlined mb-1">help_outline</span>
            Help
        </a>
<a class="flex flex-col items-center justify-center text-slate-500 p-2 font-inter text-xs font-medium hover:text-blue-600 active:opacity-80 transition-opacity" href="#">
<span class="material-symbols-outlined mb-1">contact_support</span>
            Support
        </a>
</nav>
</body>
</html>
