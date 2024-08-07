<?php

include("connection.php");

$c = $_POST["c"];

if (empty($c)) {
    echo("Please enter the category name.");
}elseif (strlen($c) > 20) {
    echo("The category name shoud be less than 20 characters.");
}else{
    $rs = Database::search("SELECT * FROM `category` WHERE `category_name` = '".$c."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo "The category is already exists.";
    } else {
        Database::iud("INSERT INTO `category` (category.`category_name`) VALUES ('".$c."')");
        echo "Success";
    }
    
}

?>