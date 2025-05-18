<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('palestras', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('descricao')->nullable();
        $table->dateTime('data_hora');
        $table->string('local');
        $table->string('palestrante');
        $table->enum('estado', ['agendada', 'realizada', 'cancelada']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palestras');
    }
};
