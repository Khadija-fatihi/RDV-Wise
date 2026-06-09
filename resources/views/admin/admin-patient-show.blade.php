<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <main class="mx-auto flex min-h-screen max-w-6xl items-center justify-center p-6">
        <div class="w-full rounded-2xl border border-slate-200 bg-white p-8 shadow-xl">
            <div class="mb-6 flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-600">Admin</p>
                    <h1 class="mt-2 text-3xl font-extrabold">Patient Profile</h1>
                    <p class="mt-2 text-sm text-slate-500">Full patient record and visit history.</p>
                </div>
                <a href="{{ route('admin.patients') }}" class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100">Back to list</a>
            </div>

            <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                <section class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                    <h2 class="text-xl font-bold">Personal Information</h2>
                    <dl class="mt-4 grid gap-4 text-sm text-slate-700">
                        <div>
                            <dt class="text-slate-500">Name</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-900">{{ $patient->user->name ?? 'Unknown' }}</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">Email</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-900">{{ $patient->user->email ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">CIN</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-900">{{ $patient->cin ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">Sex</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-900">{{ $patient->sexe ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-slate-500">Dialysis Type</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-900">{{ $patient->type_dialyse ?? 'N/A' }}</dd>
                        </div>
                    </dl>
                </section>

                <section class="rounded-2xl border border-slate-200 bg-white p-6">
                    <h2 class="text-xl font-bold">Appointments</h2>
                    @forelse($patient->appointments ?? [] as $appointment)
                        <article class="mt-4 rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm">
                            <p class="font-semibold text-slate-900">{{ \Carbon\Carbon::parse($appointment->date_heure)->format('M d, Y h:i A') }}</p>
                            <p class="mt-1 text-slate-600">Doctor: {{ $appointment->medecin->user->name ?? 'Unknown' }}</p>
                            <p class="mt-1 text-slate-600">Status: {{ ucfirst($appointment->statut ?? 'pending') }}</p>
                        </article>
                    @empty
                        <p class="mt-4 text-sm text-slate-500">No appointments found for this patient.</p>
                    @endforelse
                </section>
            </div>

            <section class="mt-6 rounded-2xl border border-slate-200 bg-white p-6">
                <h2 class="text-xl font-bold">Consultations</h2>
                @forelse($patient->consultations ?? [] as $consultation)
                    <article class="mt-4 rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm">
                        <p class="font-semibold text-slate-900">{{ \Carbon\Carbon::parse($consultation->created_at)->format('M d, Y') }}</p>
                        <p class="mt-1 text-slate-600">{{ $consultation->diagnostic ?? 'No diagnostic recorded.' }}</p>
                    </article>
                @empty
                    <p class="mt-4 text-sm text-slate-500">No consultations found for this patient.</p>
                @endforelse
            </section>
        </div>
    </main>
</body>
</html>
