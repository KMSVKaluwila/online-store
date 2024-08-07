<?php

include("connection.php");

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$m = $_POST["m"];
$un = $_POST["un"];
$pw = $_POST["pw"];

if (empty($fn)) {
    echo ("Please enter your first name.");
} elseif (strlen($fn) > 20) {
    echo ("Your first name shoud be less than 20 characters");
} elseif (empty($ln)) {
    echo ("Please enter your last name.");
} elseif (strlen($ln) > 20) {
    echo ("Your last name shoud be less than 20 characters");
} elseif (empty($e)) {
    echo ("Please enter your email.");
} elseif (strlen($e) > 100) {
    echo ("Your email shoud be less 100 characters");
} elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo ("The email address is invalid");
} elseif (empty($m)) {
    echo ("Please enter your mobile number.");
} elseif (strlen($m) != 10) {
    echo ("Your mobile shoud be 10 nimbers");
} elseif (!preg_match("/0[2,7]{1}[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $m)) {
    echo ("The mobile number is invalid");
} elseif (empty($un)) {
    echo ("Please enter your user name.");
} elseif (strlen($un) > 20) {
    echo ("Your user name shoud be less than 20 characters");
} elseif (empty($pw)) {
    echo ("Please enter your password.");
} elseif (strlen($pw) < 5 || strlen($pw) > 45) {
    echo ("Your password must contain 5 - 45 characters");
} else {
    $rs = Database::search("SELECT * FROM online_db.`user` WHERE user.email = '" . $e . "' OR user.mobile = '" . $m . "' OR user.username = '" . $un . "' ");
    $num = $rs->num_rows;

    if ($num > 0) {

        echo ("your email or mobile or username allready exists");
    } else {

        Database::iud("INSERT INTO `online_db`.`user` (`fname`, `lname`, `email`, `mobile`, `username`, `password`, `status`, `user_type_id`)
        VALUES ('" . $fn . "', '" . $ln . "', '" . $e . "', '" . $m . "', '" . $un . "', '" . $pw . "', '1', '2') ");
        echo ("Success");
    }
}
