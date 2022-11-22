<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Login | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php
                if (isset($_POST['username'])) {
                    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['loginlevel'] = 1;
                        
                        echo '<p class="success">You have successfully logged in as an administrator</p>';
                    } else if ($_POST['username'] == 'publisher' && $_POST['password'] == 'publisher') {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['loginlevel'] = 2;
                        
                        echo '<p class="success">You have successfully logged in as a publisher</p>';
                    } else if ($_POST['username'] == 'customer' && $_POST['password'] == 'customer') {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['loginlevel'] = 3;
                        
                        echo '<p class="success">You have successfully logged in as a customer</p>';
                    } else {
                        echo '<p class="error">Incorrect username or password</p>';
                    }
                }
            ?>

            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Please Login to proceed</h1>
                <br>
                
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