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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="topbar-container">
        <div class="topbar">
            <header>DASHBOARD</header>
            <div class="hamburger">
                <i class="fa fa-bars"></i>
            </div>
        </div>

    </div>

    <div class="sidebar">
        <nav id="navbar">
            <header class="c2">InfraReport<br>________________</header>
            <ul id="nav-item" class="sidenav">
                <li class="active"><a href="dashboard.php" class="nav-link active">Dashboard</a></li>
                <li><a href="report_issue.php" class="nav-link">New Complain</a></li>
                <li><a href="track_issue.php" class="nav-link">History</a></li>
                
                <li><a href="index.php" class="nav-link">Log Out</a></li>

            </ul>
        </nav>
    </div>
    
    <div class="c1" id="main-doc">
    <h2>Welcome,
        <?php echo $username; ?>!
    </h2>
    <p>This is your dashboard. You can add content and features specific to the user here.</p>

    <!-- Add user-specific content and actions as needed -->

    </div>

</body>

</html>