<div>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user_product') }}">Products</a></li>
                <li class="breadcrumb-item active">Product List</li>
            </ul>
        </div>
    </div>



    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            @if(session()->has('message'))
                                <div class="alert alert-success" >
                                    {{session('message')}}
                                </div>
                            @endif
                            @foreach ($product->productImages as $image)
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="{{ asset($image->image_url) }}" alt="Product Image">

                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2>{{ $product->name }}</h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p>{{ $product->sale_price }} <span>{{ $product->regular_price }}</span></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <div class="qty">
                                            <button wire:click="decrementQuantity" class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly>
                                            <button wire:click="incrementQuantity" class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    @if($product->productColor->count()>0)
                                        @if($product->productColor)
                                            <div class="p-color">
                                                <h4>Color:</h4>
                                                @foreach ($product->productColor as $color)
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" wire:click="colorSelected({{$color->id}})" class="btn">{{ $color->color->name }}</button>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endif

                                    <div>
                                        @if($this->productColorSelectedQuantity == 'outOfStock')
                                            <label>Out of Stock</label>
                                        @elseif($this->productColorSelectedQuantity > 0 )
                                            <label>In Stock</label>
                                        @endif
                                    </div>

                                    <div class="action">
                                        <button type="button" wire:click="addToCart({{$product->id}})" class="btn" ><i class="fa fa-shopping-cart" ></i>Add to Cart</button>
                                        <button type="button" wire:click="addToWishList({{$product->id}})" class="btn" ><i class="fa fa-shopping-cart" ></i>Add to Wishlist</button>
                                        <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Product description</h4>
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div id="specification" class="container tab-pane fade">
                                    <h4>Product specification</h4>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                    </ul>
                                </div>
                                <div id="reviews" class="container tab-pane fade">

                                        <div class="reviews-submitted">
                                            <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                            </p>
                                        </div>

                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting" style="">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <select id="ratings" name="ratings" wire:model="ratings">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>

                                            <div class="row form">
                                                @if(auth()->check())
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Name" name="name" value="{{ auth()->user()->name }}" readonly>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" placeholder="Email" name="email" value="{{ auth()->user()->email }}" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-sm-6">
                                                        <input type="text" placeholder="Name" name="name"  wire:model="name">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="email" placeholder="Email" name="email" wire:model="email">
                                                    </div>
                                                @endif

                                                <div class="col-sm-12">
                                                    <textarea placeholder="Review" name="content" wire:model="content"></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="button" wire:click="addComment({{$product->id}})">Submit</button>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="section-header">
                            <h1>Related Products</h1>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-10.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-6.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-4.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-2.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">Product Name</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="img/product-7.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">Product Name</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="img/product-8.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">Product Name</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="img/product-9.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Our Brands</h2>
                        <ul>
                            <li><a href="#">Nulla </a><span>(45)</span></li>
                            <li><a href="#">Curabitur </a><span>(34)</span></li>
                            <li><a href="#">Nunc </a><span>(67)</span></li>
                            <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                            <li><a href="#">Fusce </a><span>(89)</span></li>
                            <li><a href="#">Sagittis</a><span>(28)</span></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">Tags Cloud</h2>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Vivamus</a>
                        <a href="#">Phasellus</a>
                        <a href="#">pulvinar</a>
                        <a href="#">Curabitur</a>
                        <a href="#">Fusce</a>
                        <a href="#">Sem quis</a>
                        <a href="#">Mollis metus</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Vel posuere</a>
                        <a href="#">orci luctus</a>
                        <a href="#">Nam lorem</a>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('toast', event => {
                toastr[event.detail.type](event.detail.message);
            });
        });
    </script>

    <!-- Product Detail End -->
</div>
