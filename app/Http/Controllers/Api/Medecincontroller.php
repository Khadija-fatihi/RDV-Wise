<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medecin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedecinController extends Controller {

    public function index(Request $request) {
        $medecins = Medecin::with('user')
            ->when($request->specialite, fn($q) => $q->where('specialite', $request->specialite))
            ->when($request->search, fn($q) => $q->whereHas('user',
                fn($u) => $u->where('name', 'like', "%{$request->search}%")))
            ->get();

        return response()->json($medecins);
    }

    public function show(Medecin $medecin) {
        return response()->json($medecin->load('user'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'        => 'required|string',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:8',
            'specialite'  => 'required|string',
            'phone'       => 'nullable|string',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'medecin',
            'phone'    => $request->phone,
        ]);

        $medecin = Medecin::create(array_merge(
            ['user_id' => $user->id],
            $request->only(['specialite', 'inpe', 'cabinet', 'bio',
                'consultation_duree', 'tarif', 'jours_travail',
                'heure_debut', 'heure_fin'])
        ));

        return response()->json($medecin->load('user'), 201);
    }

    public function update(Request $request, Medecin $medecin) {
        $medecin->update($request->only([
            'specialite', 'inpe', 'cabinet', 'bio',
            'consultation_duree', 'tarif', 'jours_travail',
            'heure_debut', 'heure_fin', 'accepte_nouveaux'
        ]));

        if ($request->has('name') || $request->has('phone')) {
            $medecin->user->update($request->only(['name', 'phone']));
        }

        return response()->json($medecin->load('user'));
    }

    public function destroy(Medecin $medecin) {
        $medecin->user->delete();
        return response()->json(['message' => 'Médecin supprimé']);
    }

    // Dashboard médecin : stats
    public function dashboard(Request $request) {
        $medecin = $request->user()->medecin;

        return response()->json([
            'rdv_today'     => $medecin->appointments()->today()->count(),
            'rdv_semaine'   => $medecin->appointments()
                ->whereBetween('date_heure', [now()->startOfWeek(), now()->endOfWeek()])
                ->count(),
            'patients_total'=> $medecin->appointments()
                ->distinct('patient_id')->count('patient_id'),
            'rdv_en_attente'=> $medecin->appointments()
                ->where('statut', 'en_attente')->count(),
        ]);
    }
}