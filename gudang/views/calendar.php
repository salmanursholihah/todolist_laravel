<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar with Todo</title>

    <!-- FullCalendar CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" /> -->

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


    <style>
    #calendar {
        max-width: 900px;
        margin: 40px auto;
    }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Calendar untuk Daftar Tugas</h1>
    <div id="calendar"></div>

    <!-- FullCalendar JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/index.global.min.js"></script> -->

    <!-- Script JS milikmu -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');

        if (calendarEl) {
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/calendar/events', // Pastikan endpoint ini tersedia
            });
            calendar.render();
        } else {
            console.error('Element #calendar tidak ditemukan');
        }
    });
    </script>
</body>