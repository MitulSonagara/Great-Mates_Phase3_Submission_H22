<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel</h2>

    <!-- Display reported issues -->
    <h3>Reported Issues</h3>
    <table>
        <tr>
            <th>Issue Type</th>
            <th>Description</th>
            <th>Status</th>
            <th>Location</th>
            <th>Actions</th>
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
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td><a href='change_status.php?id={$row['id']}'>Change Status</a></td>";
            echo "</tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
