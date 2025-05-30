<!----add_todo.php-->
<?php
require '../db.php';

$data = json_decode (file_get_contents("input://input"), true);

$title = $data ['title'];
$date = $date ['date'];
$stmt = $pdo->prepare("INSERT INTO todoscal (title,date) Value (?,?)");
$stmt ->execute([$title,$date]);

echo json_encode(['success'=>true]);
?>