<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fonction appelée lors de la migration.
     * S'occupe de la création de la Table Inscrs, représentant une inscription d'un Etudiant à une
     * Epreuve dans la DB.
     */
    public function up(): void
    {
        Schema::create('inscrs', function (Blueprint $table) {
            $table->unsignedBigInteger('fkEtud');
            $table->unsignedBigInteger('fkEpr');
            $table->unsignedBigInteger('noDos')->unique();
            $table->string('rw')->nullable();
            $table->time('tstart')->nullable();
            $table->time('tend')->nullable();
            $table->time('temps')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(['fkEtud', 'fkEpr']);

            $table->foreign('fkEtud')->references('pkEtud')->on('etuds')->onDelete('restrict');
            $table->foreign('fkEpr')->references('pkEpr')->on('eprs')->onDelete('restrict');
        });
    }

    /**
     * Fonction appelée en cas de rollback de migration
     */
    public function down(): void
    {
        Schema::dropIfExists('inscrs');
    }
};
