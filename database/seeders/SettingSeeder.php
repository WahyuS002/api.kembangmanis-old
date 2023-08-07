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
        $data = [
            'siteName' => 'Desa Kembang Manis',
            'siteDescription' => 'Website Desa Kembang Manis',
            'structureImage' => 'struktur-pemerintah.png', // Replace this with the image filename
        ];

        foreach ($data as $key => $value) {
            if ($key === 'structureImage') {
                $setting = Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);

                $setting->addMedia(public_path('images/' . $value))
                    ->preservingOriginal()
                    ->toMediaCollection();
            } else {
                DB::table('settings')->insertOrIgnore([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
    }
}
