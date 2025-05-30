<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM todos ORDER BY id DESC");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Todo List</title>
    <link rel="stylesheet" href="/../style/style_indextodo.css">
</head>


<body>
    <h1>Todo List</h1>
    <p>hello $nama, selamat datang di aplikasi todolist ☺️<br> Mulai todo list
        <a href="backend/add.php">Todo</a>
    </p>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Todo list</th>
                <th>tanggal</th>
                <th>agenda</th>
                <th>deadline</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['task']); ?></td>
                <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                <td><?php echo htmlspecialchars($row['agenda']); ?></td>
                <td><?php echo htmlspecialchars($row['deadline']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="button-edit">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="button-delete"
                        onclick="return confirm('Are you sure?')">Delete</a>
                    <a href="done.php?id=<?= $row['id'] ?>"
                        onclick="return confirm('Tandai tugas ini sebagai selesai?')">Selesai</a>

                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>
<br><br><br>
<?php 
date_default_timezone_set('Asia/Jakarta');

$today = date('Y-m-d');
$reminderLimit = date('Y-m-d', strtotime('+1 day'));

$query = mysqli_query($conn, "SELECT * FROM todos ORDER BY deadline ASC");

while ($task = mysqli_fetch_assoc($query)) {
    $isNearDeadline = (!$task['is_done'] && $task['deadline'] <= $reminderLimit && $task['deadline'] >= $today);

    echo "<div>";
    echo "<strong>{$task['task']}</strong> (Deadline: {$task['deadline']})";
    echo $task['is_done'] ? " ✅ <i>Selesai</i>" : "";

    // Jika mendekati deadline
    if ($isNearDeadline) {
        echo " <span style='color: red;'>⚠️ Segera selesaikan!</span>";
    }

    if (!$task['is_done']) {
        echo " <a href='done.php?id={$task['id']}'>Selesai</a>";
    }

    echo "</div><hr>";
}

?>
<script>
function loadPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => {
            document.getElementById('content').innerHTML = '<p>Halaman gagal dimuat.</p>';
        });
}
</script>