<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $agenda = $_POST['agenda'];
    $tanggal = $_POST['tanggal'];
    $deadline = $_POST['deadline'];
    $is_done = $_POST['is_done'];
    mysqli_query($conn, "INSERT INTO todos (task,agenda,tanggal,deadline) VALUES ('$task','$agenda','$tanggal','$deadline')");
    header("Location: indextodo.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah todolist</title>
    <link rel="stylesheet" href="/../style/style_add_backend.css">
</head>

<body>
    <form method="POST">
        <h3> form todo </h3>
        <input type="text" name="task" required placeholder="New Task">
        <input type="text" name="tanggal" required placeholder="input date">
        <input type="text" name="agenda" required placeholder="new agenda">
        <input type="text" name="deadline" required placeholder="waktu deadline">
        <button type="submit">Add</button>
    </form>
</body>

</html>