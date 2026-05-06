<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();

            // Example: 2025-2026
            $table->string('year')->unique();

            // optional: start and end dates
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // only one active school year at a time
            $table->boolean('is_active')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};