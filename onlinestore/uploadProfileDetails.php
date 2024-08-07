<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$m = $_POST["m"];
$pw = $_POST["pw"];
$no = $_POST["no"];
$a01 = $_POST["a01"];
$a02 = $_POST["a02"];

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
} elseif (empty($pw)) {
    echo ("Please enter your password.");
} elseif (strlen($pw) < 5 || strlen($pw) > 45) {
    echo ("Your password must contain 5 - 45 characters");
} elseif (empty($no)) {
    echo "Please enter your address number.";
} elseif (strlen($no) > 10) {
    echo "The address number should be fewer than 10 characters.";
} elseif (empty($a01)) {
    echo "Please enter your address line 1.";
} elseif (strlen($a01) > 100) {
    echo "The address line 01 should be fewer than 100 characters.";
} elseif (empty($a02)) {
    echo "Please enter your address line 2.";
} elseif (strlen($a02) > 100) {
    echo "The address line 02 should be fewer than 100 characters.";
} else {
    Database::iud("UPDATE online_db.`user` SET
    user.fname = '" . $fn . "',
    user.lname = '" . $ln . "',
    user.email = '" . $e . "',
    user.mobile = '" . $m . "',
    user.password = '" . $pw . "',
    user.no = '" . $no . "',
    user.address_01 = '" . $a01 . "',
    user.address_02 = '" . $a02 . "' WHERE user.id = '".$user["id"]."'");

    $rs = Database::search("SELECT * FROM online_db.`user` WHERE user.id = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;
    echo "Update successfully";
}
