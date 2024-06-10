@extends('layouts.app')
@section('title','Search TH21')

@section('content')
<!-- Product List Start -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user_product') }}">Products</a></li>
                <li class="breadcrumb-item active">Product List</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <form action="{{ route('search_product') }}" method="GET">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="text" name="search" placeholder="Search"
                                                    value="{{ request('search') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <select name="regular_price" class="custom-select">
                                                    <option value="">Select price</option>
                                                    <option value="0-50">$0 to $50</option>
                                                    <option value="51-100">$51 to $100</option>
                                                    <option value="101-150">$101 to $150</option>
                                                    <option value="151-250">$151 to $250</option>
                                                    <!-- Thêm các tùy chọn khác cho khoảng giá -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="product-search">
                                                <button type="submit" class="search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    
                    <!-- Pagination Start -->
                    {!! $products->links('pagination::bootstrap-4', ['prev_page' => '← Previous', 'next_page' => 'Next→'])
                    !!}
                    <!-- Pagination End -->
                </div>
    
                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            @foreach ($categories as $category)
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>{{$category->cate_name}}</a>
                                </li>
                            </ul>
                            @endforeach
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
                    </div>
                </div>
    
                <!-- Side Bar End -->
            </div>
        </div>
        <script>
            // Lắng nghe sự kiện click trên các liên kết lọc theo giá
            var searchButton = document.querySelector('.product-search button[type="submit"]');
        searchButton.addEventListener('click', function (event) {
            event.preventDefault();
            var searchInput = document.querySelector('.product-search input[name="search"]');
            var searchValue = searchInput.value.trim();
            var priceRangeSelect = document.querySelector('.product-search select[name="regular_price"]');
            var priceRangeValue = priceRangeSelect.value;
            var url = '{{ route("search_product") }}?';
            if (searchValue) {
                url += 'search=' + encodeURIComponent(searchValue) + '&';
            }
            if (priceRangeValue) {
                url += 'regular_price=' + encodeURIComponent(priceRangeValue);
            }
            window.location.href = url;
        });
        </script>
        <style>
            .custom-select {
                width: 100%;
                height: 100%;
                padding: 8px;
                font-size: 14px;
            }
        
            .custom-select option {
                padding: 8px;
            }
        
            .search-button {
                padding: 8px;
                font-size: 14px;
                background-color: #f8f8f8;
                border: none;
                cursor: pointer;
            }
        
            .search-button i {
                margin-right: 5px;
            }
        </style>
    </div>

@endsection