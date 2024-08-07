<?php

include("connection.php");

$c = $_POST["s"];

if (empty($c)) {
    echo "Please enter the Size.";
}elseif (strlen($c) > 10) {
    echo "The colour name shoud be less than 10 charecters.";
}else {
    $rs = Database::search("SELECT * FROM `size` WHERE size.size_name = '".$c."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo "The Size name is already exist.";
    }else {
        Database::iud("INSERT INTO `size` (size.size_name) VALUES ('".$c."')");
        echo "Success";
    }
}

?>