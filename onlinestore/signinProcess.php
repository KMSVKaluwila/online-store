<?php

session_start();
include("connection.php");

$un = $_POST["un"];
$pw = $_POST["pw"];
$rm = $_POST["rm"];

if (empty($un)) {
    echo ("Please enter your user name.");
} elseif (strlen($un) > 20) {
    echo ("The user name shoud be less than 20 charectars");
} elseif (empty($pw)) {
    echo ("Please enter your password");
} elseif (strlen($pw) < 5 or strlen($pw) > 45) {
    echo ("Your password must cantain 5-45 charectares ");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $un . "' AND `password` = '" . $pw . "' ");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        # home page
        if ($d["status"] == 1) {

            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rm == true) {

                setcookie("username", $un, time() + (60 * 60 * 24 * 365));
                setcookie("password", $pw, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }
        } else {

            echo ("Inactive user");
        }
    } else {
        echo ("Invalid your user namne or password.");
    }
}
