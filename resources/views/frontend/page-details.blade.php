@extends('layouts.app')
@section('content')


<!-- Blog Section Start -->
<div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="widget-area">
                    <div class="widget-archives mb-50">
                        <h3 class="widget-title">المشاركات الأخيرة</h3>
                        <ul>
                            <li class="has-submenu">
                                <a href="#">الجامعة بينما يعمل فريق الوادي الجميل</a>
                                <ul class="submenu">
                                    <li><a href="#">تفاصيل إضافية 1</a></li>
                                    <li><a href="#">تفاصيل إضافية 2</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">برنامج المدرسة الثانوية يبدأ قريبًا 2021</a>
                                <ul class="submenu">
                                    <li><a href="#">تفاصيل إضافية 3</a></li>
                                    <li><a href="#">تفاصيل إضافية 4</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">الجامعة بينما يعمل فريق الوادي الجميل</a>
                                <ul class="submenu">
                                    <li><a href="#">تفاصيل إضافية 1</a></li>
                                    <li><a href="#">تفاصيل إضافية 2</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#">برنامج المدرسة الثانوية يبدأ قريبًا 2021</a>
                                <ul class="submenu">
                                    <li><a href="#">تفاصيل إضافية 3</a></li>
                                    <li><a href="#">تفاصيل إضافية 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 pr-50 md-pr-15">
                <div class="blog-deatails">
                    <div class="bs-img">
                        <a href="#">
                            <img class="ima" src="{{ asset('frontend/images/president_speech/1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="blog-full">
                        <div class="widget-area">
                            <div class="recent-posts mb-50 no">
                                <h2 class="widget-title f_shh">الخبراء دائمًا مستعدون لتعظيم المنتجات</h2>
                            </div>
                        </div>
                        <div class="blog-desc mb-35">
                            <p>
                                استغل الأطر المرنة لتقديم ملخص قوي لنظرات عامة عالية المستوى. تعزز النهج التكرارية
                                لاستراتيجية الشركات التفكير التعاوني لزيادة قيمة العرض الإجمالية. نمِّ بشكل عضوي
                                النظرة الشاملة للابتكار المزعزع من خلال تنوع مكان العمل والتمكين. قدم استراتيجيات
                                بقاء مربحة للجميع لضمان الهيمنة الاستباقية. في نهاية اليوم، وفي المستقبل، تطورت
                                القاعدة الجديدة من الجيل X وهي الآن في طريقها نحو حل سحابي موجه. سيكون للمحتوى
                                الذي ينشئه المستخدم في الوقت الفعلي نقاط تواصل متعددة للعمل الخارجي.
                            </p>
                            <div class="course-overview">
                                <div class="inner-box no_2">
                                    <ul class="student-list">
                                        <li>23,564 إجمالي الطلاب</li>
                                        <li><span class="theme_color">4.5</span> <span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star"></span><span
                                                class="fa fa-star"></span><span class="fa fa-star"></span> (1254 تقييم)
                                        </li>
                                        <li>256 مراجعة</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-area">
                            <div class="recent-posts mb-50 no">
                                <h2 class="widget-title f_shh">الخبراء دائمًا مستعدون لتعظيم المنتجات</h2>
                            </div>
                        </div>
                        <ul class="unorder-list mb-20">
                            <li>فائدة الخدمة في البناء الجديد</li>
                            <li>فوائد الخدمة في التجديدات</li>
                            <li>التجديدات التاريخية والترميمات</li>
                            <li>إضافات فائدة الخدمة</li>
                            <li>إعادة البناء من أضرار الحريق أو المياه</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Section End -->
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