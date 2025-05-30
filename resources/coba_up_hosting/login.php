<?php
include 'db.php';
session_start();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $data['role'];

        if ($data['role'] === 'admin') {
            header("Location: admin/index.php");
        } else if ($data['role'] === 'user') {
            header("Location: public/index.php");
        } else {
            echo "Role tidak dikenali.";
        }
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>
<link rel="stylesheet" href="style/login_style.css">
<div class="form-container">
    <form method="post">
        <h2>Form Login</h2>
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required> <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required> <br>
        <button type="submit" name="login">Login</button>
        <br><br><br>
        <a href="register.php">apakah anda belum punya akun?</a>
    </form>
</div>