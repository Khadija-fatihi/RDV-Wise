<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('medecin_id')->constrained('medecins')->onDelete('cascade');
            $table->dateTime('date_heure');
            $table->integer('duree')->default(30); // minutes
            $table->enum('statut', ['en_attente', 'confirme', 'annule', 'termine'])->default('en_attente');
            $table->string('motif')->nullable();
            $table->enum('type_seance', ['consultation', 'dialyse', 'controle', 'urgence'])->default('consultation');
            $table->text('notes_patient')->nullable();
            $table->text('notes_medecin')->nullable();
            $table->boolean('rappel_envoye')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('appointments');
    }
};