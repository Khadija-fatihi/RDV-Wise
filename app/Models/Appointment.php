<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model {
    use HasFactory;

    protected $fillable = [
        'patient_id', 'medecin_id', 'date_heure', 'duree',
        'statut', 'motif', 'type_seance',
        'notes_patient', 'notes_medecin', 'rappel_envoye'
    ];

    protected $casts = [
        'date_heure'     => 'datetime',
        'rappel_envoye'  => 'boolean',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function medecin() {
        return $this->belongsTo(Medecin::class);
    }

    public function consultation() {
        return $this->hasOne(Consultation::class);
    }

    public function scopeToday($query) {
        return $query->whereDate('date_heure', today());
    }

    public function scopeUpcoming($query) {
        return $query->where('date_heure', '>', now())
                     ->where('statut', '!=', 'annule')
                     ->orderBy('date_heure');
    }
}