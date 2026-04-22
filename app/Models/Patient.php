<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cin',
        'sexe',
        'date_naissance',
        'type_dialyse',
        'seances_par_semaine',
        'groupe_sanguin',
        'adresse',
        'antecedents',
        'allergies',
        'debut_dialyse',
        'acces_vasculaire',
        'poids_sec',
        'total_appointments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
