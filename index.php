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
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <title>CodeX - Your favorite tech shop</title>

    <!-- SWIPER JS CDN -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>
    <!-- navbar -->
    <header>
        <div class="nav_container">
            <!-- brand -->
            <div class="brand">
                <img src="./Assets/Images/CodeX.svg" alt="">
            </div>
            <?php
            include_once (dirname(__FILE__)) . '/./Settings/core.php';
            include_once (dirname(__FILE__)) . '/./controller/product_controller.php';
            include_once (dirname(__FILE__)) . '/./controller/cart_controller.php';
            include_once (dirname(__FILE__)) . '/./controller/wishlist_controller.php';

            $best_sellers = get_best_controller();
            $featured_products = featured_products_controller();
            $hottest_selling = hottest_selling_controller();
            $img = "./Assets/Images/products/";

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

                if ($_SESSION["user_role"] === '1') {
                    header('location: ./Admin/dashboard.php');
                } else {

                    if ($_SESSION["user_role"] === '2') {
            ?>
                        <!-- Actions -->
                        <div class="user_actions">
                            <div class="ac_icons">
                                <a href="./View/wishlist.php">
                                    <img src="./Assets/icons/akar-icons_heart.svg" alt="">
                                </a>
                                <div class="scart"><?php echo $wishlist_count['count']; ?></div>
                            </div>
                            <div class="ac_icons">
                                <div class="searchBar">
                                    <form method="GET" action="./Actions/searchFunction.php">
                                        <div class="form_control">
                                            <input type="text" placeholder="Search" name="searchTerm" id="searchTerm">
                                            <button name="submit"><img src="./Assets/icons/bx_bx-search.svg" id="searchBtn" alt=""></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="ac_icons">
                                <a href="./View/cart.php">
                                    <img src="./Assets/icons/ion_cart-outline.svg" alt="">
                                </a>
                                <div class="scart"><?php echo $cart_count['count'] ?></div>
                            </div>
                            <div class="ac_icons">

                                <!-- dropdown menu -->
                                <div class="dropdown">
                                    <a href="#">
                                        <img src="./Assets/icons/mdi_account-circle-outline.svg" alt="">
                                    </a>
                                    <div class="dropdown-content">
                                        <a href="./View/userprofile.php">Profile</a>
                                        <a href="./Settings/logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
            } else { // GUEST
                ?>
                <!-- Actions -->
                <div class="user_actions">
                    <div class="ac_icons">
                        <a href="./View/wishlist.php"><img src="./Assets/icons/akar-icons_heart.svg" alt="">
                    </a>
                    </div>
                    <div class="ac_icons">
                        <div class="searchBar">
                            <form method="GET" action="./Actions/searchFunction.php">
                                <div class="form_control">
                                    <input type="text" placeholder="Search" name="searchTerm" id="searchTerm">
                                    <button name="submit"><img src="./Assets/icons/bx_bx-search.svg" id="searchBtn" alt=""></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="ac_icons">
                        <a href="./View/cart.php">
                            <img src="./Assets/icons/ion_cart-outline.svg" alt="">
                        </a>
                        <div class="scart"><?php echo $cart_count['count'] ?></div>
                    </div>

                    <div class="ac_icons">

                        <!-- dropdown menu -->
                        <div class="dropdown">
                            <a href="#">
                                <img src="./Assets/icons/mdi_account-circle-outline.svg" alt="">
                            </a>
                            <div class="dropdown-content">
                                <a href="./View/login.php">Login</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }

            ?>


            <!-- Nav Links -->
            <nav>
                <ul class="navlinks">
                    <li><a href="./Actions/searchFunction.php" class="link">Explore</a></li>
                    <li><a href="./Actions/searchFunction.php?searchTerm=Phones" class="link">Phones</a></li>
                    <li><a href="./Actions/searchFunction.php?searchTerm=Accessories" class="link">Accessories</a></li>
                    <li><a href="./Actions/searchFunction.php?searchTerm=Laptops" class="link">Laptops</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- hamburger menu -->
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>

    <main>
        <!-- intro -->
        <section class="intro">
            <div class="content flex">
                <!-- left -->
                <div class="left">
                    <div class="intro_msg my">
                        <p class="lg">Cutting edge gadgets at affordable prices.</p>
                    </div>

                    <div class="desc my">
                        <p class="sm">We welcome you to a gadget heaven, where every gadget you desire is available for purchase.</p>
                    </div>

                    <div class="btn my">
                        <a href="./Actions/searchFunction.php" class="link"><button>Shop Now</button></a>
                    </div>
                </div>

                <!-- right -->
                <div class="right">
                    <div class="img_container">
                        <img src="./Assets/Images/products/Frame 1.svg" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- best sellers -->
        <section class="best_sellers my">
            <div class="content my">
                <div class="heading py flex">
                    <h1 class="">Best Sellers</h1>
                    <a href="">View all</a>
                </div>

                <!-- swiper js -->
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <?php foreach ($best_sellers as $best) {
                        ?>
                            <!-- product card -->
                            <div class="swiper-slide">
                                <!-- space for product image -->
                                <div class="imgSpace">
                                    <a href="./View/product.php?productID=<?php echo $best['product_id'] ?>">
                                        <img src="<?php echo $img . basename($best['product_image']) ?>" alt="">
                                    </a>
                                </div>

                                <!-- product details -->
                                <div class="pd_details flex">
                                    <div class="left">
                                        <p class="category my"><?php echo $best['cat_name'] ?></p>
                                        <h1 class="p_name my"><?php echo $best['product_title'] ?></h1>
                                        <p class="price my">&#8373;<?php echo $best['product_price'] ?></p>
                                    </div>

                                    <div class="right">
                                        <div class="cart mx">
                                            <a href="./Actions/addCart.php?cartID=<?php echo $best['product_id'] ?> &qty=1"><img src="./Assets/icons/ion_cart-outline-white.svg" alt="">
                                        </div>

                                        <div class="wish">
                                            <a href="./Actions/addWishlist.php?wishID=<?php echo $best['product_id'] ?> &qty=1""><img src=" ./Assets/icons/akar-icons_heart-white.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>

                    <!-- navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>


        <!-- featured products -->
        <section class="featured">
            <div class="content py">
                <div class="heading py flex">
                    <h1>Featured Products</h1>
                    <a href="">View all</a>
                </div>

                <!-- product grid -->
                <div class="product_grid">

                    <?php foreach ($featured_products as $featured) {
                    ?>
                        <div class="product_card my">
                            <!-- space for product image -->
                            <div class="imgSpace">
                                <a href="./View/product.php?productID=<?php echo $featured['product_id'] ?>">
                                    <img src="<?php echo $img . basename($featured['product_image']) ?>" alt="">
                                </a>
                            </div>

                            <!-- product details -->
                            <div class="pd_details flex">
                                <div class="left">
                                    <p class="category my"><?php echo $featured['cat_name'] ?></p>
                                    <h1 class="p_name my"><?php echo $featured['product_title'] ?></h1>
                                    <p class="price my">&#8373;<?php echo $featured['product_price'] ?></p>
                                </div>

                                <div class="right">
                                    <div class="cart mx">
                                        <a href="./Actions/addCart.php?cartID=<?php echo $featured['product_id'] ?> &qty=1"><img src="./Assets/icons/ion_cart-outline.svg" alt=""></a>
                                    </div>

                                    <div class="wish">
                                        <a href="./Actions/addWishlist.php?wishID=<?php echo $featured['product_id'] ?> &qty=1""><img src=" ./Assets/icons/akar-icons_heart.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </section>

        <!-- SHOP BY BRAND -->

        <section class="byBrand py my">
            <div class="content">
                <div class="heading py flex">
                    <h1>Shop by brand</h1>
                </div>

                <!-- brands carousel -->
                <div class="brandsGrid">
                    <div class="brandLogo">
                        <img src="./Assets/Images/logo/apple-14.png" alt="">
                    </div>
                    <div class="brandLogo">
                        <img src="./Assets/Images/logo/dell-2.png" alt="">
                    </div>
                    <div class="brandLogo">
                        <img src="./Assets/Images/logo/hp-2.png" alt="">
                    </div>
                    <div class="brandLogo">
                        <img src="./Assets/Images/logo/huawei.png" alt="">
                    </div>
                    <div class="brandLogo">
                        <img src="./Assets/Images/logo/lenovo-2.png" alt="">
                    </div>
                    <div class="brandLogo">
                        <img src="./Assets/Images/logo/samsung.png" alt="">
                    </div>
                </div>
            </div>
        </section>


        <!-- HOTTEST SELLING -->

        <section class="hottest">
            <div class="content">
                <div class="heading py flex">
                    <h1>Hottest Selling</h1>
                    <a href="">View all</a>
                </div>



                <div class="product_grid">

                    <?php foreach ($hottest_selling as $selling) {
                    ?>
                        <div class="product_card my">
                            <!-- space for product image -->
                            <div class="imgSpace">
                                <a href="./View/product.php?productID=<?php echo $selling['product_id'] ?>">
                                    <img src="<?php echo $img . basename($selling['product_image']) ?>" alt="">
                                </a>
                            </div>

                            <!-- product details -->
                            <div class="pd_details flex">
                                <div class="left">
                                    <p class="category my"><?php echo $selling['cat_name'] ?></p>
                                    <h1 class="p_name my"><?php echo $selling['product_title'] ?></h1>
                                    <p class="price my">&#8373;<?php echo $selling['product_price'] ?></p>
                                </div>

                                <div class="right">
                                    <div class="cart mx">
                                        <a href="./Actions/addCart.php?cartID=<?php echo $selling['product_id'] ?> &qty=1"><img src="./Assets/icons/ion_cart-outline.svg" alt=""></a>
                                    </div>

                                    <div class="wish">
                                        <a href="./Actions/addWishlist.php?wishID=<?php echo $selling['product_id'] ?> &qty=1"><img src="./Assets/icons/akar-icons_heart.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <!-- discount button -->
                            <div class="discount_stkr">
                                <p class="dscnt">50% Off</p>
                            </div>
                        </div>

                    <?php
                    }
                    ?>


                </div>
            </div>
        </section>

        <!-- VALUES -->
        <section class="values">
            <div class="content">
                <hr>

                <div class="values">
                    <div class="v_plaque">
                        <div class="icon">
                            <img src="./Assets/icons/ion_rocket-sharp.svg" alt="">
                        </div>
                        <div class="text">
                            <p class="val">Free Delivery</p>
                            <p>Tempor arcu eu quis est.</p>
                        </div>
                    </div>
                    <div class="vl"></div>


                    <div class="v_plaque">
                        <div class="icon">
                            <img src="./Assets/icons/foundation_loop.svg" alt="">
                        </div>
                        <div class="text">
                            <p class="val">Free Delivery</p>
                            <p>Tempor arcu eu quis est.</p>
                        </div>
                    </div>
                    <div class="vl"></div>


                    <div class="v_plaque">
                        <div class="icon">
                            <img src="./Assets/icons/fluent_payment-16-filled.svg" alt="">
                        </div>
                        <div class="text">
                            <p class="val">Secure Payment</p>
                            <p>Tempor arcu eu quis est.</p>
                        </div>
                    </div>
                    <div class="vl"></div>

                    <div class="v_plaque">
                        <div class="icon">
                            <img src="./Assets/icons/si-glyph_customer-support.svg" alt="">
                        </div>
                        <div class="text">
                            <p class="val">24/7 Support</p>
                            <p>Tempor arcu eu quis est.</p>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </section>
    </main>

    <!-- footer -->
    <footer>
        <div class="content">
            <div class="compInf">
                <div class="brandLogo">
                    <img src="./Assets/Images/CodeX-white.svg" alt="">
                    <p class="mail">codeXtechnologies@hkUK.co</p>
                    <div class="socials">
                        <div class="sc">
                            <img src="./Assets/icons/Twitter.svg" alt="">
                        </div>
                        <div class="sc">
                            <img src="./Assets/icons/Instagram.svg" alt="">
                        </div>
                        <div class="sc">
                            <img src="./Assets/icons/Vector.svg" alt="">
                        </div>
                        <div class="sc">
                            <img src="./Assets/icons/Linkedin.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="f_links">
                <div class="link_item">
                    <p class="head">ACCOUNT</p>
                    <div class="links">
                        <a href="http://">Orders & Returns</a>
                        <a href="http://">Discounts</a>
                        <a href="http://">Gift Cards</a>
                        <a href="http://">Account Settings</a>
                    </div>
                </div>

                <div class="link_item">
                    <p class="head">HELP</p>
                    <div class="links">
                        <a href="http://">Help Center</a>
                        <a href="http://">Contact Customer Care</a>
                        <a href="http://">Shipping Information</a>
                        <a href="http://">Return Policy</a>
                    </div>
                </div>

                <div class="link_item">
                    <p class="head">COMPANY INFORMATION</p>
                    <div class="links">
                        <a href="http://">About CodeX</a>
                        <a href="http://">Affiliate Program</a>
                        <a href="http://">Influencer Program</a>
                        <a href="http://">Advertisement Program</a>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- copyright -->
    <div class="cp_container">
        <hr>
        <div class="cp">
            <img src="./Assets/icons/ant-design_copyright-circle-filled.svg" alt="">
            <p>Copyright 2021 CodeX All rights reserved</p>
        </div>
    </div>


    <!-- SWIPER JS SCRIPT -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="./JS/script.js"></script>
</body>

</html>