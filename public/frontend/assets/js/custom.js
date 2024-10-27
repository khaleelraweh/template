/*================================================
[  Table of contents  ]
==================================================

 1. Home 1
 2. Home 2
 3. Home 3
 4. Home 4
 5. Home 5
 6. Home 6
 7. Home 7
 8. about-us page
 9. about-us second page
 10. product page
 11. Single Product page
 12. second - menu
 13. blog isotope
 14. cart - summary 
 15. contact map js

/*================================================
[ 1 home 1 js  ]
================================================*/

             
$( document ).ready(function() {
        /* progressbar js start*/
            $('.progressbar1').progressBar({
                    shadow : true,
                    percentage : false,
                    animation : true,
            });
            $('.progressbar2').progressBar({
                shadow : true,
                percentage : false,
                animation : true,
                barColor : "#527AF9",
            });
            $('.progressbarPhp').progressBar({
                shadow : true,
                percentage : false,
                animation : true,
                animateTarget : true,
                barColor : "#52ADF9",
            });
            $('.progressbarGit').progressBar({
                shadow : true,
                percentage : false,
                animation : true,
                barColor : "#52ADF9",
            });
            $('.progressbar3').progressBar({
                shadow : true,
                percentage : false,
                animation : true,
                animateTarget : true,
                barColor : "#C3B238",
            }); 
        /* progressbar js end*/
        
       
          
          /* navbar search js start */  
            $('.nav-search').on('click', function (event) {
            event.preventDefault();
                $('.search-block').fadeIn(350);
                $(this).fadeOut(350);
                        
            });
        
            $('.search-close').on('click', function (event) {
                        event.preventDefault();
                $('.search-block').fadeOut(350);
                $('.nav-search').fadeIn(350);
            });
          /* navbar search js end */  
        
          /* cart js start */
            $('.nav-cart').on('click', function (event) {
                  event.preventDefault();
                  $('.cart-block').fadeIn(350);
                  $(this).fadeOut(350);
               });
            
            $('.cart-close').on('click', function (event) {
                  event.preventDefault();
                  $('.cart-block').fadeOut(350);
                  $('.nav-cart').fadeIn(350);
            });
           /* cart js end */  
      
           /*isotope js start */

            "use strict";
            	var $container = $('.portfolio-gal');
            	$container.isotope({
            		itemSelector : '.portfolio-gal .ico-cus',
                    transitionDuration: '0.6s',
                    isOriginLeft: false,
            	});
            	var $optionSets = $('.portfolio-gal-filter'),
            		$optionLinks = $optionSets.find('a');
            	$optionLinks.click(function(){
            		var $this = $(this);
            		// don't proceed if already selected
            		if ( $this.hasClass('active') ) {
            			return false;
            		}
            		var $optionSet = $this.parents('.portfolio-gal-filter');
            		$optionSet.find('.active').removeClass('active');
            		$this.addClass('active');
            	// make option object dynamically, i.e. { filter: '.my-filter-class' }
            	var options = {},
            		key = $optionSet.attr('data-option-key'),
            		value = $this.attr('data-option-value');
            		
            	// parse 'false' as false boolean
            	value = value === 'false' ? false : value;
            	options[ key ] = value;
            		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            		changeLayoutMode( $this, options );
            	} else {
            		// otherwise, apply new options
            		$container.isotope( options );
            	}    
            	return false;
            	});

                /* var $grid = $('.portfolio-gal').isotope({
                });
                     $grid.imagesLoaded().progress(function () {
                        $grid.isotope('layout');
                    });*/

            /*isotope js end */


            /*wow js start */
                      // wow = new WOW(
                      //           {
                      //           boxClass:     'wow',      // default
                      //           animateClass: 'animated', // default
                      //           offset:       0,          // default
                      //           mobile:       true,       // default
                      //           live:         true        // default
                      //         }
                      //         )
                      //         wow.init();

              
             /*  wow = new WOW(
                {
                  animateClass: 'animated',
                  offset:       100,
                  callback:     function(box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                  }
                }
              );
              wow.init(); */
       /*wow js end */

       /**Rellex */
        /* if ($(window).width() > 768) {
            var rellax = new Rellax('.rellax', {
                speed: -2,
                center: true,
                round: true
            });
        }
        else {
        } */
       /**End Rellex */


       /* panel active class */
        jQuery('#accordion .panel-default').on('click', function () {   
        jQuery('#accordion .panel-default').removeClass('actives');
            $(this).addClass('actives'); 
        });    
       /* panel active class */


        /* progressbar second-page js start*/

           /* $( document ).ready(function() {
                  $('.progressbar2').progressBar({
                        shadow : true,
                        percentage : false,
                        animation : true,
                });
                $('.progressbar2').progressBar({
                    shadow : true,
                    percentage : false,
                    animation : true,
                    barColor : "#527AF9",
                });
                $('.progressbarPhp').progressBar({
                    shadow : true,
                    percentage : false,
                    animation : true,
                    animateTarget : true,
                    barColor : "#52ADF9",
                });
                $('.progressbarGit').progressBar({
                    shadow : true,
                    percentage : false,
                    animation : true,
                    barColor : "#52ADF9",
                });
                $('.progressbar3').progressBar({
                    shadow : true,
                    percentage : false,
                    animation : true,
                    animateTarget : true,
                    barColor : "#C3B238",
                });
            });
*/
           /* progressbar second-page js end*/

           /*owl carousel js satrt */
      $('#owl-demo-one').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        items: 1,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 5000,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });


       /* $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('.header-sticky').addClass("sticky");
        } else {
            $('.header-sticky').removeClass("sticky");
        }
    });
        
      $('#showlogin').on('click', function () {
        $('#checkout-login').slideToggle();
    });
     $('#cbox').on('click', function () {
        $('#cbox_info').slideToggle();
    });
     $('#ship-box').on('click', function () {
        $('#ship-box-info').slideToggle();
    });*/

    $("#feed-show").fadeOut(0);
    $(" #cart").on('click', function() {
    
        $(".feed").fadeOut(1000,function(){
            $("#feed-show").fadeIn(1000);
        });
    });
    
    $('.posi-search').click(function () {
        $(".cart-close").trigger("click");
        $('.posi-search').show();
    });
	$(".sidebar-menu").niceScroll({
	    railalign: 'right',
	    autohidemode: 'false',
	});



