<?php

include("connection.php");

$pageno = 0;

$page = $_POST["pg"];
$color = $_POST["co"];
$cat = $_POST["cat"];
$brand = $_POST["b"];
$size = $_POST["s"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM online_db.stock INNER JOIN online_db.product ON stock.product_id = product.id
INNER JOIN online_db.brand ON product.brand_id = brand.brand_id INNER JOIN online_db.colour
ON product.colour_id = colour.colour_id INNER JOIN online_db.category ON product.category_id = category.category_id
INNER JOIN online_db.size ON product.size_id = size.size_id ";



//search by color
if ($status == 0 && $color != 0) {
    //1st time search by color (Where)
    $q .= "WHERE colour.colour_id = '" . $color . "'";
    $status = 1;
    //2st time search by color (And)
} elseif ($status != 0 && $color  != 0) {
    $q .= "AND colour.colour_id = '" . $color . "'";
}

// Search by category 
if ($status == 0 && $cat != 0) {
    //1st time search by category (Where)
    $q .= "WHERE category.category_id = '" . $cat . "'";
    $status = 1;
    //2st time search by category (And)
} elseif ($status != 0 && $cat  != 0) {
    $q .= "AND category.category_id = '" . $cat . "'";
}

//search by brand
if ($status == 0 && $brand != 0) {
    //1st time search by brand (Where)
    $q .= "WHERE brand.brand_id` = '" . $brand . "'";
    $status = 1;
    //2st time search by brand (And)
} elseif ($status != 0 && $brand  != 0) {
    $q .= "AND brand.brand_id = '" . $brand . "'";
}

//search by size
if ($status == 0 && $size != 0) {
    //1st time search by size (Where)
    $q .= "WHERE size.size_id = '" . $size . "'";
    $status = 1;
    //2st time search by size (And)
} elseif ($status != 0 && $size  != 0) {
    $q .= "AND size.size_id = '" . $size . "'";
}

//search by min price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE stock.price >= '" . $minPrice . "' ORDER BY stock.price ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND stock.price >= '" . $minPrice . "' ORDER BY stock.price ASC";
    }
}

//SEARCH BY MAX PRICE
if (!empty($maxPrice) && empty($minPrice)) {
    if ($status == 0) {
        $q .= "WHERE stock.price <= '" . $maxPrice . "' ORDER BY stock.price ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND stock.price <= '" . $maxPrice . "' ORDER BY stock.price ASC";
    }
}

//SEARCH BY PRICE range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE stock.price BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY stock.price ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND stock.price BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY stock.price ASC";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";

$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {

?>
    <div class="d-flex flex-column justify-content-center mt-5 align-items-center">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any matches for your search them..</p>

    </div>

    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>

        <!-- card  -->
        <div class="col-3 mt-5 d-flex justify-content-center">
            <div class="card h-100" style="width: 18rem;">
            <a href="singleProductView.php?s=<?php echo ($d["stock_id"]); ?>"><img class="card-img-top" src="<?php echo ($d["path"]); ?>"></a>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo ($d["name"]); ?></h5>
                    <p class="card-text"><?php echo ($d["description"]); ?></p>
                    <p class="card-text">LKR: <?php echo ($d["price"]); ?></p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-primary col-6">Add to cart</button>
                            <button class="btn btn-outline-light col-6 ms-3">Buy now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    ?>

    <!-- pagination  -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                    <?php

                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                <?php
                    }
                }

                ?>





                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>

<?php
}
