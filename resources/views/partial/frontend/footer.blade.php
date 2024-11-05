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
                         {{-- <a href="index.html"><img src="{{ asset('frontend/images/lite-logo.png') }}" alt=""></a> --}}
                         <a href="index.html">
                             <img src="{{ $siteSettings['site_logo_large_light']->value ? asset('assets/site_settings/' . $siteSettings['site_logo_large_light']->value) : asset('frontend/images/lite-logo.png') }}"
                                 alt="{{ $siteSettings['site_name']->value }}">
                         </a>
                     </div>
                     <div class="textwidget pr-60 md-pr-15">
                         <p class="white-color">
                             {!! $siteSettings['site_description']->value !!}
                         </p>
                     </div>
                     <ul class="footer_social">
                         @if ($siteSettings['site_facebook']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_facebook']->value }}" target="_blank">
                                     <span><i class="fa fa-facebook-f"></i></span>
                                 </a>
                             </li>
                         @endif

                         @if ($siteSettings['site_youtube']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_youtube']->value }}" target="_blank">
                                     <span><i class="fa fa-youtube"></i></span>
                                 </a>
                             </li>
                         @endif

                         @if ($siteSettings['site_twitter']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_twitter']->value }}" target="_blank">
                                     <span><i class="fa fa-twitter"></i></span>
                                 </a>
                             </li>
                         @endif

                         @if ($siteSettings['site_instagram']->value)
                             <li>
                                 <a href="{{ $siteSettings['site_instagram']->value }}" target="_blank">
                                     <span><i class="fa fa-instagram"></i></span>
                                 </a>
                             </li>
                         @endif

                     </ul>
                 </div>
                 <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                     <h3 class="widget-title">{{ __('panel.f_address') }}</h3>
                     <ul class="address-widget">
                         <li>
                             <i class="flaticon-location"></i>
                             <div class="desc">{{ $siteSettings['site_address']->value ?? '' }}</div>
                         </li>
                         <li>
                             <i class="flaticon-call"></i>
                             <div class="desc">
                                 <a
                                     href="tel:(+04){{ $siteSettings['site_mobile']->value ?? '' }}">(+04){{ $siteSettings['site_mobile']->value ?? '' }}</a>
                             </div>
                         </li>
                         <li>
                             <i class="flaticon-email"></i>
                             <div class="desc">
                                 <?php
                                 $parsedUrl = parse_url($siteSettings['site_email1']->value, PHP_URL_HOST);
                                 
                                 // Remove 'www.' if it exists
                                 $domain = preg_replace('/^www\./', '', $parsedUrl);
                                 
                                 ?>
                                 <a
                                     href="mailto:{{ $siteSettings['site_email1']->value ?? '' }}">contact&#64;{{ $domain ?? '' }}</a>
                             </div>
                         </li>
                     </ul>
                 </div>
                 <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                     <h3 class="widget-title">{{ __('panel.links_that_interest_you') }}</h3>
                     <ul class="site-map">

                         @foreach ($web_menus->where('section', 5) as $support_menu)
                             <li><a href="{{ $support_menu->link }}">{{ $support_menu->title }}</a></li>
                         @endforeach

                     </ul>
                 </div>
                 <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                     <h3 class="widget-title">{{ __('panel.recent_posts') }}</h3>
                     @foreach ($posts->take(2) as $post)
                         <div class="recent-post mb-20 {{ $loop->last ? 'md-pb-0' : '' }}">
                             <div class="post-img">
                                 @php
                                     if ($post->photos->first() != null && $post->photos->first()->file_name != null) {
                                         $post_img = asset('assets/posts/' . $post->photos->first()->file_name);

                                         if (
                                             !file_exists(
                                                 public_path('assets/posts/' . $post->photos->first()->file_name),
                                             )
                                         ) {
                                             $post_img = asset('image/not_found/item_image_not_found.webp');
                                         }
                                     } else {
                                         $post_img = asset('image/not_found/item_image_not_found.webp');
                                     }
                                 @endphp
                                 <img src="{{ $post_img }}" alt="" style="height: 75px;width:65px;">
                             </div>
                             <div class="post-item">
                                 <div class="post-desc">
                                     <a href="#">{{ $post->title }}</a>
                                 </div>
                                 <span class="post-date">
                                     <i class="fa fa-calendar"></i>
                                     {{ $post->created_at->isoFormat('YYYY/MM/DD') }}
                                 </span>
                             </div>
                         </div>
                     @endforeach


                     {{-- <div class="recent-post mb-20 md-pb-0">
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
                     </div> --}}
                 </div>
             </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="container">
             <div class="row y-middle">
                 <div class="col-lg-6 md-mb-20">
                     <div class="copyright">
                         <p> {{ $siteSettings['site_name']->value }} , &copy; {{ date('Y') }}
                             {{ __('panel.all_rights_reserved') }}.
                         </p>
                     </div>
                 </div>
                 <div class="col-lg-6 text-right md-text-left">
                     <ul class="copy-right-menu">
                         <li><a href="#">Event</a></li>
                         <li><a href="#">Blog</a></li>
                         <li><a href="#">Contact</a></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- Footer End -->
