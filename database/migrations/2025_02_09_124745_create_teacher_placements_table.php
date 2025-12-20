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
        Schema::create('teacher_placements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('academic_period_id');
            $table->uuid('teacher_id');
            $table->uuid('student_id');
            $table->uuid('packet_combination_id');
            $table->float('meeting_times')->default(8);
            $table->integer('duration_minutes')->default(60);
            $table->foreign('academic_period_id')->references('id')->on('academic_periods')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('packet_combination_id')->references('id')->on('packet_combinations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_placements');
    }
};
