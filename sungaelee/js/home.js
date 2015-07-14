var WAIT_TIME = 7; // in seconds
var SLIDE_TIME = 1; // in seconds

jQuery(document).ready(function($) {
    if ($(".slide").length > 1) {
        var OFFSET = $(".slideshow").width();

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
    }
});