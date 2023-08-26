<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<?php
$showalert = false;
$showerror = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $conn = mysqli_connect("localhost", "root", "", "hackout");

    if (!$conn) {
        die("Sorry we are failed to connect : " . mysqli_connect_error());
    } else {
        $existsql = "SELECT * FROM admin WHERE username='$username'";
        $result = mysqli_query($conn, $existsql);
        $numrow = mysqli_num_rows($result);

        if ($numrow > 0) {
            $showerror = "Username already exist";
            echo $showerror;
        } else {

            if (($password == $cpassword)) {
                $sql = "INSERT INTO `admin`(`fullname`, `password`,`username`,`cpassword`,`email`,`mobile`) VALUES ('$fullname', '$password','$username','$cpassword','$email','$mobile');";
                $result = mysqli_query($conn, $sql);
                if (!$result) {

                    $showerror = "Password do not match";
                    echo $showerror;
                }
                else{
                    header("Location: admin_login.php");
                }
            } else {
                $showerror = "Password do not match";
                echo $showerror;
            }
        }
    }
}

?>

<head>
    <meta charset="UTF-8">
    <title> Admin Registration </title>
    <link rel="stylesheet" href="register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Admin Registration</div>
        <div class="content">
            <form action="admin_register.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter your name" required name="fullname">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" required name="username">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Enter your email" required name="email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" placeholder="Enter your number" required name="mobile">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" placeholder="Enter your password" required name="password">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="text" placeholder="Confirm your password" required name="cpassword">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <div class="a">

                <span class="text-muted">
                    <center>Already have an account?<a href="./index.php">Login</a></center>
                </span>

            </div>
        </div>
    </div>
</body>

</html>