<?php
// include 'db.php';
// $result = mysqli_query($conn, "SELECT * FROM todos ORDER BY id DESC");

// if (!isset($showeditedelete)){
//     $shoeeditedelete = true;
// }

    ?>

<?php


if(!isset($_session['id'])){
    header('location:login.php');
    exit;
}

$id =$_SESSION['id'];

$conn = new mysqli('localhost', 'root', 'uct02s1','db_todolist');

if ($conn ->connect_error){
    die("connection_sailed:" .$conn->connect_error);
    
}

$sql = "SELECT * FROM todos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$todos = [];
while ($row = $result->fetch_assoc()) {
    $todos[] = $row;
}

$stmt->close();
$conn->close();

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Todo List</title>
    <link rel="stylesheet" href="/../style_todo_public.css">
</head>

<body>
    <h1>Todo List</h1>
    <p> selamat datang di aplikasi todolist ☺️<br> Mulai todo list
        <a href="#" onclick="loadPage('add.php')">Tambah Todo</a>

    </p>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Todo list</th>
            <th>tanggal</th>
            <th>agenda</th>
        </tr>
        </tr>
        <tbody>
            <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['task']); ?></td>
                <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                <td><?php echo htmlspecialchars($row['agenda']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>
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