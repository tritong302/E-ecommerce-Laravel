@extends('layouts.app')
@section('title','Cart TH21')

@section('content')


<!-- Bottom Bar End -->

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user_product') }}">Products</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('user_cart') }}">Cart</a></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                            <tbody class="align-middle">
                            @forelse($user_cart as $cart)
                                @if($cart->cartProduct)
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="{{ asset($cart->cartProduct->productImages[0]->image_url) }}" alt="Image"></a>
                                                <p>{{ $cart->cartProduct->name }}</p>
                                            </div>
                                        </td>
                                        <td>${{ $cart->cartProduct->sale_price }}</td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus" onclick="decreaseQuantity({{ $cart->id }})"><i class="fa fa-minus"></i></button>
                                                <input id="quantity_{{ $cart->id }}" type="text" value="{{ $cart->quantity }}" oninput="updateTotal({{ $cart->id }})">
                                                <button class="btn-plus" onclick="increaseQuantity({{ $cart->id }})"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td id="total_{{ $cart->id }}" data-price="{{ $cart->cartProduct->sale_price }}">${{ $cart->cartProduct->sale_price * $cart->quantity }}</td>
                                        <td>
                                            <a href="{{ route('cart_remove', ['id' => $cart->id]) }}">
                                                <button><i class="fa fa-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                            
                            </tbody>

                        </table>
                        {!! $user_cart->links('pagination::bootstrap-4', ['prev_page' => '← Previous', 'next_page' => 'Next→'])
                !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>${{ $user_cart->sum(function ($item) { return $item->cartProduct->sale_price * $item->quantity; }) }}</span></p>
                                    <p>Grand Total<span id="grandTotal">${{ $grandTotal }}</span></p>
                                </div>
                                <div class="cart-btn">
                                    <button>Update Cart</button>
                                    <button onclick="window.location.href='{{ route('user_checkout') }}'">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    function increaseQuantity(cartId) {
        const quantityInput = document.getElementById(`quantity_${cartId}`);
        let quantity = parseInt(quantityInput.value);
        quantity++;
        quantityInput.value = quantity;
        updateQuantityInDatabase(cartId, quantity);
        updateTotal(cartId);
    }
    function decreaseQuantity(cartId) {
        const quantityInput = document.getElementById(`quantity_${cartId}`);
        let quantity = parseInt(quantityInput.value);

        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;

            updateQuantityInDatabase(cartId, quantity);

            updateTotal(cartId);
        }
    }

    function updateQuantityInDatabase(cartId, quantity) {
        fetch(`/check-quantity/${cartId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity: quantity })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.available) {
                        fetch(`/update-quantity/${cartId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({ quantity: quantity })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    updateTotal(cartId);
                                    updateGrandTotal();
                                } else {
                                    console.error('Cập nhật số lượng thất bại');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        toastr.warning(`Only  ${data.availableQuantity} product available`);
                        document.getElementById(`quantity_${cartId}`).value = data.availableQuantity;
                        updateTotal(cartId);
                        updateGrandTotal();
                    }
                } else {
                    console.error('Kiểm tra số lượng thất bại');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function updateTotal(cartId) {
        const quantityInput = document.getElementById(`quantity_${cartId}`);
        const quantity = parseInt(quantityInput.value);
        const price = parseFloat(document.querySelector(`#total_${cartId}`).dataset.price);
        const total = price * quantity;
        document.getElementById(`total_${cartId}`).innerText = `$${total.toFixed(2)}`;

        updateGrandTotal();
    }

    function updateGrandTotal() {
        const totals = document.querySelectorAll('[id^="total_"]');
        let grandTotal = 0;

        totals.forEach(total => {
            grandTotal += parseFloat(total.innerText.replace('$', ''));
        });

        document.getElementById('grandTotal').innerText = `$${grandTotal.toFixed(2)}`;
    }
</script>
<!-- Cart End -->
@endsection
