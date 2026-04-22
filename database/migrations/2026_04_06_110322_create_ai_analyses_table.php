<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ai_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->json('symptomes');                    // liste des symptômes sélectionnés
            $table->json('resultats');                    // résultats de l'analyse IA
            $table->string('specialite_suggeree')->nullable();
            $table->string('maladie_probable')->nullable();
            $table->enum('urgence', ['faible', 'moderee', 'elevee'])->default('faible');
            $table->text('recommandation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('ai_analyses');
    }
};