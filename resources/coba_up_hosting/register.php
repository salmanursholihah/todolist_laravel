<?php
include 'db.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        echo $insert ? "Pendaftaran berhasil!" : "Gagal daftar!".mysqli_error($conn);
        header("location: login.php");
    }

}

?>

<link rel="stylesheet" href="style/register_style.css">
<div class="form-container">
    <h2>Form Registrasi</h2>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>

        <button type="submit" name="register">Register</button>
        <br><br><br>
        <a href="login.php">apakah anda sudah punya akun? </a>
    </form>

</div>