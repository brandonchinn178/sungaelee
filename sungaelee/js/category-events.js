jQuery(document).ready(function($) {
    var allEvents = [];
    $(".event").each(function() {
        allEvents.push({
            title: $(this).find(".title a").text(),
            start: $(this).find("span.date").data('date'),
            url: $(this).data("permalink")
        });
    });

    $(".calendar").fullCalendar({
        events: allEvents,
        height: $(".calendar").height(),
        eventMouseover: function(event, jsEvent) {
            $("<div>").addClass("popup")
                        .text(event.title)
                        .appendTo($(this).parent());
            console.log(event.backgroundColor);
        },
        eventMouseout: function() {
            $(".calendar .popup").remove();
        }
    });
});