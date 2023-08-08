<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Wahyu Syahputra',
            'email' => 'syahputrawahyu61@gmail.com',
        ]);

        $this->call([
            SettingSeeder::class,
            PostSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
