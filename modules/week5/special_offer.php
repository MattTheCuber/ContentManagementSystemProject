<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Special Offers | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php
                foreach($_POST as $key => $value) {
                    if (str_contains($key, "_quantity")) {
                        $product = substr($key, 0, -9);
                        $quantity = $_POST[$key];

                        $_SESSION["cart"][$product] = $quantity;
                    }
                }
            ?>

            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Special Offers</h1>
                <br>

                <div class="products">
                    <?php 
                        include '../../data/items.php';

                        foreach ($specialproducts as $product) {
                            echo "<div class='product'>";

                            echo "<img style='width: 100px' src='../" . $$product['Image'] . "' alt='" . $$product["Name"] . "'>";
                            echo "<h1>" . $$product["Name"] . "</h1>";
                            echo "<p>" . $$product["Description"] . "</p>";

                            echo "<div style='display: flex; justify-content: space-between'>";
                            echo "<p style='text-align: left'>Price: $" . $$product["Price"] . "<br>Quantity: " . $$product["Quantity"] . "</p>";
                            echo "<form style='display:flex; flex-direction: column' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                            echo "<input type='number' name='" . $product . "_quantity' value='1' min='1' max='" . $$product["Quantity"] . "'>";
                            echo "<input style='padding: 6px; margin-top: 6px' class='button' type='submit' name='add' value='Add to Cart'>";
                            echo "</form>";
                            echo "</div>";

                            echo "</div>";
                        }
                    ?>
                </div>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>