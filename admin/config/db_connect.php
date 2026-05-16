<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fspl"; // 🔁 अपने डेटाबेस का नाम यहाँ डालें

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed']));
}
?>
