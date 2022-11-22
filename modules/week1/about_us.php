<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>About Us | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>About Us</h1>
                
                <div style="font-size: 20px; width: 75%; margin-left: auto; margin-right: auto">
                    <?php
                        echo("<p>Matthew Vine company is an online e-commerce site that provides customers with high quality clothing at affordable prices.
                                 We have been in business since 2022 and have been providing our customers with the best service possible.
                                 We are a quite small family owned company, but we are growing every day. We are located in Anytown, USA.</p>");
                        
                        echo("<p>Our store provides high quality and professional designed clothing to users.
                                 We have a team of professional designers that create the best clothing possible.</p>");
                    ?>
                </div>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>