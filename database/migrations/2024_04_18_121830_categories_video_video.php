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
        Schema::create('categories_video_video', function (Blueprint $table) {
            $table->unsignedBiginteger('category_id');
            $table->unsignedBiginteger('video_id');


            $table->foreign('category_id')->references('id_categories_video')
                 ->on('categories_video')->onDelete('cascade');
            $table->foreign('video_id')->references('id_video')
                ->on('video')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_video_video');
    }
};
