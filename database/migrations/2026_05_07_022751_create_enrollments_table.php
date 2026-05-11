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
        Schema::create('enrollments', function (Blueprint $table) {
    $table->id();

    // Student Info
    $table->string('first_name');
    $table->string('middle_name')->nullable();
    $table->string('last_name');

    $table->date('birthdate')->nullable();

    $table->enum('gender', ['male', 'female']);

    $table->text('address')->nullable();

    // Academic Structure
    $table->foreignId('program_id')->constrained()->cascadeOnDelete();

    $table->foreignId('grade_level_id')->constrained()->cascadeOnDelete();

    $table->foreignId('section_id')->nullable()->constrained()->nullOnDelete();

    // Enrollment Details
    $table->string('school_year');

    $table->enum('student_type', [
        'new',
        'old',
        'transferee',
        'returnee',
    ])->default('new');

    $table->enum('status', [
        'pending',
        'approved',
        'rejected',
    ])->default('pending');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
