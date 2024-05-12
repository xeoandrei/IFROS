<?php
// Database configuration
$dbHost = 'localhost'; // Change this to your MySQL hostname
$dbUsername = 'froo_admin'; // Change this to your MySQL username
$dbPassword = 'froo_2024'; // Change this to your MySQL password
$dbName = 'ifros'; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
