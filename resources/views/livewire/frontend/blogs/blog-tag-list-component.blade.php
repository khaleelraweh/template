<div>
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                {{-- <img src="{{ asset('frontend/images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image"> --}}
                <img src="{{ $siteSettings['site_img']->value ? asset('assets/site_settings/' . $siteSettings['site_img']->value) : asset('frontend/images/breadcrumbs/2.jpg') }}"
                    alt="{{ $siteSettings['site_name']->value }}">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">
                    @switch(true)
                        @case($currentRoute === 'frontend.blog_tag_list')
                            {{ __('panel.blog_list') }}
                        @break

                        @case($currentRoute === 'frontend.news_tag_list')
                            {{ __('panel.news_list') }}
                        @break

                        @case($currentRoute === 'frontend.events_tag_list')
                            {{ __('panel.events_list') }}
                        @break

                        @default
                            Default Title
                    @endswitch
                </h1>
                <ul>
                    <li>
                        <a class="active" href="{{ route('frontend.index') }}">{{ __('panel.main') }}</a>

                    </li>
                    <li>
                        {{ $tag_title ?? '' }}
                    </li>
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
                                    <input type="search" wire:model="searchQuery"
                                        placeholder="{{ __('transf.search') }}..." name="s" class="search-input"
                                        value="">
                                </div>
                            </div>
                            <div class="recent-posts-widget mb-50">

                                @php
                                    $titleMap = [
                                        'frontend.blog_tag_list' => __('panel.recent_posts'),
                                        'frontend.news_tag_list' => __('panel.recent_news'),
                                        'frontend.events_tag_list' => __('panel.recent_events'),
                                    ];
                                    $routeMap = [
                                        'frontend.blog_tag_list' => 'frontend.blog_single',
                                        'frontend.news_tag_list' => 'frontend.news_single',
                                        'frontend.events_tag_list' => 'frontend.event_single',
                                    ];
                                    $assetMap = [
                                        'frontend.blog_tag_list' => 'assets/posts/',
                                        'frontend.news_tag_list' => 'assets/news/',
                                        'frontend.events_tag_list' => 'assets/events/',
                                    ];

                                    $widgetTitle = $titleMap[$currentRoute] ?? __('panel.recent_posts');
                                    $routeName = $routeMap[$currentRoute] ?? 'frontend.blog_single';
                                    $assetPath = $assetMap[$currentRoute] ?? 'assets/posts/';
                                @endphp

                                <h3 class="widget-title recent_post_title">{{ $widgetTitle }}</h3>






                                @foreach ($recent_posts as $recent_post)
                                    @php
                                        $recentImage =
                                            $recent_post->photos->first()->file_name ??
                                            'image/not_found/item_image_not_found.webp';
                                        $recentImgUrl = asset($assetPath . $recentImage);

                                        // Check if the image exists, otherwise fallback to default
                                        if (!file_exists(public_path(parse_url($recentImgUrl, PHP_URL_PATH)))) {
                                            $recentImgUrl = asset('image/not_found/item_image_not_found.webp');
                                        }
                                    @endphp

                                    <div class="show-featured">
                                        <div class="post-img">
                                            <a href="{{ route($routeName, $recent_post->slug) }}">
                                                <img src="{{ $recentImgUrl }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-desc">
                                            <a href="{{ route($routeName, $recent_post->slug) }}">
                                                {{ \Illuminate\Support\Str::words($recent_post->title, 10, '...') }}
                                            </a>
                                            <span class="date">
                                                <i class="fa fa-calendar"></i>
                                                {{ formatPostDateDash($recent_post->created_at) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="recent-posts mb-50">
                                <h3 class="widget-title tags_title">{{ __('panel.tags') }}</h3>
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li>
                                            @switch(true)
                                                @case($currentRoute === 'frontend.blog_tag_list')
                                                    <a href="{{ route('frontend.blog_tag_list', $tag->slug) }}">
                                                        {{ $tag->name }}
                                                    </a>
                                                @break

                                                @case($currentRoute === 'frontend.news_tag_list')
                                                    <a href="{{ route('frontend.news_tag_list', $tag->slug) }}">
                                                        {{ $tag->name }}
                                                    </a>
                                                @break

                                                @case($currentRoute === 'frontend.events_tag_list')
                                                    <a href="{{ route('frontend.events_tag_list', $tag->slug) }}">
                                                        {{ $tag->name }}
                                                    </a>
                                                @break

                                                @default
                                                    <a href="{{ route('frontend.blog_tag_list', $tag->slug) }}">
                                                        {{ $tag->name }}
                                                    </a>
                                            @endswitch


                                        </li>
                                    @endforeach


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

                                            @php
                                                $linkRoute = match ($currentRoute) {
                                                    'frontend.blog_tag_list' => 'frontend.blog_single',
                                                    'frontend.news_tag_list' => 'frontend.news_single',
                                                    'frontend.events_tag_list' => 'frontend.event_single',
                                                    default => 'frontend.blog_single',
                                                };
                                            @endphp

                                            <x-post-link :route="$linkRoute" :slug="$post->slug">

                                                @php
                                                    $post_img = getPostTagImage(
                                                        $post,
                                                        $currentRoute,
                                                        asset('image/not_found/item_image_not_found.webp'),
                                                    );
                                                @endphp
                                                <img src="{{ $post_img }}" alt="">

                                            </x-post-link>


                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title">
                                                @switch(true)
                                                    @case($currentRoute === 'frontend.blog_tag_list')
                                                        <a href="{{ route('frontend.blog_single', $post->slug) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    @break

                                                    @case($currentRoute === 'frontend.news_tag_list')
                                                        <a href="{{ route('frontend.news_single', $post->slug) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    @break

                                                    @case($currentRoute === 'frontend.events_tag_list')
                                                        <a href="{{ route('frontend.event_single', $post->slug) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    @break

                                                    @default
                                                        <a href="{{ route('frontend.blog_single', $post->slug) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                @endswitch

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

                                                @switch(true)
                                                    @case($currentRoute === 'frontend.blog_tag_list')
                                                        <a class="blog-btn"
                                                            href="{{ route('frontend.blog_single', $post->slug) }}">
                                                            {{ __('panel.continue_reading') }}
                                                        </a>
                                                    @break

                                                    @case($currentRoute === 'frontend.news_tag_list')
                                                        <a class="blog-btn"
                                                            href="{{ route('frontend.news_single', $post->slug) }}">
                                                            {{ __('panel.continue_reading') }}
                                                        </a>
                                                    @break

                                                    @case($currentRoute === 'frontend.events_tag_list')
                                                        <a class="blog-btn"
                                                            href="{{ route('frontend.event_single', $post->slug) }}">
                                                            {{ __('panel.continue_reading') }}
                                                        </a>
                                                    @break

                                                    @default
                                                        <a class="blog-btn"
                                                            href="{{ route('frontend.blog_single', $post->slug) }}">
                                                            {{ __('panel.continue_reading') }}
                                                        </a>
                                                @endswitch


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
