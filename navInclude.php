<?php

include_once (dirname(__FILE__)) . '/./Settings/core.php';
include_once (dirname(__FILE__)) . '/./controller/product_controller.php';
include_once (dirname(__FILE__)) . '/./controller/cart_controller.php';
include_once (dirname(__FILE__)) . '/./controller/wishlist_controller.php';

if (isset($_SESSION['user_id'])) {
    $cart_count = count_cart_lg_controller($_SESSION['user_id']);
} else {
    $ip_Address = getIpAddress();
    $cart_count = count_cart_gst_controller($ip_Address);
}

if (isset($_SESSION['user_id'])) {
    $wishlist_count = count_wishlist_lg_controller($_SESSION['user_id']);
}


if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '2')
?>

    <!-- Actions -->
    <div class="user_actions">
        <div class="ac_icons">
            <a href="./wishlist.php">
                <img src="../Assets/icons/akar-icons_heart.svg" alt="">
            </a>
            <div class="scart"><?php echo $wishlist_count['count']; ?></div>
        </div>
        <div class="ac_icons">
            <div class="searchBar">
                <form method="GET" action="../Actions/searchFunction.php">
                    <div class="form_control">
                        <input type="text" placeholder="Search" name="searchTerm" id="searchTerm">
                        <button name="submit"><img src="../Assets/icons/bx_bx-search.svg" id="searchBtn" alt=""></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="ac_icons">
            <a href="./cart.php">
                <img src="../Assets/icons/ion_cart-outline.svg" alt="">
            </a>
            <div class="scart"><?php echo $cart_count['count'] ?></div>
        </div>
        <div class="ac_icons">

            <!-- dropdown menu -->
            <div class="dropdown">
                <a href="#">
                    <img src="../Assets/icons/mdi_account-circle-outline.svg" alt="">
                </a>
                <div class="dropdown-content">
                    <a href="./userprofile.php">Profile</a>
                    <a href="../Settings/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<?php
} else { //GUEST
?>
    <!-- Actions -->
    <div class="user_actions">
        <div class="ac_icons">
            <a href="./View/wishlist.php"><img src="../Assets/icons/akar-icons_heart.svg" alt="">
            </a>
        </div>
        <div class="ac_icons">
            <div class="searchBar">
                <form method="GET" action="../Actions/searchFunction.php">
                    <div class="form_control">
                        <input type="text" placeholder="Search" name="searchTerm" id="searchTerm">
                        <button name="submit"><img src="../Assets/icons/bx_bx-search.svg" id="searchBtn" alt=""></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="ac_icons">
            <a href="./cart.php">
                <img src="../Assets/icons/ion_cart-outline.svg" alt="">
            </a>
            <div class="scart"><?php echo $cart_count['count'] ?></div>
        </div>

        <div class="ac_icons">

            <!-- dropdown menu -->
            <div class="dropdown">
                <a href="#">
                    <img src="../Assets/icons/mdi_account-circle-outline.svg" alt="">
                </a>
                <div class="dropdown-content">
                    <a href="./login.php">Login</a>
                </div>
            </div>
        </div>
    </div>

<?php
}
