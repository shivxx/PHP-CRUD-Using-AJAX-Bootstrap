<?php
include 'db.php';

$sql = "SELECT * FROM users ORDER BY id ASC";
$result = $conn->query($sql);

$output = '<div class="table-responsive">
<table class="table table-bordered table-striped align-middle text-center">
<thead class="table-dark">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Mobile</th>
  <th>Location</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['mobile']}</td>
            <td>{$row['location']}</td>
            <td>
                <button class='btn btn-sm btn-warning editBtn me-1'
                    data-id='{$row['id']}'
                    data-name='{$row['name']}'
                    data-email='{$row['email']}'
                    data-mobile='{$row['mobile']}'
                    data-location='{$row['location']}'>Edit</button>
                <button class='btn btn-sm btn-danger deleteBtn' data-id='{$row['id']}'>Delete</button>
            </td>
        </tr>";
    }
} else {
    $output .= "<tr><td colspan='6'>No records found.</td></tr>";
}

$output .= "</tbody></table></div>";

echo $output;
?>
    