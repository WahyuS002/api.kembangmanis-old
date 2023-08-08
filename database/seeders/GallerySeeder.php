<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            2 => 'Day 2',
            4 => 'Day 4',
            5 => 'Day 5',
            6 => 'Day 6',
        ];

        foreach ($days as $dayNumber => $dayTitle) {
            $gallery = Gallery::create([
                'title' => "Dokumentasi Open Turnamen Kuda Terbang $dayTitle"
            ]);

            $imagePath = public_path("images/galleries/turnamen-sepak-bola/day-$dayNumber");

            $imageFiles = scandir($imagePath);

            foreach ($imageFiles as $fileName) {
                if ($fileName !== '.' && $fileName !== '..') {
                    // Attach each image to the gallery using Spatie Media Library
                    $gallery->addMedia($imagePath . '/' . $fileName)->preservingOriginal()->toMediaCollection('gallery_images');
                }
            }
        }
    }
}
