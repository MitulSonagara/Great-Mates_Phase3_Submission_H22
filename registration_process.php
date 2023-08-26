<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Include database connection file
    include 'db_connection.php';

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password (you should use password_hash in production)
    $hashedPassword = md5($password); // Not recommended for production

    // Insert user data into the database (you should use prepared statements)
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        // Registration successful, redirect to login page
        header("Location: login.php");
    } else {
        // Registration failed, display an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
