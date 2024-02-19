<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fonction appelée lors de la migration.
     * S'occupe de la création de la Table Eprs, représentant une Epreuve dans la DB.
     */
    public function up(): void
    {
        Schema::create('eprs', function (Blueprint $table) {
            $table->id('pkEpr');
            $table->date('date');
            $table->time('tstart')->nullable();
            $table->unsignedInteger('dist');
            $table->unsignedInteger('nbPart');
            $table->string('anSco');
            $table->timestamps();

        });
    }

    /**
     * Fonction appelée en cas de rollback de migration
     */
    public function down(): void
    {
        Schema::dropIfExists('eprs');
    }
};
