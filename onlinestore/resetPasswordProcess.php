<?php

include("connection.php");

$vcode = $_POST["vcode"];
$np = $_POST["np"];
$np2 = $_POST["np2"];


if ($np == $np2) {

    $rs = Database::search("SELECT * FROM `user` WHERE user.v_code = '" . $vcode . "'");

    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();

        Database::iud("UPDATE `user` SET `password` = '" . $np . "', `v_code` = NULL WHERE `v_code` = '" . $vcode . "'");
        echo ("success");
    } else {
        echo ("User not found");
    }
} else {
    echo ("Password does not match.");
}
