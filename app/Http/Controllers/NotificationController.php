<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        $notifications = $user->notifications;

        if ($user->role === 'patient') {
            return view('notifications.notifications-patient', compact('notifications'));
        }

        if ($user->role === 'doctor') {
            return view('notifications.notifications-doctor', compact('notifications'));
        }

        if ($user->role === 'admin') {
            return view('notifications.Admin-notifications', compact('notifications'));
        }

        abort(403, 'Notifications are not available for this account.');
    }
}