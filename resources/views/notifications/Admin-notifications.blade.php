<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Smart santé - Admin Notification Center</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: { extend: { colors: { "primary-container": "#2563eb", "on-primary-container": "#eeefff", "background": "#f7f9fb", "on-surface": "#191c1e", "primary": "#004ac6", "error": "#ba1a1a" }, fontFamily: { "headline": ["Manrope"], "body": ["Inter"] } } }
    }
</script>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3 { font-family: 'Manrope', sans-serif; }
</style>
</head>
<body class="bg-background text-on-surface">

<!-- TopNavBar -->
<header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200 shadow-sm flex justify-between items-center px-6 py-3">
    <div class="flex items-center gap-8">
        <span class="text-xl font-extrabold text-blue-600 tracking-tight" style="font-family:'Manrope'">Smart santé</span>
        <form method="GET" action="{{ route('admin.notifications') }}" class="relative hidden md:block">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input name="q" value="{{ $search ?? '' }}" class="pl-10 pr-4 py-1.5 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-600/20 w-64" placeholder="Search notifications..."/>
        </form>
    </div>
    <div class="flex items-center gap-4">
        <button class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors relative">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>
        <div class="flex items-center gap-3 pl-4 border-l border-slate-200 ml-2">
            <span class="text-sm font-semibold text-slate-900">Khadija Fatihi </span>
        </div>
    </div>
</header>

