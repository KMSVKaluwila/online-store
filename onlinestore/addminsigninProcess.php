<?php
session_start();
include("connection.php");

$un = $_POST["un"];
$pw  = $_POST["pw"];

//echo($un);
//echo($pw);

if (empty($un)) {
    echo ("Please enter your user name.");
} elseif (strlen($un) > 20) {
    echo ("The user name shoud be less than 20 charecters");
} elseif (empty($pw)) {
    echo ("Please enter your password.");
} elseif (strlen($pw) < 5 || strlen($pw) > 45) {
    echo ("Your password must contain 5 - 45 characters");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $un . "' AND `password` = '" . $pw . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == 1) {

            echo ("Success");

            $_SESSION["a"] = $d;
        } else {
            echo ("You don't have an addmin account");
        }

    } else {

        echo ("The username and password is invalid");
    }
}
