<?php
session_start();
include '../db.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    die("Pengguna tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil Akun</title>
</head>

<body>
    <h1>Profil Pengguna</h1>
    <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>

    <a href="logout.php">Logout</a>
</body>

</html>