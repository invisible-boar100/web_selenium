<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';

$customerOrders = select_orderDetails_controller($_SESSION["user_id"]);

if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '2') {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

                <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-3REF7M7KW9"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-3REF7M7KW9');
            </script>
            
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- GOOGLE FONTS -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

            <!-- CUSTOM CSS -->
            <link rel="stylesheet" href="../CSS/style.css">
            <link rel="stylesheet" href="../CSS/usP.css">
            <link rel="stylesheet" href="../CSS/navbar.css">


            <title>CodeX | User Profile</title>
        </head>

        <body>
            <main>

                <!-- MOBILE BREAD CRUMB -->
                <section class="mb_crumb chk usP">
                    <div class="content">
                        <div class="b_menu">
                            <a href="index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Personal Account</a>
                        </div>
                    </div>
                    <hr>
                </section>

                <!-- DESKTOP BREAD CRUMB -->
                <section class="b_crumb">
                    <div class="content b_crumbMenu">
                        <div class="b_menu">
                            <a href="../index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Personal Account</a>
                        </div>

                        <?php include_once (dirname(__FILE__)) . '/../navInclude.php'; ?>


                    </div>

                    <hr>
                </section>

                <!-- Mobile version -->
                <section class="mb_us_profile">
                    <div class="content">

                        <div class="left">
                            <!-- <div class="heading">
                        <h1 class="">Personal Account</h1>
                    </div> -->
                            <div class="imgContent">
                                <div class="profilePic">
                                    <img src="../Assets/Images/profileImg/michael-dam-mEZ3PoFGs_k-unsplash.jpg" alt="">
                                    <div class="camImg">
                                        <img src="../Assets/icons/fluent_camera-24-regular.svg" alt="">
                                    </div>
                                </div>

                            </div>

                            <!-- account menu -->
                            <div class="p_account_menu">
                                <a href="./userprofile.php" class="ac_menu_plq">
                                    <div class="icon">
                                        <img src="../Assets/icons/fa-regular_user.svg" alt="">
                                    </div>
                                    <p>Account Settings</p>
                                </a>
                                <a href="./orders.php" class="ac_menu_plq active">
                                    <div class="icon">
                                        <img src="../Assets/icons/octicon_package-dependencies-24.svg" alt="">
                                    </div>
                                    <p>My Orders</p>
                                </a>
                                <a href="./wishlist.php" class="ac_menu_plq">
                                    <div class="icon">
                                        <img src="../Assets/icons/ant-design_heart-outlined.svg" alt="">
                                    </div>
                                    <p>Wishlist</p>
                                </a>
                                <a href="./review.php" class="ac_menu_plq">
                                    <div class="icon">
                                        <img src="../Assets/icons/ic_outline-rate-review.svg" alt="">
                                    </div>
                                    <p>Reviews</p>
                                </a>
                                <!-- <a href="../Settings/logout.php" class="ac_menu_plq">
                                    <div class="icon">
                                        <img src="../Assets/icons/ic_round-logout.svg" alt="">
                                    </div>
                                    <p>Logout</p>
                                </a> -->
                            </div>
                        </div>


                        <div class="right">
                            <div class="content">
                                <div class="heading">
                                    <h2 class="">My Orders</h2>
                                </div>

                                <div class="orders">
                                    <?php
                                    foreach ($customerOrders as $order) {
                                    ?>
                                        <div class="order_item">
                                            <div class="item_det">
                                                <div class="dets">
                                                    <div class="icon">
                                                        <img src="<?php echo $order['product_image']; ?>" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h3><?php echo $order['product_title']; ?></h3>
                                                        <p class="item_price">&#8373;<?php echo $order['product_price']; ?></p>
                                                    </div>
                                                </div>
                                                <!-- quantity -->
                                                <div class="quantity">
                                                    <p>x1</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </main>
        </body>

        </html>
<?php
    }
} else {
    echo "
    <script>
    alert('User not logged in');
    document.location.href='../index.php';
    </script>
    
    ";
}
