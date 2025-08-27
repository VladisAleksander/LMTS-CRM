$(document).ready(function() {
    $(".fancybox").fancybox({
        padding: 0,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

    $("#range-slider-1").ionRangeSlider({
        min: 0,
        max: 100,
        from: 30,
        hide_min_max: true,
        hide_from_to: true
    });

    $("#range-slider-2").ionRangeSlider({
        min: 0,
        max: 100,
        from: 30,
        hide_min_max: true,
        hide_from_to: true
    });

    $("#range-slider-3").ionRangeSlider({
        min: 0,
        max: 100,
        from: 30,
        hide_min_max: true,
        hide_from_to: true
    });

    $("#range-slider-4").ionRangeSlider({
        min: 0,
        max: 100,
        from: 30,
        hide_min_max: true,
        hide_from_to: true
    });

});