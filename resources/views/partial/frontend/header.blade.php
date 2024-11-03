    <!--Full width header Start-->
    <div class="full-width-header header-style2">
        <!--Header Start-->
        <header id="rs-header" class="rs-header">
            <!-- Topbar Area Start -->
            <div class="topbar-area">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-md-7">
                            <ul class="topbar-contact">
                                <li>
                                    <i class="flaticon-email"></i>
                                    <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <a href="tel:+088589-8745">(+088) 589-8745</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 text-right">
                            <ul class="topbar-right">
                                <li class="login-register">
                                    <i class="fa fa-sign-in"></i>
                                    <a href="login.html">Login</a>/<a href="register.html">Register</a>
                                </li>
                                <li class="btn-part">
                                    <a class="apply-btn" href="#">Apply Now</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar Area End -->

            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-3">
                            <div class="logo-cat-wrap">
                                <div class="logo-part pr-90">
                                    <a class="dark-logo" href="index.html">
                                        <img src="{{ asset('frontend/images/logo-dark.png') }}" alt="">
                                    </a>
                                    <a class="light-logo" href="index.html">
                                        <img src="{{ asset('frontend/images/logo.png') }}" alt="">
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-9 text-center">
                            <div class="rs-menu-area">
                                <div class="main-menu">
                                    <div class="mobile-menu">
                                        <a class="rs-menu-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </div>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu">
                                            @foreach ($web_menus->where('section', 1) as $menu)
                                                <li
                                                    class=" {{ count($menu->appearedChildren) > 0 ? 'menu-item-has-children has-children' : '' }}">
                                                    <a
                                                        href="{{ count($menu->appearedChildren) > 0 ? 'javascript:void(0)' : $menu->link }}">{{ $menu->title }}</a>
                                                    @if (count($menu->appearedChildren) > 0)
                                                        <ul class="sub-menu">
                                                            @foreach ($menu->appearedChildren as $sub_menu)
                                                                <li
                                                                    class=" {{ count($sub_menu->appearedChildren) > 0 ? 'menu-item-has-children has-children' : '' }}">
                                                                    <a
                                                                        href="{{ $sub_menu->link }}">{{ $sub_menu->title }}</a>
                                                                    @if (count($sub_menu->appearedChildren) > 0)
                                                                        <ul class="sub-menu">
                                                                            @foreach ($sub_menu->appearedChildren as $sub_sub_menu)
                                                                                <li>
                                                                                    <a
                                                                                        href="{{ $sub_sub_menu->link }}">{{ $sub_sub_menu->title }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                                <div class="expand-btn-inner">
                                    <ul>
                                        <li>
                                            <a class="hidden-xs rs-search short-border" data-target=".search-modal"
                                                data-toggle="modal" href="#">
                                                <i class="flaticon-search"></i>
                                            </a>
                                        </li>
                                        <li class="icon-bar cart-inner no-border mini-cart-active">
                                            <a class="cart-icon">
                                                <!-- <span class="cart-count">2</span> -->
                                                <i class="flaticon-bag"></i>
                                            </a>
                                            <div class="woocommerce-mini-cart text-left">
                                                <div class="cart-bottom-part">
                                                    <ul class="cart-icon-product-list">
                                                        <li class="display-flex">
                                                            <div class="icon-cart">
                                                                <a href="#"><i class="fa fa-times"></i></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="cart.html">Law Book</a><br>
                                                                <span class="quantity">1 × $30.00</span>
                                                            </div>
                                                            <div class="product-image">
                                                                <a href="cart.html"><img
                                                                        src="{{ asset('frontend/images/shop/1.jpg') }}"
                                                                        alt="Product Image"></a>
                                                            </div>
                                                        </li>
                                                        <li class="display-flex">
                                                            <div class="icon-cart">
                                                                <a href="#"><i class="fa fa-times"></i></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="cart.html">Spirit Level</a><br>
                                                                <span class="quantity">1 × $30.00</span>
                                                            </div>
                                                            <div class="product-image">
                                                                <a href="cart.html"><img
                                                                        src="{{ asset('frontend/images/shop/2.jpg') }}"
                                                                        alt="Product Image"></a>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                    <div class="total-price text-center">
                                                        <span class="subtotal">Subtotal:</span>
                                                        <span class="current-price">$85.00</span>
                                                    </div>

                                                    <div class="cart-btn text-center">
                                                        <a class="crt-btn btn1" href="cart.html">View Cart</a>
                                                        <a class="crt-btn btn2" href="checkout.html">Check Out</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a id="nav-expander" class="nav-expander style3">
                                        <span class="dot1"></span>
                                        <span class="dot2"></span>
                                        <span class="dot3"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->

            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
                <div class="close-btn">
                    <div id="nav-close">
                        <div class="line">
                            <span class="line1"></span><span class="line2"></span>
                        </div>
                    </div>
                </div>
                <div class="canvas-logo">
                    <a href="index.html"><img src="{{ asset('frontend/images/logo-dark.png') }}" alt="logo"></a>
                </div>
                <div class="offcanvas-text">
                    <p>We denounce with righteous indige nationality and dislike men who are so beguiled and demo by the
                        charms of pleasure of the moment data com so blinded by desire.</p>
                </div>
                <div class="offcanvas-gallery">
                    <div class="gallery-img">
                        <a class="image-popup" href="{{ asset('frontend/images/gallery/1.jpg') }}"><img
                                src="{{ asset('frontend/images/gallery/1.jpg') }}" alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="{{ asset('frontend/images/gallery/2.jpg') }}"><img
                                src="{{ asset('frontend/images/gallery/2.jpg') }}" alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="{{ asset('frontend/images/gallery/3.jpg') }}"><img
                                src="{{ asset('frontend/images/gallery/3.jpg') }}" alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="{{ asset('frontend/images/gallery/4.jpg') }}"><img
                                src="{{ asset('frontend/images/gallery/4.jpg') }}" alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="{{ asset('frontend/images/gallery/5.jpg') }}"><img
                                src="{{ asset('frontend/images/gallery/5.jpg') }}" alt=""></a>
                    </div>
                    <div class="gallery-img">
                        <a class="image-popup" href="{{ asset('frontend/images/gallery/6.jpg') }}"><img
                                src="{{ asset('frontend/images/gallery/6.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="map-img">
                    <img src="{{ asset('frontend/images/map.jpg') }}" alt="">
                </div>
                <div class="canvas-contact">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </nav>
            <!-- Canvas Menu end -->
        </header>
        <!--Header End-->
    </div>
    <!--Full width header End-->
