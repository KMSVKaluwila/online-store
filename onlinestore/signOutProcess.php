<?php

session_start();
$user = $_SESSION["u"];

if (isset($user)) {
    $_SESSION["u"] = null;
    session_destroy();
    echo "Sign out successful.";
}
