<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="signinbody">

    <!-- sign in -->
    <div class="signinbox" id="signinbox">

        <h2 class="text-center">Sign In</h2>

        <?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }


        ?>

        <div class="mt-3">
            <label for="form-label">User Name:</label>
            <input type="text" class="form-control" id="un" value="<?php echo ($username); ?>">
        </div>

        <div class="mt-2">
            <label for="form-label">Password:</label>
            <input type="password" class="form-control" id="pw" value="<?php echo ($password); ?>">
        </div>

        <div class="mt-2 mb-3">
            <input type="checkbox" class="form-check-input" id="rm">
            <label for="form-label">Remember Me</label>
        </div>

        <div class="d-none" id="msgDiv2">
            <div class="alert alert-danger" id="msg2"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-secondary col-12" onclick="signin();">Sign In</button>
        </div>

        <div class="mt-2">
            <a href="forgetPassword.php"><button class="btn btn-outline-info col-12">Froget Password</button></a>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">New to Online Store? Please sign Up</button>
        </div>

    </div>
    <!-- sign in -->

    <!-- sign up -->
    <div class="signupbox d-none" id="signupbox">

        <h2 class="text-center">Sign Up</h2>

        <div class="row">
            <div class="mt-3 col-6">
                <label for="form-lable">First Name</label>
                <input type="text" class="form-control" id="fn">
            </div>

            <div class="mt-3 col-6">
                <label for="form-lable">Last Name</label>
                <input type="text" class="form-control" id="ln">
            </div>
        </div>

        <div class="mt-2">
            <label for="form-lable">Email</label>
            <input type="text" class="form-control" id="email">
        </div>

        <div class="mt-2">
            <label for="form-lable">Mobile</label>
            <input type="text" class="form-control" id="mobile">
        </div>

        <div class="mt-2">
            <label for="form-lable">User Name</label>
            <input type="text" class="form-control" id="up_un">
        </div>

        <div class="mt-2 mb-3">
            <label for="form-lable">Password</label>
            <input type="password" class="form-control" id="up_pw">
        </div>

        <div class="d-none" id="msgDiv1">
            <div class="alert alert-danger" id="msg1"></div>
        </div>

        <div class="mt-3">
            <button class="btn btn-secondary col-12" onclick="signup();">Sign Up</button>
        </div>

        <div class="mt-2">
            <button class="btn btn-outline-secondary col-12" onclick="changeView();">Allready have an account? Please sign In</button>
        </div>

    </div>
    <!-- sign up -->

    <script src="script.js"></script>
</body>

</html>