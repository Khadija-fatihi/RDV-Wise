<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\MedicalRecordsAccessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    public function sendRecordAccessRequest(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'exists:users,id'],
        ]);

        /** @var User|null $doctor */
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
        /** @var User|null $user */
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

    public function uploadPatientRecords(Request $request)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user || ! $user->isPatient()) {
            abort(403, 'Only patients can upload medical records.');
        }

        $request->validate([
            'records' => ['required', 'array'],
            'records.*' => ['file', 'mimes:pdf,jpg,jpeg,png', 'max:20480'],
        ]);

        foreach ($request->file('records', []) as $file) {
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();
            $storedName = now()->format('YmdHis') . '_' . $filename . '.' . $extension;
            $file->storeAs("patient-records/{$user->id}", $storedName, 'local');
        }

        return back()->with('success', 'Medical records uploaded successfully.');
    }

    public function downloadPatientRecord(string $filename)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user || ! $user->isPatient()) {
            abort(403, 'Only patients can download their own medical records.');
        }

        $path = "patient-records/{$user->id}/{$filename}";

        if (! Storage::exists($path)) {
            abort(404);
        }

        return Storage::download($path, $filename);
    }

    public function deletePatientRecord(string $filename)
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user || ! $user->isPatient()) {
            abort(403, 'Only patients can delete their own medical records.');
        }

        $path = "patient-records/{$user->id}/{$filename}";

        if (! Storage::exists($path)) {
            abort(404);
        }

        Storage::delete($path);

        return back()->with('success', 'Medical record deleted successfully.');
    }

    public function index()
    {
        /** @var User|null $user */
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login');
        }

        $notifications = $user->notifications;

        $patientRecords = [];

        if ($user->isPatient()) {
            $patientRecords = collect(Storage::files("patient-records/{$user->id}"))
                ->map(fn ($path) => [
                    'name' => basename($path),
                    'filename' => basename($path),
                ])->values()->all();

            return view('notifications.notifications-patient', compact('notifications', 'patientRecords'));
        }

        if ($user->isMedecin()) {
            return view('notifications.notifications-doctor', compact('notifications'));
        }

        if ($user->role === 'admin') {
            return view('notifications.Admin-notifications', compact('notifications'));
        }

        abort(403, 'Notifications are not available for this account.');
    }
}