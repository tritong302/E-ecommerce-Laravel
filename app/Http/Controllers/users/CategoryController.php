<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    public function index()
    {
      $categories = CategoryProduct::where('status', '0')->paginate(10);

      return view("users.product", compact('categories'));
     
    }
}
