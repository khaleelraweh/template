<style>
    @media(min-width:1200px) {
        .navbar-brand>img {
            width: 190px !important;
        }
    }
</style>

<!-- header start -->
<header class="header header-style-1 clearfix" data-spy="affix" data-offset-top="197">
    <div class="navbar yamm navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1"
                    class="navbar-toggle collapsed"><span class="icon-bar"></span><span class="icon-bar"></span><span
                        class="icon-bar"></span></button><a href="{{ route('frontend.index') }}"
                    class="navbar-brand"><img class="img-responsive"
                        src="{{ asset('frontend/assets/images/red-logo.png') }}" alt="LOGO"></a>
            </div>
            <div id="navbar-collapse-1" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!-- Classic list -->
                    <!--   <li class="active"><a href="#">HOME </a></li> -->

                    @foreach ($web_menus->where('section', 1) as $menu)
                        @if (count($menu->appearedChildren) == false)
                            {{-- <li class="dropdown">
                                <a href="{{ $menu->link }}" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-expanded="false">{{ $menu->title }}</a>
                            </li> --}}

                            <li>
                                <a href="{{ $menu->link }}" class="dropdown-toggle"
                                    aria-expanded="false">{{ $menu->title }}</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="{{ $menu->link }}" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-expanded="false">
                                    {{ $menu->title }}
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul role="menu" class="dropdown-menu">
                                    @if ($menu->appearedChildren !== null && count($menu->appearedChildren) > 0)
                                        @foreach ($menu->appearedChildren as $sub_menu)
                                            <li class="sub-menu-one">
                                                <a href="{{ $sub_menu->link }}">
                                                    {{ $sub_menu->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>

                            <li class="dropdown-item dropright">

                                <div class="dropdown-menu ps-3 top-0 pe-0 py-0 shadow-none bg-transparent">
                                    <div
                                        class="dropdown-menu-md {{ !request()->routeIs('frontend.index') ? 'bg-primary' : 'bg-white' }} rounded dropdown-menu-inner">
                                        @if ($menu->appearedChildren !== null && count($menu->appearedChildren) > 0)
                                            @foreach ($menu->appearedChildren as $sub_menu)
                                                <a class="dropdown-item" href="{{ $sub_menu->link }}">
                                                    {{ $sub_menu->title }}
                                                </a>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>

                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
            <!-- Cart List Start -->
            <div class="cart-list">
                <ul>
                    <li>
                        <a href="#" class="posi-search">
                            <div class="nav-search"><span id="search"><i class="fa fa-search"></i></span></div>
                            <!-- Search end-->
                            <div class="search-block" style="display: none;">
                                <input class="form-control" type="text" placeholder="Search"><span
                                    class="search-close" id="2">×</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Cart List End -->
        </div>
    </div>
</header>
<!-- header end -->
