 <!-- Footer Start -->
 <style>
     .rs-menu.footer {
         float: none;
     }

     .menu-item-has-children.footer {
         padding: 0 !important;
     }

     .item-link.footer {
         padding: 0 !important;
         display: inline-block;
         text-decoration: none !important;
         outline: none !important;
     }

     .sub-menu.footer {
         top: -200%;
     }

     .rs-footer.home9-style.main-home .footer-bottom .copy-right-menu li.lang-item:before {
         display: none !important;
     }
 </style>
 <footer id="rs-footer" class="rs-footer home9-style main-home">
     <div class="footer-top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                     <div class="footer-logo mb-30">
                         <a href="index.html"><img src="{{ asset('frontend/images/lite-logo.png') }}" alt=""></a>
                     </div>
                     <div class="textwidget pr-60 md-pr-15">
                         <p class="white-color">We denounce with righteous indi gnation and dislike men who are so
                             beguiled and demoralized by the charms of pleasure of your moment, so blinded by desire
                             those who fail weakness.</p>
                     </div>
                     <ul class="footer_social">
                         @if ($siteSettings['site_facebook']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_facebook']->value }}" target="_blank">
                                     <span><i class="fab fa-facebook-f"></i></span>
                                 </a>
                             </li>
                         @endif

                         @if ($siteSettings['site_youtube']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_youtube']->value }}" target="_blank">
                                     <span><i class="fab fa-youtube"></i></span>
                                 </a>
                             </li>
                         @endif

                         @if ($siteSettings['site_twitter']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_twitter']->value }}" target="_blank">
                                     <span><i class="fab fa-twitter"></i></span>
                                 </a>
                             </li>
                         @endif

                         @if ($siteSettings['site_instagram']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_instagram']->value }}" target="_blank">
                                     <span><i class="fab fa-instagram"></i></span>
                                 </a>
                             </li>
                         @endif

                     </ul>
                 </div>
                 <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                     <h3 class="widget-title">Address</h3>
                     <ul class="address-widget">
                         <li>
                             <i class="flaticon-location"></i>
                             <div class="desc">374 William S Canning Blvd, River MA 2721, USA</div>
                         </li>
                         <li>
                             <i class="flaticon-call"></i>
                             <div class="desc">
                                 <a href="tel:(+880)155-69569">(+880)155-69569</a>
                             </div>
                         </li>
                         <li>
                             <i class="flaticon-email"></i>
                             <div class="desc">
                                 <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                             </div>
                         </li>
                     </ul>
                 </div>
                 <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                     <h3 class="widget-title">Courses</h3>
                     <ul class="site-map">
                         <li><a href="#">Courses</a></li>
                         <li><a href="#">Course Two</a></li>
                         <li><a href="#">Single Course</a></li>
                         <li><a href="#">Profile</a></li>
                         <li><a href="#">Login/Register</a></li>
                     </ul>
                 </div>
                 <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                     <h3 class="widget-title">Recent Posts</h3>
                     <div class="recent-post mb-20">
                         <div class="post-img">
                             <img src="{{ asset('frontend/images/footer/1.jpg') }}" alt="">
                         </div>
                         <div class="post-item">
                             <div class="post-desc">
                                 <a href="#">University while the lovely valley team work</a>
                             </div>
                             <span class="post-date">
                                 <i class="fa fa-calendar"></i>
                                 September 20, 2020
                             </span>
                         </div>
                     </div>
                     <div class="recent-post mb-20 md-pb-0">
                         <div class="post-img">
                             <img src="{{ asset('frontend/images/footer/2.jpg') }}" alt="">
                         </div>
                         <div class="post-item">
                             <div class="post-desc">
                                 <a href="#">High school program starting soon 2021</a>
                             </div>
                             <span class="post-date">
                                 <i class="fa fa-calendar-check-o"></i>
                                 September 14, 2020
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="container">
             <div class="row y-middle">
                 <div class="col-lg-6 md-mb-20">
                     <div class="copyright">
                         <p>&copy; 2020 All Rights Reserved. Developed By <a href="http://rstheme.com/">RSTheme</a>
                         </p>
                     </div>
                 </div>
                 <div class="col-lg-6 text-right md-text-left">
                     <ul class="copy-right-menu">
                         <li><a href="#">Event</a></li>
                         <li><a href="#">Blog</a></li>
                         <li><a href="#">Contact</a></li>

                         <li>
                             <div class="rs-menu-area">
                                 <div class="main-menu">
                                     <nav class="rs-menu footer">
                                         <ul class="nav-menu">
                                             <li class="menu-item-has-children footer">

                                                 <i class="flag-icon flag-icon-{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }} mt-1"
                                                     title="{{ app()->getLocale() == 'ar' ? 'ye' : 'us' }}"></i>

                                                 <a href="#" class="item-link footer">
                                                     {{ __('transf.lang_' . config('locales.languages')[app()->getLocale()]['lang']) }}
                                                 </a>
                                                 <ul class="sub-menu footer">
                                                     @foreach (config('locales.languages') as $key => $val)
                                                         @if ($key != app()->getLocale())
                                                             <li class="lang-item">

                                                                 <a href="{{ route('change.language', $key) }}">
                                                                     <span>
                                                                         <i class="flag-icon flag-icon-{{ $key == 'ar' ? 'ye' : 'us' }}"
                                                                             title="{{ $key == 'ar' ? 'ye' : 'us' }}"
                                                                             id="{{ $key == 'ar' ? 'ye' : 'us' }}"></i>
                                                                     </span>
                                                                     {{ __('transf.lang_' . $val['lang']) }}
                                                                 </a>
                                                             </li>
                                                         @endif
                                                     @endforeach
                                                 </ul>
                                             </li>
                                         </ul> <!-- //.nav-menu -->
                                     </nav>
                                 </div>
                             </div>

                         </li>

                         {{-- <li>
                             <div class="dropdown me-2">
                                 <button type="button"
                                     class=" form-select form-select-sm font-size-sm-alone shadow min-width-140  p-2 mb-4 mb-md-0"
                                     data-bs-toggle="dropdown">
                                     <img class=""
                                         src="{{ asset('frontend/assets/img/flags/' . app()->getLocale() . '.webp') }}"
                                         alt="{{ __('transf.lang_' . config('locales.languages')[app()->getLocale()]['lang']) }}"
                                         height="16"
                                         title="{{ __('transf.lang_' . config('locales.languages')[app()->getLocale()]['lang']) }}">
                                     <span>{{ __('transf.lang_' . config('locales.languages')[app()->getLocale()]['lang']) }}</span>
                                 </button>

                                 <ul class="dropdown-menu">
                                     @foreach (config('locales.languages') as $key => $val)
                                         @if ($key != app()->getLocale())
                                             <li>
                                                 <a class="dropdown-item" href="{{ route('change.language', $key) }}">
                                                     <img src="{{ asset('frontend/assets/img/flags/' . $key . '.webp') }}"
                                                         alt="{{ __('transf.lang_' . config('locales.languages')[app()->getLocale()]['lang']) }}"
                                                         class="me-1 " height="12">
                                                     <span class="align-middle">
                                                         {{ __('transf.lang_' . $val['lang']) }}
                                                     </span>
                                                 </a>
                                             </li>
                                         @endif
                                     @endforeach

                                 </ul>
                             </div>
                         </li> --}}
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- Footer End -->
