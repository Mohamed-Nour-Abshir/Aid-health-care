<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Aid Health care</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo/2.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        {{-- <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                        
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4 hotline">
                        <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+1) 0000-000-000 </p>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2">
                                <nav>
                            <ul> 

                                
                            </ul>
                                </nav>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{url('/')}}"><img src="assets/imgs/logo/new-logo.png" alt="logo"></a>
                        {{-- <a href="{{url('/')}}">Aid Health Care</a> --}}
                    </div>
                    <div class="header-right">
                        <!-- <div class="search-style-1">
                            <form action="#">                                
                                <input type="text" placeholder="Search for items...">
                            </form>
                        </div> -->
                        <div class="header-nav d-none d-lg-flex">
                        
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="{{url('/')}}">Home </a></li>
                                        <li><a href="{{url('/about')}}">About</a></li>
                                        <li><a href="{{url('/shop')}}">Shop</a></li>
                                       
                                        <li><a href="{{url('/cart')}}">Cart </a></li>                                    
                                        <li><a href="{{url('/contact-us')}}">Contact</a></li>
                                        @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->usertype==='ADM')
                                            <li><a href="#" class="active">My Account<i class="fi-rs-angle-down"></i></a>
                                                <ul class="sub-menu ms-auto">
                                                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                                                        @csrf
                                                    </form>                                            
                                                </ul>
                                            </li>
                                            @else
                                                @livewire('user.user-navbar-component')
                                            @endif
                                            @else
                                                <li><i class="fi-rs-key"></i><a href="{{route('login')}}" class="active" >Log In </a>  / <a href="{{route('register')}}" class="active">Sign Up</a></li>
                                            @endif 
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('wishlist-count-component')
                                @livewire('cart-count-component')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        

        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="assets/imgs/logo/2.png" alt="logo"></a>
                    </div>
                    
                    <!-- <div class=" d-none d-lg-block">
                        
                    </div> -->
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                @livewire('wishlist-count-component')
                            </div>
                            <div class="header-action-icon-2">
                                @livewire('cart-count-component')
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{url('/')}}"><img src="assets/imgs/logo/2.png" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">

                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{url('/')}}">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{url('/shop')}}">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{url('/cart')}}">Cart</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{url('/contact-us')}}">Contact</a></li>
                           
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="{{url('/contact-us')}}"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{route('login')}}">Log In </a>                        
                    </div>
                    <div class="single-mobile-header-info">                        
                        <a href="{{route('register')}}">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    
    {{$slot}}
    
    @livewire('footer-component')
    
    <!-- Vendor JS-->
    <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{asset('assets/js/main.js?v=3.3')}}"></script>
    <script src="{{asset('assets/js/shop.js?v=3.3')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireScripts
</body>

</html>