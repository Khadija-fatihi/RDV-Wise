<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('specialite');
            $table->string('cabinet')->nullable();
            $table->json('jours_travail')->nullable(); // array of days
            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();
            $table->integer('consultation_duree')->nullable(); // in minutes
            $table->decimal('tarif', 8, 2)->nullable();
            $table->boolean('accepte_nouveaux')->default(true);
            $table->boolean('verified')->default(false);
            $table->decimal('rating', 3, 2)->nullable();   // e.g. 4.75
            $table->string('cin')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medecins');
    }
};