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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('job_vacancy_id');
            $table->uuid('job_applicant_id');
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->foreign('job_applicant_id')->references('id')->on('job_applicants')->onDelete('cascade');
            $table->string('resume_url')->nullable();
            $table->text('cover_letter')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'interview', 'rejected', 'hired'])->default('pending');
            $table->timestamp('applied_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
