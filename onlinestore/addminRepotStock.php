<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs =  Database::search("SELECT * FROM online_db.stock INNER JOIN online_db.product ON stock.product_id = product.id ORDER BY stock.stock_id ASC");
    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Repot</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <a href="addminrepot.php">
                <img src="resources\img\Image20240528131615.png" height="25" class="mt-3">
            </a>
        </div>

        <div class="mt-5" id="printArea">
            <h3 class="text-center">Stock Repot</h3>

            <div class="mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Stock ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quatity</th>
                            <th scope="col">Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo ($d["stock_id"]); ?></td>
                                <td><?php echo ($d["name"]); ?></td>
                                <td><?php echo ($d["qty"]); ?></td>
                                <td><?php echo ($d["price"]); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container d-flex justify-content-end mt-4" id="div1">
            <button class="btn btn-outline-info col-3" onclick="buttonPrint();">Print</button>
        </div>


        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("Your not valid addmin");
}

?>