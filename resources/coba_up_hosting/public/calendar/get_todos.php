<!---get_todos.php
<?php
require '../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'];
$date = $data['date'];

$stmt = $pdo->prepare("INSERT INTO todoscal (title, date) VALUES (?, ?)");
$stmt->execute([$title, $date]);

echo json_encode(['success' => true]);