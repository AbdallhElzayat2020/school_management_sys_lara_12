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
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();

            // parent email and password for account
            $table->string('email')->unique();
            $table->string('password');

            /*  father info */
            $table->string('father_name', 255);
            $table->string('father_national_id', 50)->unique();
            $table->string('father_passport_id', 50)->unique();
            $table->string('father_phone', 18)->unique();
            $table->string('father_job', 150)->nullable();
            $table->string('father_address', 255);
            $table->foreignId('father_nationality_id')->constrained('nationalities');
            $table->foreignId('father_type_blood_id')->constrained('type_bloods');
            $table->foreignId('father_religion_id')->constrained('religions');

            /*  mother info */
            $table->string('mother_name', 255);
            $table->string('mother_national_id', 50)->unique();
            $table->string('mother_passport_id', 50)->unique();
            $table->string('mother_phone', 18)->unique();
            $table->string('mother_job', 150)->nullable();
            $table->string('mother_address', 255);
            $table->foreignId('mother_nationality_id')->constrained('nationalities');
            $table->foreignId('mother_type_blood_id')->constrained('type_bloods');
            $table->foreignId('mother_religion_id')->constrained('religions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_parents');
    }
};
