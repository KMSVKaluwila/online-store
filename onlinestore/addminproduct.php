<?php


session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body class="addminbody">

        <!-- Navbar -->
        <?php include("addminNavBar.php"); ?>
        <!-- Navbar -->


        <div class="col-10">

            <h3 class="text-center">Addmin Product Managment</h3>


            <div class="row mt-5">
                <!-- Brand registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label for="form-label">Brand Name</label>
                        <input type="text" class="form-control mb-3" id="brand">
                    </div>

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="brandReg();">Brand Register</button>
                    </div>
                </div>
                <!-- Brand registation -->

                <!-- Categoty registation -->
                <div class="col-4 offset-2">
                    <div>
                        <label for="form-label">Category</label>
                        <input type="text" class="form-control mb-3" id="cat">
                    </div>

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="categoryReg();">Category Register</button>
                    </div>
                </div>
                <!-- Category registation -->
            </div>

            <div class="row mt-5">
                <!-- Colour registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label for="form-label">Colour</label>
                        <input type="text" class="form-control mb-3" id="colour">
                    </div>

                    <div class="d-none" id="msgDiv3">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="colourReg();">Colour Register</button>
                    </div>
                </div>
                <!-- Colour registation -->

                <!-- Size registation -->
                <div class="col-4 offset-2">
                    <div>
                        <label for="form-label">Size</label>
                        <input type="text" class="form-control mb-3" id="size">
                    </div>

                    <div class="d-none" id="msgDiv4">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="sizeReg();">Size Register</button>
                    </div>
                </div>
                <!-- Size registation -->
            </div>


        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("Your not a valid Addmin.");
}

?>