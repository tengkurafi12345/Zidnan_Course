<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('registration_number')->unique();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('gender');
            $table->integer('age')->nullable();
            $table->string('class_status')->nullable();
            $table->string('school_name')->nullable();
            $table->text('address')->nullable();
            $table->string('district', 100)->nullable(); // Kabupaten
            $table->string('phone_number', 20)->nullable();
            $table->string('blood_type', 5)->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('father_occupation')->nullable(); // Pekerjaan Ayah
            $table->string('mother_occupation')->nullable(); // Pekerjaan Ibu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
