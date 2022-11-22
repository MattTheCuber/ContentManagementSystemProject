<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Map | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Map</h1>

                <iframe width="800" height="700" frameborder="0" src="https://www.bing.com/maps/embed?h=700&w=800&cp=40.70939108816683~-73.81895151528313&lvl=11&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no"></iframe>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>