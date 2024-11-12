@extends('layouts.app')

@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="{{ asset('frontend/images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">
                    {{ __('panel.photo_album') }}
                </h1>
                <ul>
                    <li>
                        <a class="active" href="{{ route('frontend.index') }}">{{ __('panel.main') }}</a>
                    </li>
                    <li>
                        {{ __('panel.all_photo_albums') }}
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Degree Section Start -->
        <div class="rs-degree style1 modify gray-bg pt-100 pb-70 md-pt-70 md-pb-40">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="sec-title wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                            <div class="sub-title primary">{{ __('panel.photo_album') }}</div>
                            <h2 class="title mb-0">{{ __('panel.all_photo_albums') }} | {{ __('panel.browse_albums') }}
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('frontend/images/degrees/1.jpg') }}" alt="">
                            <div class="title-part">
                                <h4 class="title">Undergraduate</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a href="#">Undergraduate</a></h4>
                                <p class="desc">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                    impedit quo minus id quod </p>
                                <div class="btn-part">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('frontend/images/degrees/2.jpg') }}" alt="">
                            <div class="title-part">
                                <h4 class="title">Postgraduate</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a href="#">Postgraduate</a></h4>
                                <p class="desc">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                    impedit quo minus id quod </p>
                                <div class="btn-part">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('frontend/images/degrees/3.jpg') }}" alt="">
                            <div class="title-part">
                                <h4 class="title">PHD Scholarships</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a href="#">PHD Scholarships</a></h4>
                                <p class="desc">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                    impedit quo minus id quod </p>
                                <div class="btn-part">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('frontend/images/degrees/4.jpg') }}" alt="">
                            <div class="title-part">
                                <h4 class="title">International Hubs</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a href="#">International Hubs</a></h4>
                                <p class="desc">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                    impedit quo minus id quod </p>
                                <div class="btn-part">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="degree-wrap">
                            <img src="{{ asset('frontend/images/degrees/5.jpg') }}" alt="">
                            <div class="title-part">
                                <h4 class="title">PHD Scholarships</h4>
                            </div>
                            <div class="content-part">
                                <h4 class="title"><a href="#">PHD Scholarships</a></h4>
                                <p class="desc">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                    impedit quo minus id quod </p>
                                <div class="btn-part">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Degree Section End -->

    </div>
    <!-- Main content End -->
@endsection
