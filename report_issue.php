<!DOCTYPE html>
<html>

<head>
    <title>Report Issue</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <h2>Report an Issue</h2>
    <div class="sidebar">
        <nav id="navbar">
            <header class="c2">InfraReport<br>________________</header>
            <ul id="nav-item" class="sidenav">
                <li><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                <li class="active"><a href="report_issue.php" class="nav-link active">New Complain</a></li>
                <li><a href="track_issue.php" class="nav-link">History</a></li>

                <li><a href="index.php" class="nav-link">Log Out</a></li>

            </ul>
        </nav>
    </div>
    <div class="c1" id="main-doc">
        <form action="report_issue_process.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="l"><label for="issue_type">Issue Type:</label></div>
                <div class="i">
                    <select name="issue_type" required>
                        <option value=" " selected disabled>select your problem</option>
                        <option value="Road issues">Road issues</option>
                        <option value="Water issues">Water issues</option>
                        <option value="Electricity">Electricity</option>
                        <option value="Drainage">Drainage</option>
                        <option value="Damaged Sign">Damaged Sign</option>
                        <!-- Add more issue types as needed -->
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="l"><label for="description">Description:</label></div>
                <div class="i"><textarea name="description" rows="4" required></textarea><br></div>
            </div>

            <div class="row">
                <div class="l"><label for="state">State:</label></div>
                <div class="i"><input type="text" name="State" accept="state/*" id="state"><br></div>

            </div>

            <div class="row">
                <div class="l"><label for="city">City:</label></div>
                <div class="i"><input type="text" name="City" accept="city/*" id="city"><br></div>

            </div>

            <div class="row">
                <div class="l"><label for="Address">Address:</label></div>
                <div class="i"><input type="text" name="Address" accept="Address/*" id="Address"><br></div>

            </div>

            <div class="row">
                <div class="l"><label for="pincode">Pincode:</label></div>
                <div class="i"><input type="tel" name="Pincode" accept="pincode/*" id="pincode"><br></div>

            </div>

            <div class="row">
                <div class="l"><label for="image">Image:</label></div>
                <div class="i"><input type="file" name="image" accept="image/*" id="image"><br></div>

            </div>
            <br>
            <div class="row"><button class="submit" type="submit" name="report">Submit</button></div>

        </form>
    </div>
</body>

</html>