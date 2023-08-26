<!DOCTYPE html>
<html>
<head>
    <title>Report Issue</title>
</head>
<body>
    <h2>Report an Issue</h2>
    <form action="report_issue_process.php" method="POST" enctype="multipart/form-data">
        <label for="issue_type">Issue Type:</label>
        <select name="issue_type" required>
            <option value="Pothole">Pothole</option>
            <option value="Damaged Sign">Damaged Sign</option>
            <!-- Add more issue types as needed -->
        </select><br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea><br>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" id="image"><br>

        <button type="submit" name="report">Submit Report</button>
    </form>
</body>
</html>
