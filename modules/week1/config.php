<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Matthew Vine's site for Liberty University Online's CSIS 410: D01">
        <meta name="keywords" content="HTML, CSS, PHP, Matthew Vine, Liberty University, CSIS 410">
        <meta name="author" content="Matthew Vine">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style.css">
        <title>PHP Config | Matthew Vine</title>
    </head>
    <?php
        phpinfo();
        echo "Last modified: " . date("F d Y H:i:s", filemtime(__FILE__));
    ?>
</html>