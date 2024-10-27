<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="المعهد التقني العالى للعلوم الطبية">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'المعهد التقني العالي للعلوم الطلبية') }}</title>

    <!-- Google fonts-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">


    <!-- Bootstrap -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--=== Add By Designer ===-->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/fonts/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/yamm.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/retina.css') }}" rel="stylesheet">

    <!-- themify-icons start -->
    <link href="{{ asset('frontend/assets/css/themify-icons.css') }}" rel="stylesheet">
    <!-- === Font Awesome Link ===-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}">
    <!--=== Google Fonts Links Start ===-->
    <!-- Raleway -->
    <!-- font-family: 'Raleway', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <!-- Open Sans -->
    <!-- font-family: 'Open Sans', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <!-- Montserrat -->
    <!-- font-family: 'Montserrat', sans-serif; -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <!-- Crimson+Text -->
    <!-- font-family: 'Crimson Text', serif; -->
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- Lato -->
    <!-- font-family: 'Lato', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- Poppins -->
    <!-- font-family: 'Poppins', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800"
        rel="stylesheet">
    <!-- Cabin -->
    <!-- font-family: 'Cabin', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Hind -->
    <!-- font-family: 'Hind', sans-serif; -->
    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- Playfair Display font -->
    <!-- font-family: 'Playfair Display', serif; -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- fevikon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/apple-icon-180x180.png') }}">

    <!-- jQuery for google mapapis -->
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3nzFH5N1sOvuoNTdjrLCXk6nEdRFhmdY&amp;sensor=false"></script>
    <!--=== Windows Phone JS Code Start ===-->
    <script type="text/javascript">
        document.documentElement.className = "js";
        var supportsCssVars = function() {
            var e, t = document.createElement("style");
            return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS &&
                    window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode
                .removeChild(
                    t), e
        };
        supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
    </script>
    <script type="text/javascript">
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style')
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            )
            document.querySelector('head').appendChild(msViewportStyle)
        }
    </script>

    <!--=== Windows Phone JS Code End ===-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    @livewireStyles

    @yield('style')

</head>

<body class="theme-frist">

    {{-- <body class="theme-forth"> for the pages.blade.php --}}
    <div id="app">
        <!-- navbar-->
        @include('partial.frontend.header')

        @yield('content')

        <!-- Footer -->
        @include('partial.frontend.footer')
    </div>

    <!--  Modal -->
    @include('partial.frontend.modal')



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- STYLE SWITCHER ============================================= -->
    <div class="b-settings-panel">
        <h5>Color Scheme</h5>
        <div class="settings-section color-list">
            <div data-src="{{ asset('frontend/assets/color-scheme/default.css') }}" style="background: #fb383b"></div>
            <div data-src="{{ asset('frontend/assets/color-scheme/light-pink.css') }}" style="background: #FF68B6">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/moderate-green.css') }}" style="background: #8ec249">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/vivid-blue.css') }}" style="background: #228dff">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/orange.css') }}" style="background: #fa6900"></div>
            <div data-src="{{ asset('frontend/assets/color-scheme/brown.css') }}" style="background: #a68c69"></div>
            <div data-src="{{ asset('frontend/assets/color-scheme/yellow.css') }}" style="background: #fabe28"></div>
            <div data-src="{{ asset('frontend/assets/color-scheme/violet.css') }}" style="background: #ba01ff"></div>
            <div data-src="{{ asset('frontend/assets/color-scheme/strong-cyan.css') }}" style="background: #00b9bd">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/soft-cyan.css') }}" style="background: #4bd5ea">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/lite-brown.css') }}" style="background: #f3a76d">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/lime-green.css') }}" style="background: #3bdbad">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/light-voilet.css') }}" style="background: #aaa5ff">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/gray-green.css') }}" style="background: #697060">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/gray-cyan.css') }}" style="background: #aeced2">
            </div>
            <div data-src="{{ asset('frontend/assets/color-scheme/de-green.css') }}" style="background: #b6cd71"></div>
            <div data-src="{{ asset('frontend/assets/color-scheme/cream.css') }}" style="background: #e0d6b2"></div>
        </div>
        <div class="ltr-rtl-support clearfix">
            <ul>
                <li>
                    <a href="https://zindex.co.in/html/maxer/index.html">LTR</a>
                </li>
                <li>
                    <a href="index.html">RTL</a>
                </li>
            </ul>
        </div>
        <div class="btn-settings"></div>
    </div>
    <!-- STYLE SWITCHER ============================================= -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('frontend/assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!--progressbar -->
    <script src="{{ asset('frontend/assets/js/progressbar.js') }}"></script>
    <!--isotope -->
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.js') }}"></script>
    <!--custom -->
    <script src="{{ asset('frontend/assets/js/skrollr.min.js') }}"></script>
    <!-- owl slider js -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- owl anime js -->
    <script src="{{ asset('frontend/assets/js/anime.min.js') }}"></script>
    <!-- browser selector js -->
    <script src="{{ asset('frontend/assets/js/css_browser_selector.js') }}"></script>
    <!-- Parallax Start -->
    <script src="{{ asset('frontend/assets/js/jquery.paroller.js') }}"></script>
    <!-- nice scroll js-->
    <script src="{{ asset('frontend/assets/js/jquery.nicescroll.js') }}"></script>
    <!-- Rellex -->
    <script src="{{ asset('frontend/assets/js/rellax.js') }}"></script>
    <!-- imagesloaded -->
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- ofi browser -->
    <script src="{{ asset('frontend/assets/js/ofi.browser.js') }}"></script>
    <!-- Send Mail Js -->
    <script src="{{ asset('frontend/assets/js/sendmail.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    <script>
        $('.dropify').dropify();
    </script>


    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    @yield('script')

</body>

</html>
