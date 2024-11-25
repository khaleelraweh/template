@extends('layouts.app')

@section('content')
    @include('frontend.home.main-slider')

    @include('frontend.home.news-events')

    @include('frontend.home.colleges-institutes')

    @include('frontend.home.statistics')

    @include('frontend.home.playlists')




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
                        <a href="{{ route('frontend.album_list') }}"
                            class="btn album-btn">{{ __('panel.all_photo_albums') }}</a>
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
                                    if ($album->statistic_image != null) {
                                        $album_img = asset('assets/albums/' . $album->statistic_image);

                                        if (!file_exists(public_path('assets/albums/' . $album->statistic_image))) {
                                            $album_img = asset('image/not_found/placeholder.jpg');
                                        }
                                    } else {
                                        $album_img = asset('image/not_found/placeholder.jpg');
                                    }
                                @endphp
                                <img src="{{ $album_img }}" alt="">
                                <div class="title-part">
                                    <a href="{{ route('frontend.album_single', $album->slug) }}">
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
