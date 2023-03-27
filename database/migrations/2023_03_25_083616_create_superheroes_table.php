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
        Schema::create('superheroe', function (Blueprint $table) {
            $table->id();

            $table->string('NombreReal');
            $table->string('NombreClaveSuperheroe');
            $table->string('Foto');
            $table->string('InformacionAdicional');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superheroe');
    }
};
