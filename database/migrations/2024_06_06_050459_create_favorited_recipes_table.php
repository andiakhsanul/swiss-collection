<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritedRecipesTable extends Migration
{
    public function up()
    {
        Schema::create('favorited_recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id_recipe')->on('recipe')->onDelete('cascade');

            // Kunci unik untuk mencegah duplikasi
            $table->unique(['user_id', 'recipe_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorited_recipes');
    }
}