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
        Schema::create('video', function (Blueprint $table) {
            $table->id('id_video')->primary()->autoIncrement();;
            $table->string('judul_video');
            $table->text('deskripsi_video');
            $table->string('gambar_video');
            $table->string('url_video');
            $table->time('durasi_video');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
