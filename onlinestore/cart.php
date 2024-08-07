<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Shopping Cart</title>
    </head>

    <body onload="loadcart();">
        <!-- homeNavBar -->
        <?php include("homeNavBar.php"); ?>
        <!-- homeNavBar -->

        <div class="container mt-5">
            <div class="row" id="cartBody">
                <!-- cart load here -->

                <!-- check out -->


            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location: signin.php");
}

?>