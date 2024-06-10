@extends('layouts.app')

@section('content')
<body>
            <!-- Main Slider Start -->
            <!-- Main Slider End -->      
            
            <!-- Brand Start -->
           
            <!-- Brand End -->  
            
            
            <!-- Recent Product Start -->
            <div class="recent-product product">
                <div class="container-fluid">
                    <div class="section-header">
                        <h1>Featured Product</h1>
                    </div>
                    <div class="row align-items-center product-slider product-slider-4">
                        @foreach ($trendingProducts as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="{{ route('user_product_detail', ['id' => $product->id]) }}">{{ $product->name
                                        }}</a>
                                    <div class="ratting">
                                        @for ($i = 0; $i < 5; $i++) <i class="fa fa-star"></i>
                                            @endfor
                                    </div>
                                </div>
    
                                @foreach ($product->productImages as $image)
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="{{ asset($image->image_url) }}" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="product-price">
                                    <h3><span>$</span>{{ $product->regular_price }}</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Recent Product End -->
            
            <!-- Feature Start-->
            <div class="feature">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fab fa-cc-mastercard"></i>
                                <h2>Secure Payment</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fa fa-truck"></i>
                                <h2>Worldwide Delivery</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fa fa-sync-alt"></i>
                                <h2>90 Days Return</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 feature-col">
                            <div class="feature-content">
                                <i class="fa fa-comments"></i>
                                <h2>24/7 Support</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur elit
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature End-->      
            
            <!-- Category Start-->
            <div class="category">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="category-item ch-400">
                                <img src="img/category-3.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item ch-250">
                                <img src="img/category-4.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                            <div class="category-item ch-150">
                                <img src="img/category-5.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item ch-150">
                                <img src="img/category-6.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                            <div class="category-item ch-250">
                                <img src="img/category-7.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item ch-400">
                                <img src="img/category-8.jpg" />
                                <a class="category-name" href="">
                                    <p>Some text goes here that describes the image</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Category End-->       
            
            <!-- Call to Action Start -->
            <div class="call-to-action">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1>call us for any queries</h1>
                        </div>
                        <div class="col-md-6">
                            <a href="tel:0123456789">+012-345-67899</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action End -->       
            
            <!-- Featured Product Start -->
            <div class="featured-product product">
                <div class="container-fluid">
                    <div class="section-header">
                        <h1>Recent Product </h1>
                    </div>
                    <div class="row align-items-center product-slider product-slider-4">                     
                        @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{ route('user_product_detail', ['id' => $product->id]) }}">{{ $product->name
                                    }}</a>
                                <div class="ratting">
                                    @for ($i = 0; $i < 5; $i++) <i class="fa fa-star"></i>
                                        @endfor
                                </div>
                            </div>

                            @foreach ($product->productImages as $image)
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="{{ asset($image->image_url) }}" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div>
                            </div>
                            @endforeach
                            <div class="product-price">
                                <h3><span>$</span>{{ $product->regular_price }}</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <!-- Featured Product End -->       
            
            <!-- Newsletter Start -->
            <div class="newsletter">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Subscribe Our Newsletter</h1>
                        </div>
                        <div class="col-md-6">
                            <div class="form">
                                <form action="{{ route('subscribe') }}" method="POST">
                                    @csrf
                                    <input type="email" name="email" placeholder="Your email here">
                                    <button type="submit" onclick="return confirm('Bạn xác nhận đăng ký email để TH21 liên hệ')">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Newsletter End -->        
            
            
            
            <!-- Review Start -->
            <div class="review">
                <div class="container-fluid">
                    <div class="row align-items-center review-slider normal-slider">
                        <div class="col-md-6">
                            <div class="review-slider-item">
                                <div class="review-img">
                                    <img src="img/review-1.jpg" alt="Image">
                                </div>
                                <div class="review-text">
                                    <h2>Customer Name</h2>
                                    <h3>Profession</h3>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="review-slider-item">
                                <div class="review-img">
                                    <img src="img/review-2.jpg" alt="Image">
                                </div>
                                <div class="review-text">
                                    <h2>Customer Name</h2>
                                    <h3>Profession</h3>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="review-slider-item">
                                <div class="review-img">
                                    <img src="img/review-3.jpg" alt="Image">
                                </div>
                                <div class="review-text">
                                    <h2>Customer Name</h2>
                                    <h3>Profession</h3>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review End -->  
</body>
@endsection
