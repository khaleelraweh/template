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
                    @switch(true)
                        @case(Route::is('frontend.blog_single'))
                            {{ __('panel.blog_single') }}
                        @break

                        @case(Route::is('frontend.news_single'))
                            {{ __('panel.news_single') }}
                        @break

                        @case(Route::is('frontend.blog_index'))
                            Blog Index
                        @break

                        @case(Route::is('frontend.contact'))
                            Contact Us
                        @break

                        @default
                            Default Title
                    @endswitch
                </h1>
                <ul>
                    <li>
                        <a class="active" href="index.html">Home</a>
                    </li>
                    <li>
                        @switch(true)
                            @case(Route::is('frontend.blog_single'))
                                {{ __('panel.blog_single') }}
                            @break

                            @case(Route::is('frontend.news_single'))
                                {{ __('panel.news_single') }}
                            @break

                            @case(Route::is('frontend.blog_index'))
                                Blog Index
                            @break

                            @case(Route::is('frontend.contact'))
                                Contact Us
                            @break

                            @default
                                Default Title
                        @endswitch
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="blog-deatails">
                    <div class="bs-img">
                        @php
                            if ($post->photos->last() != null && $post->photos->last()->file_name != null) {
                                $post_img = asset('assets/news/' . $post->photos->last()->file_name);

                                if (!file_exists(public_path('assets/news/' . $post->photos->last()->file_name))) {
                                    $post_img = asset('image/not_found/item_image_not_found.webp');
                                }
                            } else {
                                $post_img = asset('image/not_found/item_image_not_found.webp');
                            }
                        @endphp

                        <a href="#"><img src="{{ $post_img }}" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <ul class="single-post-meta">
                            <li>

                                <?php
                                $date = $post->created_at;
                                $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                ?>

                                <span class="p-date">
                                    <i class="fa fa-calendar-check-o"></i>
                                    {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}

                                    <span>{{ __('panel.corresponding_to') }} </span>
                                    {{ $post->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}
                                </span>
                            </li>
                            <li>
                                <span class="p-date"> <i class="fa fa-user-o"></i>
                                    {{ $post->users->first()->full_name ?? __('panel.admin') }}
                                </span>
                            </li>

                        </ul>
                        <div class="blog-desc">
                            <p>
                                {!! $post->content !!}
                            </p>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
@endsection
