jQuery(document).ready(function($) {
    $(".zoom").click(function() {
        $("body").addClass("unscrollable");
        $(this).parents(".media").children(".focus-container").show();

        // prevent link redirect
        return false;
    });

    // close on focus container or the close button
    $(".close, .focus-container").click(function() {
        $(".focus-container").hide();
        $("body").removeClass("unscrollable");
    });

    // don't close if clicking in the focus box
    $(".focus").click(function() {
        return false;
    });
});
