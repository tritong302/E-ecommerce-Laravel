@extends('layouts.app')
@section('title','Register TH21')

@section('content')


<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user_product') }}">Products</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('user_checkout') }}">Checkout</a></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<div class="checkout">
    <div class="container-fluid">
        <form action="{{ route('order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Billing Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" type="text" placeholder="Name" name="cus_name" required>
                                </div>
        
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="E-mail" name="cus_email" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="Mobile No" name="cus_phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Delivery Address</label>
                                    <input class="form-control" type="text" placeholder="Address" name="cus_address" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Note</label>
                                    <input class="form-control" type="text" placeholder="Note" name="note" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <!-- Các sản phẩm -->
                            @forelse($user_cart as $key => $cart)
                                @if($cart->cartProduct)
                                    <input type="hidden" name="product[]" value="{{ $cart->cartProduct->id }}">
                                    <input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                                    <input type="hidden" name="total[]" value="{{ $cart->cartProduct->sale_price * $cart->quantity }}">
                                    <p>{{ $cart->cartProduct->name }} <span>Quantity: {{ $cart->quantity }}</span></p>
                                    <p>Provisional: <span>${{ $cart->cartProduct->sale_price * $cart->quantity }}</span></p>
                                @endif
                            @empty
                            @endforelse
        
                            <!-- Tổng tiền -->
                            <h2>Grand Total<span>${{ $user_cart->sum(function ($item) { return $item->cartProduct->sale_price * $item->quantity; }) }}</span></h2>
                        </div>
                        <div class="checkout-payment">
                            <div class="checkout-btn">
                                <button type="submit" onclick="return confirm('Bạn xác nhận đơn hàng và sẽ nhận được mail thông báo!')">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Checkout End -->


@endsection