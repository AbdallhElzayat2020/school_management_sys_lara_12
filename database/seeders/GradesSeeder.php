<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $grades = [
            [
                'name' => [
                    'ar' => 'المرحلة الابتدائية',
                    'en' => 'Primary Stage'
                ],
                'status' => 'active',
            ],

            [
                'name' => [
                    'ar' => 'المرحلة الاعدادية',
                    'en' => 'Secondary Stage'
                ],
                'status' => 'active',
            ],

            [
                'name' => [
                    'ar' => 'المرحلة الثانوية',
                    'en' => 'High School'
                ],
                'status' => 'active',
            ],

            [
                'name' => [
                    'ar' => 'المرحلة العليا',
                    'en' => 'University'
                ],
                'status' => 'active',
            ]
        ];


        foreach ($grades as $grade) {
            Grade::updateOrCreate($grade);
        }
    }
}
