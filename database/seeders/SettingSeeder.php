<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();
        $setting = [
            'name_project' => 'Fruitables',
            'location' => 'Port-Sudan',
            'email' => 'email@gmail.com',
            'logo' => asset('uploads/logo/vegetable-item-6.JPG')
        ];
        Setting::create($setting);
    }
}
