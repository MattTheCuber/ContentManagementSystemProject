<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Matthew Vine's site for Liberty University Online's CSIS 410: D01">
        <meta name="keywords" content="HTML, CSS, PHP, Matthew Vine, Liberty University, CSIS 410">
        <meta name="author" content="Matthew Vine">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        echo("<p>Matthew Vine company is an online e-commerce site that provides customers with high quality websites at an affordable price.
                        We have been in business since 2022 and have been providing our customers with the best service possible.
                        We are a quite small family owned company, but we are growing every day. We are located in Anytown, USA.</p>");
                        
                        echo("<p>Our website provide high quality, security, and professional design to clients.
                        We have a team of professional web developers that are ready to help you with your website needs.
                        We employ a variety of systems, including PHP, HTML, CSS, and JavaScript to create the best websites possible.
                        We also provide a variety of services, including website hosting, website maintenance, and website design</p>");
                    ?>
                </div>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>