<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="sidebar">
        <nav id="navbar">
            <header class="c2">InfraReport<br>________________</header>
            <ul id="nav-item" class="sidenav">
                <li><a href="admin_dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="active"><a href="admin_panel.php" class="nav-link active">Change Status</a></li>
                <li><a href="search_issues.php" class="nav-link">History</a></li>

                <li><a href="admin_login.php" class="nav-link">Log Out</a></li>

            </ul>
        </nav>
    </div>
    <div class="c1" id="main-doc">
        <h2><u>Edit Status</u></h2><br>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            // Include database connection file
            include 'db_connection.php';

            $issueId = $_GET['id'];

            // Retrieve issue data from the database by ID
            $sql = "SELECT * FROM issues WHERE issue_id='$issueId'";
            $result = mysqli_query($conn, $sql);
            $issue = mysqli_fetch_assoc($result);

            if (!$issue) {
                echo "Issue not found.";
            } else {
                // Display issue details and form to change status
                echo "<h2>Change Issue Status</h2>";
                echo "<p>Issue Type: {$issue['issue_type']}</p>";
                echo "<p>Description: {$issue['description']}</p>";
                echo "<p>Status: {$issue['status']}</p>";

                // Form to change issue status
                echo "<form action='update_status.php' method='POST'>";
                echo "<input type='hidden' name='id' value='{$issue['issue_id']}'>";
                echo "<label for='status'>Change Status:</label>";
                echo "<select name='status'>";
                echo "<option value='Pending'>Pending</option>";
                echo "<option value='In Progress'>In Progress</option>";
                echo "<option value='Resolved'>Resolved</option>";
                echo "</select>";
                echo "<button type='submit' name='change_status'>Change</button>";
                echo "</form>";
            }

            // Close the database connection
            mysqli_close($conn);
        }
        ?>
</div>
</body>

</html>