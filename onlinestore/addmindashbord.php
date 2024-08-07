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

    <body class="addminbody" onload="loadchart();">

        <!-- NarBar -->
        <?php include("addminNavBar.php"); ?>
        <!-- NarBar -->

        <!-- chart js -->
        <div style="width: 600px;">
            <h2 class="text-center">Most sold Product</h2>
            <canvas id="myChart"></canvas>
        </div>

        <!-- chart js -->




        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>

    </html>

<?PHP

} else {
    echo ("Your not a valide Addmin");
}


?>