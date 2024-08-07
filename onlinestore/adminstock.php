<?php

session_start();
if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock - Admin panel</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body class="addminbody">

        <!-- NarBar -->
        <?php include("addminNavBar.php"); ?>
        <!-- NarBar -->
        <!-- connection -->
        <?php include("connection.php"); ?>
        <!-- connection -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-6 mt-3">

                    <h5 class="text-center">Product Regisration</h5>

                    <div class="mt-3">
                        <label for="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="row">
                        <div class="mt-3 col-6">
                            <label for="form-label">Brand Nmae</label>
                            <select class="form-select" id="brand">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM online_db.brand;");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["brand_id"]); ?>"><?php echo ($d["brand_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label for="form-label">Catogry</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM online_db.category");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["category_id"]); ?>"><?php echo ($d["category_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label for="form-label">Colour</label>
                            <select class="form-select" id="colour">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM online_db.colour");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["colour_id"]); ?>"><?php echo ($d["colour_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label for="form-label">Size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM online_db.size");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["size_id"]); ?>"><?php echo ($d["size_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Discription</label>
                        <textarea class="form-control" rows="5" id="dis"></textarea>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Product Image</label>
                        <input type="file" class="form-control" id="img">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-light col-12" onclick="regProduct();">Product Regisration</button>
                    </div>

                </div>

                <div class="col-6 mt-3">

                    <h5 class="text-center">Stock Update</h5>

                    <div class="mt-3">
                        <label for="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM online_db.product");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity">
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="unitprice">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-light col-12" onclick="updateStock();">Update</button>
                    </div>

                </div>

            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php


} else {
    echo ("Your not a valide Addmin");
}

?>