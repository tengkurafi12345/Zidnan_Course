<?php

use App\Enums\JobCategory;
use App\Enums\JobType;
use App\Enums\WorkPolicy;
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
            $table->enum('job_type', JobType::values());
            $table->enum('category', JobCategory::values());
            $table->enum('work_policy', WorkPolicy::values())->default(WorkPolicy::ON_SITE->value);
            $table->bigInteger('salary_min')->nullable(); // Menyimpan dalam satuan Rupiah
            $table->bigInteger('salary_max')->nullable(); // Menyimpan dalam satuan Rupiah
            $table->text('job_description');
            $table->date('date_line');
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
