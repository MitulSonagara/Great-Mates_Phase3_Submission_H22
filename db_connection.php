<?php
// Database configuration
$host = 'localhost';        // Database host (e.g., 'localhost' or IP address)
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'hackout'; // Database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the character set to utf8 (if needed)
mysqli_set_charset($conn, "utf8");
?>
