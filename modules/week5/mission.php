<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Mission | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Mission</h1>

                <div style="font-size: 20px; width: 75%; margin-left: auto; margin-right: auto">
                    <?php
                        $conn = mysqli_connect("mysql.localhost", "matthewvine", "password", "matthewvine");
                        if (!$conn) die("Connection failed: " . mysqli_connect_error());
                        
                        $sql = "SELECT data FROM content WHERE page = 'mission'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo $row["data"];
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