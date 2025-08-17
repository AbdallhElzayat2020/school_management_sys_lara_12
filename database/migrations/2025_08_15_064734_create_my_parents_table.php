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
            $table->string('name_father');
            $table->string('national_id_father');
            $table->string('passport_id_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->foreignId('nationality_father_id')->constrained('nationalities');
            $table->foreignId('blood_type_father_id')->constrained('type_bloods');
            $table->foreignId('religion_father_id')->constrained('religions');
            $table->string('address_father');

            /*  mother info */
            $table->string('name_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->foreignId('nationality_mother_id')->constrained('nationalities');
            $table->foreignId('blood_type_mother_id')->constrained('type_bloods');
            $table->foreignId('religion_mother_id')->constrained('religions');
            $table->string('address_mother');

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
