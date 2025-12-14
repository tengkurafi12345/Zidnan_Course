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
        Schema::create('meetings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('teacher_placement_id');
            $table->string('code', 50)->unique();
            $table->integer('duration_minutes')->default(60);
            $table->timestamp('scheduled_start_time')->nullable();
            $table->timestamp('scheduled_end_time')->nullable();
            $table->timestamp('actual_start_time')->nullable();
            $table->timestamp('actual_end_time')->nullable();
            $table->enum('attendance_status', ['Hadir', 'Tidak Hadir', 'Kurang', 'Lebih'])->nullable()->default('Tidak Hadir');
            $table->string('location', 255)->nullable();
            $table->text('daily_report')->nullable();
            $table->timestamps();

            $table->foreign('teacher_placement_id')->references('id')->on('teacher_placements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
