<?php

session_start();
include("connection.php");

$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM online_db.order_hitory WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice - onlinestore</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body>

        <div class="container text-end mt-2">
            <a href="index.php">
                <button class="btn btn-primary btn-sm col-3">Home</button>
            </a>
        </div>

        <div class="container mt-2 mb-4" id="printArea">
            <div class="border border-black p-5 rounded-2">
                <div class="row">
                    <div class="col-6">
                        <h3>Order ID #<?php echo ($d["ohid"]); ?></h3>
                        <h5><?php echo ($d["order_date"]); ?></h5>
                    </div>
                    <div class="col-6 text-end">
                        <h1>I N V O I C E</h1>
                        <h4>Online Store</h4>
                        <h5>0N.45, Karapikkada road,</h5>
                        <h5>Medawachchiya</h5>
                    </div>
                </div>

                <div>
                    <h4><?php echo ($user["fname"]); ?> <?php echo ($user["lname"]); ?></h4>
                    <h4><?php echo ($user["mobile"]); ?></h4>
                    <h5>No.<?php echo ($user["no"]); ?>,</h5>
                    <h5><?php echo ($user["line_01"]); ?>,</h5>
                    <h5><?php echo ($user["line_02"]); ?>,</h5>
                </div>

                <div class="px-5 mt-5">
                    <table class="table table-hover border border-1 border-black">
                        <thead>
                            <tr>
                                <th scope="col">Product name</th>
                                <th scope="col">Brand name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Quantiy</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $rs2 = Database::search("SELECT * FROM online_db.order_iteam INNER JOIN online_db.stock ON order_iteam.stock_stock_id = stock.stock_id
                            INNER JOIN product ON stock.product_id = product.id INNER JOIN online_db.brand ON product.brand_id = brand.brand_id
                            INNER JOIN online_db.colour ON product.colour_id = colour.colour_id
                            INNER JOIN online_db.category ON product.category_id = category.category_id
                            INNER JOIN online_db.size ON product.size_id = size.size_id WHERE order_iteam.order_hitory_ohid = '" . $orderHistoryId . "' ");

                            $num2 = $rs->num_rows;
                            for ($i = 0; $i < $num2; $i++) {

                                $d2 = $rs2->fetch_assoc();

                            ?>

                                <tr>
                                    <td><?php echo ($d2["name"]); ?></td>
                                    <td><?php echo ($d2["brand_name"]); ?></td>
                                    <td><?php echo ($d2["category_name"]); ?></td>
                                    <td><?php echo ($d2["colour_name"]); ?></td>
                                    <td><?php echo ($d2["size_name"]); ?></td>
                                    <td><?php echo ($d2["oi_qty"]); ?></td>
                                    <td><?php echo ($d2["price"]) * ($d2["oi_qty"]); ?></td>
                                </tr>

                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-4">
                    <h6>Number of items: <span class="text-muted"><?php echo $num2; ?></span></h6>
                    <h6>Delivary fee: <span class="text-muted">500</span></h6>
                    <h5>Net total: <span class="text-primary">LKR <?php echo ($d["amount"]); ?></span></h5>
                </div>


            </div>
        </div>

        <div class="my-4 d-flex justify-content-center d-block" id="btnprint">
            <button class="btn btn-primary col-2 btn-sm" onclick="buttonPrint();">Print</button>
        </div>

        <script>
            function buttonPrint() {

                var orginalContainer = document.body.innerHTML;
                var printArea = document.getElementById("printArea").innerHTML;
                var btn = document.getElementById("btnprint");

                document.body.innerHTML = printArea;
                window.print();
                document.body.innerHTML = orginalContainer;
            }
        </script>
    </body>

    </html>

<?php


} else {
    header("Location: index.php");
}


?>