jQuery(document).ready(function($) {
    // enable javascript youtube api on iframe elements
    $("iframe").attr("src", $("iframe").attr("src") + "&enablejsapi=1");

    // show popup on click
    $(".zoom").click(function() {
        $("body").addClass("unscrollable");
        $(this).parents(".media").children(".focus-container").show();

        // prevent link redirect
        return false;
    });

    // close on focus container or the close button
    $(".close, .focus-container").click(function() {
        var container = $(this);
        if (!container.hasClass("focus-container")) {
            container = $(this).parents(".focus-container");
        }

        var iframe = container.find("iframe");
        if (iframe.length > 0) {
            // pause video
            container.find("iframe").get(0).contentWindow.postMessage(JSON.stringify({
                "event": "command",
                "func": "pauseVideo"
            }), "*");
        }

        container.hide();
        $("body").removeClass("unscrollable");
    });

    // don't close if clicking in the focus box
    $(".focus").click(function() {
        return false;
    });
});
