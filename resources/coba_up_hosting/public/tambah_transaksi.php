<?php 

include 'db.php';

$date=$_POST['date'];
$description=$_POST['description'];
$type=$_POST['type'];
$amount=$_POST['amount'];

$conn->query("INSERT INTO keuangan(date,description,type,amount)VALUES ('$date','$description','$type',$amount)");
header("location:keuangan.php");

// if($conn->query($sql)===true){
//     echo "success";
// }else if($error){
//     echo "error:".$conn->error;
// }else{
//     echo "error:data tidak lengkap";
// }
?>