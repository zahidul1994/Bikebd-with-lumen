$(document).ready(function () {
    $('.card-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
    });




    $('.product-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]


    });

    $('.Comparison-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]
    });








    $("#slider-range").slider({
        range: true,
        min: 50000,
        max: 650000,
        values: [75, 300],
        slide: function (event, ui) {
            $("#amount").val("BDT " + ui.values[0] + " - BDT " + ui.values[1]);
        }
    });
    $("#amount").val("BDT " + $("#slider-range").slider("values", 0) +
        " - BDT " + $("#slider-range").slider("values", 1));





    $('.compitor-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="tc-right"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="tc-left"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
         responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]

    });




    $('.recently-product').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="rv-right"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="rv-left"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
         responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]

    });
    
    
    
    
    
//    recent slider
    
    
      $('.recent-slide').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="rcnt-right"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="rcnt-left"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
         responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]

    });
    
    
    
    
    
    
//    Competitor slider
    
        
      $('.Competitor-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="cmpt-right"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="cmpt-left"><i class="fal fa-angle-left"></i></span>',
        autoplay: true,
        autoplaySpeed: 2000,
         responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
    },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
    },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
    }
  ]

    });
    
    
    
    
    
    



   $(".ask-form").click(function () {
        $(".ask-form").addClass("form-active")
    });
    






})

















