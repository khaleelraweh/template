@extends('layouts.app')

@section('content')
    <!-- Slider Section Start -->
    <div class="rs-slider main-home">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false"
            data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false"
            data-mobile-device-dots="false" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false"
            data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1"
            data-md-device-nav="true" data-md-device-dots="false">

            @forelse ($main_sliders->where('section' ,1) as $main_slider)
                @php
                    if ($main_slider->firstMedia != null && $main_slider->firstMedia->file_name != null) {
                        $main_slider_img = asset('assets/main_sliders/' . $main_slider->firstMedia->file_name);

                        if (!file_exists(public_path('assets/main_sliders/' . $main_slider->firstMedia->file_name))) {
                            // $main_slider_img = asset('image/not_found/item_image_not_found.webp');
                            $main_slider_img = asset('frontend/images/slider/main-home/1.jpg');
                        }
                    } else {
                        // $main_slider_img = asset('image/not_found/item_image_not_found.webp');
                        $main_slider_img = asset('frontend/images/slider/main-home/1.jpg');
                    }
                @endphp
                <div class="slider-content slide1" style="background-image: url({{ $main_slider_img }})">
                    {{-- <div class="container" style="height: 150vh;"> --}}
                    <div class="container">
                        @if ($main_slider->show_info)
                            <div class="content-part">
                                <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms"
                                    data-wow-duration="2000ms">
                                    {{ $main_slider->subtitle }}
                                </div>
                                <h1 class="sl-title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                                    {{ $main_slider->title }}
                                </h1>
                                @if ($main_slider->show_btn_title)
                                    <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                                        <a class="readon orange-btn main-home"
                                            href="{{ url($main_slider->btn_title) }}">{{ $main_slider->btn_title }}
                                        </a>
                                    </div>
                                @endif

                            </div>
                        @endif
                    </div>

                </div>
            @empty
            @endforelse
        </div>

        <!-- Features Section start -->
        <div id="rs-features" class="rs-features main-home">
            <div class="container">
                <div class="row">

                    @foreach ($main_sliders->where('section', 2)->take(3) as $adv_slider)
                        <div class="col-lg-4 col-md-12 md-mb-30 ">
                            <div class="features-wrap ">

                                <div class="icon-part">

                                    @php
                                        if (
                                            $adv_slider->firstMedia != null &&
                                            $adv_slider->firstMedia->file_name != null
                                        ) {
                                            $advertisor_slider_img = asset(
                                                'assets/advertisor_sliders/' . $adv_slider->firstMedia->file_name,
                                            );

                                            if (
                                                !file_exists(
                                                    public_path(
                                                        'assets/advertisor_sliders/' .
                                                            $adv_slider->firstMedia->file_name,
                                                    ),
                                                )
                                            ) {
                                                // $advertisor_slider_img = asset('image/not_found/item_image_not_found.webp');
                                                $advertisor_slider_img = asset('frontend/images/features/icon/3.png');
                                            }
                                        } else {
                                            // $advertisor_slider_img = asset('image/not_found/item_image_not_found.webp');
                                            $advertisor_slider_img = asset('frontend/images/features/icon/3.png');
                                        }
                                    @endphp

                                    {{-- <i class="{{ $adv_slider->icon }}"></i> --}}
                                    <img src="{{ $advertisor_slider_img }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h4 class="title">
                                        <span class="watermark">{{ $adv_slider->title }}</span>
                                    </h4>
                                    <p class="dese">
                                        {{ $adv_slider->subtitle }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Features Section End -->
    </div>
    <!-- Slider Section End -->

    <!-- news and events Section Start -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-7 pt-94 pb-70 md-pt-64 md-pb-70">
                <div id="rs-blog" class="rs-blog rs-news-events main-home ">
                    <div class="container">
                        <div class="sec-title mb-40 md-mb-20 text-left">
                            <h2 class="title mb-0 header-news">{{ __('panel.university_news') }}</h2>
                        </div>

                        <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30"
                            data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                            data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                            data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                            data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="false"
                            data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                            data-md-device="2" data-md-device-nav="false" data-md-device-dots="false">
                            @foreach ($news as $news)
                                <div class="blog-item">
                                    <div class="image-part">
                                        @php
                                            if (
                                                $news->photos->first() != null &&
                                                $news->photos->first()->file_name != null
                                            ) {
                                                $news_img = asset('assets/news/' . $news->photos->first()->file_name);

                                                if (
                                                    !file_exists(
                                                        public_path('assets/news/' . $news->photos->first()->file_name),
                                                    )
                                                ) {
                                                    $news_img = asset('image/not_found/item_image_not_found.webp');
                                                }
                                            } else {
                                                $news_img = asset('image/not_found/item_image_not_found.webp');
                                            }
                                        @endphp
                                        <img src="{{ $news_img }}" alt="">
                                    </div>
                                    <div class="blog-content">

                                        <ul class="blog-meta">
                                            {{-- <li><i class="fa fa-user-o"></i> {{ $news->created_by }}</li> --}}
                                            <li>
                                                <?php
                                                $date = $news->created_at;
                                                $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                                ?>
                                                <i class="fa fa-calendar"></i>
                                                {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}
                                                <span>{{ __('panel.corresponding_to') }} </span>
                                                {{ $news->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}

                                            </li>

                                        </ul>

                                        <h3 class="title">
                                            <a href="{{ route('frontend.news_single', $news->slug) }}">
                                                {!! $news->title !!}
                                            </a>
                                        </h3>

                                        <div class="desc">
                                            {!! $news->content !!}
                                        </div>
                                        <div class="btn-btm">
                                            <div class="cat-list">
                                                {{-- <ul class="post-categories">
                                                    <li><a href="#">{{ $news->created_by }}</a></li>
                                                </ul> --}}
                                            </div>
                                            <div class="rs-view-btn">
                                                <a
                                                    href="{{ route('frontend.news_single', $news->slug) }}">{{ __('panel.read_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5  pt-94 pb-70 md-pt-64 md-pb-70">
                <div id="rs-blog" class="rs-blog style1 ">
                    <div class="container">
                        <div class="sec-title mb-40 md-mb-20 text-left">
                            <h2 class="title mb-0 header-events main-color">{{ __('panel.university_activities') }}</h2>
                        </div>
                        <div class="row bg2 event-row">
                            <div class="col-lg-12 col-md-12">
                                @foreach ($events as $index => $event)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="events-short {{ $loop->last ? '' : 'mb-15' }}  wow fadeInUp"
                                                data-wow-delay="{{ ($index + 1) * 100 }}ms" data-wow-duration="2000ms">
                                                <div class="date-part">
                                                    <span
                                                        class="month">{{ $event->created_at->translatedFormat('F Y') }}</span>
                                                    <div class="date">{{ $event->created_at->format('d') }}</div>
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title mb-0">
                                                        <a href="{{ route('frontend.event_single', $event->slug) }}">
                                                            {{ $event->title }}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news and events Section End -->



    <!-- College and Institutes Start  -->
    <div class="rs-degree rs-college-institute style1 modify gray-bg pt-100 pb-100 md-pt-70 md-pb-70 bg2">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-10 col-md-12 mb-30">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
                        data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                        data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($web_menus->where('section', 2) as $college_menu)
                            <div class="blog-item">
                                <div class="degree-wrap">
                                    @php
                                        if (
                                            $college_menu->photos->first() != null &&
                                            $college_menu->photos->first()->file_name != null
                                        ) {
                                            $college_menu_img = asset(
                                                'assets/college_menus/' . $college_menu->photos->first()->file_name,
                                            );

                                            if (
                                                !file_exists(
                                                    public_path(
                                                        'assets/college_menus/' .
                                                            $college_menu->photos->first()->file_name,
                                                    ),
                                                )
                                            ) {
                                                $college_menu_img = asset('frontend/images/degrees/1.jpg');
                                            }
                                        } else {
                                            $college_menu_img = asset('frontend/images/degrees/1.jpg');
                                        }
                                    @endphp

                                    <img src="{{ $college_menu_img }}" alt="">
                                    <div class="title-part">
                                        <h4 class="title">{{ $college_menu->title }}</h4>
                                    </div>
                                    <div class="content-part">
                                        <h4 class="title"><a href="#">{{ $college_menu->title }}</a></h4>
                                        <p class="desc">
                                            {!! $college_menu->description !!}
                                        </p>
                                        <div class="btn-part">
                                            <a href="#">{{ __('panel.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-2 col-md-12 mb-30">
                    <div class="sec-title wow fadeInUp text-center " data-wow-delay="300ms" data-wow-duration="2000ms">
                        {{-- <h3 class="title mb-0">{{ __('panel.introductory_tour') }}</h3> --}}
                        <h3 class="title mb-0 header-colleges">{{ __('panel.colleges_and_institutes') }}</h3>
                        {{-- <div class="sub-title primary">{{ __('panel.colleges_and_institutes') }}</div> --}}
                        <div class=" primary header-college-subtitle">{{ __('panel.introductory_tour') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- College and Institutes End -->

    <!-- start statistics -->
    <div class=" main-home event-bg rs-statistics pt-100 pb-100 md-pt-70 md-pb-70 bg12">
        {{-- <div class=" main-home event-bg rs-statistics pt-100 pb-100 md-pt-70 md-pb-70 bg2"> --}}
        <div class="rs-counter style2-about">
            <div class="container">
                <div class="sec-title mb-40 md-mb-20 text-left">
                    <h2 class="title mb-0 header-statistics">{{ __('panel.statistics_and_numbers') }}</h2>
                </div>
                <div class="row couter-area">
                    @foreach ($statistics as $statistic)
                        <div
                            class="col-lg-3 col-md-6 {{ $loop->last ? '' : 'md-mb-30' }}  {{ !$loop->last && count($statistics) > 4 ? 'lg-mb-70' : ' ' }} ">
                            <div class="counter-item text-center">
                                <img class="image" src="{{ asset('frontend/images/waleed/5.png') }}" alt="">
                                <h2 class="rs-count">{{ $statistic->statistic_number }}</h2>
                                <h4 class="title mb-0 ">{{ $statistic->title }}</h4>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- end statistics -->

    <!-- Videos Section Start -->
    <div id="rs-blog" class=" rs-faq-part rs-college-videos style1 main-home pb-80 pt-80 md-pt-60 md-pb-60">
        <div class="container">
            <div class="sec-title mb-60 md-mb-30 text-left">
                <h2 class="title mb-0 header_playlist">{{ __('panel.newest_video') }}</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4"
                data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($playlists as $playlist)
                    <div class="blog-item">
                        @php
                            if ($playlist->photos->first() != null && $playlist->photos->first()->file_name != null) {
                                $playlist_img = asset('assets/playlists/' . $playlist->photos->first()->file_name);

                                if (
                                    !file_exists(
                                        public_path('assets/playlists/' . $playlist->photos->first()->file_name),
                                    )
                                ) {
                                    $playlist_img = asset('frontend/images/faq/1.jpg');
                                }
                            } else {
                                $playlist_img = asset('frontend/images/faq/1.jpg');
                            }
                        @endphp
                        <div class="img-part media-icon orange-color" style="background-image: url({{ $playlist_img }})">
                            <a class="popup-videos" href="{{ $playlist->videoLinks()->first()->link ?? '' }}">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Videos Section End -->

    <!-- college album Start  -->
    <div class="rs-degree rs-college-album style1 modify gray-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row  album-container">
                <div class="col-lg-3 col-md-12  album-title  md-mb-30">
                    <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        {{-- <div class="sub-title primary">{{ __('panel.photo_album') }}</div> --}}
                        <h3 class="title mb-0 header-album text-white">{{ __('panel.photo_album') }}</h3>
                        <div class="primary header-album-subtitle text-white">{{ __('panel.browse_albums') }}</div>
                        {{-- <h3 class="title mb-0">{{ __('panel.browse_albums') }}</h3> --}}
                        <button class="btn album-btn">كل البومات الصور</button>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 mt-10 mb-10">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
                        data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                        data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        @foreach ($albums as $album)
                            <div class="blog-item degree-wrap">
                                @php
                                    if ($album->album_profile != null) {
                                        $album_img = asset('assets/albums/' . $album->album_profile);

                                        if (!file_exists(public_path('assets/albums/' . $album->album_profile))) {
                                            $album_img = asset('image/not_found/item_image_not_found.webp');
                                        }
                                    } else {
                                        $album_img = asset('image/not_found/item_image_not_found.webp');
                                    }
                                @endphp
                                <img src="{{ $album_img }}" alt="">
                                <div class="title-part">
                                    <a href="{{ route('frontend.album', $album->slug) }}">
                                        <h4 class="title">{{ $album->title }}</h4>
                                    </a>


                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- College album End -->

    <!-- CTA Section Start -->
    {{-- <div class="rs-cta main-home">
        <div class="partition-bg-wrap">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-6"></div>
                    <div class="col-lg-6 pl-70 md-pl-15">
                        <div class="sec-title3 mb-40">
                            <h2 class="title white-color mb-16">20% Offer Running - Join Today</h2>
                            <div class="desc white-color pr-100 md-pr-0">We denounce with righteous indignation and
                                dislike men who are so beguiled and demoralized by the charms of pleasure of your
                                moment, so blinded by desire those who fail in their duty through weakness. These
                                cases are perfectly simple and easy every pleasure is to be welcomed and every pain
                                avoided.</div>
                        </div>
                        <div class="btn-part">
                            <a class="readon orange-btn transparent" href="#">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- CTA Section End -->

    <!-- Faq Section Start -->
    {{-- <div class="rs-faq-part style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 padding-0">
                    <div class=" main-part">
                        <div class="title mb-40 md-mb-15">
                            <h2 class="text-part">Frequently Asked Questions</h2>
                        </div>
                        <div class="faq-content">
                            <div id="accordion" class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">What are
                                            the
                                            requirements ?</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo"
                                            aria-expanded="false">Does Educavo offer free courses?</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree"
                                            aria-expanded="false">What is the transfer
                                            application process?</a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapsefour"
                                            aria-expanded="false">What is distance
                                            education?</a>
                                    </div>
                                    <div id="collapsefour" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                            luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 padding-0">
                    <div class="img-part media-icon orange-color">
                        <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- faq Section Start -->


    <!-- Testimonial Section Start -->
    {{-- <div class="rs-testimonial main-home pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title3 mb-50 md-mb-30 text-center">
                <div class="sub-title primary">Testimonial</div>
                <h2 class="title white-color">What Students Saying</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true"
                data-nav="false" data-nav-speed="false" data-md-device="2" data-md-device-nav="false"
                data-md-device-dots="true" data-center-mode="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                data-ipad-device-dots2="true" data-ipad-device="2" data-ipad-device-nav="false"
                data-ipad-device-dots="true" data-mobile-device="1" data-mobile-device-nav="false"
                data-mobile-device-dots="false">
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Mahadi Monsura</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Alex Fenando</a>
                        <span class="designation">English Teacher</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Losis Dcosta</a>
                        <span class="designation">Math Teacher</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Mahadi Monsura</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/2.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Alex Fenando</a>
                        <span class="designation">English Teacher</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote"
                                src="{{ asset('frontend/images/testimonial/main-home/test-2.png') }}"
                                alt="">Professional,
                            responsive, and able to keep up with ever-changing demand and
                            tight deadlines: That’s how I would describe Jeramy and his team at The Lorem Ipsum
                            Company. When it comes to content marketing, you’ll definitely get the 5-star treatment
                            from the Lorem Ipsum Company.</div>
                        <div class="author-img">
                            <img src="{{ asset('frontend/images/testimonial/style5/3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Losis Dcosta</a>
                        <span class="designation">Math Teacher</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial Section End -->




@endsection
