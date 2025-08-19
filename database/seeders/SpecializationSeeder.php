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
            ['en' => 'Mathematics', 'ar' => 'رياضيات'],
            ['en' => 'Physics', 'ar' => 'فيزياء'],
            ['en' => 'Chemistry', 'ar' => 'كيمياء'],
            ['en' => 'Biology', 'ar' => 'أحياء'],
            ['en' => 'History', 'ar' => 'تاريخ'],
            ['en' => 'Geography', 'ar' => 'جغرافيا'],
            ['en' => 'Philosophy', 'ar' => 'فلسفة'],
            ['en' => 'Physical Education', 'ar' => 'التربية البدنية'],
            ['en' => 'Music', 'ar' => 'موسيقى'],
            ['en' => 'Art', 'ar' => 'فن'],
            ['en' => 'Drama', 'ar' => 'دراما'],
            ['en' => 'Economics', 'ar' => 'اقتصاد'],
            ['en' => 'Business Studies', 'ar' => 'دراسات الأعمال'],
            ['en' => 'Psychology', 'ar' => 'علم النفس'],
            ['en' => 'Sociology', 'ar' => 'علم الاجتماع'],
            ['en' => 'Political Science', 'ar' => 'علوم سياسية'],
            ['en' => 'Law', 'ar' => 'قانون'],
            ['en' => 'Engineering', 'ar' => 'هندسة'],
            ['en' => 'Information Technology', 'ar' => 'تكنولوجيا المعلومات'],
            ['en' => 'Nursing', 'ar' => 'تمريض'],
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
