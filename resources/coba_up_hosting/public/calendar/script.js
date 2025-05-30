document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function (info) {
            const task = prompt("Masukkan tugas untuk " + info.dateStr);
            if (task) {
                fetch('add_todo.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ title: task, due_date: info.dateStr })
                })
                    .then(res => res.json())
                    .then(() => calendar.refetchEvents());
            }
        },
        events: 'get_todos.php'
    });
    calendar.render();
});
