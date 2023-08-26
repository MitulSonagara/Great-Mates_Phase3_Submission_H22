<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Include database connection file
    include 'db_connection.php';

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM registration WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful, set session and redirect to user dashboard
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        // Login failed, display an error message
        echo "Login failed. Please check your username and password.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
