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
                    <div class="container" style="height: 150vh;">
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

    <!-- Blog Section Start -->
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-lg-7 col-md-12 ">
            <div id="rs-blog" class="rs-blog main-home pb-100 pt-100 md-pt-70 md-pb-70">
                <div class="container">
                    {{-- <div class="sec-title3 text-center mb-50">
                            <div class="sub-title"> News Update</div>
                            <h2 class="title"> Latest News & events</h2>
                        </div> --}}
                    <div class="sec-title mb-60 md-mb-30 text-center">
                        <div class="sub-title primary">{{ __('panel.news_update') }}</div>
                        <h2 class="title mb-0">{{ __('panel.university_news') }}</h2>
                    </div>

                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
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
                                        <a href="blog-single.html">
                                            {!! $news->title !!}
                                        </a>
                                    </h3>

                                    <div class="desc">
                                        {!! $news->content !!}
                                    </div>
                                    <div class="btn-btm">
                                        <div class="cat-list">
                                            <ul class="post-categories">
                                                {{-- <li><i class="fa fa-user-o"></i> {{ $news->created_by }}</li> --}}
                                                <li><a href="#">{{ $news->created_by }}</a></li>
                                            </ul>
                                        </div>
                                        <div class="rs-view-btn">
                                            <a href="#">{{ __('panel.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12 ">
            <!-- Section bg Wrap 2 start -->
            <div class="bg2">
                <!-- Blog Section Start -->
                <div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
                    <div class="container">
                        <div class="sec-title mb-60 md-mb-30 text-center">
                            <div class="sub-title primary">{{ __('panel.activities_update') }} </div>
                            <h2 class="title mb-0">{{ __('panel.university_activities') }}</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 pr-75 md-pr-15 md-mb-50">
                                @foreach ($events as $index => $event)
                                    <div class="row align-items-center no-gutter white-bg blog-item {{ $loop->last ? '' : 'mb-30' }} wow fadeInUp"
                                        data-wow-delay="{{ ($index + 1) * 100 }}ms" data-wow-duration="2000ms">
                                        <div class="col-md-4">
                                            <div class="image-part">
                                                @php
                                                    if (
                                                        $event->photos->first() != null &&
                                                        $event->photos->first()->file_name != null
                                                    ) {
                                                        $event_img = asset(
                                                            'assets/events/' . $event->photos->first()->file_name,
                                                        );

                                                        if (
                                                            !file_exists(
                                                                public_path(
                                                                    'assets/events/' .
                                                                        $event->photos->first()->file_name,
                                                                ),
                                                            )
                                                        ) {
                                                            $event_img = asset(
                                                                'image/not_found/item_image_not_found.webp',
                                                            );
                                                        }
                                                    } else {
                                                        $event_img = asset('image/not_found/item_image_not_found.webp');
                                                    }
                                                @endphp
                                                <a href="#">
                                                    <img src="{{ $event_img }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="blog-content">
                                                <ul class="blog-meta">
                                                    <li><i class="fa fa-user-o"></i> {{ $event->created_by }}</li>

                                                    <li>
                                                        <?php
                                                        $date = $event->created_at;
                                                        $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                                        ?>
                                                        <i class="fa fa-calendar"></i>
                                                        {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}
                                                        <span>{{ __('panel.corresponding_to') }} </span>
                                                        {{ $event->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}

                                                    </li>
                                                </ul>
                                                <h3 class="title">
                                                    <a href="#">
                                                        {{ $event->title }}
                                                    </a>
                                                </h3>
                                                <div class="btn-part">
                                                    <a class="readon-arrow"
                                                        href="#">{{ __('panel.read_more') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Section End -->


            </div>
            <!-- Section bg Wrap 2 End -->
        </div>

    </div>
    {{-- </div> --}}
    <!-- Blog Section End -->

    <!-- start statistics -->
    <div class=" main-home event-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="rs-counter style2-about">
            <div class="container">
                <div class="row couter-area">
                    @foreach ($statistics as $statistic)
                        <div
                            class="col-lg-3 col-md-6 {{ $loop->last ? '' : 'md-mb-30' }}  {{ !$loop->last && count($statistics) > 4 ? 'lg-mb-70' : ' ' }} ">
                            <div class="counter-item text-center">
                                <h2 class="rs-count">{{ $statistic->statistic_number }}</h2>
                                <h4 class="title mb-0">{{ $statistic->title }}</h4>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- end statistics -->

    <!-- College and Institutes Start  -->
    <div class="rs-degree style1 modify gray-bg pt-100 pb-70 md-pt-70 md-pb-40">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-4 col-md-12 mb-30">
                    <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        <div class="sub-title primary">Degree categoris</div>
                        <h2 class="title mb-0">Successfully Complete A Degree at Educavo University</h2>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 mb-30">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                        data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                        data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                        data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
                        data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                        data-md-device="2" data-md-device-nav="false" data-md-device-dots="false">
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
            </div>
        </div>
    </div>
    <!-- College and Institutes End -->

    <!-- Categories Section Start -->
    <div id="rs-categories" class="rs-categories main-home pt-90 pb-100 md-pt-60 md-pb-40">
        <div class="container">
            <div class="sec-title3 text-center mb-45">
                <div class="sub-title"> Top Categories</div>
                <h2 class="title black-color">Popular Online Categories</h2>
            </div>
            <div class="row mb-35">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{ asset('frontend/images/categories/main-home/1.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{ asset('frontend/images/categories/main-home/icon/1.png') }}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">General Education</a></h2>
                                <span class="course-qnty">02 Courses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{ asset('frontend/images/categories/main-home/2.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{ asset('frontend/images/categories/main-home/icon/2.png') }}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Computer Science</a></h2>
                                <span class="course-qnty">02 Courses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{ asset('frontend/images/categories/main-home/3.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{ asset('frontend/images/categories/main-home/icon/3.png') }}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Civil Engineering</a></h2>
                                <span class="course-qnty">02 Courses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{ asset('frontend/images/categories/main-home/4.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{ asset('frontend/images/categories/main-home/icon/4.png') }}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Artificial Intelligence</a></h2>
                                <span class="course-qnty">02 Courses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{ asset('frontend/images/categories/main-home/5.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{ asset('frontend/images/categories/main-home/icon/5.png') }}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Business Studies</a></h2>
                                <span class="course-qnty">02 Courses</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{ asset('frontend/images/categories/main-home/6.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{ asset('frontend/images/categories/main-home/icon/6.png') }}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Computer Engineering</a></h2>
                                <span class="course-qnty">02 Courses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <a class="readon orange-btn main-home" href="#">View All categories </a>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->

    <!-- Categories Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses main-home event-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title3 text-center mb-45">
                <div class="sub-title">Select Courses</div>
                <h2 class="title black-color">Explore Popular Courses</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="#"><img src="{{ asset('frontend/images/courses/main-home/1.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (1 rating)
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-price">
                                    <span class="price">Free</span>
                                </div>
                                <h3 class="title"><a href="#">Fitness Development Strategy Buildup
                                        Laoreet</a></h3>
                                <ul class="meta-part">
                                    <li class="user">
                                        <i class="fa fa-user"></i>
                                        25 Students
                                    </li>
                                    <li class="user">
                                        <i class="fa fa-file"></i>
                                        6 Lessons
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="#"><img src="{{ asset('frontend/images/courses/main-home/2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (1 rating)
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-price">
                                    <span class="price">$40.00</span>
                                </div>
                                <h3 class="title"><a href="#">Artificial Intelligence Fundamental Startup
                                        Justo</a>
                                </h3>
                                <ul class="meta-part">
                                    <li class="user">
                                        <i class="fa fa-user"></i>
                                        25 Students
                                    </li>
                                    <li class="user">
                                        <i class="fa fa-file"></i>
                                        6 Lessons
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="#"><img src="{{ asset('frontend/images/courses/home8/2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (1 rating)
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-price">
                                    <span class="price">$35.00</span>
                                </div>
                                <h3 class="title"><a href="#">Computer Science Startup Varius et
                                        Commodo</a></h3>
                                <ul class="meta-part">
                                    <li class="user">
                                        <i class="fa fa-user"></i>
                                        25 Students
                                    </li>
                                    <li class="user">
                                        <i class="fa fa-file"></i>
                                        6 Lessons
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 md-mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="#"><img src="{{ asset('frontend/images/courses/home8/4.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (1 rating)
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-price">
                                    <span class="price">$32.00</span>
                                </div>
                                <h3 class="title"><a href="#">Testy & Delicious Food Recipes for Lunch
                                        Tellus</a>
                                </h3>
                                <ul class="meta-part">
                                    <li class="user">
                                        <i class="fa fa-user"></i>
                                        25 Students
                                    </li>
                                    <li class="user">
                                        <i class="fa fa-file"></i>
                                        6 Lessons
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 sm-mb-30">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="#"><img src="{{ asset('frontend/images/courses/home8/5.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (1 rating)
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-price">
                                    <span class="price">$22.00</span>
                                </div>
                                <h3 class="title"><a href="#">Lawyer Advance Mental Simulator Handle
                                        Nulla</a></h3>
                                <ul class="meta-part">
                                    <li class="user">
                                        <i class="fa fa-user"></i>
                                        25 Students
                                    </li>
                                    <li class="user">
                                        <i class="fa fa-file"></i>
                                        6 Lessons
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="courses-item">
                        <div class="courses-grid">
                            <div class="img-part">
                                <a href="#"><img src="{{ asset('frontend/images/courses/home8/6.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="content-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (1 rating)
                                        </li>
                                    </ul>
                                </div>
                                <div class="course-price">
                                    <span class="price">$28.00</span>
                                </div>
                                <h3 class="title"><a href="#">Computer Fundamentals Basic Startup
                                        Ultricies</a></h3>
                                <ul class="meta-part">
                                    <li class="user">
                                        <i class="fa fa-user"></i>
                                        25 Students
                                    </li>
                                    <li class="user">
                                        <i class="fa fa-file"></i>
                                        6 Lessons
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->

    <!-- CTA Section Start -->
    <div class="rs-cta main-home">
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
    </div>
    <!-- CTA Section End -->

    <!-- Faq Section Start -->
    <div class="rs-faq-part style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
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
    </div>
    <!-- faq Section Start -->


    <!-- Testimonial Section Start -->
    <div class="rs-testimonial main-home pt-100 pb-100 md-pt-70 md-pb-70">
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
    </div>
    <!-- Testimonial Section End -->

    <!-- Blog Section Start -->
    <div id="rs-blog" class="rs-blog main-home pb-100 pt-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title3 text-center mb-50">
                <div class="sub-title"> News Update</div>
                <h2 class="title"> Latest News & events</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3"
                data-md-device-nav="false" data-md-device-dots="false">
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset('frontend/images/blog/style2/1.jpg') }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>December 15, 2020</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">Education is The Process of Facilitating
                                Learning</a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits.
                            Educational
                            methods include teach ing, training, storytelling</div>
                        <div class="btn-btm">
                            <div class="cat-list">
                                <ul class="post-categories">
                                    <li><a href="#">College</a></li>
                                </ul>
                            </div>
                            <div class="rs-view-btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset('frontend/images/blog/style2/2.jpg') }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>October 15, 2020</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">High school program starting soon 2021 </a>
                        </h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits.
                            Educational
                            methods include teach ing, training, storytelling</div>
                        <div class="btn-btm">
                            <div class="cat-list">
                                <ul class="post-categories">
                                    <li><a href="#">College</a></li>
                                </ul>
                            </div>
                            <div class="rs-view-btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset('frontend/images/blog/style2/3.jpg') }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>April 25, 2020</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">Shutdown of schools extended to Aug 31 </a>
                        </h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits.
                            Educational
                            methods include teach ing, training, storytelling</div>
                        <div class="btn-btm">
                            <div class="cat-list">
                                <ul class="post-categories">
                                    <li><a href="#">College</a></li>
                                </ul>
                            </div>
                            <div class="rs-view-btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset('frontend/images/blog/style2/4.jpg') }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>June 20, 2010</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">This is a great source of content for
                                anyone…
                            </a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits.
                            Educational
                            methods include teach ing, training, storytelling</div>
                        <div class="btn-btm">
                            <div class="cat-list">
                                <ul class="post-categories">
                                    <li><a href="#">College</a></li>
                                </ul>
                            </div>
                            <div class="rs-view-btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset('frontend/images/blog/style2/5.jpg') }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>August 30, 2020</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">Pandemic drives millions from Latin
                                America’s</a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits.
                            Educational
                            methods include teach ing, training, storytelling</div>
                        <div class="btn-btm">
                            <div class="cat-list">
                                <ul class="post-categories">
                                    <li><a href="#">College</a></li>
                                </ul>
                            </div>
                            <div class="rs-view-btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src="{{ asset('frontend/images/blog/style2/6.jpg') }}" alt="">
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>May 10, 2020</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">Modern School the lovely valley team
                                work</a>
                        </h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits.
                            Educational
                            methods include teach ing, training, storytelling</div>
                        <div class="btn-btm">
                            <div class="cat-list">
                                <ul class="post-categories">
                                    <li><a href="#">College</a></li>
                                </ul>
                            </div>
                            <div class="rs-view-btn">
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section End -->

    <!-- Newsletter section start -->
    <div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70">
        <div class="container">
            <div class="newsletter-wrap">
                <div class="row y-middle">
                    <div class="col-lg-6 col-md-12 md-mb-30">
                        <div class="content-part">
                            <div class="sec-title">
                                <div class="title-icon md-mb-15">
                                    <img src="{{ asset('frontend/images/newsletter.png') }}" alt="images">
                                </div>
                                <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <form class="newsletter-form">
                            <input type="email" name="email" placeholder="Enter Your Email" required="">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter section end -->
@endsection
