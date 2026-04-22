<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('specialite');
            $table->string('inpe')->unique()->nullable(); // numéro professionnel
            $table->string('cabinet')->nullable();
            $table->text('bio')->nullable();
            $table->integer('consultation_duree')->default(30); // minutes
            $table->decimal('tarif', 8, 2)->nullable();
            $table->json('jours_travail')->nullable(); // ["lundi","mardi"...]
            $table->time('heure_debut')->default('08:00:00');
            $table->time('heure_fin')->default('17:00:00');
            $table->boolean('accepte_nouveaux')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('medecins');
    }
};