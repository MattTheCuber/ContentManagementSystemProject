<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "view/meta.php"; ?>
        <link rel="stylesheet" href="style.css">
        <title>Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "view/header.php"; ?>

            <div class="content">
                <h1>Home</h1>

                <p>Welcome to Matthew Vine's website for buying clothing!</p>

                <h2>Quick Links</h2>
                <br>
                <a class='button' style="margin: 4px" href="https://matthewvine.site/modules/week5/shop.php">Shop</a>
                <a class='button' style="margin: 4px" href="https://matthewvine.site/modules/week1/our_team.php">Our Team</a>
                <a class='button' style="margin: 4px" href="https://matthewvine.site/modules/week1/about_us.php">About Us</a>
                <a class='button' style="margin: 4px" href="https://matthewvine.site/modules/week1/contact_us.php">Contact Us</a>
                <br><br>
                <?php
                    $dt = new DateTime();

                    $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
                    if (!$conn) die("Connection failed: " . mysqli_connect_error());
                    
                    $sql = "SELECT * FROM votd WHERE VerseId = '" . $dt->format('N') . "'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h2 style='margin-top: 32px'>Verse of the Day: " . $dt->format('l') . "</h2>";
                            echo "<p style='width: 66%; margin-left: auto; margin-right: auto'>";
                            echo $row["Reference"];
                            echo "<br>";
                            echo $row["Verse"];
                            echo "</p>";
                        }
                    } else {
                        echo "VotD not found";
                    }
                ?>
            </div>

            <?php include "view/footer.php"; ?>
        </div>
    </body>
</html>