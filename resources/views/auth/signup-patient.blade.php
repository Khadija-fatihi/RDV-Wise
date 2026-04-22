<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Patient Sign Up | RDV Wise</title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "surface-container-low": "#f2f4f6",
                    "surface-container": "#eceef0",
                    "surface-container-high": "#e6e8ea",
                    "on-error-container": "#93000a",
                    "surface-variant": "#e0e3e5",
                    "surface-container-highest": "#e0e3e5",
                    "on-primary": "#ffffff",
                    "tertiary-container": "#0074a6",
                    "tertiary": "#005a82",
                    "secondary-container": "#86f2e4",
                    "inverse-surface": "#2d3133",
                    "on-tertiary": "#ffffff",
                    "inverse-on-surface": "#eff1f3",
                    "background": "#f7f9fb",
                    "on-background": "#191c1e",
                    "secondary": "#006a61",
                    "on-primary-container": "#eeefff",
                    "on-surface": "#191c1e",
                    "on-primary-fixed": "#00174b",
                    "surface-tint": "#0053db",
                    "inverse-primary": "#b4c5ff",
                    "primary": "#004ac6",
                    "outline": "#737686",
                    "on-surface-variant": "#434655",
                    "primary-container": "#2563eb",
                    "on-secondary-container": "#006f66",
                    "error": "#ba1a1a",
                    "primary-fixed": "#dbe1ff",
                    "on-error": "#ffffff",
                    "error-container": "#ffdad6",
                    "surface-container-lowest": "#ffffff",
                    "outline-variant": "#c3c6d7",
                    "on-secondary": "#ffffff",
                    "surface-bright": "#f7f9fb",
                    "surface": "#f7f9fb"
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
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
<main class="flex-grow flex items-center justify-center p-6 lg:p-12">
    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 bg-surface-container-lowest rounded-xl overflow-hidden shadow-xl border border-outline-variant/30">

        <!-- Branding Column -->
        <div class="hidden lg:flex flex-col justify-between p-12 bg-primary relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-8">
                    <span class="material-symbols-outlined text-on-primary text-4xl">verified_user</span>
                    <span class="text-on-primary text-2xl font-extrabold tracking-tight font-headline">RDV Wise</span>
                </div>
                <h1 class="text-4xl font-extrabold text-on-primary leading-tight mb-6">
                    Secure Access to Your Healthcare Identity.
                </h1>
                <p class="text-on-primary/80 text-lg max-w-md leading-relaxed">
                    Join thousands of patients managing their medical credentials with bank-grade security and clinical precision.
                </p>
            </div>
            <div class="relative z-10 mt-12">
                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-4 text-on-primary">
                        <div class="bg-on-primary/10 p-2 rounded-lg">
                            <span class="material-symbols-outlined">security</span>
                        </div>
                        <div>
                            <p class="font-semibold">Encrypted Storage</p>
                            <p class="text-sm text-on-primary/70">Your data is protected with 256-bit AES encryption.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-on-primary">
                        <div class="bg-on-primary/10 p-2 rounded-lg">
                            <span class="material-symbols-outlined">quick_reference_all</span>
                        </div>
                        <div>
                            <p class="font-semibold">Instant Verification</p>
                            <p class="text-sm text-on-primary/70">Seamless integration with major medical facilities.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <img alt="Abstract medical pattern" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7rNqorpUc7GKbCjvQKwuU5xliOgWhnJvlpS9cBRp3s64FD8EBkio4UnywXJUBFwLv-VdNwNA4gndrkIu-1o_xjzrGNP1jVB9lK00uMA7rhUZG2aCOAeCkuw40EXmp2zjxjN3qetR2_0rgtHi-6cQyAUSr6j0IVNRpWZDBFVC1VeUiQzMuA7wuSvwmQQz6v8b2VawrThVlmhnuzDKBwZyq_hLznNZnxGq5dRH1r2APSSaIUPZep36WgMIyiQjE_LyRDoWqAamV7Ow"/>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-primary via-primary/50 to-transparent"></div>
        </div>

        <!-- Form Column -->
        <div class="p-8 lg:p-16 flex flex-col justify-center">
            <div class="mb-10">
                <h2 class="text-3xl font-extrabold text-on-surface font-headline mb-2">Create Account</h2>
                <p class="text-on-surface-variant font-body">Please fill in your details to get started with your medical profile.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-5" method="POST" action="{{ route('auth.signup.patient.store') }}">
                @csrf

                <!-- Full Name -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface-variant" for="full_name">Full Name</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">person</span>
                        <input name="name" value="{{ old('name') }}" class="w-full pl-10 pr-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-outline/50" id="full_name" placeholder="John Doe" type="text" required/>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-on-surface-variant" for="email">Email Address</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">mail</span>
                            <input name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-outline/50" id="email" placeholder="john@example.com" type="email" required/>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-on-surface-variant" for="phone">Phone Number</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">call</span>
                            <input name="phone" value="{{ old('phone') }}" class="w-full pl-10 pr-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-outline/50" id="phone" placeholder="+212 600-000000" type="tel"/>
                        </div>
                    </div>
                </div>

                <!-- CIN -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface-variant" for="cin">CIN (Identity Card Number)</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">badge</span>
                        <input name="cin" value="{{ old('cin') }}" class="w-full pl-10 pr-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-outline/50" id="cin" placeholder="A123456789" type="text"/>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface-variant" for="password">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                        <input name="password" class="w-full pl-10 pr-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-outline/50" id="password" placeholder="••••••••••••" type="password" required/>
                    </div>
                    <p class="text-xs text-on-surface-variant/70 italic">Must be at least 8 characters.</p>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-on-surface-variant" for="password_confirmation">Confirm Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                        <input name="password_confirmation" class="w-full pl-10 pr-4 py-3 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-outline/50" id="password_confirmation" placeholder="••••••••••••" type="password" required/>
                    </div>
                </div>

