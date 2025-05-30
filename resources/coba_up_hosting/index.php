<?php
// session_start();
// if (isset($_SESSION['username'])) {
//     header("Location: index2.php");
//     exit;
// }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Welcome to MyTodoList</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Optional -->
</head>

<body>
    <header style="text-align: center;">
        <h1>MyTodoList</h1>
        <p>Mengelola tugas harianmu jadi lebih mudah dan menyenangkan.</p>
    </header>

    <section style="text-align: center; margin-top: 20px;">
        <img src="assets/todolist.png" alt="Todo Illustration" width="300">
        <h2>Fitur Unggulan</h2>
        <ul style="list-style: none;">
            <li>📝 Tambah & atur tugas dengan mudah</li>
            <li>📆 Reminder harian</li>
            <li>📊 Statistik produktivitas</li>
        </ul>
    </section>

    <div style="text-align: center; margin-top: 30px;">
        <a href="login.php">Login</a> |
        <a href="register.php">Daftar Sekarang</a>
    </div>
</body>

</html>