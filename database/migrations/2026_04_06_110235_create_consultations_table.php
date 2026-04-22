<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('medecin_id')->constrained('medecins')->onDelete('cascade');
            $table->date('date');
            $table->text('diagnostic')->nullable();
            $table->text('prescription')->nullable();
            $table->text('observations')->nullable();
            // Paramètres dialyse
            $table->decimal('poids_avant', 5, 2)->nullable();
            $table->decimal('poids_apres', 5, 2)->nullable();
            $table->decimal('ultrafiltration', 5, 2)->nullable(); // litres retirés
            $table->integer('tension_avant')->nullable();
            $table->integer('tension_apres')->nullable();
            $table->decimal('taux_uree', 5, 2)->nullable();
            $table->decimal('creatinine', 5, 2)->nullable();
            $table->integer('duree_seance')->nullable(); // minutes
            $table->boolean('complications')->default(false);
            $table->text('details_complications')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('consultations');
    }
};