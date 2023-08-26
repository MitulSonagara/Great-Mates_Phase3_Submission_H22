<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['report'])) {
    // Include database connection file
    include 'db_connection.php';

    // Get user input
    $issueType = $_POST['issue_type'];
    $description = $_POST['description'];

    // Handle file upload (you should perform validation and security checks)
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];

        // Move the uploaded file to a server directory
        move_uploaded_file($fileTmpName, 'uploads/' . $fileName);
    }

    // Insert issue data into the database (you should use prepared statements)
    $sql = "INSERT INTO issues (issue_type, description, image_path) VALUES ('$issueType', '$description', 'uploads/$fileName')";

    if (mysqli_query($conn, $sql)) {
        // Issue report successful, redirect to a confirmation page or dashboard
        header("Location: report_confirmation.php");
    } else {
        // Issue report failed, display an error message
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
