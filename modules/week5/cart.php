<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Cart | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php
                if (session_status() == PHP_SESSION_NONE) session_start();
                if (isset($_POST["checkout"])) {
                    unset($_SESSION['cart']);
                } else if (isset($_SESSION["cart"])) {
                    foreach($_POST as $key => $value) {
                        if (str_contains($key, "_remove")) {
                            $product = substr($key, 0, -7);
                            unset($_SESSION['cart'][$product]);
                        }
                        if (count($_SESSION['cart']) == 0) {
                            unset($_SESSION['cart']);
                        }
                    }
                }
            ?>

            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Cart</h1>
                <br>

                <?php
                    if (isset($_SESSION['cart'])) {
                        include '../../data/items.php';

                        echo "<ul style='list-style-type: none; width: 66%; margin-left: auto; margin-right: auto'>";
                        foreach($_SESSION['cart'] as $key => $value) {
                            $product = $$key;
                            echo "<li style='margin: 16px; display: flex; justify-content: space-between'>";

                            echo "<div style='display: flex'>";
                            echo "<img style='width: 100px;' src='../" . $product['Image'] . "' alt='" . $product["Name"] . "'>";
                            echo "<h1 style='align-self: center; margin-left: 8px'>" . $product["Name"] . "</h1>";
                            echo "</div>";

                            echo "<div style='align-self: center'>";
                            echo "<div>Quantity: " . $value . "</div>";
                            echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                            echo "<input style='padding: 6px; margin-top: 6px' class='button' type='submit' name='" . $key . "_remove' value='Remove from Cart'>";
                            echo "</form>";
                            echo "</div>";

                            echo "</li>";
                        }
                        echo "</ul>";

                        $subtotal = 0;
                        foreach($_SESSION['cart'] as $key => $value) {
                            $product = $$key;
                            $subtotal += $product['Price'] * $value;
                        }
                        $total = $subtotal * 1.055;

                        echo "<br><div style='font-size: 20px'>Sub Total: $" . ceil($subtotal * 100) / 100;
                        echo "<br>Total: $" . ceil($total * 100) / 100 . "</div>";

                        echo "<br><form method='post'>";
                        echo '<input class="button" type="submit" name="checkout" value="Checkout">';
                        echo '</form>';
                    } else {
                        echo "<h3>Your cart is empty.</h3>";
                        echo "<br><a class='button' href='shop.php'>Go to store</a>";
                    }
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>