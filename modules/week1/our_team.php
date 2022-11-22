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
                    include '../../data/employees.php';

                    $grid = array(
                        array(null, null, null, 'matthewvine', null, null, null),
                        array(null, array(array(), array("bottom"), array("right"), array("left", "top")), 'johnsmith', array(array("right", "bottom"), array("left", "bottom"), array("top"), array("top")), 'jamesrice', null, null),
                        array('romero', array(array("right", "bottom"), array("left", "bottom"), array("top"), array("top")), 'janedoe', null, array(array("right"), array("left", "bottom"), array(), array("top")), 'sethdube')
                    );

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
                                echo "<div class='employee'>";
                                echo "<img src='../" . $$item['Image'] . "' alt='" . $$item['Name'] . "'>";
                                echo "<h1><a href='employee.php?name=" . $item . "'>" . $$item['Name'] . "</a></h1>";
                                echo "<div class='employee-info'>";
                                echo "<h4>" . $$item['Title'] . "</h4>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    }
                    echo "</div>";
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>