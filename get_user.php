<?php
include 'db.php';

$id = (int)$_POST['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
echo json_encode($result->fetch_assoc());
