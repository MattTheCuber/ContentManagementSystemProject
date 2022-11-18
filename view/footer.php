<div class="footer">
    <p>Matthew Vine &copy; 2022</p>
    <?php
        $fileList = get_included_files();
        $topMost = $fileList[0];
        echo "Last modified: " . date("F d Y H:i:s", filemtime($topMost));

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["username"])) {
            echo "<br><br><a class='button' href='https://matthewvine.site/modules/week4/logout.php'>Logout</a>";
        }
    ?>
</div>