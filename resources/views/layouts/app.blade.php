<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'RDV Wise')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "on-secondary": "#ffffff",
              "on-primary-fixed": "#00174b",
              "tertiary-fixed": "#c9e6ff",
              "surface": "#f7f9fb",
              "secondary-fixed": "#89f5e7",
              "inverse-on-surface": "#eff1f3",
              "on-tertiary-fixed": "#001e2f",
              "tertiary": "#005a82",
              "surface-tint": "#0053db",
              "outline-variant": "#c3c6d7",
              "on-surface": "#191c1e",
              "surface-container-highest": "#e0e3e5",
              "on-error": "#ffffff",
              "secondary": "#006a61",
              "on-secondary-container": "#006f66",
              "surface-container": "#eceef0",
              "secondary-fixed-dim": "#6bd8cb",
              "surface-variant": "#e0e3e5",
              "on-secondary-fixed": "#00201d",
              "on-background": "#191c1e",
              "inverse-primary": "#b4c5ff",
              "surface-container-low": "#f2f4f6",
              "on-surface-variant": "#434655",
              "on-secondary-fixed-variant": "#005049",
              "on-tertiary-container": "#e4f2ff",
              "surface-container-lowest": "#ffffff",
              "on-tertiary": "#ffffff",
              "primary": "#004ac6",
              "tertiary-fixed-dim": "#89ceff",
              "on-primary": "#ffffff",
              "on-tertiary-fixed-variant": "#004c6e",
              "on-primary-fixed-variant": "#003ea8",
              "primary-fixed-dim": "#b4c5ff",
              "primary-container": "#2563eb",
              "surface-dim": "#d8dadc",
              "inverse-surface": "#2d3133",
              "secondary-container": "#86f2e4",
              "surface-bright": "#f7f9fb",
              "background": "#f7f9fb",
              "outline": "#737686",
              "on-primary-container": "#eeefff",
              "error": "#ba1a1a",
              "tertiary-container": "#0074a6",
              "error-container": "#ffdad6",
              "on-error-container": "#93000a",
              "primary-fixed": "#dbe1ff",
              "surface-container-high": "#e6e8ea"
            },
            borderRadius: {
              DEFAULT: "0.25rem",
              lg: "0.5rem",
              xl: "0.75rem",
              full: "9999px"
            },
            fontFamily: {
              headline: ["Manrope", "sans-serif"],
              body: ["Inter", "sans-serif"],
              label: ["Inter", "sans-serif"]
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
<body class="bg-surface text-on-surface min-h-screen pb-20 md:pb-0">
<header class="sticky top-0 z-50 flex justify-between items-center px-6 py-3 w-full bg-slate-50 border-b border-slate-200 shadow-sm">
    <div class="flex items-center gap-8">
        <span class="text-2xl font-extrabold text-blue-600 tracking-tight">RDV Wise</span>
        <nav class="hidden md:flex items-center gap-6">
            @auth
                @if(auth()->user()->isMedecin())
                    <a class="{{ request()->routeIs('doctor.dashboard') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('doctor.dashboard') }}">Dashboard</a>
                    <a class="{{ request()->routeIs('doctor.notifications') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('doctor.notifications') }}">Notifications</a>
                @else
                    <a class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('home') }}">Home</a>
                    <a class="{{ request()->routeIs('book') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('book') }}">Book</a>
                    <a class="{{ request()->routeIs('visits') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('visits') }}">My Visits</a>
                    <a class="{{ request()->routeIs('profile') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('profile') }}">Profile</a>
                @endif
            @else
                <a class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('home') }}">Home</a>
                <a class="{{ request()->routeIs('login') ? 'text-blue-600 font-bold' : 'text-slate-600' }} font-medium hover:text-blue-500 transition-colors" href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </div>
    <div class="flex items-center gap-4">
        @auth
            <a href="{{ route('notifications') }}" class="relative p-2 text-blue-600 font-bold border-b-2 border-blue-600 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">notifications</span>
                <span class="absolute top-1 right-1 w-2 h-2 bg-error rounded-full"></span>
            </a>
            <a href="{{ route('profile') }}" class="p-2 text-slate-600 hover:text-blue-500 transition-colors">
                <span class="material-symbols-outlined">account_circle</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="p-2 text-slate-600 hover:text-blue-500 transition-colors">
                <span class="material-symbols-outlined">login</span>
            </a>
        @endauth
    </div>
</header>
<main class="max-w-7xl mx-auto px-4 py-8 md:px-6">
    @yield('content')
</main>
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-2 pb-safe bg-white/80 backdrop-blur-md border-t border-slate-200 shadow-lg md:hidden">
    <a class="flex flex-col items-center justify-center text-slate-500 hover:bg-slate-100 px-3 py-1 rounded-xl transition-all" href="{{ route('home') }}">
        <span class="material-symbols-outlined">home</span>
        <span class="text-[10px] font-inter font-medium">Home</span>
    </a>
    <a class="flex flex-col items-center justify-center text-slate-500 hover:bg-slate-100 px-3 py-1 rounded-xl transition-all" href="{{ route('book') }}">
        <span class="material-symbols-outlined">calendar_today</span>
        <span class="text-[10px] font-inter font-medium">Book</span>
    </a>
    <a class="flex flex-col items-center justify-center text-slate-500 hover:bg-slate-100 px-3 py-1 rounded-xl transition-all" href="{{ route('visits') }}">
        <span class="material-symbols-outlined">event_note</span>
        <span class="text-[10px] font-inter font-medium">Visits</span>
    </a>
    <a class="flex flex-col items-center justify-center text-blue-600 bg-blue-50 px-3 py-1 rounded-xl transition-all" href="{{ route('profile') }}">
        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">person</span>
        <span class="text-[10px] font-inter font-medium">Profile</span>
    </a>
</nav>
</body>
</html>
