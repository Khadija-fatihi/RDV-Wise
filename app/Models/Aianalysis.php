<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiAnalysis extends Model {
    protected $table = 'ai_analyses';

    protected $fillable = [
        'patient_id', 'symptomes', 'resultats',
        'specialite_suggeree', 'maladie_probable',
        'urgence', 'recommandation'
    ];

    protected $casts = [
        'symptomes' => 'array',
        'resultats' => 'array',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}