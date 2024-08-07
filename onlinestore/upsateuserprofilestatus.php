<?php

include("connection.php");

$u = $_POST["u"];

if (empty($u)) {
    echo("Please enter your User ID.");
}else {
    

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$u."' AND `user_type_id` = '2'");
    $num = $rs->num_rows;
    //echo($num);

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {
            
            Database::iud("UPDATE `user` SET user.`status` = '0' WHERE user.id = '".$u."'");
            echo("Inactive");
        }
        
        if ($d["status"] == 0) {

            Database::iud("UPDATE `user` SET user.`status` = '1' WHERE user.id = '".$u."'");
            echo("Active");
        }

    } else {
        
        echo("User ID is invalid");
    }
    
}


?>