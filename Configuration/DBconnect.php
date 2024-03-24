<?php
// Database connection parameters
$servername = "192.168.1.9"; // Change this if your database is hosted elsewhere
$username = "klopez1"; // Change this to your MySQL username
$password = "Lk000388"; // Change this to your MySQL password
$dbname = "moviewebsite"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
