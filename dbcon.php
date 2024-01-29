<?php
$servername = "localhost"; // Assuming the database is on the same server as your PHP script
$username = "root";
$password = ""; // Password is empty
$dbname = "smarthome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
