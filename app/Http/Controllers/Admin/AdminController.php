<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers         = User::count();
        $totalPatients      = Patient::count();
        $totalDoctors       = Doctor::count();
        $totalAppointments  = Appointment::count();
        $totalConsultations = Appointment::where('statut', 'completed')->count();

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
            'totalAppointments',
            'totalConsultations',
            'specialtyStats'
        ));
    }

    public function notifications()
    {
        $admin = auth()->user();

        $notifications      = $admin->notifications()->latest()->paginate(20);
        $totalNotifications = $admin->notifications()->count();
        $unreadCount        = $admin->unreadNotifications()->count();
        $criticalCount      = 0;

        return view('notifications.Admin-notifications', compact(
            'notifications',
            'totalNotifications',
            'unreadCount',
            'criticalCount'
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
