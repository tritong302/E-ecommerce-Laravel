<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;

class User_Product_detail extends Controller
{
    public function index($product_id)
    {
        $product = Product::find($product_id);
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $color = Color::whereNotIn('id',$product_color)->get();
        return view('users.product_detail', compact('product','color'));
    }
}
