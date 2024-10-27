@extends('layouts.app')



@section('content')
    <!-- Carousel Slider Start -->
    <div id="carousel-example-generic" class="carousel slide carousel-style-1" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @forelse ($main_sliders->where('section' ,1) as $main_slider)
                <div class="item {{ $loop->first ? 'active' : '' }}">
                    <img class="img-responsive"
                        src="{{ asset('assets/main_sliders/' . $main_slider->firstMedia?->file_name) }}" alt="SLIDER">
                    <div class="carousel-caption">
                        <h1 class="fr-cap">{{ $main_slider->title }}</h1>
                        <p>{!! $main_slider->content !!}</p>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
    </div>
    <!-- Carousel Slider End -->



    <!-- our latest work sec-2 home-3 start-->
    <div class="our-latest-work3-sec-2 clearfix">
        <div class="container">
            <div class="section-title">
                <i class="fa fa-recycle" aria-hidden="true"></i>
                <h6 class="heading-main">{{ __('transf.txt_latest_posts') }}</h6>
                <span>{{ __('transf.txt_latest_posts_desc') }}</span>
            </div>
            <div class="row">
                @foreach ($posts->take(3) as $post)
                    <div class="col-sm-4 col-md-4">
                        <div class="our-latest-work3-sec-2__block">
                            <div class="our-latest-work3-sec-2__block--img">
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
                                <img class="img-responsive" src="{{ $post_img }}" alt="home3-our-latest-work2-img-1">
                            </div>
                            <div class="our-latest-work3-sec-2__block--desc">
                                <p class="title">{{ $post->title }} </p>
                                <ul>
                                    <li>{{ $post->tags->first()->name ?? 'Global' }}</li>
                                    <li>
                                        {{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') : null }}
                                    </li>
                                    <li>{{ __('transf.posted_by') }}: {{ $post->created_by }}</li>
                                </ul>
                            </div>
                            <div class="our-latest-work3-sec-2__block--details">
                                <p>
                                    {{-- {!! \Illuminate\Support\Str::limit($post->description, 100) !!} --}}
                                    {{ \Illuminate\Support\Str::words($post->description, 20, '...') }}
                                </p>
                                <a class="btn btn-default" href="{{ route('frontend.blog_single', $post->slug) }}"
                                    role="button">{{ __('transf.txt_read_more') }}</a>
                                {{-- <ul>
                                    <li><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>15</a></li>
                                    <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>9</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="row " style="margin-top: 20px;">
                <div class="col-12 " style="display: flex;justify-content: center;text-align: center">
                    <a href="{{ route('frontend.blog_list') }}" class="btn btn-primary"
                        style="padding: 15px 20px;">{{ __('transf.show_all_posts') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- our latest work sec-2 home-3 end-->
@endsection
