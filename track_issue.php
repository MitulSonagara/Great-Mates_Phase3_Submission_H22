<!DOCTYPE html>
<html>

<head>
    <title>Track Issues</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <h2>Track Issues</h2>
    <div class="sidebar">
        <nav id="navbar">
            <header class="c2">InfraReport<br>________________</header>
            <ul id="nav-item" class="sidenav">
                <li><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                <li><a href="report_issue.php" class="nav-link ">New Complain</a></li>
                <li class="active"><a href="track_issue.php" class="nav-link active">History</a></li>

                <li><a href="index.php" class="nav-link">Log Out</a></li>

            </ul>
        </nav>
    </div>
    <div class="c1" id="main-doc">
        <!-- Issue filter form -->
        <form action="" method="GET">
            <label for="issue_type">Issue Type:</label>
            <select name="issue_type">
                <option value="">All</option>
                <option value="Pothole">Pothole</option>
                <option value="Damaged Sign">Damaged Sign</option>
                <!-- Add more issue types as needed -->
            </select>

            <label for="status">Status:</label>
            <select name="status">
                <option value="">All</option>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>

            <button type="submit" name="filter">Apply Filter</button>
        </form>

        <!-- Display filtered issue reports -->
        <h3>Filtered Issue Reports</h3>
        <table>
            <tr>
                <th>Issue Type</th>
                <th>Description</th>
                <th>Status</th>
                <!-- <th>Location</th> -->
            </tr>
            <?php
            // Include database connection file
            include 'db_connection.php';

            // Construct SQL query based on filter criteria
            $sql = "SELECT * FROM issues WHERE 1";

            if (isset($_GET['issue_type']) && !empty($_GET['issue_type'])) {
                $issueType = $_GET['issue_type'];
                $sql .= " AND issue_type='$issueType'";
            }

            if (isset($_GET['status']) && !empty($_GET['status'])) {
                $status = $_GET['status'];
                $sql .= " AND status='$status'";
            }

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Display issue reports
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['issue_type']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['status']}</td>";
                // echo "<td>{$row['location']}</td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>

</html>