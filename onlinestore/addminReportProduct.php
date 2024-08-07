<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM online_db.product INNER JOIN online_db.brand ON product.brand_id = brand.brand_id INNER JOIN
online_db.colour ON product.colour_id = colour.colour_id INNER JOIN online_db.category ON
product.category_id = category.category_id INNER JOIN online_db.size ON product.size_id = size.size_id
ORDER BY product.id ASC ");

    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Repot</title>
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
            <h3 class="text-center">Product Repot</h3>
            <div class="mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Colour</th>
                            <th scope="col">Size</th>
                            <th scope="col">Disription</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();

                        ?>

                            <tr>
                                <td><?php echo ($d["id"]); ?></td>
                                <td><?php echo ($d["name"]); ?></td>
                                <td><?php echo ($d["brand_name"]); ?></td>
                                <td><?php echo ($d["colour_name"]); ?></td>
                                <td><?php echo ($d["size_name"]); ?></td>
                                <td><?php echo ($d["description"]); ?></td>
                                <td><img src="<?php echo ($d["path"]); ?>" height="100"></td>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container d-flex justify-content-end my-5" id="div1">
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