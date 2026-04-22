<?php

namespace App\Services;

class AiDiagnosticService {

    // Base de connaissances : symptômes → maladies/spécialités
    // Adaptée au contexte d'un centre de dialyse
    private array $knowledgeBase = [
        'insuffisance_renale' => [
            'symptomes'   => ['fatigue', 'oedeme', 'urines_reduites', 'nausees', 'perte_appetit',
                              'confusion', 'dyspnee', 'hypertension', 'crampes', 'prurit'],
            'specialite'  => 'Néphrologue',
            'urgence'     => 'elevee',
            'description' => 'Insuffisance rénale chronique — suivi néphrologue urgent recommandé',
        ],
        'hypertension' => [
            'symptomes'   => ['maux_tete', 'vertiges', 'vision_floue', 'hypertension',
                              'douleur_thoracique', 'epistaxis', 'bourdonnements'],
            'specialite'  => 'Cardiologue',
            'urgence'     => 'moderee',
            'description' => 'Hypertension artérielle — contrôle cardiovasculaire recommandé',
        ],
        'diabete' => [
            'symptomes'   => ['soif_excessive', 'polyurie', 'fatigue', 'vision_floue',
                              'perte_poids', 'cicatrisation_lente', 'engourdissements'],
            'specialite'  => 'Endocrinologue',
            'urgence'     => 'moderee',
            'description' => 'Diabète probable — bilan glycémique et suivi endocrinologique',
        ],
        'anemie' => [
            'symptomes'   => ['fatigue', 'paleur', 'dyspnee', 'palpitations',
                              'vertiges', 'maux_tete', 'peau_froide'],
            'specialite'  => 'Hématologue',
            'urgence'     => 'moderee',
            'description' => 'Anémie probable — fréquente chez les patients dialysés',
        ],
        'infection_voie_urinaire' => [
            'symptomes'   => ['brulures_miction', 'pollakiurie', 'fievre', 'douleur_lombaire',
                              'urines_troubles', 'sang_urines'],
            'specialite'  => 'Urologue',
            'urgence'     => 'moderee',
            'description' => 'Infection urinaire probable — traitement antibiotique recommandé',
        ],
        'probleme_acces_vasculaire' => [
            'symptomes'   => ['douleur_bras', 'gonflement_bras', 'rougeur_acces',
                              'saignement_acces', 'frisson', 'fievre'],
            'specialite'  => 'Néphrologue',
            'urgence'     => 'elevee',
            'description' => 'Problème d\'accès vasculaire — consultation urgente',
        ],
        'desequilibre_electrolytique' => [
            'symptomes'   => ['crampes', 'faiblesse_musculaire', 'palpitations',
                              'confusion', 'nausees', 'constipation'],
            'specialite'  => 'Néphrologue',
            'urgence'     => 'elevee',
            'description' => 'Déséquilibre électrolytique possible — vérification biologie urgente',
        ],
        'probleme_cardiaque' => [
            'symptomes'   => ['douleur_thoracique', 'palpitations', 'dyspnee',
                              'oedeme', 'syncope', 'fatigue_effort'],
            'specialite'  => 'Cardiologue',
            'urgence'     => 'elevee',
            'description' => 'Problème cardiaque probable — consultation cardiologique urgente',
        ],
    ];

    // Liste complète des symptômes avec labels FR
    public function getSymptomesList(): array {
        return [
            ['id' => 'fatigue',            'label' => 'Fatigue intense'],
            ['id' => 'oedeme',             'label' => 'Œdème (gonflement)'],
            ['id' => 'urines_reduites',    'label' => 'Urines réduites'],
            ['id' => 'nausees',            'label' => 'Nausées / Vomissements'],
            ['id' => 'perte_appetit',      'label' => 'Perte d\'appétit'],
            ['id' => 'maux_tete',          'label' => 'Maux de tête'],
            ['id' => 'vertiges',           'label' => 'Vertiges'],
            ['id' => 'hypertension',       'label' => 'Tension artérielle élevée'],
            ['id' => 'dyspnee',            'label' => 'Essoufflement'],
            ['id' => 'crampes',            'label' => 'Crampes musculaires'],
            ['id' => 'prurit',             'label' => 'Démangeaisons'],
            ['id' => 'confusion',          'label' => 'Confusion mentale'],
            ['id' => 'palpitations',       'label' => 'Palpitations cardiaques'],
            ['id' => 'douleur_thoracique', 'label' => 'Douleur thoracique'],
            ['id' => 'fievre',             'label' => 'Fièvre'],
            ['id' => 'soif_excessive',     'label' => 'Soif excessive'],
            ['id' => 'polyurie',           'label' => 'Urines excessives'],
            ['id' => 'vision_floue',       'label' => 'Vision floue'],
            ['id' => 'paleur',             'label' => 'Pâleur'],
            ['id' => 'douleur_lombaire',   'label' => 'Douleur lombaire'],
            ['id' => 'brulures_miction',   'label' => 'Brûlures à la miction'],
            ['id' => 'sang_urines',        'label' => 'Sang dans les urines'],
            ['id' => 'douleur_bras',       'label' => 'Douleur au bras (accès)'],
            ['id' => 'gonflement_bras',    'label' => 'Gonflement du bras'],
            ['id' => 'rougeur_acces',      'label' => 'Rougeur au site d\'accès'],
            ['id' => 'faiblesse_musculaire','label'=> 'Faiblesse musculaire'],
            ['id' => 'syncope',            'label' => 'Syncope / Évanouissement'],
            ['id' => 'perte_poids',        'label' => 'Perte de poids inexpliquée'],
        ];
    }

    // Analyser les symptômes et retourner un diagnostic
    public function analyze(array $symptomes): array {
        $scores  = [];

        foreach ($this->knowledgeBase as $maladie => $data) {
            $matches = array_intersect($symptomes, $data['symptomes']);
            if (count($matches) > 0) {
                $scores[$maladie] = [
                    'score'       => count($matches) / count($data['symptomes']),
                    'matches'     => count($matches),
                    'specialite'  => $data['specialite'],
                    'urgence'     => $data['urgence'],
                    'description' => $data['description'],
                    'symptomes_matches' => array_values($matches),
                ];
            }
        }

        // Trier par score décroissant
        arsort($scores);

        if (empty($scores)) {
            return [
                'maladie_probable'   => 'Indéterminé',
                'specialite_suggeree'=> 'Médecin généraliste',
                'urgence'            => 'faible',
                'recommandation'     => 'Aucune correspondance trouvée. Consultez un médecin généraliste.',
                'resultats'          => [],
            ];
        }

        $top = array_key_first($scores);
        $topData = $scores[$top];

        // Construire le top 3
        $top3 = array_slice($scores, 0, 3, true);

        $recommandation = $this->buildRecommandation($topData, count($symptomes));

        return [
            'maladie_probable'    => ucfirst(str_replace('_', ' ', $top)),
            'specialite_suggeree' => $topData['specialite'],
            'urgence'             => $topData['urgence'],
            'recommandation'      => $recommandation,
            'resultats'           => $top3,
        ];
    }

    private function buildRecommandation(array $data, int $nbSymptomes): string {
        $urgenceMsg = match($data['urgence']) {
            'elevee'  => ' Consultation urgente recommandée.',
            'moderee' => ' Consultation dans les prochains jours recommandée.',
            default   => '! Surveillance recommandée.',
        };

        return "{$data['description']}. {$urgenceMsg} "
             . "Spécialité suggérée : {$data['specialite']}. "
             . "({$data['matches']} symptômes correspondent sur {$nbSymptomes} saisis)";
    }
}