<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('program_classes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('caption');
            $table->text('description');
            $table->json('list_of_feature');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_classes');
    }
};
