<?php


include("connection.php");
session_start();

// $user = $_SESSION["u"];
$stockID = $_POST['stockID'];
$qty = $_POST['qty'];

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];
    $rs = Database::search("SELECT * FROM online_db.stock WHERE stock.stock_id = '" . $stockID . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();
        $stockQty = $d['qty'];

        $rs2 = Database::search("SELECT * FROM online_db.cart WHERE cart.user_id = '" . $user["id"] . "' AND cart.stock_stock_id = '" . $stockID . "'");
        $num2 = $rs2->num_rows;

        if ($num2 > 0) {
            $d2 = $rs2->fetch_assoc();
            $newQty = $qty + $d2['cart_qty'];

            if ($stockQty >= $newQty) {
                Database::search("UPDATE online_db.cart SET cart.cart_qty = '" . $newQty . "' WHERE cart.cart_id = '" . $d2["cart_id"] . "'");
                echo "Cart iterm upload successfilly.";
            } else {
                echo "Stock quantitiy has been exseeded!";
            }
        } else {
            if ($stockQty >= $qty) {
                Database::iud(" INSERT INTO online_db.cart (`cart_qty`,`user_id`,`stock_stock_id`) VALUES ('" . $qty . "','" . $user['id'] . "','" . $stockID . "')");
                echo "Cart iterm add successfully";
            } else {
                echo "Stock quantitiy has been exseeded!";
            }
        }
    } else {
        echo "Your stock is not found.";
    }

} else {
    echo "stockID not aveilabale";
}
