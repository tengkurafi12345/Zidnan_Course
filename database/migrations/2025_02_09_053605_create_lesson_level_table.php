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
        Schema::create('lesson_levels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('program_class_id');
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->string('class_level');
            $table->boolean('status')->default('1');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreign('program_class_id')->references('id')->on('program_classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packets');
    }
};
