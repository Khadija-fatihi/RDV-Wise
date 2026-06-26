<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Smarte Santé')</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
      body { font-family: 'Inter', sans-serif; }
      h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
    @yield('head')
</head>
<body class="bg-light text-dark min-vh-100 pb-20 md:pb-0">
<header class="sticky top-0 z-50 navbar navbar-light bg-white border-bottom shadow-sm px-3 px-md-4">
    <div class="container-fluid d-flex justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-3 gap-md-4">
            <span class="fw-bolder text-primary fs-4">Smarte Santé</span>
            <nav class="d-none d-md-flex align-items-center gap-3">
            @auth
                @if(auth()->user()->isMedecin())
                    <a class="nav-link {{ request()->routeIs('doctor.dashboard') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('doctor.dashboard') }}">Dashboard</a>
                    <a class="nav-link {{ request()->routeIs('doctor.notifications') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('doctor.notifications') }}">Notifications</a>
                @else
                    <a class="nav-link {{ request()->routeIs('home') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('home') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('book') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('book') }}">Book</a>
                    @if(auth()->user()->isPatient())
                        <a class="nav-link {{ request()->routeIs('appointments.index') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('appointments.index') }}">Appointments</a>
                        <a class="nav-link {{ request()->routeIs('ai.checker') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('ai.checker') }}">AI Symptom</a>
                    @endif
                    <a class="nav-link {{ request()->routeIs('visits') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('visits') }}">My Visits</a>
                    <a class="nav-link {{ request()->routeIs('profile') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('profile') }}">Profile</a>
                @endif
            @else
                <a class="nav-link {{ request()->routeIs('home') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link {{ request()->routeIs('login') ? 'text-primary fw-semibold' : 'text-secondary' }}" href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </div>
        <div class="d-flex align-items-center gap-2">
        @auth
            <a href="{{ route('notifications') }}" class="btn btn-link text-primary p-2 position-relative">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">notifications</span>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </a>
            <a href="{{ route('profile') }}" class="btn btn-link text-secondary p-2">
                <span class="material-symbols-outlined">account_circle</span>
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-link text-secondary p-2">
                <span class="material-symbols-outlined">login</span>
            </a>
        @endauth
        </div>
    </div>
</header>
<main class="container-fluid py-4 px-3 px-md-4">
    @yield('content')
</main>
@yield('scripts')
</body>
</html>
