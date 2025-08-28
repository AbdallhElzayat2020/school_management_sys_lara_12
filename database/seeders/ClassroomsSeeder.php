<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all available grade IDs
        $gradeIds = Grade::pluck('id')->toArray();

        $classrooms = [
            [
                'class_name' => [
                    'ar' => 'الصف الاول',
                    'en' => 'First Grade'
                ],
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],

            [
                'class_name' => [
                    'ar' => 'الصف الثاني',
                    'en' => 'Second Grade'
                ],
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],

            [
                'class_name' => [
                    'ar' => 'الصف الثالث',
                    'en' => 'Third Grade'
                ],
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],

            [
                'class_name' => [
                    'ar' => 'الصف الرابع',
                    'en' => 'Fourth Grade'
                ],
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],

            [
                'class_name' => [
                    'ar' => 'الصف الخامس',
                    'en' => 'Fifth Grade'
                ],
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],

            [
                'class_name' => [
                    'ar' => 'الصف السادس',
                    'en' => 'Sixth Grade'
                ],
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ]
        ];

        foreach ($classrooms as $classroom) {
            Classroom::updateOrCreate($classroom);
        }
    }
}
