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
        Schema::create('catProgram_program', function (Blueprint $table) {
            $table->unsignedBiginteger('category_id');
            $table->unsignedBiginteger('program_id');


            $table->foreign('category_id')->references('id_catProgram')
                 ->on('catProgram')->onDelete('cascade');
            $table->foreign('program_id')->references('id_program')
                ->on('program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catProgram_program');
    }
};
