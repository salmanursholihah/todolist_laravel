<?php
$host = "localhost";
$user = "root"; 
$pass = "uct02s1";
$db   = "db_todolist";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>