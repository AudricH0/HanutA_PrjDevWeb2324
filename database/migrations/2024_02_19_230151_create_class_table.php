<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fonction appelée lors de la migration.
     * S'occupe de la création de la Table Class, réprésentant une Classe dans la DB.
     */
    public function up(): void
    {
        Schema::create('class', function (Blueprint $table) {
            $table->id('pkClas');
            $table->unsignedBigInteger('fkEtab')->nullable();
            $table->unsignedInteger('niv');
            $table->string('ident');
            $table->unsignedInteger('nbEtud');
            $table->timestamps();
        });
    }

    /**
     * Fonction appelée en cas de rollback de migration
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};
