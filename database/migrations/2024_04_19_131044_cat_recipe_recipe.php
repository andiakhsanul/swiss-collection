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
        Schema::create('catRecipe_recipe', function (Blueprint $table) {
            $table->unsignedBiginteger('category_id');
            $table->unsignedBiginteger('recipe_id');


            $table->foreign('category_id')->references('id_catRecipe')
                 ->on('catRecipe')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id_recipe')
                ->on('recipe')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catRecipe_recipe');
    }
};
