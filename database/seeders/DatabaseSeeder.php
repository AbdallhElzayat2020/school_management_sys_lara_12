<?php

namespace Database\Seeders;

use App\Models\TypeBlood;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TypeBloodSeeder::class,
            NationalitiesSeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            SpecializationSeeder::class,
        ]);
    }
}
