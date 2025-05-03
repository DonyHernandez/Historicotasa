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
            $table->date('fechaval1');
            $table->date('fechaval2')->unique();
            $table->string('eur');
            $table->string('cny');
            $table->string('try');
            $table->string('rub');
            $table->string('usd');
            $table->string('fechaope');
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