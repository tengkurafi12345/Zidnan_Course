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
            $table->uuid('packet_id');
            $table->uuid('program_id');
            $table->string('price');
            $table->boolean('published_on')->default('0');
            $table->boolean('status')->default('1');
            $table->foreign('packet_id')->references('id')->on('packets')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['packet_id', 'program_id']); // Prevent duplicate combinations
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
