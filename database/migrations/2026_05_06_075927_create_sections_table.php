<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();

            // e.g. Grade 1 - A, Grade 7 - Einstein
            $table->string('name');

            // optional code
            $table->string('code')->nullable();

            // links to program (IMPORTANT)
            $table->foreignId('program_id')
                ->constrained()
                ->cascadeOnDelete();

            // future-proof (for Grade Levels later)
            $table->string('grade_level')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};