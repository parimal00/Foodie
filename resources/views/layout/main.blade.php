<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Tasty Burger Restaurants</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Tasty Burger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- Bootstrap-Core-CSS -->
    <link href="{{ asset('/css/css_slider.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- css slider -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Barlow+Semi+Condensed:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- //Web-Fonts -->


    {{-- taostr --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {

            toastr.options.timeOut = 10000

            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
</head>

<body>


    <!-- header -->
    <header id="home">
        <!-- top-bar -->
        <div class="top-bar py-2 border-bottom">
            <div class="container">
                <div class="row middle-flex">
                    <div class="col-xl-7 col-md-5 top-social-agile mb-md-0 mb-1 text-lg-left text-center">
                        <div class="row">
                            <div class="col-xl-3 col-6 header-top_w3layouts">
                                <p class="text-da">
                                    <span class="fa fa-map-marker mr-2"></span>Parma Via, Italy
                                </p>
                            </div>
                            <div class="col-xl-3 col-6 header-top_w3layouts">
                                <p class="text-da">
                                    <span class="fa fa-phone mr-2"></span>+1 000263676
                                </p>
                            </div>
                            <div class="col-xl-6"></div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 top-social-agile text-md-right text-center pr-sm-0 mt-md-0 mt-2">
                        <div class="row middle-flex">
                            <div class="col-lg-5 col-4 top-w3layouts p-md-0 text-right">
                                <div style="display: flex">
                                    @auth
                                        @if (auth()->user()->hasRole('Driver'))
                                            <a href="{{ route('driver.orders.index') }}"
                                                class="btn login-button-2 text-uppercase text-wh">
                                                <span class="fa fa-sign-in mr-2"></span>Orders</a>
                                        @endif
                                    @endauth
                                    <!-- login -->
                                    <a href="{{ route('user.login') }}"
                                        class="btn login-button-2 text-uppercase text-wh">
                                        <span class="fa fa-sign-in mr-2"></span>Login</a>
                                    <!-- //login -->

                                    {{-- cart --}}
                                    <a href="{{ route('user.carts.index', [auth()->id()]) }}">
                                        <div style="margin-left:10px;   cursor: pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //top-bar -->

    <!-- header 2 -->
    <!-- navigation -->
    <div class="main-top py-1">
        <div class="container">
            <div class="nav-content">
                <!-- logo -->
                <h1>
                    <a id="logo" class="logo flex" href="/">
                        <img src="/images/logo.png" alt="" class="img-fluid"><span>Tasty</span> Burger
                    </a>
                </h1>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_web-dealingsls">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li>
                                <!-- First Tier Drop Down -->
                                <label for="drop-3" class="toggle toogle-2">Pages <span class="fa fa-angle-down"
                                        aria-hidden="true"></span>
                                </label>
                                <a href="#pages">Pages <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-3" />
                                <ul>
                                    <li><a class="drop-text" href="#services">Services</a></li>
                                    <li><a class="drop-text" href="{{ route('about') }}">Our Chefs</a></li>

                                    <li><a class="drop-text" href="{{ route('user.register') }}">Register</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('menus.index') }}">Menu</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a style="color:red" href="{{ route('user.orders.index') }}">My
                                    Orders</a></li>
                            <li><a href="{{ route('user.orders.index',['status'=>'delivered']) }}">Orders History</a></li>                     

                            <!-- login -->
                            <a href="https://w3layouts.com/" target="_blank" class="dwn-button ml-lg-5">
                                <span class="fa fa-cloud-download mt-lg-0 mt-4" aria-hidden="true"></span>
                            </a>
                            <!-- //login -->
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </div>
    <!-- //navigation -->
    <!-- //header 2 -->

    @yield('content')

    <!-- //gallery popup 6 -->
    <!-- //menu -->

    <!-- footer -->
    <footer class="py-5">
        <div class="container py-xl-4">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_1its footer-text">
                    <!-- logo -->
                    <h2>
                        <a class="logo text-wh" href="index.html">
                            <img src="images/logo.png" alt="" class="img-fluid"><span>Tasty</span> Burger
                        </a>
                    </h2>
                    <!-- //logo -->
                    <p class="mt-lg-4 mt-3 mb-lg-5 mb-4">Sed ut perspiciatis unde omnis iste natus errorhjhsit lupt
                        atem
                        accursit lupt atem accu
                        dfdsa
                        ntium doloremque laudan tium accu santium dolore.</p>
                    <!-- social icons -->
                    <ul class="top-right-info">
                        <li>
                            <p>Follow As:</p>
                        </li>
                        <li class="facebook-w3">
                            <a href="#facebbok">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="twitter-w3">
                            <a href="#twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li class="google-w3">
                            <a href="#google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li class="dribble-w3">
                            <a href="#dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- //social icons -->
                </div>
                <div class="col-lg-4 footer-grid_section_1its my-lg-0 my-sm-4 my-4">
                    <div class="footer-title">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="footer-text mt-4">
                        <p>Address : 1234 lock, Charlotte, North Carolina, United States</p>
                        <p class="my-2">Phone : +12 534894364</p>
                        <p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    <div class="footer-title mt-4 pt-md-2">
                        <h3>Payment Method</h3>
                    </div>
                    <ul class="list-unstyled payment-links mt-4">
                        <li>
                            <a href="login.html"><img src="images/pay2.png" alt=""></a>
                        </li>
                        <li>
                            <a href="login.html"><img src="images/pay5.png" alt=""></a>
                        </li>
                        <li>
                            <a href="login.html"><img src="images/pay1.png" alt=""></a>
                        </li>
                        <li>
                            <a href="login.html"><img src="images/pay4.png" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 footer-grid_section_1its">
                    <div class="footer-title">
                        <h3>Request Info</h3>
                    </div>
                    <div class="info-form-right mt-4 p-0">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2 pr-lg-1">
                                    <input type="text" class="form-control" name="Name" placeholder="Name"
                                        required="">
                                </div>
                                <div class="col-lg-6 form-group mb-2 pl-lg-1">
                                    <input type="text" class="form-control" name="Phone" placeholder="Phone"
                                        required="">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="email" class="form-control" name="Email" placeholder="Email"
                                    required="">
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="Comment" class="form-control" placeholder="Comment" required=""></textarea>
                            </div>
                            <button type="submit" class="btn submit-contact ml-auto">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p>© 2019 Tasty Burger. All rights reserved.
        </p>
    </div>
    <!-- //copyright -->
    <!-- move top icon -->
    <a href="#home" class="move-top text-center">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </a>
    <!-- //move top icon -->





</body>

</html>
