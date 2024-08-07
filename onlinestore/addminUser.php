<?php

session_start();

if (isset($_SESSION["a"])) {


?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Addmin Dashbord</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body class="addminbody" onload="loaduser();">

        <!-- NarBar -->
        <?php include("addminNavBar.php"); ?>
        <!-- NarBar -->

        <div class="col-10">
            <h3 class="text-center">User Management</h3>

            <div>
                <div class="row d-flex justify-content-end mt-4">

                    <div class="d-none" id="msgDiv">
                        <div class="alert alert-danger" id="msg">
                        </div>
                    </div>


                    <div class="col-2">
                        <input type="text" class="form-control" placeholder="Enter User ID" id="userIdTextFild">
                    </div>

                    <button class="btn btn-outline-light col-2" onclick="updateuserstatus();">Change Status</button>

                </div>
            </div>

            <div class="mt-3">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- table row -->

                        <!-- table row -->
                    </tbody>
                </table>

            </div>

        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?PHP

} else {
    echo ("Your not a valide Addmin");
}


?>