<?php

include("connection.php");
session_start();
if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM online_db.`user` INNER JOIN online_db.user_type ON user.user_type_id = user_type.utype_id ORDER BY user.id ASC");
    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Report</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body>

        <div class="container">
            <a href="addminrepot.php">
                <img src="resources\img\Image20240528131615.png" height="25" class="mt-3">
            </a>
        </div>

        <div class="mt-5" id="printArea">
            <h3 class="text-center">User Repot</h3>
            <div class="mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobail No</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();

                        ?>

                            <tr>
                                <td><?php echo ($d["id"]); ?></td>
                                <td><?php echo ($d["fname"]); ?></td>
                                <td><?php echo ($d["lname"]); ?></td>
                                <td><?php echo ($d["email"]); ?></td>
                                <td><?php echo ($d["mobile"]); ?></td>
                                <td><?php echo ($d["type"]); ?></td>
                                <td>
                                    <?php

                                    if ($d["status"] == 1) {
                                        echo '<span class="text-primary">Active</span>';
                                    } else {
                                        echo '<span class="text-danger">Inactive</span>';
                                    }

                                    ?>
                                </td>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container d-flex justify-content-end mt-4" id="div1">
            <button class="btn btn-outline-info col-3" onclick="buttonPrint();">Print</button>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php


} else {
    echo ("Your not valid addmin");
}


?>