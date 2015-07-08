$(document).ready(function() {
    var allEvents = [];
    $(".event").each(function() {
        allEvents.push({
            title: $(this).find(".title a").text(),
            start: $(this).find("span.date").data('date'),
            url: $(this).data("permalink")
        });
    });

    $(".calendar").fullCalendar({
        events: allEvents
    });
});