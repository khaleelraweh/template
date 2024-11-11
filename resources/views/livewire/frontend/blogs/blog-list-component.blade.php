<div>
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{ asset('frontend/images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Blog Sidebar</h1>
                <ul>
                    <li>
                        <a class="active" href="index.html">Home</a>
                    </li>
                    <li>Blog Single</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->


        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 order-last">
                        <div class="widget-area">
                            <div class="search-widget mb-50">
                                <div class="search-wrap">
                                    <input type="search" placeholder="Searching..." name="s" class="search-input"
                                        value="">
                                    <button type="submit" value="Search"><i class=" flaticon-search"></i></button>
                                </div>
                            </div>
                            <div class="recent-posts-widget mb-50">
                                <h3 class="widget-title">{{ __('panel.recent_posts') }}</h3>

                                @foreach ($recent_posts as $recent_post)
                                    <div class="show-featured ">
                                        <div class="post-img">

                                            @php
                                                if (
                                                    $recent_post->photos->first() != null &&
                                                    $recent_post->photos->first()->file_name != null
                                                ) {
                                                    $recent_post_img = asset(
                                                        'assets/posts/' . $recent_post->photos->first()->file_name,
                                                    );

                                                    if (
                                                        !file_exists(
                                                            public_path(
                                                                'assets/posts/' .
                                                                    $recent_post->photos->first()->file_name,
                                                            ),
                                                        )
                                                    ) {
                                                        $recent_post_img = asset(
                                                            'image/not_found/item_image_not_found.webp',
                                                        );
                                                    }
                                                } else {
                                                    $recent_post_img = asset(
                                                        'image/not_found/item_image_not_found.webp',
                                                    );
                                                }
                                            @endphp


                                            <a href="{{ route('frontend.blog_single', $recent_post->slug) }}"><img
                                                    src="{{ $recent_post_img }}" alt=""></a>
                                        </div>
                                        <div class="post-desc">
                                            <a href="{{ route('frontend.blog_single', $recent_post->slug) }}">
                                                {{ \Illuminate\Support\Str::words($recent_post->title, 10, '...') }}
                                            </a>
                                            <span class="date">
                                                <?php
                                                $date = $recent_post->created_at;
                                                $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                                ?>
                                                <i class="fa fa-calendar"></i>
                                                {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}

                                                <span> | </span>

                                                {{ $recent_post->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}


                                            </span>
                                        </div>
                                    </div>
                                @endforeach



                                {{-- <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('frontend/images/blog/style2/2.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Soundtrack filma Lady Exclusive Music</a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            November 19, 2018
                                        </span>
                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('frontend/images/blog/style2/3.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Soundtrack filma Lady Exclusive Music </a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            September 6, 2020
                                        </span>
                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('frontend/images/blog/style2/4.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Given void great you’re good appear have i also fifth </a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            September 6, 2020
                                        </span>
                                    </div>
                                </div>
                                <div class="show-featured ">
                                    <div class="post-img">
                                        <a href="#"><img src="{{ asset('frontend/images/blog/style2/5.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="#">Lights winged seasons fish abundantly evening.</a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            September 6, 2020
                                        </span>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="recent-posts mb-50">
                                <h3 class="widget-title">Meta</h3>
                                <ul>
                                    <li><a href="#">Log in</a></li>
                                    <li><a href="#">Entries feed</a></li>
                                    <li><a href="#">Comments feed</a></li>
                                    <li><a href="#">WordPress.org</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 pr-50 md-pr-15">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-lg-12 mb-70">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="{{ route('frontend.blog_single', $post->slug) }}">
                                                @php
                                                    if (
                                                        $post->photos->first() != null &&
                                                        $post->photos->first()->file_name != null
                                                    ) {
                                                        $post_img = asset(
                                                            'assets/posts/' . $post->photos->first()->file_name,
                                                        );

                                                        if (
                                                            !file_exists(
                                                                public_path(
                                                                    'assets/posts/' . $post->photos->first()->file_name,
                                                                ),
                                                            )
                                                        ) {
                                                            $post_img = asset(
                                                                'image/not_found/item_image_not_found.webp',
                                                            );
                                                        }
                                                    } else {
                                                        $post_img = asset('image/not_found/item_image_not_found.webp');
                                                    }
                                                @endphp
                                                <img src="{{ $post_img }}" alt="">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title">
                                                <a href="{{ route('frontend.blog_single', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <div class="blog-meta">
                                                <ul class="btm-cate">
                                                    <li>
                                                        <?php
                                                        $date = $post->created_at;
                                                        $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                                        ?>

                                                        <div class="blog-date">
                                                            <i class="fa fa-calendar-check-o"></i>

                                                            {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}

                                                            <span>{{ __('panel.corresponding_to') }} </span>

                                                            {{ $post->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}


                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="author">
                                                            <i class="fa fa-user-o"></i>
                                                            {{ $post->users && $post->users->isNotEmpty() ? $post->users->first()->full_name : __('panel.admin') }}

                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="blog-desc">
                                                {!! \Illuminate\Support\Str::words($post->content, 30, '...') !!}
                                            </div>
                                            <div class="blog-button">
                                                <a class="blog-btn"
                                                    href="#">{{ __('panel.continue_reading') }}</a>
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
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
</div>
