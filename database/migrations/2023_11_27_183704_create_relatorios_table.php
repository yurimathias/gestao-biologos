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
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biologo_id');
            $table->unsignedBigInteger('area_id');
            $table->text('observacoes');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('biologo_id')->references('id')->on('biologos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relatorios');
    }
};
