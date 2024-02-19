<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fonction appelée lors de la migration.
     * S'occupe de la création de la Table Users, représentant un Utilisateur dans la DB.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('pkUser');
            $table->string('login')->unique();
            $table->string('pswd');
            $table->boolean('admin');
            $table->timestamps();
        });
    }

    /**
     * Fonction appelée en cas de rollback de migration
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
