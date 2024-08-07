<?php

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body onload="loadProduct(0);">

    <!-- NarBar -->
    <?php include("homeNavBar.php"); ?>
    <!-- NarBar -->

    <!-- basic serach -->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder="Product name" id="product" onkeyup="searchProduct(0);">
        </div>
        <button class="btn btn-outline-info col-1 ms-2 mt-3" onclick="viewFilter();">Filters</button>
    </div>
    <!-- basic serach -->

    <!-- advance search -->
    <div class="container d-none" id="filterID">
        <div class="border border-light rounded-4 mt-5 p-5">

            <div class="row">

                <div class="col-6 ms-auto">
                    <label class="form-label">Colour :</label>
                    <select class="form-select" id="color">
                        <option value="0">Select colour</option>
                        <?php
                        $rs = Database::search("SELECT * FROM online_db.colour");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $d["colour_id"]; ?>"><?php echo $d["colour_name"]; ?></option>
                        <?php
                        }
                        ?>
                        <!-- Add more color options as needed -->
                    </select>
                </div>

                <div class="col-6 ms-auto">
                    <label class="form-label">Catagory :</label>
                    <select class="form-select" id="cat">
                        <option value="0">Select catagory</option>
                        <?php
                        $rs = Database::search("SELECT * FROM online_db.category");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $d["category_id"]; ?>"><?php echo $d["category_name"]; ?></option>
                        <?php
                        }
                        ?>
                        <!-- Add more catagory options as needed -->
                    </select>
                </div>

                <div class="col-6 mt-3 ms-auto">
                    <label class="form-label">Brand :</label>
                    <select class="form-select" id="brand">
                        <option value="0">Select Brand</option>
                        <?php
                        $rs = Database::search("SELECT * FROM online_db.brand");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $d["brand_id"]; ?>"><?php echo $d["brand_name"]; ?></option>
                        <?php
                        }
                        ?>
                        <!-- Add more catagory options as needed -->
                    </select>
                </div>

                <div class="col-6 mt-3 ms-auto">
                    <label class="form-label">Size :</label>
                    <select class="form-select" id="size">
                        <option value="0">Select Size</option>
                        <?php
                        $rs = Database::search("SELECT * FROM online_db.size");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $d["size_id"]; ?>"><?php echo $d["size_name"]; ?></option>
                        <?php
                        }
                        ?>
                        <!-- Add more catagory options as needed -->
                    </select>
                </div>



                <div class="col-6 mt-5">
                    <input type="text" class="form-control" placeholder="Min Price" id="min">
                </div>

                <div class="col-6 mt-5">
                    <input type="text" class="form-control" placeholder="Max Price" id="max">
                </div>

                <div class="row justify-content-center">
                    <div class="col-3 mt-5 d-grid">
                        <button class="btn btn-outline-info" onclick="advSearchProduct(0);">Search</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- advance search -->

    <!-- load product -->
    <div class="container">
        <div class="row" id="pid">



        </div>
    </div>
    <!-- load product -->

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>