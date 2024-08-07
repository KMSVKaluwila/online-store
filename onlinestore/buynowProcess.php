<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H:i:s"); // Corrected datetime format

    Database::iud("INSERT INTO online_db.order_hitory (`oid`, `order_date`, `amount`, `user_id`) VALUES
    ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["id"] . "')");

    $orderHistoryID = Database::$connection->insert_id;

    Database::iud("INSERT INTO online_db.order_iteam (`oi_qty`, `order_hitory_ohid`, `stock_stock_id`) VALUES
    ('" . $payment["cart_qty"] . "','" . $orderHistoryID . "','" . $payment["stock_id"] . "')");

    $rs = Database::search("SELECT * FROM online_db.stock WHERE stock.stock_id = '" . $payment["stock_id"] . "'");
    $d = $rs->fetch_assoc();

    $newqty = $d["qty"] - $payment["cart_qty"];
    Database::iud("UPDATE online_db.stock SET stock.qty = '" . $newqty . "' WHERE stock.stock_id = '" . $payment["stock_id"] . "'");

    // echo "success";

    $order = array();
    $order["res"] = "success";
    $order["order_id"] = $orderHistoryID;

    echo json_encode($order);
}
