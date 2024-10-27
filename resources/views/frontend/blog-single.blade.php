@extends('layouts.app')

@section('style')
    <style>
        @media(min-width:900px) {
            .main-banner-blog .banner-content h1 {
                padding-top: 60px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Loader start -->
    <div class="bookshelf_wrapper">
        <ul class="books_list">
            <li class="book_item first"></li>
            <li class="book_item second"></li>
            <li class="book_item third"></li>
            <li class="book_item fourth"></li>
            <li class="book_item fifth"></li>
            <li class="book_item sixth"></li>
        </ul>
        <div class="shelf"></div>
    </div>
    <!-- Loader end -->


    <!-- banner section start -->
    <div class="main-banner-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="banner-content">
                        <h1>{{ $post->title }}</h1>
                        <p><a class="text-gray-800" style="color: white;"
                                href="{{ route('frontend.index') }}">{{ __('transf.home') }}</a> - {{ $post->title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section end -->

    <!-- banner section end -->
    <div class="blog-list-main-sec second-demo">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="blog-list-main-content">
                        <!-- Blog List Block Start -->
                        <div class="blog-list-block">
                            <div class="image clearfix">
                                @php
                                    if ($post->photos->last() != null && $post->photos->last()->file_name != null) {
                                        $post_img = asset('assets/posts/' . $post->photos->last()->file_name);

                                        if (
                                            !file_exists(
                                                public_path('assets/posts/' . $post->photos->last()->file_name),
                                            )
                                        ) {
                                            $post_img = asset('image/not_found/item_image_not_found.webp');
                                        }
                                    } else {
                                        $post_img = asset('image/not_found/item_image_not_found.webp');
                                    }
                                @endphp

                                <img src="{{ $post_img }}" class="img-responsive" alt="blog-list-img-1">
                            </div>
                            <div class="content-detail-blog clearfix">
                                <div class="desc">
                                    <div class="read-more">
                                        {{-- <ul>
                                            <li><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                    18</a></li>
                                            <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>
                                                    9</a></li>
                                        </ul> --}}
                                    </div>
                                </div>
                                <p class="heading-main">{{ $post->title }}</p>
                                <div class="sub-heading-main">
                                    <ul>
                                        <li>{{ $post->tags->first()->name ?? 'Global' }}</li>
                                        <li>
                                            {{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') : null }}
                                        </li>
                                        <li>{{ __('transf.posted_by') }}: <a
                                                href="#">{{ $post->users->first()->full_name ?? '' }}</a></li>
                                    </ul>
                                </div>
                                <div class="description">

                                    {!! $post->description !!}
                                </div>

                            </div>

                            <!-- Blog comment start -->
                            <div class="comment-sec-form clearfix " style="display: none !important;">
                                <div class="heading-comment">
                                    <h2>2 Comments</h2>
                                </div>
                                <form class="form-comment clearfix">
                                    <p class="heading-form">Add your Comment</p>
                                    <div class="form-group clearfix">
                                        <label for="name" class="col-sm-1 control-label">Nick</label>
                                        <div class="col-sm-11">
                                            <input type="name" class="form-control" placeholder="Your name or nick">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="email" class="col-sm-1 control-label">Email</label>
                                        <div class="col-sm-11">
                                            <input type="email" class="form-control" placeholder="Your Address">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Review</label>
                                        <div class="col-sm-11">
                                            <textarea type="text" class="form-control" name="note" rows="6" placeholder="Type your message"></textarea>
                                            <button type="submit" class="btn btn-default">Add Rreview</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="detail-comment">
                                    <div class="first-comment">
                                        <p class="last-detail">Fusce vitae nibh mi. Integer posuere, libero et
                                            ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi
                                            ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et
                                            euismod. </p>
                                        <p class="comment-detail"> John Doe <span class="time-comment">10:54</span>
                                            <span class="date-comment">19 February 2016</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object" src="http://via.placeholder.com/150x150"
                                                alt="profile-comment"></a>
                                    </div>
                                    <div class="media-body">
                                        <p>Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim
                                            eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel
                                            est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                        <p class="comment-detail"> John Doe <span class="time-comment">10:54</span>
                                            <span class="date-comment">19 February 2016</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="detail-comment">
                                    <div class="first-comment">
                                        <p class="last-detail">Sed id tincidunt sapien. Pellentesque cursus accumsan
                                            tellus, nec ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum
                                            porttitor sagittis. </p>
                                        <p class="comment-detail"> Peter Wargner <span class="time-comment">7:32
                                            </span> <span class="date-comment">8 February 2016</span></p>
                                    </div>
                                </div>
                                <div class="contact-form-section clearfix">
                                    <div class="cus-change">
                                        <form class="clearfix contact-form-validation"
                                            action="https://zindex.co.in/html/maxer/rtl/php/mail.php" method="post">
                                            <div class="right-side">
                                                <div class="col-sm-4 col-md-4 padding">
                                                    <div class="form-group">
                                                        <div class="required-field">
                                                            <input type="text" class="form-control  name-validation"
                                                                placeholder="NAME" name="name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-md-4 padding">
                                                    <div class="form-group">
                                                        <div class="required-field">
                                                            <input type="email" class="form-control email-validation"
                                                                placeholder="Email Address" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 col-md-4 padding">
                                                    <div class="form-group">
                                                        <div class="required-field">
                                                            <input type="text" class="form-control subject-validation"
                                                                placeholder="Subject" name="subject">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group padding">
                                                    <textarea class="form-control message-validation" rows="15" placeholder="CONTENT..." name="message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default sendmail"
                                                    parent-element=".cus-change">SEND ME</button>
                                            </div>
                                        </form>
                                        <div id="successSend" class="alert alert-success hide">
                                            <strong>Success!</strong> Your message has been sent.
                                        </div>
                                        <div id="errorSend" class="alert alert-danger hide">
                                            <strong>Error!</strong> There was a problem. Please try again later.
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact Form End -->
                            </div>
                            <!-- Blog comment end -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="blog-list-widget clearfix">
                        <!-- Search Widget Start -->
                        <div class="widget-block search-widget clearfix" style="display: none !important;">
                            <h3 class="widget-title">search</h3>
                            <div class="search-box">
                                <input type="text" class="form-control" placeholder="Search here">
                                <a href="#" class="search"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Search Widget End -->
                        <!-- News Post Widget Start -->
                        <div class="widget-block news-post-widget clearfix">
                            <div class="news-post-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#recent" aria-controls="recent"
                                            role="tab" data-toggle="tab">Recent Post</a></li>
                                    <li role="presentation"><a href="#popular" aria-controls="popular" role="tab"
                                            data-toggle="tab">Popular Post</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="recent">

                                        @foreach ($latest_posts as $latest_post)
                                            <!-- News Block Start -->
                                            <div class="news-block">
                                                <div class="desc">
                                                    <div class="image">
                                                        @php
                                                            if (
                                                                $latest_post->photos->last() != null &&
                                                                $latest_post->photos->last()->file_name != null
                                                            ) {
                                                                $latest_post_img = asset(
                                                                    'assets/posts/' .
                                                                        $latest_post->photos->last()->file_name,
                                                                );

                                                                if (
                                                                    !file_exists(
                                                                        public_path(
                                                                            'assets/posts/' .
                                                                                $latest_post->photos->last()->file_name,
                                                                        ),
                                                                    )
                                                                ) {
                                                                    $latest_post_img = asset(
                                                                        'image/not_found/item_image_not_found.webp',
                                                                    );
                                                                }
                                                            } else {
                                                                $latest_post_img = asset(
                                                                    'image/not_found/item_image_not_found.webp',
                                                                );
                                                            }
                                                        @endphp
                                                        <img class="img-responsive" src="{{ $latest_post_img }}"
                                                            alt="news-post">
                                                    </div>
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        {{ $latest_post->created_at ? \Carbon\Carbon::parse($latest_post->created_at)->translatedFormat('d F Y') : null }}
                                                    </span>
                                                    <a href="{{ route('frontend.blog_single', $latest_post->slug) }}"
                                                        class="news-title">{{ $latest_post->title }}</a>
                                                </div>
                                            </div>
                                            <!-- News Block End -->
                                        @endforeach




                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="popular">...</div>
                                </div>
                            </div>
                        </div>
                        <!-- News Post Widget End -->


                        <!-- Tags Widget Start -->
                        <div class="widget-block tags-widget clearfix" style="display: none !important;">
                            <h3 class="widget-title"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> tags
                                widget</h3>
                            <a href="#">wordpress</a>
                            <a href="#">psd template</a>
                            <a href="#">responsive</a>
                            <a href="#">web design</a>
                            <a href="#">great</a>
                            <a href="#">elegant</a>
                            <a href="#">wordpress</a>
                            <a href="#">psd template</a>
                            <a href="#">responsive</a>
                        </div>
                        <!-- Tags Widget End -->


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
