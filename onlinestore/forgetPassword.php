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

        <h2 class="text-center">Froget Password</h2>

        <div class="my-4">
            <label class="form-label">Enter your email address:</label>
            <input type="email" class="form-control" id="e">
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="frogetpassword();">Send Email</button>
        </div>

    </div>
    <!-- sign in -->


    <script src="script.js"></script>
</body>

</html>