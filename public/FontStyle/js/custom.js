$(document).ready(function () {
 
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



   $(".ask-form").click(function () {
        $(".ask-form").addClass("form-active")
    });
    






})

