/*================================================
[ 1 home 1 js  end ]
================================================*/


/*================================================
[  2 home 2 js  start ]
================================================*/



/*================================================
        [  home 2 product slider start ]
================================================*/

    $('#product-slider-all').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        items: 1,
        rtl: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 5000,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true,
                loop: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });

    var owl = $('#index2-owl-demo-one');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        rtl: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

/*================================================
        [  home 2 product slider end ]
================================================*/


/*================= parallax js start==============*/
 $(function () {
     $('[data-paroller-factor]').paroller();
     $('.paroller').paroller({
         factor: 0.4,
         type: 'foreground'
     });
     
 });
/*================= parallax js end==============*/



/*================================================
[ 2 home 2 js  end ]
================================================*/




/*================================================
[  3 home 3 js  start ]
================================================*/


    /*============ Home 3 main slider start=================*/
    var owl = $('#banner-slider-3');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            rtl: true,
            responsiveClass: true,
            items: 1,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            dots:false,
            singleItem : true,
            transitionStyle : "fadeUp"
        });
    /*============ Home 3 main slider end=================*/



    /*============ Home 3 review slider start ============*/

    var owl = $('#home3-review-slider');
        owl.owlCarousel({
            loop: true,
            responsiveClass: true,
            items: 3,
            nav: true,
            rtl: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            
            responsive:{
        0:{
            items:1
        }	,
                569:{
                    items:2
                },
        768:{
            items:3
        }
            }
    });
    $("#home3-review-slider .owl-prev").html('<span class="ti-angle-left"></span>');
    $("#home3-review-slider .owl-next").html('<span class="ti-angle-right"></span>');



    /*============ Home 3 review slider end ============*/



    /*============ Home 3 best-design-slider start ============*/
    var owl = $('#best-design-slider-3');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            items: 1,
            nav: true,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 5000,
            dots:false
        });

        $( "#best-design-slider-3 .owl-prev").html('<span class="ti-angle-left"></span>');
        $( "#best-design-slider-3 .owl-next").html('<span class="ti-angle-right"></span>');

    /*============ Home 3 best-design-slider end ============*/

    /*============ Home 3 counter start ============*/

    $('.project-count').each(function() {
        var $this = $(this),
        countTo = $this.attr('data-count');

        $({ countNum: $this.text()}).animate({
            countNum: countTo
        },
        {

        duration: 5000,
            easing:'linear',
            step: function() {
            $this.text(Math.floor(this.countNum));
        },
            complete: function() {
            $this.text(this.countNum);
            //alert('finished');
        }

        });  

    });
    /*============ Home 3 counter end ============*/

    var owl = $('#customer-reviews-slider-3');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            items: 1,
            rtl: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 50000,
            dots:false

        });

        $( "#customer-reviews-slider-3 .owl-prev").html('<span class="ti-angle-left"></span>');
        $( "#customer-reviews-slider-3 .owl-next").html('<span class="ti-angle-right"></span>');


    /*============ Home 3 brand-main-home3-slider start ============*/
    var owl = $('#brand-main-home3');
        owl.owlCarousel({
            loop:true,
            nav:false,
            rtl: true,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },            
                960:{
                    items:4
                },
                1200:{
                    items:4
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    /*============ Home 3 brand-main-home3-slider end ============*/

    /*============ Home 3 brand-main-home3-slider start ============*/
    var owl = $('#brand-main-home6');
        owl.owlCarousel({
            loop:true,
            nav:false,
            margin:10,
            dots:false,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 3000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },            
                960:{
                    items:4
                },
                1200:{
                    items:5
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    /*============ Home 3 brand-main-home3-slider end ============*/





    /*================================================
    [  3 home 3 js  end ]
    ================================================*/






    /*================================================
    [ 4 home 4 js  start ]
    ================================================*/

    $("#testimonial-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        rtl: true,
        slideSpeed: 100,
        dots: true,
        transitionStyle: "fadeUp",
        autoplay: true,
        autoplayTimeout: 2000,
        dots:true,
        autoplaySpeed: 3000
    });
    $("#feature-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        slideSpeed: 100,
        dots: true,
        rtl: true,
        transitionStyle: "fadeUp",
        autoplay: true,
        autoplayTimeout: 2000,
        dots:true,
        autoplaySpeed: 3000
    });

    var owl = $('#create-websites-slider');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            items: 1,
            rtl: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            dots:false

        });

        $( "#create-websites-slider .owl-prev").html('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
        $( "#create-websites-slider .owl-next").html('<i class="fa fa-arrow-left" aria-hidden="true"></i>');

    // Slick Slider Start
    if ($('.slider-for').length > 0)
    {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            rtl: true,
            asNavFor: '.vertical-center'
        });
    }


    if ($('.vertical-center').length > 0) {
        $('.vertical-center').slick({
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplayTimeout: 200,
            autoplay: true,
            asNavFor: '.slider-for',
            dots: false,
            rtl: true,
            centerMode: true,
            prevArrow: false,
            nextArrow: false,
            focusOnSelect: true,
            centerMode: true,
            centerPadding: '0px',
            responsive: [
            
            {
            breakpoint: 568,
            settings: {
                slidesToShow: 1
            }
            }
        ]
        });
    }
    // Slick Slider End

            // wow animatation

    // when the dom is ready
    jQuery(function($){
        // grab each slider (multiple supported)    
        $('.cover-slider').each(function(){
        // find the slides in this slider
            var $slides = $(this).find('.cover-slider__slide');
        // get the 0 based amount of slides
            var numSlides = $slides.length - 1;
        // incrementor
            var i = 0;
            
            // rotate slides
            var rotate = function(){
                // remove all sliding classes
                $slides.removeClass('active inactive');
                // add inactive to the current slide
                $slides.eq(i).addClass('inactive');
                // reset counter if last slide (so animates first one)
                if(i == numSlides){
                    i = -1;
                }
                // add active to incremented slide (next slide)
                $slides.eq(++i).addClass('active');
                // call this every few seconds
                var timer = window.setTimeout(rotate, 5000);
            };
            // initialize the slider
            rotate();
        });
    });
    /*================================================
    [  4 home 4 js  end ]
    ================================================*/


    


    /*================================================
    [ 8 about-us page  js  start ]
    ================================================*/
    var owl = $('#owl-demo-two');
    owl.owlCarousel({
        loop:true,
        nav:false,
        dots:false,
        rtl: true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },            
            960:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
    /*================================================
    [  8 about-us page js  end ]
    ================================================*/

    /*================================================
    [  9 about-us page  js  start ]
    ================================================*/
    var owl2 = $('#owl-client-reviews');
    owl2.owlCarousel({
        loop: true,
        nav: false,
        rtl:true,
        dots: false,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            960: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });
    owl2.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY > 0) {
            owl2.trigger('next.owl');
        } else {
            owl2.trigger('prev.owl');
        }
        e.preventDefault();
    });
    /*================================================
    [  9 about-us page js  end ]
    ================================================*/

    /*================================================
    [  10 product feature carousel start ]
    ================================================*/
    $('.product-feature-carousel').owlCarousel({
        thumbs: true,
        thumbsPrerendered: true,
        slideBy: 1,
        items: 1,
        rtl: true,  
        dots: false,
    });
    /*================================================
    [  10 product feature carousel end ]
    ================================================*/

    /*================================================
    [  11 Single Product Selectric start ]
    ================================================*/
    if ($('.shipping-address-detail select').length > 0) {
        $('.shipping-address-detail select').selectric({
            disableOnMobile: false
        });
    }
    /*================================================
    [  11 Single Product Selectric end ]
    ================================================*/



    /*================================================
    [  11 Single Product slider start ]
    ================================================*/

    var owl2 = $('#single-product-slider');
    owl2.owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        rtl: true,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            569: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    });
    $("#single-product-slider .owl-prev").html('<span class="ti-angle-left"></span>');
    $("#single-product-slider .owl-next").html('<span class="ti-angle-right"></span>');
    owl2.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY > 0) {
            owl2.trigger('next.owl');
        } else {
            owl2.trigger('prev.owl');
        }
        e.preventDefault();
    });


    /*================================================
    [ 11 Single Product slider start ]
    ================================================*/



    /*================================================
    [  12 second-menu start ]
    ================================================*/
    $('.search-open-custom').on('click', function (e) {
        e.preventDefault();
        $("#search-wrapper").removeClass('hidden');
        $('.search-open-custom').addClass('hidden');
        $('#search-bar').focus();


        $(document).mouseup(function (e) {
            var container = $("#search-wrapper");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('#search-wrapper').addClass('hidden');
                $('.search-open-custom').removeClass('hidden');
            }
        });
    })

    $('#close-search').on('click', function (e) {
        e.preventDefault();
        $('#search-wrapper').addClass('hidden');
        $('.search-open-custom').removeClass('hidden');
    })

    $('#search-go').on('click', function (e) {
        e.preventDefault();
        var searchString = $('#search-bar').val().replace(' ', '%20');
    });


    $('.mobile-burger a').click(function (e) {
        e.preventDefault();
        $('.mobile-burger').toggleClass('open');
        $('.sidebar-menu').toggleClass('open');
        $('.mobile-header .logo').toggleClass('open');
    });
    $('.theme-template .header-cus ul.nav.cus-group li.berger-menu-custom .sidebar-menu .side-menu ul li a').click(function (e) {
        e.preventDefault();
        $('.mobile-burger').removeClass('open');
        $('.sidebar-menu').removeClass('open');
    });

    if ($(window).width() < 767) {
        $("body").off("click", "li.cart-open").on("click", "li.cart-open", function () {
            console.log("click");
            $(this).toggleClass("open");
        });
    }
    /*================================================
    [  12 second-menu end ]
    ================================================*/

    /*================================================
    [13 blog isotope js start]
    ================================================*/
    
    $('.masonary-blog').isotope({
        // options...
        itemSelector: '.masonary-blog .image-masonry',
        isOriginLeft: false
        // masonry: {
        //   columnWidth: 200
        // }
    });

                var $grid = $('.masonary-blog').isotope({
                });
                 $grid.imagesLoaded().progress(function () {
                    $grid.isotope('layout');
                });

    
    var owl = $('.blog-list-slider');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        nav: true,
        rtl: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    /*================================================
    [ 13 blog isotope js  end ]
    ================================================*/

    /*================================================
    [  14 cart-summary js  start ]
    ================================================*/

    //quentity start
    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function (e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });


    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function () {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
        //quentity end
    /*================================================
    [  14 cart-summary js  end ]
    ================================================*/
    /*================================================
    [  15 contact map js  start ]
    ================================================*/

    /* Gmap Start */
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 15,

            // The latitude and longitude to center the map (always required)
           center: new google.maps.LatLng(-37.81298, 144.9589213),
            content: "388-A , Road no 22, Jubilee Hills, Hyderabad Telangana, INDIA-500033", // New York
            
            
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{
                "featureType": "landscape",
                "stylers": [{ "saturation": -100 }, { "lightness": 65 }, { "visibility": "on" }]
            },
            { "featureType": "poi", "stylers": [{ "saturation": -100 }, { "lightness": 51 }, { "visibility": "simplified" }] },
            { "featureType": "road.highway", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] },
            { "featureType": "road.arterial", "stylers": [{ "saturation": -100 }, { "lightness": 30 }, { "visibility": "on" }] },
            { "featureType": "road.local", "stylers": [{ "saturation": -100 }, { "lightness": 40 }, { "visibility": "on" }] },
            { "featureType": "transit", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] },
            { "featureType": "administrative.province", "stylers": [{ "visibility": "off" }] },
            { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "lightness": -25 }, { "saturation": -100 }] },
            {
                "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#ffff00" }, { "lightness": -25 }, { "saturation": -97 }]
            }]
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');
        var icon = 'assets/images/map-marker.png';

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-37.81298, 144.9589213),
            map: map,
            icon: icon,
        });



       // infowindow.open(map, marker);

    }
        /* Gmap End */
    /*================================================
    [  15 contact map js  end ]
    ================================================*/
   

    /*================================================
    [  16 portfolio js  start ]
    ================================================*/
    // Masonry
    $('.masonary-blog').isotope({
        // options...
        itemSelector: '.masonary-blog .image-masonry',
        // masonry: {
        //   columnWidth: 200
        // }
    });
    /*================================================
    [  16 portfolio js  end ]
    ================================================*/
    $('.btn-settings').on('click', function () {
        $(this).parent().toggleClass('active');
    });

    $('.switch-handle').on('click', function () {
        $(this).toggleClass('active');
        $('.outer-wrapper').toggleClass('boxed');

    });

    $('.bg-list div').on('click', function () { 
        if ($(this).hasClass('active')) return false;
        if (!$('.switch-handle').hasClass('active')) $('.switch-handle').trigger('click');

        $(this).addClass('active').siblings().removeClass('active');
        var cl = $(this).attr('class');
        $('body').attr('class', cl);
    });

    $('.color-list div').on('click', function () {
        if ($(this).hasClass('active')) return false;

        $('link.color-scheme-link').remove();

        $(this).addClass('active').siblings().removeClass('active');
        var src = $(this).attr('data-src'),
            colorScheme = $('<link class="color-scheme-link" rel="stylesheet" />');

        colorScheme
            .attr('href', src)
            .appendTo('head');
    });
     /*================================================
     [  product list js  start ]
     ================================================*/
    function getVals() {
        // Get slider values
        var parent = this.parentNode;
        var slides = parent.getElementsByTagName("input");
        var slide1 = parseFloat(slides[0].value);
        var slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            var tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        var displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " -$" + slide2 + "";
    }

    window.onload = function () {
        // Initialize Sliders
        var sliderSections = document.getElementsByClassName("range-slider");
        for (var x = 0; x < sliderSections.length; x++) {
            var sliders = sliderSections[x].getElementsByTagName("input");
            for (var y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }
    $('.filter-btn-rpoduct').click(function () {
        $('.filter-open').toggle('slow');
    });
     /*================================================
     [  product list js  end ]
     ================================================*/
    /*================================================
    [  loader  js  start ]
    ================================================*/

    $(document).ready(function () {
        $(".bookshelf_wrapper").fadeOut("slow");
        //$("#productSlider").height();
    })
    
    /*================================================
    [  loader 7 js  end ]
    ================================================*/

}); 
   /*================================================
    [  home 7 js  start ]
     ================================================*/
    $(document).ready(function () {
        if ($('.Modern-Slider').length > 0) {
        $(".Modern-Slider").slick({
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnHover: false,
            dots: true,
            pauseOnDotsHover: true,
            cssEase: 'linear',
            draggable: false,
            arrows: false,
            rtl: true
        });
    }
    });

    /*================================================
    [  home 7 js  end ]
    ================================================*/

