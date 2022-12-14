<?php session_start() ?>
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
                    include '../../data/quiz.php';

                    $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
                    if (!$conn) die("Connection failed: " . mysqli_connect_error());

                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $method = "_" . $_SERVER['REQUEST_METHOD'];
                
                        echo "<p style='font-size: 20px'><strong>Name:</strong> " . $$method["name"] . "</p>";
                        echo "<p style='font-size: 20px'><strong>Comments:</strong> " . (($$method["comment"] == "") ?  'None' : $$method["comment"]) . "</p>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<table>";
                            echo "<tr><th colspan='2'>";
                            echo "<div style='float: left'><img style='height: 50px' src='../../images/" . $row['Image'] . "' alt='" . $row["Name"] . "'></div>";
                            echo "<div style='margin-left: 16px; float: left'>" . $row["Name"] . "<br><span style='font-weight: normal'>" . $row["Description"] . "</span></div>";
                            echo "</th></tr>";
                                
                            foreach ($questions as $question) {
                                echo "<tr>";
                                $type = "type" . $question["type"];
                                $id = $row["ProductId"] . '_' . $question["id"];
                                    
                                echo "<td>" . $question["title"] . "</td>";
                                if (isset($$method[$id])) echo "<td>" . $$type[$$method[$id]] . "</td>";
                                else echo "<td>None</td>";
                                echo "</tr>";
                            }
                            echo "</table><br>";
                        }
                    } else {
                        echo "No products found";
                    }
                    
                    mysqli_close($conn);
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>