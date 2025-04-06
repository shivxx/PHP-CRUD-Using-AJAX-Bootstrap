<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Step 1: Delete the record
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === TRUE) {

        // Step 2: Reorder IDs in sequence
        $conn->query("SET @count = 0");
        $conn->query("UPDATE users SET id = @count := @count + 1");

        // Step 3: Reset AUTO_INCREMENT to max(id)+1
        $conn->query("ALTER TABLE users AUTO_INCREMENT = 1");

        echo '<div class="alert alert-success">User deleted and IDs reordered successfully!</div>';
    } else {
        echo '<div class="alert alert-danger">Failed to delete user.</div>';
    }
}
?>
