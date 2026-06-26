<!DOCTYPE html>
<html class="light" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Smart santé - Edit Doctor</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-slate-100 text-slate-900 min-h-screen">
<main class="max-w-5xl mx-auto p-6">
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold">Edit Doctor</h1>
            <p class="text-slate-600">Update a doctor profile and city information.</p>
        </div>
        <a href="{{ route('admin.doctors') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
            <span class="material-symbols-outlined">arrow_back</span> Back to Doctors
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <ul class="list-disc list-inside space-y-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-200">
        <form method="POST" action="{{ route('admin.doctors.update', $doctor->id) }}">
            @csrf
            @method('PUT')
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $doctor->user->name) }}" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:outline-none" />
                </div>
                <div>
                    <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $doctor->user->email) }}" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:outline-none" />
                </div>
                <div>
                    <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">Phone</label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone', $doctor->user->phone) }}" class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:outline-none" />
                </div>
                <div>
                    <label for="city" class="mb-2 block text-sm font-semibold text-slate-700">City</label>
                    <input id="city" name="city" type="text" value="{{ old('city', $doctor->city) }}" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:outline-none" />
                </div>
                <div class="sm:col-span-2">
                    <label for="specialite" class="mb-2 block text-sm font-semibold text-slate-700">Specialty</label>
                    <input id="specialite" name="specialite" type="text" value="{{ old('specialite', $doctor->specialite) }}" required class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:outline-none" />
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('admin.doctors') }}" class="rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                <button type="submit" class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">Save Changes</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
