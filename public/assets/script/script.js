// document.addEventListener('DOMContentLoaded', function () {
//     const calendarEl = document.getElementById('calendar');
//     const calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: 'dayGridMonth',
//         selectable: true,
//         dateClick: function (info) {
//             const task = prompt("Masukkan tugas untuk " + info.dateStr);
//             if (task) {
//                 fetch('add_todo.php', {
//                     method: 'POST',
//                     headers: { 'Content-Type': 'application/json' },
//                     body: JSON.stringify({ title: task, due_date: info.dateStr })
//                 })
//                     .then(res => res.json())
//                     .then(() => calendar.refetchEvents());
//             }
//         },
//         events: 'get_todos.php'
//     });
//     calendar.render();
// });

// // function loadContent(path) {
// //   fetch(path)
// //     .then(response => {
// //       if (!response.ok) throw new Error("Gagal memuat " + path);
// //       return response.text();
// //     })
// //     .then(html => {
// //       document.getElementById("content").innerHTML = html;
// //     })
// //     .catch(error => {
// //       document.getElementById("content").innerHTML = "<p style='color:red'>" + error.message + "</p>";
// //     });
// // }


// function initCalendar(){
//     const calendarEl = document.getElementById('calendar');
//     if(!calendarEl)return;

//     const calendar = new FullCalendar(calendarEl, {
//         initialView : 'dayGridMonth',
//     });
//     calendar.render();
// }


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        }
    });