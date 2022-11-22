<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Review | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Review</h1>

                <p><a href="review_items.php" class="button">← Go back</a></p>
                <br><br>

                <?php
                    include '../../data/items.php';

                    $method = "_" . $_SERVER['REQUEST_METHOD'];
                    
                    echo "<p style='font-size: 20px'><strong>Name:</strong> " . $$method["name"] . "</p>";
                    echo "<p style='font-size: 20px'><strong>Comments:</strong> " . (($$method["comment"] == "") ?  'None' : $$method["comment"]) . "</p>";

                    foreach ($products as $product) {
                        echo "<table>";
                        echo "<tr><th colspan='2'>";
                        echo "<div style='float: left'><img style='height: 50px' src='../" . $$product['Image'] . "' alt='" . $$product["Name"] . "'></div>";
                        echo "<div style='margin-left: 16px; float: left'>" . $$product["Name"] . "<br><span style='font-weight: normal'>" . $$product["Description"] . "</span></div>";
                        echo "</th></tr>";
                        
                        foreach ($questions as $question) {
                            echo "<tr>";
                            $type = "type" . $question["type"];
                            $id = $product . '_' . $question["id"];
                            
                            echo "<td>" . $question["title"] . "</td>";
                            if (isset($$method[$id])) echo "<td>" . $$type[$$method[$id]] . "</td>";
                            else echo "<td>None</td>";
                            echo "</tr>";
                        }
                        echo "</table><br>";
                    }
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>