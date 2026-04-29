<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Doctor extends Model
{
    use HasFactory;
    
        public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class, 'medecin_id');
    }

    protected $table = 'doctors';
    
  protected $fillable = [
    'user_id', 
    'cin',        // ✅ add this
    'verified',   // ✅ add this
    'specialite', 
    'inpe', 
    'cabinet', 
    'bio',
    'phone',      // ✅ add this too
    'consultation_duree', 
    'tarif', 
    'jours_travail',
    'heure_debut', 
    'heure_fin', 
    'accepte_nouveaux'
];
 
    protected $casts = [
        'jours_travail'    => 'array',
        'accepte_nouveaux' => 'boolean',
        'tarif'            => 'decimal:2',
    ];
 
    public function user() {
        return $this->belongsTo(User::class);
    }
 
public function doctor()
{
    return $this->belongsTo(Doctor::class, 'medecin_id');
}

public function patient()
{
    return $this->belongsTo(Patient::class, 'patient_id');
}
    public function consultations() {
        return $this->hasMany(Consultation::class);
    }

    public function getSpecializationAttribute()
    {
        return $this->specialite;
    }

    public function getYearsExperienceAttribute()
    {
        return $this->created_at ? now()->diffInYears($this->created_at) : 0;
    }

    public function getHospitalAffiliationAttribute()
    {
        return $this->cabinet;
    }
 
    // Créneaux disponibles pour une date donnée
    public function getAvailableSlots(string $date): array {
        $slots = [];
        $start = strtotime($date . ' ' . $this->heure_debut);
        $end   = strtotime($date . ' ' . $this->heure_fin);
        $step  = $this->consultation_duree * 60;
 
        $booked = $this->appointments()
            ->whereDate('date_heure', $date)
            ->whereIn('statut', ['pending', 'confirmed'])
            ->pluck('date_heure')
            ->map(fn($d) => date('H:i', strtotime($d)))
            ->toArray();
 
        for ($t = $start; $t < $end; $t += $step) {
            $slot = date('H:i', $t);
            $slots[] = [
                'heure'      => $slot,
                'disponible' => !in_array($slot, $booked)
            ];
        }
        return $slots;
    }
}
