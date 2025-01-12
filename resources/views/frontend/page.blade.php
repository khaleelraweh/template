@extends('layouts.app')
@section('content')

<div>
    <!-- Main content Start -->
    <div class="main-content">

        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{ asset('assets/site_settings/placeholder6.jpg') }}" alt="اسم الموقع الافتراضي">
            </div>
            <div class="breadcrumbs-text">
                <h1 class="page-title">قائمة المدونة</h1>
                <ul>
                    <li>
                        <a class="active" href="#">الرئيسية</a>
                    </li>
                    <li>قائمة المدونة</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Course Section Start -->
        <div
            class="rs-popular-courses style1 course-view-style orange-color rs-inner-blog white-bg pt-70 pb-70 md-pt-50 md-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pr-50 md-pr-15">
                        <div class="course-search-part">
                            <div class="course-view-part">
                                <div class="view-icons">
                                    <a href="#" class="view-grid mr-10"><i class="fa fa-th-large"></i></a>
                                    <a href="#" class="view-list"><i class="fa fa-list-ul"></i></a>
                                </div>
                                <div class="view-text">
                                    <div class="search-wrap">
                                        <input type="search" placeholder="بحث..." name="s"
                                            class="search-input form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="type-form">
                                <form method="post" action="#">
                                    <div class="form-group mb-0">
                                        <div class="custom-select-box">
                                            <select id="timing">
                                                <option value="default">الافتراضي</option>
                                                <option value="new">الأحدث</option>
                                                <option value="old">الأقدم</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="course-part clearfix">
                            <!-- Static Post 1 -->
                            <div class="courses-item right">
                                <div class="img-part">
                                    <img class="ima" src="{{ asset('frontend/images/president_speech/1.jpg') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h3 class="title f_sh">عنوان المنشور الثابت 2</h3>
                                    <p class="text f_s">هذا وصف آخر ثابت للمنشور 2 مع نصوص مثالية.</p>
                                    <div class="bottom-part">
                                        <div class="info-meta">
                                            <div class="date">
                                                <i class="fa fa-calendar-check-o"></i>
                                                15 فبراير 2025
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            <a href="#">قراءة المزيد...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Static Post 2 -->
                            <div class="courses-item right">
                                <div class="img-part">
                                    <img class="ima" src="{{ asset('frontend/images/president_speech/1.jpg') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h3 class="title f_sh">عنوان المنشور الثابت 2</h3>
                                    <p class="text  f_s">هذا وصف آخر ثابت للمنشور 2 مع نصوص مثالية.</p>
                                    <div class="bottom-part">
                                        <div class="info-meta">
                                            <div class="date">
                                                <i class="fa fa-calendar-check-o"></i>
                                                15 فبراير 2025
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            <a href="#">قراءة المزيد...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="courses-item right">
                                <div class="img-part">
                                    <img class="ima" src="{{ asset('frontend/images/president_speech/1.jpg') }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h3 class="title f_sh">عنوان المنشور الثابت 3</h3>
                                    <p class="text  f_s">هذا وصف آخر ثابت للمنشور 3 مع نصوص مثالية.</p>
                                    <div class="bottom-part">
                                        <div class="info-meta">
                                            <div class="date">
                                                <i class="fa fa-calendar-check-o"></i>
                                                20 مارس 2025
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            <a href="#">قراءة المزيد...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Course Section End -->
    </div>
    <!-- Main content End -->
</div>

@endsection