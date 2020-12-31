<header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('frontend/assets/img/logo.png')}}" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="{{route('website.index')}}">Home</a></li>
                                    <li><a href="#">shop</a></li>
                                    <li><a href="#">about</a></li>
                                    <li class="hot"><a href="#">Latest</a>
                                        <ul class="submenu">
                                            <li><a href="#"> Product list</a></li>
                                            <li><a href="#"> Product Details</a></li>
                                        </ul>
                                    </li>
                                
                                    <li><a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="/login">Login</a></li>
                                            <li><a href="{{url('/website/frontend/shop/shopping-cart')}}">Cart</a></li>
                                            <li><a href="#">Element</a></li>
                                            <li><a href="#">Confirmation</a></li>
                                            <li><a href="#">Product Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right main-menu d-none d-lg-block">
                            <nav>
                            <ul id="navigation">
                                <li><a>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                    </a>
                                </li>
                                @guest
                                  <li><a href="#"><span class="flaticon-user"></span></a>
                                        <ul class="submenu">
                                            <li><a href="/login">Login</a></li>
                                            <li><a href="/register">Register</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="#">{{ Auth::user()->name }}</a>
                                        <ul class="submenu">
                                            <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                                        </ul>
                                    </li>
                                    @endguest
                                    <li><a href="{{route('website.cart')}}"><span class="flaticon-shopping-cart">{{\Illuminate\Support\Facades\Session::has('cart')?\Illuminate\Support\Facades\Session::get('cart')->totalQty:''}}</span></a> </li>
                            </ul>
                           </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>