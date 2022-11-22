<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Review Items | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Review Items</h1>
                <br>

                <form id="form" action="review.php" method="post">
                    Enter your name: <input type="text" name="name" required>
                    <br><br>

                    <?php 
                        include '../../data/items.php';

                        foreach ($products as $product) {
                            echo "<h1>" . $$product["Name"] . "</h1>";
                            echo "<img style='width: 100px' src='../" . $$product['Image'] . "' alt='" . $$product["Name"] . "'>";
                            echo "<p>" . $$product["Description"] . "</p>";
                            echo "<br>";

                            foreach ($questions as $question) {
                                echo "<h3>" . $question["title"] . "</h3>";

                                $type = "type" . $question["type"];
                                echo "<input type='radio' name='" . $product . '_' . $question["id"] . "' value='0'> " . $$type[0];
                                echo "<input type='radio' name='" . $product . '_' . $question["id"] . "' value='1'> " . $$type[1];
                                echo "<input type='radio' name='" . $product . '_' . $question["id"] . "' value='2'> " . $$type[2];
                                echo "<input type='radio' name='" . $product . '_' . $question["id"] . "' value='3'> " . $$type[3];
                                echo "<input type='radio' name='" . $product . '_' . $question["id"] . "' value='4'> " . $$type[4];

                                echo "<br><br>";
                            }

                            echo "<hr style='width: 66%'>";
                        }
                    ?>

                    <br>
                    <textarea name="comment" placeholder="Extra Comments" rows="7" cols="60"></textarea>
                    <br><br>
                    <input class='button' type="submit">
                </form>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>