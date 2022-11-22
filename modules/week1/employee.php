<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Employee | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <p><a href='<?php echo isset($_POST["name"]) ? "../week3/manage_employee.php" : "our_team.php" ?>' class="button">← Go back</a></p>
                <br><br>

                <?php
                    include '../../data/employees.php';

                    $employee;

                    if(isset($_POST["name"])) {
                        $name = $_POST["employee"];
                        if ($name != "add") {
                            $employee = $$name;
                            if ($_POST["name"]) $employee["Name"] = $_POST["name"];
                            if ($_POST["title"]) $employee["Title"] = $_POST["title"];
                            if ($_POST["department"]) $employee["Department"] = $_POST["department"];
                            $employee["Joined Company"] = $_POST["joinDate"];
                        } else {
                            $employee = array("Name" => $_POST["name"],
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
                    echo "<h4>Title: " . ($employee['Title'] ? $employee['Title'] : "None") . "</h4>";
                    echo "<h4>Department: " . ($employee['Department'] != "-" ? $employee['Department'] : "Not assigned") . "</h4>";
                    echo "<h4>Joined Company: " . ($employee['Joined Company'] ? $employee['Joined Company'] : date("Y")) . "</h4>";
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>