<?php session_start() ?>
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
                if (isset($_POST["checkout"])) {
                    unset($_SESSION['cart']);
                } else if (isset($_SESSION["cart"])) {
                    foreach($_POST as $key => $value) {
                        if (str_contains($key, "_remove")) {
                            $product = substr($key, 0, -7);
                            unset($_SESSION['cart'][$product]);
                        } else if (str_contains($key, "_plus")) {
                            $product = substr($key, 0, -5);
                            $_SESSION['cart'][$product]++;
                        } else if (str_contains($key, "_minus")) {
                            $product = substr($key, 0, -6);
                            $_SESSION['cart'][$product]--;
                            if ($_SESSION['cart'][$product] == 0) {
                                unset($_SESSION['cart'][$product]);
                            }
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

                <?php
                    if (isset($_SESSION['cart'])) {
                        $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
                        if (!$conn) die("Connection failed: " . mysqli_connect_error());

                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $subtotal = 0;

                            echo "<ul style='list-style-type: none; width: 66%; margin-left: auto; margin-right: auto'>";
                            while ($row = $result->fetch_assoc()) {
                                foreach($_SESSION['cart'] as $key => $value) {
                                    if ($row['ProductId'] == $key) {
                                        echo "<li style='margin: 16px; display: flex; justify-content: space-between'>";
            
                                        echo "<div style='display: flex'>";
                                        echo "<img style='width: 100px;' src='../../images/" . $row['Image'] . "' alt='" . $row["Name"] . "'>";
                                        echo "<h1 style='align-self: center; margin-left: 8px'>" . $row["Name"] . "</h1>";
                                        echo "</div>";
            
                                        echo "<div style='align-self: center'>";
                                        echo "<div style='display: flex'><div>Quantity: " . $value . "</div>";
                                        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                                        echo "<button style='border: none; cursor: pointer; margin: 0px 4px; padding: 0px' name='" . $key . "_plus' type='submit'><img style='width:16px;' src='../../images/arrow-up.png' alt='up arrow'></button>";
                                        echo "<button style='border: none; cursor: pointer; margin: 0px 4px; padding: 0px' name='" . $key . "_minus' type='submit'><img style='width:16px;' src='../../images/arrow-down.png' alt='down arrow'></button>";
                                        echo "</form>";
                                        echo "</div>";
                                        echo "<div>Price: $" . $row['Price'] * $value . "</div>";
                                        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                                        echo "<input style='padding: 6px; margin-top: 6px' class='button' type='submit' name='" . $key . "_remove' value='Remove from Cart'>";
                                        echo "</form>";
                                        echo "</div>";
            
                                        echo "</li>";
                                        
                                        $subtotal += $row['Price'] * $value;
                                    }
                                }
                            }
                            echo "</ul>";

                            $total = $subtotal * 1.055;
    
                            echo "<br><div style='font-size: 18px'>Sub Total: $" . ceil($subtotal * 100) / 100;
                            echo "<br>Tax: $" . ceil(($total - $subtotal) * 100) / 100;
                            echo "</div><div style='font-size: 20px'>Total: $" . ceil($total * 100) / 100 . "</div>";
    
                            echo "<br><form method='post'>";
                            echo '<input class="button" type="submit" name="checkout" value="Checkout">';
                            echo '</form>';
                        } else {
                            echo "Error retreiving cart";
                        }

                        mysqli_close($conn);
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