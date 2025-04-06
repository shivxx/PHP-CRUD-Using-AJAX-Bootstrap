<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$location = $_POST['location'];

$sql = "INSERT INTO users (name, email, mobile, location) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $mobile, $location);

if ($stmt->execute()) {
    echo "<div class='alert alert-success'>User added successfully.</div>";
} else {
    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
}
?>
