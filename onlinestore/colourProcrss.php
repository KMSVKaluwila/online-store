<?php

include("connection.php");

$c = $_POST["c"];

if (empty($c)) {
    echo "Please enter the colour.";
}elseif (strlen($c) > 20) {
    echo "The colour name shoud be less than 10 charecters.";
}else {
    $rs = Database::search("SELECT * FROM `colour` WHERE colour.colour_name = '".$c."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo "The colour name is already exist.";
    }else {
        Database::iud("INSERT INTO `colour` (colour.colour_name) VALUES ('".$c."')");
        echo "Success";
    }
}

?>