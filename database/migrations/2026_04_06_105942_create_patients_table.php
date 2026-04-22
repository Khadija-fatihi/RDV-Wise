<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cin')->unique()->nullable();
            $table->string('sexe')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('type_dialyse')->nullable();
            $table->integer('seances_par_semaine')->default(3);
            $table->string('groupe_sanguin')->nullable();
            $table->string('adresse')->nullable();
            $table->text('antecedents')->nullable();
            $table->text('allergies')->nullable();
            $table->date('debut_dialyse')->nullable();
            $table->string('acces_vasculaire')->nullable();
            $table->decimal('poids_sec', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('patients');
    }
};