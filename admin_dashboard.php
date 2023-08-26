<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-dashboardAdmin-dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="sidebar">
        <nav id="navbar">
            <header class="c2">InfraReport<br>________________</header>
            <ul id="nav-item" class="sidenav">
                <li class="active"><a href="admin_dashboard.php" class="nav-link active">Dashboard</a></li>
                <li><a href="admin_panel.php" class="nav-link">Change Status</a></li>
                <li><a href="search_issues.php" class="nav-link">History</a></li>
                
                <li><a href="admin_dashboard.php" class="nav-link">Log Out</a></li>

            </ul>
        </nav>
    </div>
    <div class="c1" id="main-doc">
<h2><u>Admin Dashboard</u></h2><br>

<!-- Display reported issues -->
<h3>New Reported Issues</h3>
<table border="1" width="700px">
    <tr>
        <th>Issue Type</th>
        <th width="300px">Description</th>
        <th>Status</th>
        <th>Image</th>
    </tr>
    <?php
    // Include database connection file
    include 'db_connection.php';

    // Retrieve reported issues from the database
    $sql = "SELECT * FROM issues WHERE status='pending'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['issue_type']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td><a href='{$row['image_path']}' target='blank'>View Photo</a></td>";
        echo "</tr>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    </div>
</table>

</body>
</html>