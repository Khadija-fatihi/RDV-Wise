<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AiAnalysis;
use App\Services\AiDiagnosticService;
use Illuminate\Http\Request;

class AiAnalysisController extends Controller {

    public function __construct(private AiDiagnosticService $aiService) {}

    // Liste des symptômes disponibles
    public function symptomes() {
        return response()->json([
            'symptomes' => $this->aiService->getSymptomesList()
        ]);
    }

    // Analyser et enregistrer
    public function analyze(Request $request) {
        $request->validate([
            'symptomes' => 'required|array|min:1',
            'symptomes.*' => 'string',
        ]);

        $patient   = $request->user()->patient;
        $resultats = $this->aiService->analyze($request->symptomes);

        $analysis = AiAnalysis::create([
            'patient_id'          => $patient->id,
            'symptomes'           => $request->symptomes,
            'resultats'           => $resultats['resultats'],
            'specialite_suggeree' => $resultats['specialite_suggeree'],
            'maladie_probable'    => $resultats['maladie_probable'],
            'urgence'             => $resultats['urgence'],
            'recommandation'      => $resultats['recommandation'],
        ]);

        return response()->json([
            'analysis' => $analysis,
            ...$resultats,
        ], 201);
    }

    // Historique des analyses du patient
    public function history(Request $request) {
        $analyses = AiAnalysis::where('patient_id', $request->user()->patient->id)
            ->orderByDesc('created_at')
            ->paginate(10);

        return response()->json($analyses);
    }
}