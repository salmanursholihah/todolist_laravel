<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../db.php';

// Cek apakah user login
if (!isset($_SESSION['username'])) {
    die("Anda belum login.");
}

$username = $_SESSION['username'];

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    $tanggal = $_POST['tanggal'];
    $agenda = $_POST['agenda'];
    $deadline = $_POST['deadline'];

    // Simpan ke database
    $insertQuery = "INSERT INTO todos (task, tanggal, agenda, deadline, create_by)
                    VALUES ('$task', '$tanggal', '$agenda', '$deadline', '$username')";

    if (mysqli_query($conn, $insertQuery)) {
        header("Location: index.php");
        exit(); // 🚨 WAJIB agar redirect berjalan
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
        exit;
    }
}

// Ambil data todos
$selectQuery = mysqli_query($conn, "SELECT * FROM todos WHERE create_by = '$username' ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Todo</title>
    <link rel="stylesheet" href="/../style/styleplusplus.css">
</head>

<body>
    <form method="POST" id="todo_form">
        <input type="text" name="task" placeholder="Tugas" required>
        <input type="date" name="tanggal" required>
        <input type="text" name="agenda" placeholder="Agenda" required>
        <input type="date" name="deadline" required>
        <button type="submit">Tambah Todo</button>
    </form>


    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Todo</th>
                <th>Tanggal</th>
                <th>Agenda</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($selectQuery)): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['task']) ?></td>
                <td><?= htmlspecialchars($row['tanggal']) ?></td>
                <td><?= htmlspecialchars($row['agenda']) ?></td>
                <td><?= htmlspecialchars($row['deadline']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>
<script>
document.getElementById('todo_form').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('add_todo_proses.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            if (data.trim() === 'sukses') {
                alert('Todo berhasil ditambahkan!');
                loadPage('todo_list.php');
            } else {
                alert('Gagal menambahkan todo:\n' + data);
            }
        })
        .catch(err => alert('Error: ' + err));
});
</script>