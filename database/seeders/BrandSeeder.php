<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manufactures;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 40; $i++) {
            Manufactures::create([
                'name' => 'Leo ' . $i,
                'slug' => 'Úc' . $i,
                'status' => '1',
            ]);
        }
    }
}
