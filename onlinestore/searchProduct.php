<?php

include("connection.php");

$pageNo = 0;
$page = $_POST["page"];
$product = $_POST["p"];

// echo $page;
// echo $product;

if (0 != $page) {
    $pageNo = $page;
} else {
    $pageNo = 1;
}

$q = "SELECT * FROM online_db.stock INNER JOIN online_db.product ON stock.product_id = product.id WHERE product.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
// echo $num;

$result_per_page = 8;
$num_of_page = ceil($num / $result_per_page);
// echo $num_of_page;

$page_result = ($pageNo - 1) * $num_of_page;
$q2 = $q . " LIMIT $result_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo $num2;

if ($num2 == 0) {

?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No result</h5>
        <p>we are sorry we can not find any matches for your search item.</p>
    </div>
    <?php

} else {

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

    ?>

        <!-- card 1 -->
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

    <!-- pagi nation -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageNo <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="searchProduct(<?php echo ($pageNo - 1); ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>

                <?php

                for ($i = 0; $i <= $num_of_page; $i++) {
                    if ($i == $pageNo) {
                ?>

                        <li class="page-item active">
                            <a class="page-link" onclick="searchProduct(<?php echo ($i); ?>);"><?php echo ($i); ?></a>
                        </li>

                    <?php
                    } else {
                    ?>

                        <li class="page-item">
                            <a class="page-link" onclick="searchProduct(<?php echo ($i); ?>);"><?php echo ($i); ?></a>
                        </li>

                <?php
                    }
                }

                ?>


                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageNo >= $num_of_page) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="searchProduct(<?php echo ($pageNo + 1); ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Next</a></li>
            </ul>
        </nav>
    </div>

<?php


}
