<?php
    session_start();
    if ($_SESSION['loginlevel'] != 1) {
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
                    <select name="employee" onchange="employeeSelection(this.value);">
                        <option value="add">Add Employee</option>
                        <?php
                            include '../../data/employees.php';

                            foreach (array_keys($employees) as $employee) {
                                echo "<option value='" . $employee . "'>" . $$employee["Name"] . "</option>";
                            }
                        ?>
                    </select>
                    <br><br>

                    Name: <input type="text" name="name">
                    <br><br>
                    Degree: <input type="text" name="degree">
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
                    Joined Company: <input type="number" name="joinDate" min="1900" max="<?php echo date("Y"); ?>" value="<?php echo date("Y"); ?>">

                    <br><br>
                    <input class='button' type="submit">
                </form>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>