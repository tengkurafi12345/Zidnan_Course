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
        Schema::create('job_qualifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->text('description');
            $table->json('items'); // Disimpan dalam format JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_qualifications');
    }
};
