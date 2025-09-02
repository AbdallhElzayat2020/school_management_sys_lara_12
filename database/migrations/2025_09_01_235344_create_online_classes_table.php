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
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained('grades')->onDelete('cascade');
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');


            /* zoom inputs */
            $table->string('topic');
            $table->text('agenda')->nullable();
            $table->dateTime('start_time');
            $table->integer('duration');
            $table->string('timezone')->default('UTC');
            $table->string('password')->nullable();
            $table->string('template_id')->nullable();
            $table->boolean('pre_schedule')->default(false);
            $table->string('schedule_for')->nullable();


            /* store settings as json */
            $table->json('settings')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_classes');
    }
};
