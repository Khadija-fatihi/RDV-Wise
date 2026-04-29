<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
{
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('cin')->unique()->nullable();
        $table->string('specialite')->default('Généraliste');
        $table->string('phone')->nullable();
        $table->boolean('verified')->default(false);
        $table->text('bio')->nullable();
        $table->string('avatar')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('doctors');
}
};
