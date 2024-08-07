<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"]["tmp_name"])) {
    echo "empty";
} else {
    // Fetch the user record
    $rs = Database::search("SELECT * FROM online_db.`user` WHERE user.id = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

    // Check if there's an existing image path and unlink it
    if (!empty($d["img_path"])) {
        $existingImagePath = "resources/profileImage/" . $d["img_path"];
        if (file_exists($existingImagePath)) {
            unlink($existingImagePath);
        }
    }

    // Define the new image path
    $newFileName = uniqid() . ".png";
    $newImagePath = "resources/profileImage/" . $newFileName;

    // Move the uploaded file to the new path
    move_uploaded_file($_FILES["i"]["tmp_name"], $newImagePath);

    // Update the database with the new image path (just the file name)
    Database::iud("UPDATE online_db.`user` SET user.img_path = '" . $newFileName . "' WHERE user.id = '" . $user["id"] . "'");

    // Output the new path
    echo $newImagePath;
}
