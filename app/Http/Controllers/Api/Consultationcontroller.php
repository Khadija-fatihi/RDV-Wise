<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ConsultationController extends Controller {

    public function index(Request $request) {
        $user  = $request->user();
        $query = Consultation::with(['patient.user', 'medecin.user', 'appointment']);

        if ($user->isPatient()) {
            $query->where('patient_id', $user->patient->id);
        } elseif ($user->isMedecin()) {
            $query->where('medecin_id', $user->medecin->id);
        }

        return response()->json(
            $query->orderByDesc('date')->paginate(10)
        );
    }

    public function store(Request $request) {
        $data = $request->validate([
            'appointment_id'       => 'required|exists:appointments,id',
            'diagnostic'           => 'nullable|string',
            'prescription'         => 'nullable|string',
            'observations'         => 'nullable|string',
            'poids_avant'          => 'nullable|numeric',
            'poids_apres'          => 'nullable|numeric',
            'ultrafiltration'      => 'nullable|numeric',
            'tension_avant'        => 'nullable|integer',
            'tension_apres'        => 'nullable|integer',
            'taux_uree'            => 'nullable|numeric',
            'creatinine'           => 'nullable|numeric',
            'duree_seance'         => 'nullable|integer',
            'complications'        => 'boolean',
            'details_complications'=> 'nullable|string',
        ]);

        $appointment = Appointment::findOrFail($data['appointment_id']);

        $consultation = Consultation::create(array_merge($data, [
            'patient_id' => $appointment->patient_id,
            'medecin_id' => $appointment->medecin_id,
            'date'       => $appointment->date_heure->toDateString(),
        ]));

        // Marquer le RDV comme terminé
        $appointment->update(['statut' => 'termine']);

        return response()->json($consultation->load(['patient.user', 'medecin.user']), 201);
    }

    public function show(Consultation $consultation) {
        return response()->json(
            $consultation->load(['patient.user', 'medecin.user', 'appointment'])
        );
    }

    public function update(Request $request, Consultation $consultation) {
        $consultation->update($request->only([
            'diagnostic', 'prescription', 'observations',
            'poids_avant', 'poids_apres', 'ultrafiltration',
            'tension_avant', 'tension_apres', 'taux_uree',
            'creatinine', 'duree_seance', 'complications', 'details_complications'
        ]));
        return response()->json($consultation);
    }
}