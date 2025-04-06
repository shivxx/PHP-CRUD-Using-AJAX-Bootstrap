<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$location = $_POST['location'];

$sql = "UPDATE users SET name=?, email=?, mobile=?, location=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $email, $mobile, $location, $id);

if ($stmt->execute()) {
    echo "<div class='alert alert-info'>User updated successfully.</div>";
} else {
    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
}
?>
