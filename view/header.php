<div class="header">
    <h1 class='title'>Matthew Vine</h1>
    <h2 class='subtitle'>A E-Commerce Clothing Store</h2>

    <ul class="nav">
        <li><a href="https://matthewvine">Home</a></li>
        <li class="dropdown">
            <a class="dropbtn" href="https://matthewvine/modules/week5/shop.php">Shop</a>
            <div class="dropdown-content">
                <a class="second" href="https://matthewvine/modules/week5/shop.php">See Items</a>
                <a class="second" href="https://matthewvine/modules/week5/special_offer.php">Special Offers</a>
                <a class="second" href="https://matthewvine/modules/week2/review_items.php">Review Items</a>
                <a class="second" href="https://matthewvine/modules/week5/refund_policy.php">Refund Policy</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn" href="https://matthewvine/modules/week1/our_team.php">Our Team</a>
            <?php
                if (isset($_SESSION['loginlevel']) && ($_SESSION['loginlevel'] == 1 || $_SESSION['loginlevel'] == 2)) {
                    echo "<div class='dropdown-content'>";
                    echo "<a class='second' href='https://matthewvine/modules/week3/manage_employee.php'>Manage Team</a>";
                    echo "</div>";
                }
            ?>
        </li>
        <li class="dropdown">
            <a class="dropbtn" href="https://matthewvine/modules/week1/about_us.php">About Us</a>
            <div class="dropdown-content">
                <a class="second" href="https://matthewvine/modules/week1/about_us.php">About Us</a>
                <a class="second" href="https://matthewvine/modules/week5/our_story.php">Our Story</a>
                <a class="second" href="https://matthewvine/modules/week5/mission.php">Mission</a>
                <a class="second" href="https://matthewvine/modules/week5/facts.php">Facts</a>
                <a class="second" href="https://matthewvine/modules/week5/map.php">Map</a>
            </div>
        </li>
        <li><a href="https://matthewvine/modules/week1/contact_us.php">Contact Us</a></li>
        <li>
            <a href="
                <?php
                    echo isset($_SESSION['loginlevel']) ? "https://matthewvine/modules/week4/logout.php" : "https://matthewvine/modules/week4/login.php"
                ?>
            ">
                <?php
                    echo isset($_SESSION['loginlevel']) ? "Logout" : "Login"
                ?>
            </a>
        </li>
        <?php
            if (isset($_SESSION['cart']) || (isset($_SESSION['loginlevel']) && $_SESSION['loginlevel'] == 3)) {
                echo "<li><a href='https://matthewvine/modules/week5/cart.php'>Cart</a></li>";
            }
        ?>
    </ul>
</div>