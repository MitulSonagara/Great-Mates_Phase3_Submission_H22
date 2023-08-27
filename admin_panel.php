<!DOCTYPE html>
<html>
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
                <li ><a href="admin_dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="active"><a href="admin_panel.php" class="nav-link active">Change Status</a></li>
                <li><a href="search_issues.php" class="nav-link">History</a></li>
                
                <li><a href="admin_login.php" class="nav-link">Log Out</a></li>

            </ul>
        </nav>
    </div>
    <div class="c1" id="main-doc">
    <h2><u>Edit Status</u></h2><br>

    <!-- Display reported issues -->
    <h3>Reported Issues</h3>
    <table border="1" width="1150px">
    <tr>
        <th>Issue Type</th>
        <th width="300px">Description</th>
        <th>State</th>
        <th>City</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Status</th>
        <th>Image</th>
    </tr>
        <?php
        // Include database connection file
        include 'db_connection.php';

        // Retrieve reported issues from the database
        $sql = "SELECT * FROM issues";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['issue_type']}</td>";
            echo "<td>{$row['description']}</td>";
            echo "<td>{$row['state']}</td>";
            echo "<td>{$row['city']}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['pincode']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td><a href='{$row['image_path']}' target='blank'>View Photo</a></td>";
            echo "<td><a href='change_status.php?id={$row['issue_id']}'>Change Status</a></td>";
            echo "</tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </table>
    </div>
</body>
</html>
