<div class="footer">
    <a href='https://www.facebook.com/'><img class='social-icon' src='https://localhost/images/facebook.png' alt='Facebook'></a>
    <a href='https://www.instagram.com/'><img class='social-icon' src='https://localhost/images/instagram.webp' alt='Instagram'></a>
    <a href='https://www.twitter.com/'><img class='social-icon' src='https://localhost/images/twitter.png' alt='Twitter'></a>
    <a href='https://www.youtube.com/'><img class='social-icon' src='https://localhost/images/youtube.png' alt='Youtube'></a>
    <br>
    <p>Matthew Vine &copy; 2022</p>
    <?php
        $fileList = get_included_files();
        $topMost = $fileList[0];
        echo "Last modified: " . date("F d Y H:i:s", filemtime($topMost));
    ?>
</div>