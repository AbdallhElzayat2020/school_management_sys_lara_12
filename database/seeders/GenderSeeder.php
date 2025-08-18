<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            ['en' => 'Male', 'ar' => 'ذكر'],
            ['en' => 'Female', 'ar' => 'أنثى'],
        ];

        foreach ($genders as $gender) {
            Gender::updateOrCreate([
                'name' => [
                    'en' => $gender['en'],
                    'ar' => $gender['ar'],
                ],
            ]);
        }
    }
}
