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
        Schema::create('devoirs', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->string('cour');
            $table->text('content');
            $table->foreignId('specialite_id')->constrained()->onDelete('cascade');
            $table->timestamp('date_debut')->nullable();
            $table->timestamp('date_fin')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devoirs');
    }
};
