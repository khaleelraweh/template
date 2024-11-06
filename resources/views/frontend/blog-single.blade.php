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
                <h1 class="page-title">Blog Single</h1>
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
                            {{-- <li class="Post-cate">
                                <div class="tag-line">
                                    <i class="fa fa-book"></i>
                                    <a href="#">Strategy</a>
                                </div>
                            </li> --}}
                            {{-- <li class="post-comment"> <i class="fa fa-comments-o"></i> 0</li> --}}
                        </ul>
                        <div class="blog-desc">
                            <p>
                                {!! $post->content !!}
                            </p>
                        </div>
                        <blockquote>
                            <p>Globally incubate standards compliant channels before scalable benefits. Quickly disseminate
                                superior deliverables whereas web-enabled applications.</p>
                        </blockquote>
                        <div class="blog-desc mb-40">
                            <p>
                                Interactively procrastinate high-payoff content without backward-compatible data. Quickly
                                cultivate optimal processes and tactical architectures. Completely iterate covalent
                                strategic theme areas via accurate e-markets. Globally incubate standards compliant channels
                                before scalable benefits.
                            </p>
                        </div>
                        <h2 class="title mb-40">Economy may face double recession</h2>
                        <div class="blog-desc mb-35">
                            <p>
                                Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative
                                approaches to corporate strategy foster collaborative thinking to further the overall value
                                proposition. Organically grow the holistic world view of disruptive innovation via workplace
                                diversity and empowerment. Bring to the table win-win survival strategies to ensure
                                proactive domination. At the end of the day, going forward, a new normal that has evolved
                                from generation X is on the runway heading towards a streamlined cloud solution. User
                                generated content in real-time will have multiple touchpoints for offshoring.
                            </p>
                        </div>
                        <div class="blog-img mb-40">
                            <img src="{{ asset('frontend/images/blog/inner/2.jpg') }}" alt="">
                        </div>
                        <div class="blog-desc mb-40">
                            <p>
                                Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively
                                coordinate proactive e-commerce via process-centric “outside the box” thinking. Completely
                                pursue scalable customer service through sustainable potentialities. Collaboratively
                                administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics
                                whereas proactive e-services. Seamlessly empower fully researched growth strategies and
                                interoperable internal or “organic” sources.
                            </p>
                        </div>
                        <ul class="unorder-list mb-20">
                            <li>New Construction Benefit of Service</li>
                            <li>Renovations Benefit of Service</li>
                            <li>Historic Renovations and Restorations</li>
                            <li>Additions Benefit of Service</li>
                            <li>Rebuilding from fire or water damage</li>
                        </ul>
                        <h2 class="title">Experts Always Ready to Maximizing Products</h2>
                        <div class="blog-desc">
                            <p>
                                Proactively fabricate one-to-one materials via effective e-business. Completely synergize
                                scalable e-commerce rather than high standards in e-services. Assertively iterate resource
                                maximizing products after leading-edge intellectual capital. Capitalize on low hanging fruit
                                to identify a ballpark value added activity to beta test. Override the digital divide with
                                additional clickthroughs from DevOps. Nanotechnology immersion along the information highway
                                will close the loop on focusing solely on the bottom line.
                            </p>
                        </div>
                        <h4 class="sm-title">Experts Always Ready to Maximizing Products</h4>
                        <div class="blog-desc">
                            <p>
                                Interactively procrastinate high-payoff content without backward-compatible data. Quickly
                                cultivate optimal processes and tactical architectures. Completely iterate covalent
                                strategic theme areas via accurate e-markets. Globally incubate standards compliant channels
                                before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled
                                applications. Quickly drive clicks-and-mortar catalysts for change before vertical
                                architectures.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="ps-navigation">
                    <ul>
                        <li><a href="#"><span class="next-link">Next<i class="flaticon-next"></i></span></a></li>
                        <li><a href="#"><span class="link-text">Soundtrack filma Lady Exclusive Music </span></a></li>
                    </ul>
                </div>
                <div class="comment-area">
                    <div class="comment-full">
                        <h3 class="reply-title">Leave a Reply</h3>
                        <p>
                            <span>Your email address will not be published. Required fields are marked </span>
                        </p>
                        <form id="contact-form" method="post"
                            action="https://keenitsolutions.com/products/html/educavo/mailer.php">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-35">
                                    <div class="form-group">
                                        <label>Your comment here...</label>
                                        <textarea cols="40" rows="10" class="textarea form-control" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="submit-btn">
                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
@endsection
