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
        Schema::create('relatorio_planta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relatorio_id');
            $table->unsignedBigInteger('planta_id');
            $table->timestamps();

            $table->foreign('relatorio_id')->references('id')->on('relatorios');
            $table->foreign('planta_id')->references('id')->on('plantas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatorio_planta');
    }
};
