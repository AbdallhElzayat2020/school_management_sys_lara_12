<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('settings')->delete();
        $data = [
            ['key' => 'school_name', 'value' => 'MySchool'],
            ['key' => 'address', 'value' => '123 Main St, City, Country'],
            ['key' => 'phone', 'value' => '+1234567890'],
            ['key' => 'email', 'value' => 'info@gmail.com'],
            ['key' => 'logo', 'value' => ''],
        ];
        DB::table('settings')->insert($data);
    }
}
