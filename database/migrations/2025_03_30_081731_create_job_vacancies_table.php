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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('location');
            $table->enum('employment_type', ['Full Time', 'Part Time', 'Contract']);
            $table->enum('job_type', ['teacher', 'programmer', 'content creator']);
            $table->enum('work_policy', ['remote', 'on-site', 'hybrid'])->default('on-site');
            $table->bigInteger('salary_min')->nullable(); // Menyimpan dalam satuan Rupiah
            $table->bigInteger('salary_max')->nullable(); // Menyimpan dalam satuan Rupiah
            $table->string('currency', 10)->default('IDR'); // Default ke Rupiah
            $table->text('job_description');
            $table->timestamp('date_line');
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
