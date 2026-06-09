<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reschedule Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <main class="mx-auto flex min-h-screen max-w-3xl items-center justify-center p-6">
        <div class="w-full rounded-2xl border border-slate-200 bg-white p-8 shadow-xl">
            <div class="mb-6">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">Admin</p>
                <h1 class="mt-2 text-3xl font-extrabold">Reschedule Appointment</h1>
                <p class="mt-2 text-sm text-slate-500">Update the appointment date and time for {{ $appointment->patient->user->name ?? 'this patient' }}.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.appointments.doReschedule', $appointment->id) }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="date_heure" class="mb-2 block text-sm font-semibold text-slate-700">New date & time</label>
                    <input
                        type="datetime-local"
                        id="date_heure"
                        name="date_heure"
                        value="{{ old('date_heure', \Carbon\Carbon::parse($appointment->date_heure)->format('Y-m-d\TH:i')) }}"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                    />
                    @error('date_heure')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="rounded-xl bg-slate-50 p-4 text-sm text-slate-600">
                    <p><strong>Patient:</strong> {{ $appointment->patient->user->name ?? 'Unknown' }}</p>
                    <p class="mt-1"><strong>Current slot:</strong> {{ \Carbon\Carbon::parse($appointment->date_heure)->format('M d, Y h:i A') }}</p>
                    <p class="mt-1"><strong>Doctor:</strong> {{ $appointment->medecin->user->name ?? 'Unknown' }}</p>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.appointments') }}" class="rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-100">Cancel</a>
                    <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-blue-700">Save Reschedule</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
