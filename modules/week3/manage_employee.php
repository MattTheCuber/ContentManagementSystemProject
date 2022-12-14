<?php
    session_start();
    if ($_SESSION['loginlevel'] != 1 && $_SESSION['loginlevel'] != 2) {
        header('Location: ../week4/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Manage Employee | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Manage Employee</h1>

                <form method="post" action="../week1/employee.php">
                    Employee:
                    <select name="id" onchange="employeeSelection(this.value);">
                        <option value="add">Add Employee</option>
                        <?php
                            $conn = mysqli_connect("mysql.localhost", "matthewvine", "password", "matthewvine");
                            if (!$conn) die("Connection failed: " . mysqli_connect_error());

                            $sql = "SELECT * FROM employees";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["EmployeeId"] . "'>" . $row["Name"] . "</option>";
                                }
                            }
                            
                            mysqli_close($conn);
                        ?>
                    </select>
                    <br><br>

                    Name: <input type="text" name="name">
                    <br><br>
                    Title: <input type="text" name="title">
                    <br><br>
                    Department:
                    <select name="department">
                        <option>-</option>
                        <option value='Management'>Management</option>
                        <option value='Development'>Development</option>
                        <option value='Design'>Design</option>
                    </select>
                    <br><br>
                    Joined Company: <input type="date" name="joinDate">

                    <br><br>
                    <input class='button' type="submit">
                    <?php
                        if ($_SESSION['loginlevel'] == 1) {
                            echo '<input class="button" style="background-color: #CC0000;" type="submit" name="delete" value="Delete">';
                        }
                    ?>
                </form>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>