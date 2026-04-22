<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller {

    public function admin() {
        // Stats globales
        $stats = [
            'total_patients'      => Patient::count(),
            'total_medecins'      => Medecin::count(),
            'total_rdv'           => Appointment::count(),
            'rdv_aujourd_hui'     => Appointment::today()->count(),
            'rdv_en_attente'      => Appointment::where('statut', 'en_attente')->count(),
            'rdv_confirmes'       => Appointment::where('statut', 'confirme')->count(),
            'rdv_annules'         => Appointment::where('statut', 'annule')->count(),
            'total_consultations' => Consultation::count(),
        ];

        // RDV par mois (12 derniers mois)
        $rdv_par_mois = Appointment::select(
                DB::raw('MONTH(date_heure) as mois'),
                DB::raw('YEAR(date_heure) as annee'),
                DB::raw('COUNT(*) as total')
            )
            ->where('date_heure', '>=', now()->subMonths(12))
            ->groupBy('annee', 'mois')
            ->orderBy('annee')->orderBy('mois')
            ->get();

        // RDV par type de séance
        $rdv_par_type = Appointment::select('type_seance', DB::raw('COUNT(*) as total'))
            ->groupBy('type_seance')
            ->get();

        // RDV par statut
        $rdv_par_statut = Appointment::select('statut', DB::raw('COUNT(*) as total'))
            ->groupBy('statut')
            ->get();

        // Patients par type de dialyse
        $patients_dialyse = Patient::select('type_dialyse', DB::raw('COUNT(*) as total'))
            ->groupBy('type_dialyse')
            ->get();

        // Top médecins par nombre de RDV
        $top_medecins = Medecin::withCount('appointments')
            ->with('user')
            ->orderByDesc('appointments_count')
            ->take(5)
            ->get();

        // Nouveaux patients par mois
        $nouveaux_patients = Patient::select(
                DB::raw('MONTH(created_at) as mois'),
                DB::raw('YEAR(created_at) as annee'),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('annee', 'mois')
            ->orderBy('annee')->orderBy('mois')
            ->get();

        return response()->json([
            'stats'            => $stats,
            'rdv_par_mois'     => $rdv_par_mois,
            'rdv_par_type'     => $rdv_par_type,
            'rdv_par_statut'   => $rdv_par_statut,
            'patients_dialyse' => $patients_dialyse,
            'top_medecins'     => $top_medecins,
            'nouveaux_patients'=> $nouveaux_patients,
        ]);
    }
}