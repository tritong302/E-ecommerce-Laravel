<?php

namespace App\Livewire\Users\Product;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\CategoryProduct;

class Index extends Component
{
    public $product_id, $product, $quantityCount = 1, $productColorId;
    public $productColorSelectedQuantity;
    public function addToCart(int $productId)
{
    if (Auth::check()) {
        $this->product = Product::find($productId);

        if ($this->product && $this->product->status == '0') {
            if ($this->product->productColor()->count() > 1) {
                if ($this->productColorSelectedQuantity != null) {
                    $productColor = $this->product->productColor()->where('id', $this->productColorId)->first();
                    if ($productColor->quantity > $this->quantityCount) {
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'product_color_id' => $this->productColorId,
                            'quantity' => $this->quantityCount
                        ]);
                        session()->flash('message', 'Product added to cart successfully');
                    }
                } else {
                    session()->flash('message', 'Select your product color');
                   
                }
            } else {
                if ($this->product->quantity > 0) {
                    if ($this->product->quantity > $this->quantityCount) {
                      
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'quantity' => $this->quantityCount
                        ]);
                        session()->flash('message', 'Product added to cart successfully');
                    } else {
                        
                        session()->flash('message', 'Only ' . $this->product->quantity . ' product');
                       
                    }
                } else {
                    session()->flash('message', 'Out-of-stock products');
                   
                }
            }
        } else {
            session()->flash('message', 'Product does not exist');
           
        }
    } else {
        session()->flash('message', 'Please login to add product to cart');
        
    }
}

    public function addToWishList($productId)
    {
       if (Auth::check()) {
           if (Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
               session()->flash('message', 'Already added to wishlist');
               return false;
           }else{
              Wishlist::create([
                   'user_id'=>auth()->user()->id,
                   'product_id'=>$productId,
               ]);
               session()->flash('message', 'Wishlist added successfully');
           }

       }else{
           session()->flash('message', 'You are not logged in');
           return false;
       }

    }
    public function render()
    {
        $products = Product::paginate(12);
        $categories = CategoryProduct::paginate(5);

        return view('livewire.users.product.index',compact('products', 'categories'));
    }
}
