<?php

namespace App\Livewire\Users\Product;

use App\Models\CategoryProduct;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;
class SearchProductController extends Component
{
    public function render(Request $request)
    
    {
        $query = Product::query();
    
        // Lọc theo từ khóa tìm kiếm
        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }
    
        // Lọc theo khoảng giá
        $priceRange = $request->input('regular_price');
        if ($priceRange) {
            [$minPrice, $maxPrice] = explode('-', $priceRange);
            $query->whereBetween('regular_price', [$minPrice, $maxPrice]);
        }
    
        $products = $query->paginate(10);
        $categories = CategoryProduct::all();
        return view('livewire.users.product.index',compact('products', 'categories'));
    }
}
