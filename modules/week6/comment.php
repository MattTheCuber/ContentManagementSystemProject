<?php
    session_start();
    if (!isset($_SESSION['loginlevel']) || $_SESSION['loginlevel'] < 1) {
        header('Location: ../week4/login.php');
    }

    $conn = mysqli_connect("mysql.matthewvine.site", "matthewvine", "password", "matthewvine");
    if (!$conn) die("Connection failed: " . mysqli_connect_error());

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO comments (name, title, comments)
                VALUES ('" . $_POST['name'] . "', '" . $_POST['title'] . "', '" . $_POST['comments'] . "')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../week1/our_team.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        foreach ($_POST as $key => $value) {
            if (str_contains($key, "_submit")) {
                $id = substr($key, 0, -7);
                $sql = "UPDATE comments SET name='" . $_POST['name'] . "', title='" . $_POST['title'] . "', comments='" . $_POST['comments'] . "' WHERE ID=" . $id;

                if ($conn->query($sql) === TRUE) {
                    header('Location: ../week1/our_team.php');
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../../view/meta.php"; ?>
        <link rel="stylesheet" href="../../style.css">
        <title>Comment | Matthew Vine</title>
    </head>
    <body>
        <div class="container">
            <?php include "../../view/header.php"; ?>

            <div class="content">
                <h1>Add a Comment</h1>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    Name: <input type="text" name="name" required>
                    <br><br>
                    Title: <input type="text" name="title" required>
                    <br><br>
                    Comment:
                    <textarea name="comments" rows="5" cols="40" required></textarea>

                    <br><br>
                    <?php
                        $id = false;
                        foreach ($_POST as $key => $value) {
                            if (str_contains($key, "_update")) {
                                $id = substr($key, 0, -7);
                            }
                        }

                        if (!$id) echo "<input type='submit' name='submit' value='Submit' class='button'>";
                        else echo "<input type='submit' name='" . $id . "_submit' value='Update' class='button'>";
                    ?>
                </form>
            </div>

            <?php include "../../view/footer.php"; ?>
        </div>
    </body>
</html>