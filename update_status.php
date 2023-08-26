<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_status'])) {
    // Include database connection file
    include 'db_connection.php';

    $issueId = $_POST['id'];
    $newStatus = $_POST['status'];

    // Update issue status in the database
    $sql = "UPDATE issues SET status='$newStatus' WHERE issue_id='$issueId'";

    if (mysqli_query($conn, $sql)) {
        // Status change successful, redirect back to admin panel
        header("Location: admin_panel.php");
    } else {
        // Status change failed, display an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
