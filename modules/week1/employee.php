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
                <h1><?php echo isset($_POST["name"]) ? "Module 3: Week 3 Arrays Assignment" : "Module 1: Week 1 Variables Assignment" ?></h1>

                <p><a href='<?php echo isset($_POST["name"]) ? "../week3/arrays.php" : "variables.php" ?>' class="button">← Go back</a></p>
                <br><br>

                <?php
                    include '../../data/variables.php';

                    $employee;

                    if(isset($_POST["name"])) {
                        $name = $_POST["employee"];
                        if ($name != "add") {
                            $employee = $$name;
                            if ($_POST["name"]) $employee["Name"] = $_POST["name"];
                            if ($_POST["degree"]) $employee["Degree"] = $_POST["degree"];
                            if ($_POST["title"]) $employee["Title"] = $_POST["title"];
                            if ($_POST["department"]) $employee["Department"] = $_POST["department"];
                            $employee["Joined Company"] = $_POST["joinDate"];
                        } else {
                            $employee = array("Name" => $_POST["name"],
                                "Degree" => $_POST["degree"],
                                "Title" => $_POST["title"],
                                "Department" => $_POST["department"],
                                "Joined Company" => $_POST["joinDate"],
                                "Image" => "../images/placeholder.png");
                        }
                    } else {
                        $name = $_GET['name'];
                        $employee = $$name;
                    }

                    echo "<img src='../" . $employee['Image'] . "' alt='" . $employee['Name'] . "'>";
                    echo "<h1>" . ($employee['Name'] ? $employee['Name'] : "None") . "</h1>";
                    echo "<h4>Degree: " . ($employee['Degree'] ? $employee['Degree'] : "None") . "</h4>";
                    echo "<h4>Title: " . ($employee['Title'] ? $employee['Title'] : "None") . "</h4>";
                    echo "<h4>Department: " . ($employee['Department'] != "-" ? $employee['Department'] : "Not assigned") . "</h4>";
                    echo "<h4>Joined Company: " . ($employee['Joined Company'] ? $employee['Joined Company'] : date("Y")) . "</h4>";
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>