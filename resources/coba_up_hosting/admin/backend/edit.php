<?php
include 'db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM todos WHERE id=$id");
$todo = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $agenda = $_POST['agenda'];
    $tanggal = $_POST['tanggal'];
    $deadline = $_POST['deadline'];
    $is_done = $_POST['is_done'];
    mysqli_query($conn, "UPDATE todos SET task='$task', agenda= '$agenda',tanggal='$tanggal', deadline='$deadline', is_done='$is_done' WHERE id=$id");
    header("Location: indextodo.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form edit</title>
    <link rel="stylesheet" href="/../style/style_edit_backend.css">
</head>

<body>
    <form method="POST">
        <input type="text" name="task" value="<?php echo htmlspecialchars($todo['task']); ?>" required>
        <input type="text" name="agenda" value="<?php echo htmlspecialchars($todo['agenda']); ?>" required>
        <input type="text" name="tanggal" value="<?php echo htmlspecialchars($todo['tanggal']); ?>" required>
        <input type="text" name="deadline" value="<?php echo htmlspecialchars($todo['deadline']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>