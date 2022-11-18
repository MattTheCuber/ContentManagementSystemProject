<?php
    session_start();
    if ($_SESSION['authenticated'] != true) {
        header('Location: ../week4/sessions.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Matthew Vine's site for Liberty University Online's CSIS 410: D01">
        <meta name="keywords" content="HTML, CSS, PHP, Matthew Vine, Liberty University, CSIS 410">
        <meta name="author" content="Matthew Vine">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style.css">
        <title>Module 1: Week 1 Variables Assignment | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Module 1: Week 1 Variables Assignment</h1>

                <h2>Organization Chart</h2>
                <?php
                    include '../../data/variables.php';

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
                                echo "<h3>" . $$item['Degree'] . "</h3>";
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