<?php
include 'db.php';
$id =$_GET['id'];
mysqli_query ($conn, "DELETE FROM todos  WHERE id=$id");
header ("location:indextodo.php");

?>