<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>RDV Wise - Doctor Sign Up</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-primary-container": "#eeefff", "on-surface": "#191c1e",
                        "primary-container": "#2563eb", "surface-container-highest": "#e0e3e5",
                        "on-error-container": "#93000a", "surface-container-low": "#f2f4f6",
                        "on-secondary-container": "#006f66", "outline": "#737686",
                        "error": "#ba1a1a", "on-surface-variant": "#434655",
                        "surface-container-lowest": "#ffffff", "secondary-container": "#86f2e4",
                        "surface-tint": "#0053db", "on-background": "#191c1e",
                        "surface-variant": "#e0e3e5", "surface-container": "#eceef0",
                        "surface-bright": "#f7f9fb", "tertiary": "#005a82",
                        "on-tertiary-container": "#e4f2ff", "surface": "#f7f9fb",
                        "inverse-surface": "#2d3133", "on-primary": "#ffffff",
                        "error-container": "#ffdad6", "tertiary-container": "#0074a6",
                        "primary": "#004ac6", "primary-fixed": "#dbe1ff",
                        "inverse-on-surface": "#eff1f3", "background": "#f7f9fb",
                        "on-secondary": "#ffffff", "surface-container-high": "#e6e8ea",
                        "on-tertiary": "#ffffff", "outline-variant": "#c3c6d7",
                        "secondary": "#006a61",
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem", lg: "0.5rem", xl: "0.75rem",
                        "2xl": "1rem", "3xl": "1.5rem", full: "9999px"
                    },
                    fontFamily: { headline: ["Manrope"], body: ["Inter"], label: ["Inter"] }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .signature-gradient { background: linear-gradient(135deg, #004ac6 0%, #2563eb 100%); }
        .glass-panel { background: rgba(255,255,255,0.8); backdrop-filter: blur(20px); }
        .file-upload-zone { border: 2px dashed #c3c6d7; transition: all 0.2s ease; }
        .file-upload-zone:hover { border-color: #004ac6; background-color: rgba(0,74,198,0.02); }
    </style>
</head>
<body class="bg-surface font-body text-on-surface antialiased min-h-screen flex flex-col items-center justify-center p-6">
<div class="max-w-md w-full space-y-8 py-12">

    <header class="text-center space-y-4">
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 signature-gradient rounded-2xl flex items-center justify-center shadow-[0_12px_32px_rgba(0,74,198,0.12)]">
                <span class="material-symbols-outlined text-white text-4xl">medical_services</span>
            </div>
        </div>
        <h1 class="font-headline text-4xl font-extrabold tracking-tight text-primary">RDV Wise</h1>
        <div class="space-y-1">
            <h2 class="font-headline text-2xl font-bold">Doctor Sign Up</h2>
            <p class="text-on-surface-variant font-body">Create your professional account to join the network.</p>
        </div>
    </header>

    <main class="space-y-6">

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ form opens here and wraps ALL inputs --}}
        <form action="{{ route('auth.signup.doctor.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off" class="space-y-5">
            @csrf

            {{-- Full Name --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">Full Name</label>
                <input name="name" type="text" autocomplete="off" value="{{ old('name') }}"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60 @error('name') ring-2 ring-red-400 @enderror"
                    placeholder="Dr. John Smith" required/>
                @error('name') <p class="text-red-500 text-xs ml-1">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">Email Address</label>
                <input name="email" type="email" autocomplete="off" value="{{ old('email') }}"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60 @error('email') ring-2 ring-red-400 @enderror"
                    placeholder="doctor@berdai.ma" required/>
                @error('email') <p class="text-red-500 text-xs ml-1">{{ $message }}</p> @enderror
            </div>

            {{-- CIN --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">CIN (Identity Card Number)</label>
                <input name="cin" type="text" autocomplete="off" value="{{ old('cin') }}"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60 @error('cin') ring-2 ring-red-400 @enderror"
                    placeholder="Enter your ID number" required/>
                @error('cin') <p class="text-red-500 text-xs ml-1">{{ $message }}</p> @enderror
            </div>

            {{-- Phone --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">Phone Number</label>
                <input name="phone" type="tel" autocomplete="off" value="{{ old('phone') }}"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60 @error('phone') ring-2 ring-red-400 @enderror"
                    placeholder="+212 600 000 000" required/>
                @error('phone') <p class="text-red-500 text-xs ml-1">{{ $message }}</p> @enderror
            </div>

            {{-- Speciality --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">Speciality</label>
                <input name="specialite" type="text" autocomplete="off" value="{{ old('specialite') }}"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60"
                    placeholder="e.g. Cardiologist, Nephrologist..."/>
            </div>

            {{-- Password --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">Password</label>
                <input name="password" type="password" autocomplete="new-password"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60 @error('password') ring-2 ring-red-400 @enderror"
                    placeholder="Min. 8 characters" required/>
                @error('password') <p class="text-red-500 text-xs ml-1">{{ $message }}</p> @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface ml-1">Confirm Password</label>
                <input name="password_confirmation" type="password" autocomplete="new-password"
                    class="w-full px-4 py-3 bg-surface-container-highest border-none rounded-xl focus:ring-2 focus:ring-primary/40 text-on-surface transition-all placeholder:text-outline/60"
                    placeholder="Repeat your password" required/>
            </div>

            {{-- Upload Credentials --}}
            <div class="space-y-3 pt-2">
                <div class="flex items-center gap-2 ml-1">
                    <span class="material-symbols-outlined text-primary text-xl">verified</span>
                    <label class="text-sm font-bold text-on-surface uppercase tracking-wider">Professional Verification</label>
                </div>
                <p class="text-xs text-on-surface-variant ml-1 px-1">Upload your certificates or diplomas to verify your credentials.</p>
                <div class="file-upload-zone rounded-xl p-6 text-center cursor-pointer bg-surface-container-low">
                    <input class="hidden" id="certificates-upload" name="certificates[]" multiple type="file" accept=".pdf,.jpg,.jpeg,.png"/>
                    <label class="cursor-pointer" for="certificates-upload">
                        <span class="material-symbols-outlined text-3xl text-primary mb-2">cloud_upload</span>
                        <p class="text-sm font-semibold text-on-surface">Upload Credentials</p>
                        <p class="text-xs text-on-surface-variant mt-1">PDF, JPG or PNG (Career certificates, diplomas)</p>
                    </label>
                </div>
            </div>

            {{-- ✅ Submit button is INSIDE the form --}}
            <button type="submit" class="w-full py-4 px-6 signature-gradient text-white font-bold rounded-xl shadow-[0_12px_24px_rgba(0,74,198,0.2)] active:scale-[0.98] transition-all duration-200">
                Create Doctor Account
            </button>

        </form> {{-- ✅ form closes here, after all inputs --}}

    </main>

    <footer class="text-center pt-4">
        <p class="text-on-surface-variant font-medium">
            Already have an account?
            <a class="text-primary font-bold hover:underline underline-offset-4 ml-1" href="{{ route('login') }}">Sign In</a>
        </p>
    </footer>
</div>
</body>
</html>