<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('cin')->nullable();
            $table->date('date_naissance')->nullable();
            $table->enum('sexe', ['M', 'F'])->nullable();
            $table->string('groupe_sanguin')->nullable();  // A+, B-, O+...
            $table->text('adresse')->nullable();
            $table->text('antecedents')->nullable();       // medical history
            $table->text('allergies')->nullable();
            // Dialysis-specific fields
            $table->enum('type_dialyse', ['hemodialyse', 'dialyse_peritoneale'])->nullable();
            $table->date('debut_dialyse')->nullable();
            $table->integer('seances_par_semaine')->nullable();
            $table->string('acces_vasculaire')->nullable(); // fistule, catheter...
            $table->decimal('poids_sec', 5, 2)->nullable();  // dry weight in kg
            $table->timestamp('last_visit')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};