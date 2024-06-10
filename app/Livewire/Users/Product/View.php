<?php

namespace App\Livewire\Users\Product;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product_id, $product, $quantityCount = 1, $productColorId;
    public $productColorSelectedQuantity;
    public $name;
    public $email;
    public $content;
    public $ratings;
    public function colorSelected($productColorId)
    {

        $this->productColorId = $productColorId;
        $productColor = $this->product->productColor()->where('id', $productColorId)->first();
        if ($productColor) {
            $this->productColorSelectedQuantity = $productColor->quantity;

            if ($this->productColorSelectedQuantity == 0) {
                $this->productColorSelectedQuantity = 'outOfStock';
            }
        } else {
            $this->productColorSelectedQuantity = null;
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 20) {
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
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
                        $this->dispatch('message', [
                            'text' => 'Select your product color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if ($this->product->quantity > 0) {
                        if ($this->product->quantity > $this->quantityCount) {
                            //insert to cart
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'product_color_id' => $this->productColorId,
                                'quantity' => $this->quantityCount
                            ]);
                            session()->flash('message', 'Product added to cart successfully');
                        } else {
                            
                            session()->flash('message', 'Only ' . $this->product->quantity . ' Quantity Available');
                        }
                    } else {
                        dd('Out-of-stock products');
                        $this->dispatch('message', [
                            'text' => 'Out-of-stock products',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            } else {
                session()->flash('message', 'Product does not exist');
            }
        } else {
            session()->flash('message', 'Please log in to add to cart');
        }
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to wishlist');
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                session()->flash('message', 'Wishlist added successfully');
            }
        } else {
            session()->flash('message', 'You are not logged in');
            return false;
        }
    }
    
    public function mount($product_id)
    {
        $this->product_id = $product_id;
    }
    public function addComment($productId, Request $request)
    {

        $validatedData = $request->validate([
            'content' => 'required|',
            'ratings' => 'required|numeric|between:1,5',
        ]);
        Comment::create([
            'user_id' => auth()->user()->id ?? null,
            'product_id' => $productId,
            'content' => $this->content,
            'ratings' => $this->ratings
        ]);
        dd('Comment added successfully');
    }
    public function render()
    {
        $product = Product::find($this->product_id);
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $color = Color::whereNotIn('id', $product_color)->get();
        return view('livewire.users.product.view', compact('product', 'color'));
    }
}
