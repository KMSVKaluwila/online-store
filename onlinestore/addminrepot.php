<?php
session_start();
if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Addmin Repot</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body class="addminbody">

        <!-- NavBar -->
        <?php include("addminNavBar.php"); ?>
        <!-- NavBar -->

        <div class="col-10">
            <h3 class="text-center">Repot</h3>

            <div class="row mt-4">
                <div class="col-4 mt-4">
                    <a href="addminRepotStock.php">
                        <button class="btn btn-outline-info col-12">Stock repot</button>
                    </a>
                </div>
                <div class="col-4 mt-4">
                    <a href="addminReportProduct.php">
                        <button class="btn btn-outline-info col-12">Product repot</button>
                    </a>
                </div>
                <div class="col-4 mt-4">
                    <a href="addminReportUser.php">
                        <button class="btn btn-outline-info col-12">User repot</button>
                    </a>
                </div>
            </div>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("Your not a valid addmin.");
}

?>