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
        Schema::create('program_video', function (Blueprint $table) {
            $table->unsignedBiginteger('video_id');
            $table->unsignedBiginteger('program_id');


            $table->foreign('video_id')->references('id_video')
                 ->on('video')->onDelete('cascade');
            $table->foreign('program_id')->references('id_program')
                ->on('program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_video');
    }
};
