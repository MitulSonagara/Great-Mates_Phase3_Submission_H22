<?php
// Start a session to access user data
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username (you should have stored user information in the session during login)
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>This is your dashboard. You can add content and features specific to the user here.</p>

    <!-- Add user-specific content and actions as needed -->

    <a href="index.php">Logout</a>
</body>
</html>
