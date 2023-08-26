<?php
// Check if a file was uploaded
if ($_FILES['image']['error'] === 0) {
    $uploadDir = 'uploads/'; // Directory where you want to store uploaded files

    // Create the uploads directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    // Check if a file with the same name already exists
    if (file_exists($uploadFile)) {
        echo "File already exists. Please rename your file and try again.";
    } else {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // File upload successful, proceed with issue reporting

            // Include database connection file
            include 'db_connection.php';

            // Get user input
            $issueType = $_POST['issue_type'];
            $description = $_POST['description'];
            $status="pending";
            $state=$_POST['State'];
            $city=$_POST['City'];
            $Address=$_POST['Address'];
            $pincode=$_POST['Pincode'];


            // Insert issue data into the database (you should use prepared statements)
            $sql = "INSERT INTO issues (`issue_type`, `description`, `image_path`, `status`,`state`,`city`,`address`,`pincode`) VALUES (?, ?, ?, ?,?,?,?,?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssssssss", $issueType, $description, $uploadFile,$status,$state,$city,$Address,$pincode);

                if (mysqli_stmt_execute($stmt)) {
                    // Issue report successful, redirect to a confirmation page or dashboard
                    header("Location: report_confirmation.php");
                } else {
                    // Issue report failed, display an error message
                    echo "Error: " . mysqli_error($conn);
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Error in preparing the SQL statement
                echo "Error: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            // File upload failed
            echo "Upload failed.";
        }
    }
} else {
    // File upload error
    echo "Error: " . $_FILES['image']['error'];
}
?>
