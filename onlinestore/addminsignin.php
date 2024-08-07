<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="addminsigninbody">

    <div class="addminsigninbox">

        <h2 class="text-center">Addmin Login</h2>

        <div class="mt-3">
            <label for="from-label">User name</label>
            <input type="text" class="form-control border-black bg-transparent" id="un">
        </div>

        <div class="my-3">
            <label for="from-label">Password</label>
            <input type="password" class="form-control border-black bg-transparent" id="pw">
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="addminsign();">Sign In</button>
        </div>

    </div>

    <!-- Footer -->
    <div class="col-12 fixed-bottom">
        <p class="text-center">&copy; 2024 onlinestore.lk || All Right Reserved</p>
    </div>
    <!-- Footer -->

    <script src="script.js"></script>
</body>

</html>