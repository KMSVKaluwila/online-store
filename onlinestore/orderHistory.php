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
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Online Store - Order History</title>
    </head>

    <body>
        <!-- home-navbar -->
        <?php include("homeNavBar.php") ?>
        <!-- home-navbar -->

        <div class="container mt-5">
            <div class="row">


                <?php

                $rs = Database::search("SELECT * FROM online_db.order_hitory WHERE order_hitory.user_id = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    //not empty
                ?>


                    <div class="mt-5 mb-3">
                        <h3>Order History</h3>
                    </div>


                    <?php

                    for ($i = 0; $i < $num; $i++) {

                        $d = $rs->fetch_assoc();

                    ?>

                        <!-- order history cart -->
                        <div class="border border-3 rounded-2 p-3 bg-body-tertiary my-3">
                            <div>
                                <h5>Order ID <span class="text-info"># <?php echo ($d["oid"]) ?></span></h5>
                                <p><?php echo ($d["order_date"]) ?></p>
                            </div>

                            <div class="px-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product name</th>
                                            <th scope="col">Quantitiy</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $rs2 = Database::search("SELECT * FROM online_db.order_iteam
                                        INNER JOIN online_db.stock ON order_iteam.stock_stock_id = stock.stock_id
                                        INNER JOIN online_db.product ON stock.product_id = product.id WHERE order_iteam.order_hitory_ohid = '" . $d["ohid"] . "'");

                                        $num2 = $rs2->num_rows;

                                        for ($x = 0; $x < $num2; $x++) {

                                            $d2 = $rs2->fetch_assoc();

                                        ?>
                                            <tr>
                                                <td scope="row"><?php echo ($d2["name"]) ?></td>
                                                <td><?php echo ($d2["oi_qty"]) ?></td>
                                                <td>LKR: <?php echo ($d2["price"] * $d2["oi_qty"]) ?></td>
                                            </tr>

                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex flex-column align-items-end pe-5">
                                <h6>Delivary Fee: LKR <span class="text-muted">400</span></h6>
                                <h5>Net Total: LKR <span class="text-warning"><?php echo($d["amount"]) ?></span></h5>
                            </div>
                        </div>
                        <!-- order history cart -->



                    <?php
                    }
                } else {
                    //empty
                    ?>

                    <div class="col-12 text-center mt-5">
                        <h2>You have not ordered anything yet</h2><br>
                        <a href="index.php" class="btn btn-primary mb-4">Start Sopping</a>
                    </div>


                <?php
                }


                ?>


            </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: signin.php");
    exit();
}
?>