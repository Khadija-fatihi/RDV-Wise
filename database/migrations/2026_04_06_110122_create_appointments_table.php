<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('medecin_id')->constrained('medecins')->cascadeOnDelete();
            $table->dateTime('date_heure');
            $table->enum('type_seance', [
                'consultation',
                'hemodialyse',
                'dialyse_peritoneale',
                'suivi',
                'urgence',
            ])->default('consultation');
            $table->enum('statut', [
                'pending',
                'confirmed',
                'completed',
                'cancelled',
            ])->default('pending');
            $table->text('motif')->nullable();           // reason for visit
            $table->text('notes_medecin')->nullable();   // doctor notes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};