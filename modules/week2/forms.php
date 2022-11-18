<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Matthew Vine's site for Liberty University Online's CSIS 410: D01">
        <meta name="keywords" content="HTML, CSS, PHP, Matthew Vine, Liberty University, CSIS 410">
        <meta name="author" content="Matthew Vine">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style.css">
        <title>Forms | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Module 2: Week 2 Forms Assignment</h1>
                <br>

                <div id="buttons">
                    <button class="button" onclick="get()">GET</button>
                    <button class="button" onclick="post()">POST</button>
                </div>
                <script>
                    function get() {
                        document.getElementById("buttons").style.display = 'none';
                        document.getElementById("form").style.display = 'block';
                        document.getElementById("form").method = 'get';
                    }
                    function post() {
                        document.getElementById("buttons").style.display = 'none';
                        document.getElementById("form").style.display = 'block';
                        document.getElementById("form").method = 'post';
                    }
                </script>

                <form id="form" style="display: none" action="display.php" method="get">
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