<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GradesSeeder::class,
            ClassroomsSeeder::class,
            SectionsSeeder::class,
            TypeBloodSeeder::class,
            NationalitiesSeeder::class,
            ReligionSeeder::class,
            GenderSeeder::class,
            SpecializationSeeder::class,
            ParentSeeder::class,
            StudentSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
