<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 250; $i++) {
            $product = Product::create([
                'name' => 'Product ' . $i,
                'slug' => 'product-' . $i,
                'short_desc' => 'Short description for Product ' . $i,
                'regular_price' => $i,
                'sale_price' => $i-1,
                'status' => 0,
                'description' => 'Description for Product ' . $i,
                'quantity' => '10',
                'trending' => 0,
                'featured' => 0,
                'best_seller' => 0,
                'category_id' => '1',
                'manufacturers_id' => '1',
            ]);

            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => 'uploads/products/1715497213.jpg',
            ]);
        }
    }

}
