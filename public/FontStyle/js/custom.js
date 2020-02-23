$(document).ready(function() {
    $('.card-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left"><i class="fal fa-angle-left"></i></span>',
    });




    $('.product-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',


    });

    $('.Comparison-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',
    });








    $("#slider-range").slider({
        range: true,
        min: 50000,
        max: 650000,
        values: [75, 300],
        slide: function(event, ui) {
            $("#amount").val("BDT: " + ui.values[0] + " - BDT: " + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
})

$(window).on('load', function() {
    $('.product-slider1').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<span class="right-round"><i class="fal fa-angle-right"></i></span>',
        nextArrow: '<span class="left-round"><i class="fal fa-angle-left"></i></span>',


    });
});