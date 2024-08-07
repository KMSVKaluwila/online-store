<?php

include("connection.php");

$b = $_POST["b"];

if (empty($b)) {
    echo ("Please enter the brand name");
} elseif (strlen($b) > 20) {
    echo ("Your barand name less than 20 charecters");
} else {
    $rs = Database::search("SELECT * FROM online_db.brand WHERE brand.brand_name = '".$b."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("your brand name is already exists");
    } else {

        Database::iud("INSERT INTO `brand` (brand.brand_name) VALUES ('".$b."') ");
        echo("Success");
    }
    
}
