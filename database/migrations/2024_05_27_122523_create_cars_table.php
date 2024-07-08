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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('marque', length: 150);
            $table->string('modele', length: 50);
            $table->string('immat', length: 7)->unique();
            $table->string('num_serie', length: 35)->unique();
            $table->integer('puissance_fiscale');
            $table->date('date_mise_circulation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
