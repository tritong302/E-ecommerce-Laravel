<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductImage;

class User_ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        
        $categories  = CategoryProduct::paginate(3);
        
        return view("users.product", compact('products','categories'));
    }
    
}
