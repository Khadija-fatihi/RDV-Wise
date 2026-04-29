<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>RDV Wise - Welcome</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "on-primary-container": "#eeefff",
                    "on-surface": "#191c1e",
                    "primary-container": "#2563eb",
                    "surface-container-highest": "#e0e3e5",
                    "on-error-container": "#93000a",
                    "surface-container-low": "#f2f4f6",
                    "on-secondary-container": "#006f66",
                    "outline": "#737686",
                    "error": "#ba1a1a",
                    "on-surface-variant": "#434655",
                    "surface-container-lowest": "#ffffff",
                    "secondary-container": "#86f2e4",
                    "surface-dim": "#d8dadc",
                    "surface-tint": "#0053db",
                    "on-background": "#191c1e",
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
                    "on-tertiary": "#ffffff",
                    "outline-variant": "#c3c6d7",
                    "secondary-fixed-dim": "#6bd8cb",
                    "secondary": "#006a61"
                },
                borderRadius: {
                    DEFAULT: "0.5rem",
                    lg: "0.5rem",
                    xl: "0.75rem",
                    "2xl": "1rem",
                    "3xl": "1.5rem",
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
    body { min-height: max(884px, 100dvh); }
</style>
</head>
<body class="bg-surface font-body text-on-surface antialiased min-h-screen flex flex-col items-center justify-center p-6">
<div class="max-w-md w-full space-y-10">
    <header class="text-center space-y-4">
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 signature-gradient rounded-2xl flex items-center justify-center shadow-[0_12px_32px_rgba(0,74,198,0.12)]">
                <span class="material-symbols-outlined text-white text-4xl">medical_services</span>
            </div>
        </div>
        <h1 class="font-headline text-4xl font-extrabold tracking-tight text-primary">RDV Wise</h1>
        <div class="space-y-1">
            <h2 class="font-headline text-2xl font-bold">Welcome back</h2>
            <p class="text-on-surface-variant font-body">Simplify your care journey with clinical precision.</p>
        </div>
    </header>

    <main class="space-y-6">
        <button class="w-full flex items-center justify-center gap-3 bg-surface-container-lowest py-3.5 px-4 rounded-xl shadow-[0_4px_12px_rgba(0,74,198,0.04)] hover:bg-surface-container transition-colors group">
            <svg class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
            <span class="font-medium text-on-surface">Continue with Google</span>
        </button>

        <div class="relative py-2">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-outline-variant opacity-30"></div></div>
            <div class="relative flex justify-center text-xs uppercase"><span class="bg-surface px-4 text-on-surface-variant tracking-widest font-semibold">Or with Email</span></div>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div class="space-y-2">
                <label class="block text-sm font-medium text-on-surface ml-1">Email Address</label>
                <input name="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60" placeholder="name@berdai.ma" type="email" required/>
            </div>
            @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="space-y-2">
                <div class="flex justify-between items-center ml-1">
                    <label class="block text-sm font-medium text-on-surface">Password</label>
                    <a class="text-xs font-semibold text-primary hover:text-primary-container transition-colors" href="#">Forgot Password?</a>
                </div>
                <input name="password" class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60" placeholder="••••••••" type="password" required/>
            </div>
            <button class="w-full py-4 px-6 signature-gradient text-white font-bold rounded-xl shadow-[0_12px_24px_rgba(0,74,198,0.2)] active:scale-[0.98] transition-all duration-200" type="submit">
                Sign In
            </button>
        </form>
    </main>

    <footer class="text-center pt-4">
        <p class="text-on-surface-variant font-medium">
            Don't have an account?
            <a class="text-primary font-bold hover:underline underline-offset-4 ml-1" href="{{ route('auth.identify') }}">Sign Up</a>
        </p>
    </footer>
</div>

<div class="fixed top-0 left-0 w-full h-full -z-10 overflow-hidden pointer-events-none">
    <div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[100px]"></div>
    <div class="absolute top-[20%] -right-[5%] w-[30%] h-[30%] bg-secondary/5 rounded-full blur-[100px]"></div>
    <div class="absolute bottom-[10%] right-[10%] hidden lg:block">
        <div class="glass-panel p-8 rounded-3xl shadow-[0_24px_48px_rgba(0,0,0,0.02)] border border-white/20 max-w-sm">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-white">
                    <img alt="Doctor profile" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB19Qbfwc9tnSWk5VcXaWQPW1F02ZSxTQl8POAW-3daLjbTpudj6TdbCAncNPoDgKDh5i9FNvP-qpgS2NmC0KbagAALbGz7ul3eviiNk2ehTyhd4GB7Fhy8khdUpYtcN080-VvVsTes1Of1O-H4ktUi_R1Y1PN7ePmW4TdHZ-N8BlmTJWJgYIOQNJDtDp7FbZYJrAY3zFlfWmqAFNLvRu89E374D_5Ara1qLfy2rF6g5lCEqZ_7D7_S5wmBrKqsHbQ1mCrv83WFauk"/>
                </div>
                <div>
                    <p class="text-sm font-bold">Dr. Sarah Mitchell</p>
                    <p class="text-xs text-on-surface-variant">General Practitioner</p>
                </div>
            </div>
            <div class="bg-secondary-container/30 p-3 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary text-lg">event_available</span>
                    <span class="text-xs font-semibold text-on-secondary-container">Next Slot: 10:30 AM</span>
                </div>
                <span class="text-[10px] uppercase font-bold text-secondary tracking-wider">Available</span>
            </div>
        </div>
    </div>
    <div class="absolute top-[15%] left-[8%] hidden lg:block">
        <div class="glass-panel p-6 rounded-3xl shadow-[0_24px_48px_rgba(0,0,0,0.02)] border border-white/20">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">verified_user</span>
                </div>
                <div>
                    <p class="text-xs font-bold">Secure Verification</p>
                    <p class="text-[10px] text-on-surface-variant">Clinical grade data encryption</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>