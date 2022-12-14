<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Contact Us | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Contact Us</h1>
            
                <div style="font-size: 20px; width: 75%; margin-left: auto; margin-right: auto">
                    <?php
                        $conn = mysqli_connect("mysql.localhost", "matthewvine", "password", "matthewvine");
                        if (!$conn) die("Connection failed: " . mysqli_connect_error());

                        if (isset($_POST["submit"])) {
                            $sql = "UPDATE content SET data = '" . str_replace("'", "''", $_POST["edit_text"]) . "' WHERE page = 'contact_us'";
                            $result = $conn->query($sql);
                        }
                        
                        $sql = "SELECT data FROM content WHERE page = 'contact_us'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            if (isset($_POST["edit"])) echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                            while($row = $result->fetch_assoc()) {
                                if (isset($_POST["edit"])) echo "<textarea name='edit_text' rows='20' style='width: 100%' autofocus wrap>";
                                echo $row["data"];
                                if (isset($_POST["edit"])) echo "</textarea>";
                            }

                            if (isset($_SESSION['loginlevel']) && ($_SESSION['loginlevel'] == 1 || $_SESSION['loginlevel'] == 2)) {
                                if (!isset($_POST["edit"])) echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                                if (isset($_POST["edit"])) echo "<input class='button' style='margin-top: 16px' type='submit' name='submit'>";
                                else echo "<input class='button' style='margin-top: 16px' name='edit' type='submit' name='edit' value='Edit Page'>";
                                echo "</form>";
                            }
                        } else {
                            echo "Content not found";
                        }
                        
                        mysqli_close($conn);
                    ?>
                </div>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>