<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;
use App\Models\ProductColor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 40; $i++) {
            $color = Color::create([
                'name' => 'Đen' . $i,
                'code' => 'MM' . $i,
                'status' => '1',
            ]);

            ProductColor::create([
                'product_id' => $color->id,
                'color_id' => $color->id,
                'quantity' => '1',
            ]);
        }
    }
}
