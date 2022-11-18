<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Matthew Vine's site for Liberty University Online's CSIS 410: D01">
        <meta name="keywords" content="HTML, CSS, PHP, Matthew Vine, Liberty University, CSIS 410">
        <meta name="author" content="Matthew Vine">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style.css">
        <title>Contact Us | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Contact Us</h1>
                
                <?php
                    echo("<br><h3>Email</h3>");
                    echo("support@matthewvine.site");

                    echo("<br><br><h3>Phone Numbers</h3>");
                    echo("Support: 555-555-5551 <br> Sales: 555-555-5552 <br> Billing: 555-555-5553");
                    
                    echo("<br><br><h3>Address</h3>");
                    echo("12345 Main St. <br> Anytown, USA 12345");
                ?>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>