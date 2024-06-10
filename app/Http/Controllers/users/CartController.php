<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\OderDetail;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirm;



class CartController extends Controller
{
    public function index()
{
    $user_cart = Cart::where('user_id', auth()->user()->id)->paginate(3);
    $grandTotal = 0;

    if ($user_cart->isNotEmpty()) {
        $grandTotal = $user_cart->sum(function ($item) {
            return $item->cartProduct->sale_price * $item->quantity;
        });
    }

    return view('users.cart', compact('user_cart', 'grandTotal'));
}
    public function destroyCart($cart_id)
    {
        $cart_remove = Cart::where('user_id', auth()->user()->id)->where('id', $cart_id)->first();

        if ($cart_remove) {
            $cart_remove->delete();
        }

        return redirect()->route('user_cart');
    }
    public function checkout(Request $request)
    {
        $user_cart = Cart::where('user_id', auth()->user()->id)->get();
        $grandTotal = 0;

    if ($user_cart->isNotEmpty()) {
        $grandTotal = $user_cart->sum(function ($item) {
            return $item->cartProduct->sale_price * $item->quantity;
        });
    }

        return view('users.checkout', compact('user_cart', 'grandTotal'));
    }
    public function order(OrderRequest $request){

        $user_cart = Cart::where('user_id', auth()->user()->id)->get();

        $validateData = $request->validated();
        $totalOrder = $this->totalOrder();
       $order = Order::create([
        'user_id'=>auth()->user()->id,
        'cus_name'=>$validateData['cus_name'],
        'cus_email'=>$validateData['cus_email'],
        'cus_phone'=>$validateData['cus_phone'],
        'cus_address'=>$validateData['cus_address'],
        'note'=>$validateData['note'],
        'total'=>$totalOrder,
       ]);

       foreach($user_cart as $cartItem){
            $orderDetail = OderDetail::create([
                    'order_id'=>$order->id,
                    'product_id'=>$cartItem->product_id,
                    'product_color_id'=>$cartItem->product_color_id,
                    'quantity'=>$cartItem->quantity,
                    'total'=>$totalOrder
                ]);

       }
       Mail::to($validateData['cus_email'])->send(new OrderConfirm());
       Cart::where('user_id', auth()->user()->id)->delete();

        return redirect()->route('home')->with('Đặt hàng thành công');
    }
    public function totalOrder(){
        $user_cart = Cart::where('user_id', auth()->user()->id)->get();
        $grandTotal = 0;

        if ($user_cart->isNotEmpty()) {
            $grandTotal = $user_cart->sum(function ($item) {
                return $item->cartProduct->sale_price * $item->quantity;
            });
        }
        return $grandTotal;
    }
    public function updateQuantity(Request $request, $cartId)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
    public function checkQuantity(Request $request, $cartId)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cart) {
            $product = $cart->cartProduct;
            $requestedQuantity = $request->quantity;

            if ($requestedQuantity <= $product->quantity) {
                return response()->json(['success' => true, 'available' => true]);
            } else {
                return response()->json(['success' => true, 'available' => false, 'availableQuantity' => $product->quantity]);
            }
        }

        return response()->json(['success' => false], 400);
    }

}
