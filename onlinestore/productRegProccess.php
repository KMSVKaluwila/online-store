<?php

include("connection.php");

$name = $_POST["n"];
$b = $_POST["b"];
$c = $_POST["c"];
$col = $_POST["col"];
$size = $_POST["size"];
$dis = $_POST["dis"];


if (empty($name)) {
    echo ("Please enter your product name");
} elseif (strlen($name) > 100) {
    echo ("The product name shoud be less than 30 charectarse");
} elseif (empty($b)) {
    echo ("Please enter the brand");
} elseif (empty($c)) {
    echo ("Please enter the catagory name");
} elseif (empty($col)) {
    echo ("Please enter the product colour");
} elseif (empty($size)) {
    echo ("Please enter the product size");
} elseif (empty($dis)) {
    echo ("Please enter your discription.");
}elseif (strlen($dis) > 300) {
    echo("Your discription shoud be less than 100 charecters.");
} elseif (empty($_FILES["img"])) {
    echo ("Please upload your product image.");
} else {
    //echo("success");

    $rs = Database::search("SELECT * FROM online_db.product WHERE product.`name` = '".$name."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("The product is already exist");
    } else {

        $path = "resources/productimage//" . uniqid() . ".png";
        move_uploaded_file($_FILES["img"]["tmp_name"],$path);

        Database::iud("INSERT INTO online_db.product (product.`name`,product.`description`,product.`path`,product.`brand_id`,product.`colour_id`,product.`category_id`,product.`size_id`)
        VALUES ('".$name."','".$dis."','".$path."','".$b."','".$col."','".$c."','".$size."')");
        echo("Success");
    }
    
}
