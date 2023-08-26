<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login Page </title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
    <link rel="stylesheet" href="index.css">
</head>

<body>

<h1><center>Admin Login</center></h1>

    <div class="pt-5">
        <h1 class="text-center"><img src="logo.png" alt=""></h1>

        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">

                        <form id="submitForm" action="admin_login_process.php" method="POST" data-parsley-validate=""
                            data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1"><input
                                type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                            <div class="form-group required">
                                <lSabel for="username">Username</lSabel>
                                <input type="text" class="form-control text-lowercase" id="username" required=""
                                    name="username" value="">
                            </div>
                            <div class="form-group required">
                                <label class="d-flex flex-row align-items-center" for="password">Password
                                </label>
                                <input type="password" class="form-control" required="" id="password" name="password"
                                    value="">
                            </div>

                            <div class="form-group pt-1">
                                <button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
                            </div>
                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0 text-muted">
                                    _______________________________________________________</p>
                            </div>

                            <a class="btn btn-primary btn-block" style="background-color: #3b5998" href="#!"
                                role="button">
                                <i class="form-group pt-1">Continue with Google</i>
                            </a>
                        </form>
                        <p class="small-xl pt-3 text-center">
                            <span class="text-muted">Not a member?</span>
                            <a href="./admin_register.php">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>