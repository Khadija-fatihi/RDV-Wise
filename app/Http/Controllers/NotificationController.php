<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\MedicalRecordsAccessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function sendRecordAccessRequest(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'exists:users,id'],
        ]);

        $doctor = Auth::user();

        if (! $doctor || ! $doctor->isMedecin()) {
            abort(403, 'Only doctors can send medical record access requests.');
        }

        $patient = User::findOrFail($request->patient_id);

        $patient->notify(new MedicalRecordsAccessRequest(
            $doctor,
            $request->input('message', 'requested temporary access to your medical history for your upcoming consultation.')
        ));

        return back()->with('success', 'Access request sent to the patient.');
    }

    public function respondToRecordAccessRequest(Request $request, string $id)
    {
        $user = Auth::user();

        if (! $user || ! $user->isPatient()) {
            abort(403, 'Only patients can respond to medical records requests.');
        }

        $notification = $user->notifications()->findOrFail($id);
        $data = $notification->data;

        $decision = $request->input('decision', 'declined');
        $data['status'] = in_array($decision, ['approved', 'declined'], true) ? $decision : 'declined';
        $data['responded_at'] = now()->toIso8601String();
        $data['responded_by'] = 'patient';

        $notification->data = $data;
        $notification->save();
        $notification->markAsRead();

        return back()->with('success', $data['status'] === 'approved'
            ? 'Access approved successfully.'
            : 'Access request declined.');
    }

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