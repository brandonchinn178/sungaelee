var WAIT_TIME = 7; // in seconds
var SLIDE_TIME = 1; // in seconds
var OFFSET;

jQuery(document).ready(function($) {
    if ($(".slide").length > 1) {
        OFFSET = $(".slideshow").width();

        var nextSlide = function() {
            var first = $(".slide").first();
            var second = first.next();

            first.animate({
                left: "-" + OFFSET
            }, {
                duration: SLIDE_TIME * 1000,
                complete: function() {
                    $(this).css("left", "0").appendTo(".slideshow");
                }
            });

            second.animate({
                left: "-" + OFFSET
            }, {
                duration: SLIDE_TIME * 1000,
                complete: function() {
                    $(this).css("left", "0");
                }
            });
        };

        setInterval(nextSlide, WAIT_TIME * 1000);

        // if the user resizes the window, update OFFSET
        $(window).resize(function() {
            OFFSET = $(".slideshow").width();
        });
    }
});