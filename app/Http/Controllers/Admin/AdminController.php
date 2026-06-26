<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $range = (int) $request->query('range', 30);
        $range = in_array($range, [7, 30, 90], true) ? $range : 30;
        $since = now()->subDays($range);

        $totalUsers         = User::where('created_at', '>=', $since)->count();
        $totalPatients      = Patient::where('created_at', '>=', $since)->count();
        $totalDoctors       = Doctor::where('created_at', '>=', $since)->count();
        $malePatients       = Patient::where('created_at', '>=', $since)->where('sexe', 'M')->count();
        $femalePatients     = Patient::where('created_at', '>=', $since)->where('sexe', 'F')->count();
        $dialysePatients    = Patient::where('created_at', '>=', $since)->whereNotNull('type_dialyse')->count();
        $avgSessions        = Patient::where('created_at', '>=', $since)->avg('seances_par_semaine') ?? 0;
        $totalAppointments  = Appointment::where('created_at', '>=', $since)->count();
        $totalConsultations = Appointment::where('created_at', '>=', $since)
            ->where('statut', 'completed')->count();

        $previousSince = now()->subDays($range * 2);
        $previousUsers = User::whereBetween('created_at', [$previousSince, $since])->count();
        $previousAppointments = Appointment::whereBetween('created_at', [$previousSince, $since])->count();
        $previousConsultations = Appointment::whereBetween('created_at', [$previousSince, $since])
            ->where('statut', 'completed')->count();

        $userGrowth = $previousUsers > 0 ? round((($totalUsers - $previousUsers) / $previousUsers) * 100, 1) : 0;
        $appointmentGrowth = $previousAppointments > 0 ? round((($totalAppointments - $previousAppointments) / $previousAppointments) * 100, 1) : 0;
        $consultationGrowth = $previousConsultations > 0 ? round((($totalConsultations - $previousConsultations) / $previousConsultations) * 100, 1) : 0;
        $platformGrowth = $range > 0 ? round((($totalAppointments - $previousAppointments) / max(1, $previousAppointments)) * 100, 1) : 0;

        $specialtyStats = Doctor::selectRaw('specialite as name, COUNT(*) as count')
            ->groupBy('specialite')
            ->orderByDesc('count')
            ->limit(5)
            ->get()
            ->map(function ($s) use ($totalDoctors) {
                return [
                    'name' => $s->name ?? 'Other',
                    'pct'  => $totalDoctors > 0 ? round(($s->count / $totalDoctors) * 100) : 0,
                ];
            })
            ->toArray();

        return view('admin.Admin-Statistics-Dashboard', compact(
            'totalUsers',
            'totalPatients',
            'totalDoctors',
            'malePatients',
            'femalePatients',
            'dialysePatients',
            'avgSessions',
            'totalAppointments',
            'totalConsultations',
            'specialtyStats',
            'range',
            'userGrowth',
            'appointmentGrowth',
            'consultationGrowth',
            'platformGrowth'
        ));
    }

    public function export(Request $request)
    {
        $range = (int) $request->query('range', 30);
        $range = in_array($range, [7, 30, 90], true) ? $range : 30;
        $since = now()->subDays($range);

        $rows = [
            ['Period', 'Total Users', 'Total Consultations', 'Total Appointments', 'Total Patients'],
            [
                'Last ' . $range . ' Days',
                User::where('created_at', '>=', $since)->count(),
                Appointment::where('created_at', '>=', $since)->where('statut', 'completed')->count(),
                Appointment::where('created_at', '>=', $since)->count(),
                Patient::where('created_at', '>=', $since)->count(),
            ],
        ];

        $csv = fopen('php://temp', 'w+');
        foreach ($rows as $row) {
            fputcsv($csv, $row);
        }

        rewind($csv);
        $content = stream_get_contents($csv);
        fclose($csv);

        return Response::make($content, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="admin-dashboard-export.csv"',
        ]);
    }

    public function notifications(Request $request)
    {
        $admin  = auth()->user();
        $search = trim((string) $request->query('q', ''));
        $filter = $request->query('filter', 'all');

        $notificationsQuery = $admin->notifications()->latest();

        if ($search !== '') {
            $notificationsQuery->where(function ($q) use ($search) {
                $q->where('data', 'like', "%{$search}%")
                    ->orWhere('data->title', 'like', "%{$search}%")
                    ->orWhere('data->message', 'like', "%{$search}%")
                    ->orWhere('data->body', 'like', "%{$search}%");
            });
        }

        if ($filter !== 'all') {
            $notificationsQuery->where(function ($q) use ($filter) {
                if ($filter === 'doctor') {
                    $q->whereNotNull('data->doctor_name')
                        ->orWhere('data->type', 'like', '%doctor%')
                        ->orWhere('data->type', 'like', '%medical_records_request%')
                        ->orWhere('data', 'like', '%Dr.%')
                        ->orWhere('data', 'like', '%doctor%');
                } elseif ($filter === 'patient') {
                    $q->whereNotNull('data->patient_name')
                        ->orWhere('data->type', 'like', '%patient%')
                        ->orWhere('data->type', 'like', '%registration%')
                        ->orWhere('data->type', 'like', '%appointment%')
                        ->orWhere('data', 'like', '%booked%')
                        ->orWhere('data', 'like', '%taken by%');
                } elseif ($filter === 'system') {
                    $q->where('data->type', 'like', '%system%')
                        ->orWhere('data->type', 'like', '%alert%')
                        ->orWhere('data->type', 'like', '%maintenance%')
                        ->orWhere('data', 'like', '%system%');
                }
            });
        }

        $notifications      = $notificationsQuery->paginate(20)->withQueryString();
        $totalNotifications = $admin->notifications()->count();
        $unreadCount        = $admin->unreadNotifications()->count();
        $criticalCount      = $admin->unreadNotifications->filter(function ($notification) {
            $data = $notification->data;

            if (! is_array($data)) {
                return false;
            }

            if (! empty($data['priority']) && strcasecmp($data['priority'], 'critical') === 0) {
                return true;
            }

            if (! empty($data['severity']) && strcasecmp($data['severity'], 'critical') === 0) {
                return true;
            }

            if (! empty($data['type']) && in_array(strtolower($data['type']), ['critical', 'critical_alert', 'emergency', 'system_alert', 'medical_records_request'], true)) {
                return true;
            }

            $body = strtolower((string) ($data['title'] ?? $data['message'] ?? $data['body'] ?? ''));
            return str_contains($body, 'critical') || str_contains($body, 'urgent') || str_contains($body, 'emergency');
        })->count();

        return view('notifications.Admin-notifications', compact(
            'notifications',
            'totalNotifications',
            'unreadCount',
            'criticalCount',
            'search',
            'filter'
        ));
    }

    public function markRead(string $id)
    {
        auth()->user()->notifications()->findOrFail($id)->markAsRead();
        return back()->with('success', 'Notification marked as read.');
    }

    public function deleteNotification(string $id)
    {
        auth()->user()->notifications()->findOrFail($id)->delete();
        return back()->with('success', 'Notification deleted.');
    }

    public function markAllRead()
    {
        auth()->user()->unreadNotifications()->markAsRead();
        return back()->with('success', 'All notifications marked as read.');
    }
}
