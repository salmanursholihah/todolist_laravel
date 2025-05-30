<?php 

include 'db.php';

$id = $_GET['id'];
mysqli_query ($conn,"UPDATE todos SET is_done=1 WHERE id=$id");

header ("location: index2.php");

?>