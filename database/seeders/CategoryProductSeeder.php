<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 40; $i++) {
            CategoryProduct::create([
                'cate_name' => 'Thời trang ' . $i,
                'cate_slug' => 'Nam ' . $i,
                'cate_banner' => '1715579020.jpg',
                'status' => '1',
            ]);
        }
    }
}
