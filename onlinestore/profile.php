<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($user)) {

    $rs = Database::search("SELECT * FROM online_db.`user` WHERE user.id = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>Profile</title>

        <style>
            body {
                overflow: hidden;
                /* Hide scrollbars */
            }
        </style>

    </head>

    <body>
        <!-- homeNavBar -->
        <?php include("homeNavBar.php"); ?>
        <!-- homeNavBar -->

        <div class="addminbody">
            <div class="row container">

                <div class="col-4 m-auto">
                    <div class="d-flex justify-content-center">
                        <img src="<?php

                                    if (!empty($d["img_path"])) {
                                        echo ("resources/profileImage/" . $d["img_path"]);
                                    } else {
                                        echo ("resources\img\profile.png");
                                    }

                                    ?>" height="150px" id="i">
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" placeholder="no file chosen" id="imageuploader">
                    </div>
                    <div class="my-2">
                        <button class="btn btn-outline-warning col-12" onclick="uploadimage();">Upload Profile Image</button>
                    </div>

                    <div class="my-5">
                        <button class="btn btn-outline-info col-12" onclick="updatedata();">Upload Profile Details</button>
                    </div>
                </div>


                <div class="row col-8 my-5">
                    <div class="offset-2 col-10 mt-4">
                        <h3 class="text-center text-info-emphasis">Profile Details</h3>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">First name</label>
                                <input type="text" class="form-control" value="<?php echo ($d["fname"]); ?>" id="fname">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last name</label>
                                <input type="text" class="form-control" value="<?php echo ($d["lname"]); ?>" id="lname">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo ($d["email"]); ?>" id="email">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Mobile</label>
                            <input type="email" class="form-control" value="<?php echo ($d["mobile"]); ?>" id="mobile">
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">User name</label>
                                <input type="text" class="form-control" value="<?php echo ($d["username"]); ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" value="<?php echo ($d["password"]); ?>" id="password">
                            </div>
                        </div>
                        <h5 class="mt-4">Shipping Address</h5>
                        <div class="row mt-3">
                            <div class="col-3">
                                <label class="form-label">NO :</label>
                                <input type="text" class="form-control" value="<?php echo ($d["no"]); ?>" id="no">
                            </div>
                            <div class="col-9">
                                <label class="form-label">Line 01</label>
                                <input type="text" class="form-control" value="<?php echo ($d["line_01"]); ?>" id="add01">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Line 02</label>
                            <input type="text" class="form-control" value="<?php echo ($d["line_02"]); ?>" id="add02">
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    header("Location: signin.php");
}

?>