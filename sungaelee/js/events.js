$(document).ready(function() {
    var allEvents = [];
    $(".event").each(function() {
        allEvents.push({
            title: $(this).children(".title").text(),
            start: $(this).children(".date").data('date')
        });
    });

    $(".calendar").fullCalendar({
        events: allEvents
    });
});