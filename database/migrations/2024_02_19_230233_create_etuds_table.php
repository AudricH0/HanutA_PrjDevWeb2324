<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fonction appelée lors de la migration.
     * S'occupe de la création de la Table Etuds, représentant un Etudiant dans la DB.
     */
    public function up(): void
    {
        Schema::create('etuds', function (Blueprint $table) {
            $table->id('pkEtud');
            $table->unsignedBigInteger('fkClas');
            $table->string('nom');
            $table->string('pren');
            $table->string('sexe');
            $table->unsignedInteger('nbIns');
            $table->timestamps();

            $table->foreign('fkClas')->references('pkClas')->on('class')->onDelete('restrict');
        });
    }

    /**
     * Fonction appelée en cas de rollback de migration
     */
    public function down(): void
    {
        Schema::dropIfExists('etuds');
    }
};
