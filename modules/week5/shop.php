<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Shop | Matthew Vine</title>
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
                <h1>Shop</h1>
                <br>

                <div class="products">
                    <?php 
                        $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
                        if (!$conn) die("Connection failed: " . mysqli_connect_error());

                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='product'>";

                                echo "<img style='width: 100px' src='../../images/" . $row['Image'] . "' alt='" . $row["Name"] . "'>";
                                echo "<h1>" . $row["Name"] . "</h1>";
                                echo "<p>" . $row["Description"] . "</p>";
    
                                echo "<div style='display: flex; justify-content: space-between'>";
                                echo "<p style='text-align: left'>Price: $" . $row["Price"] . "<br>Quantity: " . $row["Quantity"] . "</p>";
                                echo "<form style='display:flex; flex-direction: column' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                                echo "<input type='number' name='" . $row["ProductId"] . "_quantity' value='1' min='1' max='" . $row["Quantity"] . "'>";
                                echo "<input style='padding: 6px; margin-top: 6px' class='button' type='submit' name='add' value='Add to Cart'>";
                                echo "</form>";
                                echo "</div>";
    
                                echo "</div>";
                            }
                        } else {
                            echo "No products found";
                        }

                        mysqli_close($conn);
                    ?>
                </div>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>