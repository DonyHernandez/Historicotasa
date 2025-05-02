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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->date('date');                     //Fecha de la tasa unica.
            $table->date('fecha_tasa')->unique();                     //Fecha de la tasa unica.
            $table->string('eur');
            $table->string('cny');
            $table->string('try');
            $table->string('rub');
            $table->string('usd');
            $table->string('operacion_bcv');                        // Fecha de publicacion.
            $table->timestamps();                                       // created_at y update_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