<!-- Upload Medical Records -->
<div class="space-y-2 mb-4">
<label class="block text-sm font-semibold text-on-surface-variant">Medical Records (Optional)</label>
<div class="border-2 border-dashed border-outline-variant/60 rounded-xl p-6 flex flex-col items-center justify-center bg-surface-bright hover:bg-surface-container-low hover:border-primary/50 transition-all cursor-pointer group">
<span class="material-symbols-outlined text-outline text-3xl mb-2 group-hover:text-primary transition-colors" data-icon="cloud_upload">cloud_upload</span>
<p class="text-sm text-on-surface font-medium">Drag and drop or <span class="text-primary font-semibold">browse</span></p>
<p class="text-xs text-on-surface-variant/70 mt-1 uppercase tracking-wider">PDF, JPG, PNG (Max. 10MB)</p>
<p class="text-[11px] text-on-surface-variant/50 mt-1">Upload your historical health documents</p>
</div>
                <!-- Terms -->
                <div class="flex items-start gap-3 py-2">
                    <input class="mt-1 w-4 h-4 text-primary border-outline-variant rounded focus:ring-primary" id="terms" type="checkbox" required/>
                    <label class="text-sm text-on-surface-variant leading-relaxed" for="terms">
                        I agree to the <a class="text-primary font-medium hover:underline" href="#">Terms of Service</a> and <a class="text-primary font-medium hover:underline" href="#">Privacy Policy</a>.
                    </label>
                </div>

                <!-- Submit -->
                <button class="w-full bg-primary-container text-on-primary py-4 rounded-lg font-bold text-lg hover:brightness-110 active:scale-[0.98] transition-all shadow-lg shadow-primary/20" type="submit">
                    Create My Account
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-outline-variant/50 text-center">
                <p class="text-on-surface-variant">
                    Already have an account?
                    <a class="text-primary font-bold hover:underline ml-1" href="{{ route('login') }}">Login here</a>
                </p>
            </div>
        </div>
    </div>
</main>
<footer class="p-6 text-center text-on-surface-variant text-sm">
    <p>© 2024 RDV Wise. Licensed Healthcare Software Provider.</p>
</footer>
</body>
</html>