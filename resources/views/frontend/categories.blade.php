@extends('layouts.app')

@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                @php
                    $imagePath = public_path('assets/site_settings/' . $siteSettings['site_img']->value);
                @endphp

                <img src="{{ $siteSettings['site_img']->value && file_exists($imagePath)
                    ? asset('assets/site_settings/' . $siteSettings['site_img']->value)
                    : asset('image/not_found/placeholder6.jpg') }}"
                    alt="{{ $siteSettings['site_name']->value }}">

                {{-- <img src="{{ asset('frontend/images/breadcrumbs/2.jpg') }}" alt="Breadcrumbs Image"> --}}
            </div>
            <div class="breadcrumbs-text">
                <h1 class="page-title">
                    {{ $category->title }}
                </h1>
                <ul>
                    <li>
                        <a class="active" href="{{ route('frontend.index') }}">{{ __('panel.main') }}</a>
                    </li>
                    <li>
                        {{ $category->title }}
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="widget-area">
                            <div class="widget-archives mb-50">
                                <h3 class="widget-title">{{$category->title}}</h3>
                                <ul>
                                    @foreach ($categoryPages as $catPage)
                                    <li class="has-submenu">
                                        <a href="{{ config('app.url') }}/pages/{{ $catPage->slug }}">{{ $catPage->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 pr-50 md-pr-15">
                        <div class="blog-deatails">
                            <div class="bs-img">
                                @php
                                    if ($category->photos->last() != null && $category->photos->last()->file_name != null) {
                                        $page_img = asset('assets/pages/' . $category->photos->last()->file_name);

                                        if (!file_exists(public_path('assets/pages/' . $category->photos->last()->file_name))) {
                                            $page_img = asset('image/not_found/placeholder.jpg');
                                        }
                                    } else {
                                        $page_img = asset('image/not_found/placeholder.jpg');
                                    }
                                @endphp
                                <img src="{{ $page_img }}" class="w-100" alt="{{$category->title}}">
                            </div>
                            <div class="blog-full">
                                <div class="widget-area">
                                    <div class="recent-posts mb-0 no">
                                        <h2 class="widget-title f_shh mb-2">{{$category->title}}</h2>
                                    </div>
                                    <ul class="single-post-meta pb-1">
                                        <li>
            
                                            <?php
                                            $date = $category->created_at;
                                            $higriShortDate = Alkoumi\LaravelHijriDate\Hijri::ShortDate($date); // With optional Timestamp It will return Hijri Date of [$date] => Results "1442/05/12"
                                            ?>
            
                                            <span class="p-date">
                                                <i class="fa fa-calendar-check-o"></i>
                                                {{ $higriShortDate . ' ' . __('panel.calendar_hijri') }}
            
                                                <span>{{ __('panel.corresponding_to') }} </span>
                                                {{ $category->created_at->isoFormat('YYYY/MM/DD') . ' ' . __('panel.calendar_gregorian') }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="p-date">
                                                <i class="fa fa-user-o"></i>
                                                {{ $category->users && $category->users->isNotEmpty() ? $category->users->first()->full_name : __('panel.admin') }}
                                            </span>
                                        </li>
            
                                    </ul>
                                </div>
                                <div class="blog-desc mb-35">
                                    <p>
                                        {!! $category->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const submenuParents = document.querySelectorAll(".widget-archives .has-submenu");
    
        submenuParents.forEach(parent => {
            parent.addEventListener("click", function() {
                // تبديل عرض القائمة الفرعية
                const submenu = parent.querySelector(".submenu");
                submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    
                // تبديل الفئة لتدوير السهم
                parent.classList.toggle("open");
            });
        });
    });
    </script>
@endsection