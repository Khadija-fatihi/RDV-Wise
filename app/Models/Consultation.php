<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Model {
    use HasFactory;

    protected $fillable = [
        'appointment_id', 'patient_id', 'medecin_id', 'date',
        'diagnostic', 'prescription', 'observations',
        'poids_avant', 'poids_apres', 'ultrafiltration',
        'tension_avant', 'tension_apres', 'taux_uree',
        'creatinine', 'duree_seance', 'complications', 'details_complications'
    ];

    protected $casts = [
        'date'          => 'date',
        'complications' => 'boolean',
    ];

    public function appointment() { return $this->belongsTo(Appointment::class); }
    public function patient()     { return $this->belongsTo(Patient::class); }
    public function medecin()     { return $this->belongsTo(Medecin::class); }
}