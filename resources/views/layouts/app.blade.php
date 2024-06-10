<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('file_frontend/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('file_frontend/css/style.css') }}">

    <!-- Scripts -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    @livewireStyles
</head>

<body>
    <div id="app">
        <header>
            <!-- Top bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <i class="fa fa-envelope"></i>
                            TH21@gmail.com
                        </div>
                        <div class="col-sm-6">
                            <i class="fa fa-phone-alt"></i>
                            0909999090
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top bar End -->

            <!-- Nav Bar Start -->
            <div class="nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('user_product') }}" class="nav-item nav-link">Products</a>
                                <a href="{{ route('user_cart') }}" class="nav-item nav-link">Cart</a>
                                <a href="{{ route('user_checkout') }}" class="nav-item nav-link">Checkout</a>
                                <a href="{{ route('User_list_order') }}" class="nav-item nav-link">My Order</a>
                                <a href="{{ route('my_account') }}" class="nav-item nav-link">My Account</a>
                            </div>
                            <div class="navbar-nav ml-auto">
                                <div class="nav-item dropdown">
                                    @guest
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                    @else
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                    @endguest

                                    <div class="dropdown-menu">
                                        <div class="collapse navbar-collapse ml-auto" id="navbarNav">
                                            <ul class="navbar-nav">
                                                @guest
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                                </li>
                                                @else
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('logOut') }}">Logout</a>
                                                </li>
                                                @endguest
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->

            <!-- Bottom Bar Start -->
            <div class="bottom-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('/img/logo2.png') }}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="search">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="user">
                                <a href="wishlist.html" class="btn wishlist">
                                    <i class="fa fa-heart"></i>
                                    <span>(0)</span>
                                </a>
                                <a href="{{ route('user_cart') }}" class="btn cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>(0)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <!-- Footer Start -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget">
                                <h2>Get in Touch</h2>
                                <div class="contact-info">
                                    <p><i class="fa fa-map-marker"></i>53 Võ Văn Ngân</p>
                                    <p><i class="fa fa-envelope"></i>TH21@gamil.com.com</p>
                                    <p><i class="fa fa-phone"></i>0909999090</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget">
                                <h2>Follow Us</h2>
                                <div class="contact-info">
                                    <div class="social">
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                        <a href=""><i class="fab fa-facebook-f"></i></a>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                        <a href=""><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget">
                                <h2>Company Info</h2>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Condition</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget">
                                <h2>Purchase Info</h2>
                                <ul>
                                    <li><a href="#">Pyament Policy</a></li>
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row payment align-items-center">
                        <div class="col-md-6">
                            <div class="payment-method">
                                <h2>We Accept:</h2>
                                <img src="img/payment-method.png" alt="Payment Method" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-security">
                                <h2>Secured By:</h2>
                                <img src="img/godaddy.svg" alt="Payment Security" />
                                <img src="img/norton.svg" alt="Payment Security" />
                                <img src="img/ssl.svg" alt="Payment Security" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <!-- Footer Bottom Start -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 copyright">
                            <p>Copyright &copy; <a href="#">Your Site Name</a>. All Rights Reserved</p>
                        </div>

                        <div class="col-md-6 template-by">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom End -->

            <!-- Back to Top -->
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/slick/slick.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
        </footer>
    </div>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message',event=>{
            alertify.set('notifier','position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        })
    </script>

</body>

</html>
