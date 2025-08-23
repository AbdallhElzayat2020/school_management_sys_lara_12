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
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('blood_type_id')->constrained('type_bloods');
            $table->foreignId('nationality_id')->constrained('nationalities');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('classroom_id')->constrained('classrooms');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('student_parent_id')->constrained('my_parents');
            $table->date('date_birth');
            $table->year('academic_year');
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
