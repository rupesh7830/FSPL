<?php
require 'admin/config/db_connect.php';

$sql = "SELECT id, name FROM city"; // Change table/column name if needed
$result = $conn->query($sql);

$cities = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($cities);

$conn->close();
?>
