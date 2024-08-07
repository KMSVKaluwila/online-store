<?php


include("connection.php");

$selectp = $_POST["selectP"];
$qut = $_POST["qut"];
$price = $_POST["unit"];

// echo $selectp;
// echo $qut;
// echo $unit;

if (empty($selectp)) {
    echo "Please select your product.";
}elseif (empty($qut)) {
    echo "Please enter product quantity.";
}elseif (!is_numeric($qut)) {
    echo "Onliy number can be enter for the quantity.";
}elseif (empty($price)) {
    echo "Please enter the unit price.";
}elseif (!is_numeric($price)) {
    echo "Onliy number can be enter for the product unit price.";
}else {
    // echo "Success";
    $rs = Database::search("SELECT * FROM online_db.stock WHERE stock.stock_id = '".$selectp."' AND stock.price = '".$price."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();
    
    if ($num == 1) {
        $newQty = $d["qty"] + $qut;
        Database::iud("UPDATE online_db.stock SET stock.qty = '".$newQty."' WHERE stock.product_id = '".$d["id"]."'");
        echo("Stock updated successfuly.");
    }else {
        Database::iud("INSERT INTO online_db.stock (stock.price,stock.qty,stock.product_id) VALUES ('".$price."','".$qut."','".$selectp."')");
        echo("NEW STOCK ADDED SUCCESSFULY");
    }
}

?>