<div class="flex pt-[60px]">
    <!-- Sidebar -->
    <aside class="h-[calc(100vh-60px)] w-64 border-r fixed left-0 bg-white border-slate-200 flex flex-col p-4 space-y-2 text-sm z-40">
        <div class="mb-6 px-2">
            <h2 class="text-lg font-bold text-slate-900" style="font-family:'Manrope'">Admin Portal</h2>
        </div>
        <nav class="flex-1 space-y-1">
            <a href="{{ route('admin.statistics') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">monitoring</span><span>Statistics</span>
            </a>
            <a href="{{ route('admin.doctors') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">medical_services</span><span>Doctors</span>
            </a>
            <a href="{{ route('admin.patients') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">group</span><span>Patients</span>
            </a>
            <a href="{{ route('admin.appointments') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                <span class="material-symbols-outlined">calendar_today</span><span>Appointments</span>
            </a>
            <a href="{{ route('admin.notifications') }}" class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 text-blue-600 font-semibold rounded-lg">
                <span class="material-symbols-outlined">notifications_active</span><span>Notifications</span>
            </a>
        </nav>
        <div class="pt-4 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-all">
                    <span class="material-symbols-outlined">logout</span><span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 min-h-screen">
        <!-- Header -->
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Notification Center</h1>
                <p class="text-slate-500">Monitor and manage all system communication</p>
            </div>
            <a href="{{ route('admin.notifications', array_filter(['filter' => $filter ?? 'all', 'q' => $search])) }}" class="inline-flex items-center gap-2 bg-primary-container hover:opacity-90 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg transition-all active:scale-95">
                <span class="material-symbols-outlined text-xl">refresh</span> Refresh Notifications
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-blue-50 rounded-lg text-blue-600"><span class="material-symbols-outlined">drafts</span></div>
                    <span class="text-xs font-bold text-slate-400">TOTAL</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">{{ $totalNotifications ?? 0 }}</div>
                <p class="text-xs text-slate-500 mt-1">Across all categories</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-amber-50 rounded-lg text-amber-600"><span class="material-symbols-outlined">mark_email_unread</span></div>
                    <span class="text-xs font-bold text-slate-400">UNREAD</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">{{ $unreadCount ?? 0 }}</div>
                <p class="text-xs text-amber-600 mt-1">Requires attention</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-emerald-50 rounded-lg text-emerald-600"><span class="material-symbols-outlined">person_check</span></div>
                    <span class="text-xs font-bold text-slate-400">DELIVERED</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">99.8%</div>
                <p class="text-xs text-emerald-600 mt-1">Successful delivery rate</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-rose-50 rounded-lg text-rose-600"><span class="material-symbols-outlined">report</span></div>
                    <span class="text-xs font-bold text-slate-400">CRITICAL</span>
                </div>
                <div class="text-2xl font-bold text-slate-900">{{ $criticalCount ?? 0 }}</div>
                <p class="text-xs text-slate-500 mt-1">{{ $criticalCount > 0 ? 'Active critical alerts' : 'No critical alerts' }}</p>
            </div>
        </div>

        <!-- Notification Feed -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex bg-slate-100 p-1 rounded-xl w-fit">
                    <a href="{{ route('admin.notifications', array_filter(['filter' => 'all', 'q' => $search])) }}" class="px-4 py-1.5 text-sm font-semibold rounded-lg transition-all {{ ($filter ?? 'all') === 'all' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">All</a>
                    <a href="{{ route('admin.notifications', array_filter(['filter' => 'doctor', 'q' => $search])) }}" class="px-4 py-1.5 text-sm font-medium rounded-lg transition-all {{ ($filter ?? 'all') === 'doctor' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">Doctor Alerts</a>
                    <a href="{{ route('admin.notifications', array_filter(['filter' => 'patient', 'q' => $search])) }}" class="px-4 py-1.5 text-sm font-medium rounded-lg transition-all {{ ($filter ?? 'all') === 'patient' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">Patient Alerts</a>
                    <a href="{{ route('admin.notifications', array_filter(['filter' => 'system', 'q' => $search])) }}" class="px-4 py-1.5 text-sm font-medium rounded-lg transition-all {{ ($filter ?? 'all') === 'system' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">System</a>
                </div>
                <div class="flex items-center gap-2">
                    <button class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50">
                        <span class="material-symbols-outlined text-lg">filter_list</span> Sort by: Newest
                    </button>
                    <form method="POST" action="{{ route('admin.notifications.markAllRead') }}" class="m-0">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-slate-600 border border-slate-200 rounded-lg hover:bg-slate-50">
                            <span class="material-symbols-outlined text-lg">mark_email_read</span> Mark all as read
                        </button>
                    </form>
                </div>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($notifications ?? [] as $notification)
                @php
                    $data = $notification->data ?? [];
                    $type = strtolower($data['type'] ?? '');
                    $doctorName = $data['doctor_name'] ?? $data['doctor'] ?? null;
                    $patientName = $data['patient_name'] ?? $data['patient'] ?? null;
                    $title = $data['title'] ?? null;
                    $message = $data['message'] ?? $data['body'] ?? null;
                    $channel = strtolower($data['channel'] ?? $data['sent_via'] ?? $data['notification_channel'] ?? '');
                    $channelLabel = null;

                    if (str_contains($channel, 'phone') || str_contains($channel, 'sms')) {
                        $channelLabel = 'phone';
                    } elseif (str_contains($channel, 'mail') || str_contains($channel, 'email')) {
                        $channelLabel = 'email';
                    }

                    $appointmentRaw = $data['appointment_date'] ?? $data['date_heure'] ?? $data['date'] ?? null;
                    $appointmentDate = null;
                    $appointmentWhen = null;
                    $appointmentTime = null;

                    if ($appointmentRaw) {
                        try {
                            $appointmentDate = \Carbon\Carbon::parse($appointmentRaw);
                        } catch (\Exception $e) {
                            $appointmentDate = null;
                        }
                    }

                    if ($appointmentDate) {
                        if ($appointmentDate->isToday()) {
                            $appointmentWhen = 'today';
                        } elseif ($appointmentDate->isTomorrow()) {
                            $appointmentWhen = 'tomorrow';
                        } else {
                            $appointmentWhen = 'on ' . $appointmentDate->format('M j, Y');
                        }
                        $appointmentTime = $appointmentDate->format('H:i');
                    }

                    if (!$title) {
                        if ($appointmentDate) {
                            $title = 'Appointment reminder';
                        } elseif (str_contains($type, 'appointment') && $doctorName) {
                            $title = 'New appointment for Dr. ' . $doctorName;
                        } elseif (str_contains($type, 'appointment') && $patientName) {
                            $title = 'New appointment booked by ' . $patientName;
                        } elseif ($type === 'medical_records_request') {
                            $title = 'Medical records access request';
                        } elseif ($type === 'patient_registered') {
                            $title = 'Patient registration completed';
                        } else {
                            $title = 'Notification';
                        }
                    }

                    if (!$message) {
                        if ($appointmentDate) {
                            $deliveryText = $channelLabel ? 'via ' . $channelLabel : 'before the appointment date';
                            if ($doctorName && $patientName) {
                                $message = 'Appointment reminder ' . $deliveryText . ' for ' . $appointmentWhen . ' at ' . $appointmentTime . ' with Dr. ' . $doctorName . ' and patient ' . $patientName . '.';
                            } elseif ($doctorName) {
                                $message = 'Appointment reminder ' . $deliveryText . ' for ' . $appointmentWhen . ' at ' . $appointmentTime . ' with Dr. ' . $doctorName . '.';
                            } elseif ($patientName) {
                                $message = 'Appointment reminder ' . $deliveryText . ' for ' . $appointmentWhen . ' at ' . $appointmentTime . ' for patient ' . $patientName . '.';
                            } else {
                                $message = 'Appointment reminder ' . $deliveryText . ' for ' . $appointmentWhen . ' at ' . $appointmentTime . '.';
                            }
                        } elseif (str_contains($type, 'appointment') && $doctorName) {
                            $message = 'A new appointment has been scheduled for Dr. ' . $doctorName . '.';
                        } elseif (str_contains($type, 'appointment') && $patientName) {
                            $message = 'A new appointment was taken by ' . $patientName . '.';
                        } elseif ($type === 'medical_records_request') {
                            $message = ($doctorName ? $doctorName : 'A doctor') . ' requested access to medical records.';
                        } elseif ($type === 'patient_registered') {
                            $message = 'A new patient has joined the system.';
                        } else {
                            $message = 'You have a new notification.';
                        }
                    }
                @endphp
                <div class="group px-6 py-5 flex items-start gap-4 hover:bg-slate-50/80 transition-colors">
                    <div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined">notifications</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="font-bold text-slate-900">{{ $title }}</h3>
                            <span class="text-xs font-medium text-slate-400">{{ $notification->created_at?->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-slate-600 mb-3">{{ $message }}</p>
                    </div>
                    <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <form method="POST" action="{{ route('admin.notifications.read', $notification->id) }}" class="m-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Mark as read">
                                <span class="material-symbols-outlined">check_circle</span>
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.notifications.delete', $notification->id) }}" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Delete notification">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                {{-- Static example notifications when no data --}}
                <div class="space-y-4 px-6 py-5">
                    <div class="group bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm hover:bg-slate-100 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                                <span class="material-symbols-outlined">event_available</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-1">
                                    <h3 class="font-bold text-slate-900">New appointment for Dr. Karim</h3>
                                    <span class="text-xs font-medium text-slate-400">Just now</span>
                                </div>
                                <p class="text-sm text-slate-600 mb-3">A new appointment has been scheduled for Dr. Karim with patient Laila Bouazizi.</p>
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold uppercase tracking-wider bg-blue-100 text-blue-700">Doctor Alerts</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-100 rounded-lg shadow-sm hover:bg-blue-50">
                                        <span class="material-symbols-outlined">check_circle</span> 
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-red-600 bg-white border border-red-100 rounded-lg shadow-sm hover:bg-red-50">
                                        <span class="material-symbols-outlined">delete</span> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm hover:bg-slate-100 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center">
                                <span class="material-symbols-outlined">person_add</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-1">
                                    <h3 class="font-bold text-slate-900">New appointment taken by Sami</h3>
                                    <span class="text-xs font-medium text-slate-400">5 mins ago</span>
                                </div>
                                <p class="text-sm text-slate-600 mb-3">Patient Sami has booked a new dialysis session for next Monday.</p>
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold uppercase tracking-wider bg-amber-100 text-amber-700">Patient Alerts</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-100 rounded-lg shadow-sm hover:bg-blue-50">
                                        <span class="material-symbols-outlined">check_circle</span>
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-red-600 bg-white border border-red-100 rounded-lg shadow-sm hover:bg-red-50">
                                        <span class="material-symbols-outlined">delete</span> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="group bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm hover:bg-slate-100 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-10 h-10 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center">
                                <span class="material-symbols-outlined">report</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-1">
                                    <h3 class="font-bold text-slate-900">System maintenance scheduled</h3>
                                    <span class="text-xs font-medium text-slate-400">1 hour ago</span>
                                </div>
                                <p class="text-sm text-slate-600 mb-3">A system update will be applied tonight at 2:00 AM.</p>
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold uppercase tracking-wider bg-rose-100 text-rose-700">System</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-100 rounded-lg shadow-sm hover:bg-blue-50">
                                        <span class="material-symbols-outlined">check_circle</span>
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-red-600 bg-white border border-red-100 rounded-lg shadow-sm hover:bg-red-50">
                                        <span class="material-symbols-outlined">delete</span> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            <div class="p-4 bg-slate-50/50 flex justify-center">
                @if(method_exists($notifications, 'links'))
                    {{ $notifications->links() }}
                @else
                    <button class="text-sm font-semibold text-blue-600 hover:underline transition-all">Load older notifications</button>
                @endif
            </div>
        </div>

       
    </main>
</div>
</body>
</html>