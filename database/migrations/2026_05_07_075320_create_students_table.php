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
        Schema::create('students', function (Blueprint $table) {
    $table->id();

    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->foreignId('enrollment_id')->nullable()->constrained()->nullOnDelete();

    $table->foreignId('program_id')->nullable();
    $table->foreignId('grade_level_id')->nullable();
    $table->foreignId('section_id')->nullable();

    $table->string('student_number')->unique()->nullable();

    $table->date('admitted_at')->nullable();

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
