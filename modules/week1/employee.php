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
                    $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
                    if (!$conn) die("Connection failed: " . mysqli_connect_error());

                    $employee;
                    $id;

                    if(isset($_POST["name"])) {
                        if (isset($_POST["delete"])) {
                            if ($_POST["id"] != "add") {
                                $sql = "DELETE FROM employees
                                        WHERE EmployeeId = " . $_POST["id"];

                                if ($conn->query($sql) === TRUE) {
                                    echo "<p class='success'>Successfully deleted record</p>";
                                } else {
                                    echo "<p class='error'>Error deleting record: " . $conn->error . "</p>";
                                }
                            }
                        } else {
                            if ($_POST["id"] == "add") {
                                $sql = "INSERT INTO Employees (Name, Title, Department, JoinedDate, Image) 
                                        VALUES ('" . $_POST["name"] . "', '" . $_POST["title"] . "', '" . $_POST["department"] . "', '" . $_POST["joinDate"] . "', NULL)";

                                if ($conn->query($sql) === TRUE) {
                                    echo "<p class='success'>Successfully added record</p>";
                                } else {
                                    echo "<p class='error'>Error adding record: " . $conn->error . "</p>";
                                }

                                $id = $conn->insert_id;
                            } else {
                                $sql = "UPDATE Employees
                                        SET Name = '" . $_POST["name"] . "', Title = '" . $_POST["title"] . "', Department = '" . $_POST["department"] . "', JoinedDate = '" . $_POST["joinDate"] . "' " .
                                    "WHERE EmployeeId = " . $_POST["id"] . "";

                                if ($conn->query($sql) === TRUE) {
                                    echo "<p class='success'>Successfully updated record</p>";
                                } else {
                                    echo "<p class='error'>Error updated record: " . $conn->error . "</p>";
                                }

                                $id = $_POST["id"];
                            }
                        }
                    } else if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }

                    if (isset($id)) {
                        $sql = "SELECT * FROM employees WHERE EmployeeId = " . $id;
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $employee = $result->fetch_assoc();
                        } else {
                            unset($employee);
                        }
                    }

                    if (isset($employee)) {
                        if ($employee['Image'] == "") $employee['Image']= "placeholder.png";
                        echo "<img src='../../images/" . $employee['Image'] . "' alt='" . $employee['Name'] . "'>";
                        echo "<h1>" . ($employee['Name'] ? $employee['Name'] : "None") . "</h1>";
                        echo "<h4>Title: " . ($employee['Title'] ? $employee['Title'] : "None") . "</h4>";
                        echo "<h4>Department: " . ($employee['Department'] != "-" ? $employee['Department'] : "Not assigned") . "</h4>";
                        echo "<h4>Joined Company: " . ($employee['JoinedDate'] ? $employee['JoinedDate'] : date("Y")) . "</h4>";
                    }
                    
                    mysqli_close($conn);
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>