$(document).ready(function () {
    if ($('.rellax').length > 0) {
var rellax = new Rellax('.rellax');
    }
    /*================================================
    [ objectFit start]
    ================================================*/
    objectFitImages(); 

    /*================================================
    [ objectFit js end]
    ================================================*/
    /*jQuery(document).ready(function($) {
      $('.right-slider-img-full').height($(window).height());
 });*/
 console.log($("#productSlider").height());
    setTimeout(function(){

    },500)
      $('.left-slider-img-full img').height($(".right-slider-img-full").height()+ 170);

      var $grid = $('.portfolio-gal').imagesLoaded( function() {
      // init Masonry after all images have loaded
                             $grid.isotope('layout');/* $grid.masonry({
            // options...
          });*/
        });

    // Dissabled Inspect Element And Cut, Copy, Paste
    //Disable cut copy paste
         $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });
    //Disable mouse right click
      $("body").on("contextmenu", function (e) {
        return false;
    });

    $(document).keydown(function (event) {
        var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();

        if (event.ctrlKey && (pressedKey == "c" || pressedKey == "u")) {
            alert('Sorry, This Functionality Has Been Disabled!');
            //disable key press porcessing
            return false;
        }
    }); 
    /* if ($('.preview-main-banner .hero-section .hero-content a').length > 0) { */
        $.scrollIt({
            upKey: 38, // key code to navigate to the next section
            downKey: 40, // key code to navigate to the previous section
            easing: 'linear', // the easing function for animation
            scrollTime: 600, // how long (in ms) the animation takes
            activeClass: 'active', // class given to the active nav element
            onPageChange: null, // function(pageIndex) that is called when page is changed
            topOffset: -80 // offste (in px) for fixed top navigation
        });
   /*  }  */
    $('.theme-template .header-cus ul.nav.navbar-nav li a').click(function (e) {
        $('.navbar-collapse').toggleClass('in');
        $('.navbar-toggle').addClass('collapsed');
        e.preventDefault();
    });
});


