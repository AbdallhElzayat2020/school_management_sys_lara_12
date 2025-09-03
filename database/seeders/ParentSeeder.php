<?php

namespace Database\Seeders;

use App\Models\MyParent;
use App\Models\Religion;
use App\Models\TypeBlood;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MyParent::updateOrCreate(
            ['email' => 'abdallh@gmail.com'],
            [
                'password' => Hash::make('12345678'),
                'name_father' => ['en' => 'abdallh', 'ar' => 'عبد الله'],
                'national_id_father' => '1234567810',
                'passport_id_father' => '1234567810',
                'phone_father' => '1234567810',
                'job_father' => ['en' => 'programmer', 'ar' => 'مبرمج'],
                'nationality_father_id' => Nationalitie::all()->unique()->random()->id,
                'blood_type_father_id' => TypeBlood::all()->unique()->random()->id,
                'religion_father_id' => Religion::all()->unique()->random()->id,
                'address_father' => 'القاهرة',
                'name_mother' => ['en' => 'SS', 'ar' => 'سس'],
                'national_id_mother' => '1234567810',
                'passport_id_mother' => '1234567810',
                'phone_mother' => '1234567810',
                'job_mother' => ['en' => 'Teacher', 'ar' => 'معلمة'],
                'nationality_mother_id' => Nationalitie::all()->unique()->random()->id,
                'blood_type_mother_id' => TypeBlood::all()->unique()->random()->id,
                'religion_mother_id' => Religion::all()->unique()->random()->id,
                'address_mother' => 'القاهرة',
            ]
        );
    }
}
