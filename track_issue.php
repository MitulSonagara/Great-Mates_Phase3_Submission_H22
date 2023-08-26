<!DOCTYPE html>
<html>
<head>
    <title>Track Issues</title>
</head>
<body>
    <h2>Track Issues</h2>
    
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
</body>
</html>