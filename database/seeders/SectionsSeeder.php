<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_name' => [
                    'ar' => 'الصف الاول',
                    'en' => 'First Grade'
                ],
                'classroom_id' => Classroom::all()->random()->id,
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],
            [
                'section_name' => [
                    'ar' => 'الصف الثاني',
                    'en' => 'Second Grade'
                ],
                'classroom_id' => Classroom::all()->random()->id,
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],
            [
                'section_name' => [
                    'ar' => 'الصف الثالث',
                    'en' => 'Third Grade'
                ],
                'classroom_id' => Classroom::all()->random()->id,
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],
            [
                'section_name' => [
                    'ar' => 'الصف الرابع',
                    'en' => 'Fourth Grade'
                ],
                'classroom_id' => Classroom::all()->random()->id,
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],
            [
                'section_name' => [
                    'ar' => 'الصف الخامس',
                    'en' => 'Fifth Grade'
                ],
                'classroom_id' => Classroom::all()->random()->id,
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],
            [
                'section_name' => [
                    'ar' => 'الصف السادس',
                    'en' => 'Sixth Grade'
                ],
                'classroom_id' => Classroom::all()->random()->id,
                'status' => 'active',
                'grade_id' => Grade::all()->random()->id,
            ],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate($section);
        }
    }
}
