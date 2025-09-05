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
        Schema::create('packet_combinations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('lesson_level_id');
            $table->uuid('program_id');
            $table->string('price');
            $table->boolean('published_on')->default('0');
            $table->boolean('status')->default('1');
            $table->foreign('lesson_level_id')->references('id')->on('lesson_levels')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['lesson_level_id', 'program_id']); // Prevent duplicate combinations
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packet_combinations');
    }
};
