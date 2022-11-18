<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Matthew Vine's site for Liberty University Online's CSIS 410: D01">
        <meta name="keywords" content="HTML, CSS, PHP, Matthew Vine, Liberty University, CSIS 410">
        <meta name="author" content="Matthew Vine">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style.css">
        <title>Sessions | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Module 4: Week 4 Sessions Assignment</h1>
                <h2>Please Login to proceed</h2>
                <br>

                <?php
                    if (isset($_POST['username'])) {
                        if ($_POST['username'] == 'customer' && $_POST['password'] == 'customer') {
                            session_start();
                            $_SESSION['username'] = $_POST['username'];
                            $_SESSION['authenticated'] = true;
                            
                            echo '<p class="success">You have successfully logged in</p>';
                        }else {
                            echo '<p class="error">Incorrect username or password</p>';
                        }
                    }
                ?>
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    Username: <input type="text" name="username" required>
                    <br><br>
                    Password: <input type="password" name="password" required>
                    <br><br>
                    <input class='button' type="submit">
                </form>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>