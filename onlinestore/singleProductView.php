<?php

include("connection.php");
$stockID = $_GET['s'];

if (isset($stockID)) {

    $q = "SELECT * FROM online_db.stock INNER JOIN online_db.product ON stock.product_id = product.id
    INNER JOIN online_db.brand ON product.brand_id = brand.brand_id INNER JOIN online_db.colour
    ON product.colour_id = colour.colour_id INNER JOIN online_db.category ON product.category_id = category.category_id
    INNER JOIN online_db.size ON product.size_id = size.size_id WHERE stock.stock_id = '" . $stockID . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();


?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <title>Online Store</title>
    </head>

    <body class="singleProductViewBody">
        <!-- home-navbar -->
        <?php include("homeNavBar.php") ?>
        <!-- home-navbar -->

        <div class="row col-8 shadow p-4 bg-body-tertiary rounded-2 m-auto">
            <div class="col-6">
                <img src="<?php echo ($d["path"]) ?>" width="300px" class="rounded rounded-2">
            </div>
            <div class="col-6">
                <h4 class="mt-3 text-info-emphasis"><?php echo ($d["name"]) ?></h4>
                <h5 class="mt-3">category : <?php echo ($d["category_name"]) ?></h5>
                <h6 class="mt-3">color : <?php echo ($d["colour_name"]) ?></h6>
                <h6 class="mt-3">size : <?php echo ($d["size_name"]) ?></h6>
                <p class="mt-3"><?php echo ($d["description"]) ?></p>
                <div class="row mt-5">
                    <div class="col-2">
                        <input type="text" placeholder="Qty" class="form-control" id="qty">
                    </div>
                    <div class="col-6 mt-2">
                        <h6 class="text-info-emphasis">Available Quantity : <?php echo ($d["qty"]) ?></h6>
                    </div>
                    <h5 class="mt-3">price : <?php echo ($d["price"]) ?></h5>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-info col-6" onclick="addtoCart('<?php echo ($d['stock_id']) ?>');">Add to cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2" onclick="buyNow('<?php echo ($d['stock_id']) ?>');">Buy now</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
}


?>