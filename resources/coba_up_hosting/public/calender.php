<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calender</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
</head>
<style>
#calendar {
    max-width: 900px;
    margin: 40px auto;
}
</style>



<body>
    <div id="calendar">

    </div>
</body>

</html>

<script>
document.getElementById('DOMContent', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.calendar(calendarEl, {
        initialView: 'dayGriMonth',
        events: [{

            title: 'contoh event',
            start: '01-01-2000',
        }]
    });
    calendar.render();
});
</script>