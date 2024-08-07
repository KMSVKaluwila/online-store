<?php

include("connection.php");

$cartId = $_POST["c"];
$newQty = $_POST["q"];

$rs = Database::search("SELECT * FROM online_db.cart INNER JOIN online_db.stock ON cart.stock_stock_id = stock.stock_id
WHERE cart.cart_id = '".$cartId."'");

$num = $rs->num_rows;
if ($num > 0) {

    $d = $rs->fetch_assoc();

    if ($d["qty"] >= $newQty) {
        Database::iud("UPDATE online_db.cart SET cart.cart_qty = '".$newQty."' WHERE cart.cart_id = '".$cartId."'");
        echo "success";
    } else {
        echo "Your product qauntitiy exceeded";
    }
    
} else {
    echo "cart iterm not found";
}
