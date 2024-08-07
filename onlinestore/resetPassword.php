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


    <!-- reset password box -->
    <div class="signinbox" id="signinbox">

        <h2 class="text-center">Reset Password</h2>

        <div class="d-none">
            <input type="hidden" id="vcode" value="<?php echo($_GET["vcode"]); ?>">
        </div>

        <div class="mt-4">
            <label class="form-label">New Password:</label>
            <input type="password" class="form-control" id="np">
        </div>

        <div class="my-4">
            <label class="form-label">Re-enter Password:</label>
            <input type="password" class="form-control" id="np2">
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="resetpassword();">Update</button>
        </div>

    </div>
    <!-- reset password box-->


    <script src="script.js"></script>
</body>

</html>