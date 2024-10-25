<?php
// Update these details with the correct information
$servername = "localhost"; // Assuming you're using XAMPP on localhost
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "portfolio_db"; // Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
