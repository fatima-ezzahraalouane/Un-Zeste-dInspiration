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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->text('description');
            $table->enum('statut', ['En attente', 'Approuvé', 'Rejeté'])->default('En attente');
            $table->integer('preparation_time');
            $table->integer('cooking_time');    
            $table->integer('servings');         
            $table->enum('complexity', ['Facile', 'Moyen', 'Difficile']);
            $table->text('ingredients');
            $table->text('instructions');
            $table->foreignId('chef_id')->constrained('chefs')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
