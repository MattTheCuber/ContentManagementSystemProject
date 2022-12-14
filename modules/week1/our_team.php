<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Our Team | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Our Team</h1>

                <?php
                    $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
                    if (!$conn) die("Connection failed: " . mysqli_connect_error());

                    $grid = array(
                        array(null, null, null, '1', null, null, null),
                        array(null, array(array(), array("bottom"), array("right"), array("left", "top")), '2', array(array("right", "bottom"), array("left", "bottom"), array("top"), array("top")), '3', null, null),
                        array('4', array(array("right", "bottom"), array("left", "bottom"), array("top"), array("top")), '5', null, array(array("right"), array("left", "bottom"), array(), array("top")), '6')
                    );

                    $sql = "SELECT * FROM employees";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($dbrow = $result->fetch_assoc()) {
                            $ri = 0;
                            foreach ($grid as $row) {
                                $ci = 0;
                                foreach ($row as $item) {
                                    if ($item == $dbrow["EmployeeId"]) $grid[$ri][$ci] = $dbrow;
                                    $ci++;
                                }
                                $ri++;
                            }
                        }

                        echo "<div class='employees'>";
                        foreach($grid as $row) {
                            foreach($row as $item) {
                                if (!$item) {
                                    echo "<div></div>";
                                } else if (is_array($item) && array_values($item) === $item) {
                                    echo "<div class='lines'>";
                                    foreach($item as $line) {
                                        echo "<div style='";
                                        foreach($line as $side) {
                                            echo "border-" . $side . ": 1px solid black;";
                                        }
                                        echo "'></div>";
                                    }
                                    echo "</div>";
                                } else {
                                    if ($item['Image'] == "") $item['Image']= "placeholder.png";
                                    echo "<div class='employee'>";
                                    echo "<img src='../../images/" . $item['Image'] . "' alt='" . $item['Name'] . "'>";
                                    echo "<h1><a href='employee.php?id=" . $item['EmployeeId'] . "'>" . $item['Name'] . "</a></h1>";
                                    echo "<div class='employee-info'>";
                                    echo "<h4>" . $item['Title'] . "</h4>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                        }
                        echo "</div>";
                    } else {
                         echo "No employees found";
                    }

                    echo "<br><br>";
                    
                    foreach ($_POST as $key => $value) {
                        if (str_contains($key, "_delete")) {
                            $id = substr($key, 0, -7);
                            $sql = "DELETE FROM comments WHERE ID=" . $id;

                            if ($conn->query($sql) === TRUE) {
                                echo "<p class='success'>Successfully deleted record</p>";
                            } else {
                                echo "<p class='error'>Error deleting record: " . $conn->error . "</p>";
                            }
                        }
                    }
                    
                    $sql = "SELECT * FROM comments";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='comment'>";
                            echo "<h3>" . $row["name"]. "</h3>Title: " . $row["title"]. "<br>Date: " . $row["commentdate"] . "<br>Comments: " . $row["comments"] . "<br><br>";
                            if (isset($_SESSION['loginlevel']) && $_SESSION['loginlevel'] == 1) {
                                echo "<form method='post'>";
                                echo "<input type='submit' name='" . $row['ID'] . "_delete' value='Delete' style='padding: 8px; margin-bottom: 16px' class='button'>";
                                echo "</form>";
                            }
                            if (isset($_SESSION['loginlevel']) && $_SESSION['loginlevel'] == 3) {
                                echo "<form method='post' action='../week6/comment.php'>";
                                echo "<input type='submit' name='" . $row['ID'] . "_update' value='Update' style='padding: 8px; margin-bottom: 16px' class='button'>";
                                echo "</form>";
                            }
                            echo "</div>";
                        }
                    } else {
                         echo "No Comments Yet!";
                    }
            
                    mysqli_close($conn);

                    function delete_comment($id) {
                        echo $id;
                    }
                ?>
                <br>
                <a class='button' href="../week6/comment.php">Add a Comment</a>
                <br>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>