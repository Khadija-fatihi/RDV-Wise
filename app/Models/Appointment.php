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
        public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'medecin_id');
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id');
    }




    

    public function consultation() {
        return $this->hasOne(Consultation::class);
    }

    public function getDoctorAttribute()
    {
        return $this->medecin;
    }

    public function getAppointmentDateAttribute()
    {
        return $this->date_heure;
    }

    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['date_heure'] = $value;
    }

    public function getAppointmentTypeAttribute()
    {
        return $this->type_seance;
    }

    public function setAppointmentTypeAttribute($value)
    {
        $this->attributes['type_seance'] = in_array($value, ['in-person', 'online']) ? 'consultation' : $value;
    }

    public function getStatusAttribute()
    {
        return $this->statut;
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['statut'] = $value;
    }

    public function getConsultationFeeAttribute()
    {
        return optional($this->medecin)->tarif ?? 0;
    }

    public function getReasonForVisitAttribute()
    {
        return $this->motif;
    }

    public function getIsPaidAttribute()
    {
        return false;
    }

    public function scopeToday($query) {
        return $query->whereDate('date_heure', today());
    }

    public function scopeUpcoming($query) {
        return $query->where('date_heure', '>', now())
                     ->where('statut', '!=', 'cancelled')
                     ->orderBy('date_heure');
    }
}