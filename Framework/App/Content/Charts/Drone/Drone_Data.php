<?php

header('Content-Type: application/json');
$servername = "127.0.0.1";
$username = "root";
$password = "arizona";
$dbname = "main";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlQuery = "SELECT * FROM devices WHERE Device = 'Drone' ORDER BY Date DESC LIMIT 5 ";
$result = mysqli_query($conn, $sqlQuery);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
