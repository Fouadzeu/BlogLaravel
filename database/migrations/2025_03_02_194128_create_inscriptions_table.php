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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            // Référence à l'utilisateur
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Référence au cours
            $table->foreignId('cours_id')->constrained()->onDelete('cascade');
            // Exemple d'attribut pivot : progression et status
            $table->integer('progression')->default(0);
            $table->string('statut')->default('en cours'); // par exemple "en cours", "terminé", etc.
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
