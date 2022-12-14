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
                    $conn = mysqli_connect("mysql.localhost", "matthewvine", "password", "matthewvine");
                    if (!$conn) die("Connection failed: " . mysqli_connect_error());

                    $sql = "SELECT UserId FROM users WHERE Username = '" . $_POST['username'] . "' AND Password = '" . $_POST['password'] . "'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['loginlevel'] = $data['UserId'];
                        echo '<p class="success">You have successfully logged in as ' . $_POST['username'] . '</p>';
                    } else {
                        echo '<p class="error">Incorrect username or password</p>';
                    }
                    
                    mysqli_close($conn);
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