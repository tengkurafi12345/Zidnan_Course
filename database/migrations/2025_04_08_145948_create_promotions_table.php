<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code_voucher', 10)->unique();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('img_poster')->nullable();
            $table->enum('header_position', ['left', 'right', 'none'])->default('none');
            $table->boolean('is_header')->default(false);
            $table->json('term_and_conditions');
            $table->integer('discount')->nullable();
            $table->integer('quota')->nullable();
            $table->string('used_quota')->default('0');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
