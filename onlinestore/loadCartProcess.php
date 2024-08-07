<?php

include("connection.php");
session_start();
$user = $_SESSION['u'];
$netTotal = 0;

$rs = Database::search("SELECT * FROM online_db.cart INNER JOIN online_db.stock ON cart.stock_stock_id = stock.stock_id INNER JOIN online_db.product ON
stock.product_id = product.id INNER JOIN online_db.colour ON product.colour_id = colour.colour_id INNER JOIN online_db.size ON
product.size_id = size.size_id WHERE cart.user_id = '" . $user["id"] . "'");

$num = $rs->num_rows;
if ($num > 0) {

?>

    <div class="my-4">
        <h3>Shopping Cart</h3>
    </div>

    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;

    ?>

        <!-- cart items -->
        <div class="col-12 border border-3 rounded-2 p-3 mb-4 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo $d["path"]; ?>" class="rounded-2" height="200px">
                <div class="ms-5">
                    <h5><?php echo $d["name"]; ?></h5>
                    <p class="text-muted mt-3">Color: <?php echo $d["colour_name"]; ?></p>
                    <p class="text-muted">Size: <?php echo $d["size_name"]; ?></p>
                    <h5 class="text-warning">Price: <?php echo $d["price"]; ?></h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id']; ?>');">&#9866;</button>
                <input type="number" id="qty<?php echo $d['cart_id']; ?>" class="form-control text-center" style="max-width: 100px;" value="<?php echo $d["cart_qty"]; ?>" disabled>
                <button class="btn btn-light btn-sm" onclick="incremantCartQty('<?php echo $d['cart_id']; ?>');">&#10010;</button>
            </div>
            <div class="d-flex align-items-center">
                <h4>Total: <span class="text-warning">LKR: <?php echo $total; ?></span></h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id']; ?>');">&#10006;</button>
            </div>
        </div>

    <?php
    }

    ?>

    <div class="col-12 mt-4">
        <hr>
    </div>

    <!-- check out -->
    <div class="d-flex flex-column align-items-end">
        <h6>Number of items <span class="text-info"><?php echo $num; ?></span></h6>
        <h5>Delivary Fee: <span class="text-muted">LKR 400</span></h5>
        <h4>Net Total: <span class="text-warning">LKR <?php echo ($netTotal + 400); ?></span></h4>
        <button class="btn btn-success my-4" onclick="checkOut();">Checkout</button>
    </div>

<?php

} else {

?>

    <div class="col-12 text-center mt-5">
        <h2>Your cat is empty!</h2>
        <a href="index.php" class="btn btn-primary mb-4">Start Sopping</a>
    </div>

<?php

}
