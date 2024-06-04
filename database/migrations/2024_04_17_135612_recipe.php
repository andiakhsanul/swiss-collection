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
        Schema::create('recipe', function (Blueprint $table) {
            $table->id('id_recipe')->primary()->autoIncrement();;
            $table->string('judul_recipe');
            $table->text('deskripsi_recipe');
            $table->string('gambar_recipe');
            $table->string('url_recipe');
            $table->text('bahan_recipe');
            $table->text('cara_masak');
            $table->time('durasi_recipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe');
    }
};
