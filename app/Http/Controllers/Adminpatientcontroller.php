<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminPatientController extends Controller
{
    /**
     * List all patients
     */
    public function index(Request $request)
    {
        $query = Patient::with('user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            })->orWhere('cin', 'like', "%$search%");
        }

        $patients      = $query->latest()->paginate(15);
        $totalPatients = Patient::count();
        $newThisWeek   = Patient::where('created_at', '>=', now()->startOfWeek())->count();
        $criticalAlerts = 0; 
        $avgSessions   = Patient::avg('seances_par_semaine') ?? 0;

        return view('admin.Admin-Manage-Patients', compact(
            'patients',
            'totalPatients',
            'newThisWeek',
            'criticalAlerts',
            'avgSessions'
        ));
    }

    /**
     * Show patient details
     */
    public function show($id)
    {
        $patient = Patient::with([
            'user',
            'appointments.medecin.user',
            'consultations'
        ])->findOrFail($id);

        return view('admin.admin-patient-show', compact('patient'));
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $patient = Patient::with('user')->findOrFail($id);
        return view('admin.admin-patient-edit', compact('patient'));
    }

    /**
     * Update patient
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::with('user')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $patient->user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $patient->user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $patient->update($request->only([
            'cin', 'date_naissance', 'sexe', 'groupe_sanguin',
            'adresse', 'antecedents', 'allergies', 'type_dialyse',
            'seances_par_semaine', 'acces_vasculaire', 'poids_sec'
        ]));

        return redirect()->route('admin.patients')
            ->with('success', 'Patient updated successfully.');
    }

    /**
     * Delete patient
     */
    public function destroy($id)
    {
        $patient = Patient::with('user')->findOrFail($id);
        $patient->user->delete(); // cascades
        return redirect()->route('admin.patients')
            ->with('success', 'Patient deleted successfully.');
    }
}