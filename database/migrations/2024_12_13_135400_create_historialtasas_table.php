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
        Schema::create('historialtasas', function (Blueprint $table) {
            $table->id();
            $table->string('eur',7);
            $table->string('cny',7);
            $table->string('try',7);
            $table->string('rub',7);
            $table->string('usd',7);
            $table->string('fechaope',250);
            $table->string('fechaval1',250);
            $table->string('fechaval2',250);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historialtasas');
    }
};