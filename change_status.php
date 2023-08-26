<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Include database connection file
    include 'db_connection.php';

    $issueId = $_GET['id'];
    
    // Retrieve issue data from the database by ID
    $sql = "SELECT * FROM issues WHERE id='$issueId'";
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
        echo "<input type='hidden' name='id' value='{$issue['id']}'>";
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
