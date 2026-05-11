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
        Schema::create('subjects', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique(); // e.g. MATH1
    $table->string('name'); // Mathematics
    $table->string('description')->nullable();

    $table->enum('level', ['elementary', 'junior_high', 'senior_high']);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
