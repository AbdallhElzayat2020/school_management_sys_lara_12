<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            ['en' => 'Arabic', 'ar' => 'عربي'],
            ['en' => 'Sciences', 'ar' => 'علوم'],
            ['en' => 'Computer', 'ar' => 'حاسب الي'],
            ['en' => 'English', 'ar' => 'انجليزي'],
        ];


        foreach ($specializations as $specialization) {
            Specialization::updateOrCreate([
                'name' => [
                    'en' => $specialization['en'],
                    'ar' => $specialization['ar'],
                ],
            ]);
        }
    }
}
