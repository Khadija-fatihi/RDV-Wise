<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller {

    // Lister tous les patients (Admin)
    public function index(Request $request) {
        $query = Patient::with('user')
            ->when($request->search, function ($q) use ($request) {
                $q->whereHas('user', fn($u) => $u->where('name', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%"))
                  ->orWhere('cin', 'like', "%{$request->search}%");
            });

        return response()->json($query->paginate(15));
    }

    // Détails d'un patient
    public function show(Patient $patient) {
        return response()->json(
            $patient->load(['user', 'appointments.medecin.user', 'consultations'])
        );
    }

    // Créer un patient (Admin)
    public function store(Request $request) {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone'    => 'nullable|string',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'patient',
            'phone'    => $request->phone,
        ]);

        $patient = Patient::create(array_merge(
            ['user_id' => $user->id],
            $request->only(['cin', 'date_naissance', 'sexe', 'groupe_sanguin',
                'adresse', 'antecedents', 'allergies', 'type_dialyse',
                'debut_dialyse', 'seances_par_semaine', 'acces_vasculaire', 'poids_sec'])
        ));

        return response()->json($patient->load('user'), 201);
    }

    // Mettre à jour
    public function update(Request $request, Patient $patient) {
        $patient->update($request->only([
            'cin', 'date_naissance', 'sexe', 'groupe_sanguin',
            'adresse', 'antecedents', 'allergies', 'type_dialyse',
            'debut_dialyse', 'seances_par_semaine', 'acces_vasculaire', 'poids_sec'
        ]));

        if ($request->has('name') || $request->has('phone')) {
            $patient->user->update($request->only(['name', 'phone', 'email']));
        }

        return response()->json($patient->load('user'));
    }

    // Supprimer
    public function destroy(Patient $patient) {
        $patient->user->delete(); // cascade
        return response()->json(['message' => 'Patient supprimé']);
    }

    // Historique consultations du patient
    public function consultations(Patient $patient) {
        $consultations = $patient->consultations()
            ->with('medecin.user')
            ->orderByDesc('date')
            ->paginate(10);

        return response()->json($consultations);
    }
}