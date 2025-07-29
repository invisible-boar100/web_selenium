<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/product_controller.php';


$Allproducts = select_all_products_controller();

if (isset($_SESSION['search_result'])) {
    $search_results = $_SESSION['search_result'];
}

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
            <link rel="stylesheet" href="../CSS/navbar.css">

            <title>CodeX | Category</title>
        </head>

        <body>
            <!-- ad space -->
            <main>
                <!-- MOBILE BREAD CRUMB -->
                <section class="mb_crumb">
                    <div class="content">
                        <div class="b_menu">
                            <div class="cat_img">
                                <a href="../index.php"><img src="../Assets/icons/bi_house.svg" alt=""></a>
                            </div>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Categories</a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="" class="active">All</a>
                        </div>
                    </div>
                </section>

                <!-- breadcrumb menu -->
                <section class="b_crumb">
                    <div class="content b_crumbMenu">
                        <div class="b_menu">
                            <div class="cat_img">
                                <a href="../index.php"><img src="../Assets/icons/bi_house.svg" alt=""></a>
                            </div>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Categories</a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="" class="active">All</a>
                        </div>

                        <?php include_once (dirname(__FILE__)) . '/../navInclude.php'; ?>

                    </div>
                </section>

                <!-- AD SPACE -->
                <section class="adSpace">
                    <div class="content">
                        <div class="adblock">
                            <div class="left px">
                                <div class="adText py">
                                    <p>Beautiful, elegant, quality and affordable products.</p>
                                </div>
                                <button>Buy Now</button>
                            </div>
                            <div class="right">
                                <img src="../Assets/Images/iPhone-13-PNG-Picture.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>


                <!-- CATEGORIES -->
                <section class="categories">
                    <div class="content">
                        <div class="mb_cat">
                            <div class="heading py flex">
                                <h1>Categories</h1>
                            </div>
                            <div class="cats">
                                <a href="" class="cat">All</a>
                                <a href="" class="cat">Phones</a>
                                <a href="" class="cat">Tablets</a>
                                <a href="" class="cat">Laptops</a>
                                <a href="" class="cat">Desktops</a>
                                <a href="" class="cat">Watches</a>
                                <a href="" class="cat">Accessories</a>
                                <a href="" class="cat">Brands</a>
                                <a href="" class="cat">Sale</a>
                            </div>
                        </div>

                        <!-- desktop -->
                        <div class="d_cat">
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/fluent_select-all-off-24-regular.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php">
                                    All
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/bi_phone.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Phones">
                                    <p>Phones</p>
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/bi_tablet-landscape.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Tablets">
                                    <p>Tablets</p>
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/ant-design_laptop-outlined.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Laptops">
                                    <p>Laptops</p>
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/fluent_desktop-32-regular.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Desktops">
                                    <p>Desktops</p>
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/ion_watch-outline.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Watches">
                                    <p>Watches</p>
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/fluent_headphones-24-regular.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Accessories">
                                    <p>Accessories</p>
                                </a>
                            </div>
                            <div class="cat_holder">
                                <div class="cat_img">
                                    <img src="../Assets/icons/tabler_brand-apple.svg" alt="">
                                </div>
                                <a href="../Actions/searchFunction.php?searchTerm=Brands">
                                    <p>Brands</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>



                <!-- category results -->

                <section class="mb_f_section">
                    <div class="content">
                        <div class="heading py flex">
                            <h1>All Products</h1>
                            <p>Search Results:</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="product_grid">
                            <!---------------------------- Phone View ------------------------>
                            <?php
                            foreach ($Allproducts as $product) {
                            ?>

                                <div class="product_card my">
                                    <!-- space for product image -->
                                    <div class="imgSpace">
                                        <a href="./product.php?productID=<?php echo $product['product_id'] ?>">
                                            <img src="<?php echo $product['product_image'] ?>" alt="">
                                        </a>
                                    </div>

                                    <!-- product details -->
                                    <div class="pd_details flex">
                                        <div class="left">
                                            <p class="category my"><?php echo $product['cat_name'] ?></p>
                                            <a href="./product.php?productID=<?php echo $product['product_id'] ?>">
                                                <h1 class="p_name my"><?php echo $product['product_title'] ?></h1>
                                            </a>
                                            <p class="price my">&#8373;<?php echo $product['product_price'] ?></p>
                                        </div>

                                        <div class="right">
                                            <div class="cart mx">
                                                <a href="../Actions/addCart.php?cartID=<?php echo $product['product_id'] ?> &qty=1"><img src="../Assets/icons/ion_cart-outline.svg" alt=""></a>
                                            </div>

                                            <div class="wish">
                                                <a href="../Actions/addWishlist.php?wishID=<?php echo $product['product_id'] ?> &qty=1"><img src="../Assets/icons/akar-icons_heart.svg" alt=""></a>
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

                <section class="cat_results">
                    <div class="content">
                        <div class="heading py flex">
                            <h1>All Products</h1>
                        </div>
                        <div class="res_container">
                            <div class="rightCnt py">
                                <div class="product_grid">
                                    <?php
                                    if (!empty($search_results)) {
                                        foreach ($search_results as $result) {
                                    ?>
                                            <div class="product_card my">
                                                <!-- space for product image -->
                                                <div class="imgSpace">
                                                    <a href="./product.php?productID=<?php echo $result['product_id'] ?>">
                                                        <img src="<?php echo $result['product_image'] ?>" alt="">
                                                    </a>
                                                </div>

                                                <!-- product details -->
                                                <div class="pd_details flex">
                                                    <div class="left">
                                                        <p class="category my"><?php echo $result['cat_name'] ?></p>
                                                        <a href="./product.php?productID=<?php echo $result['product_id'] ?>">
                                                            <h1 class="p_name my"><?php echo $result['product_title'] ?>
                                                        </a></h1>
                                                        <p class="price my">&#8373;<?php echo $product['product_price'] ?></p>
                                                    </div>

                                                    <div class="right">
                                                        <div class="cart mx">
                                                            <a href="../Actions/addCart.php?cartID=<?php echo $result['product_id'] ?> &qty=1"><img src="../Assets/icons/ion_cart-outline.svg" alt=""></a>
                                                        </div>

                                                        <div class="wish">
                                                            <a href="../Actions/addWishlist.php?wishID=<?php echo $result['product_id'] ?> &qty=1"><img src="../Assets/icons/akar-icons_heart.svg" alt=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </main>

            <!-- footer -->
            <footer>
                <div class="content">
                    <div class="compInf">
                        <div class="brandLogo">
                            <img src="../Assets/Images/CodeX-white.svg" alt="">
                            <p class="mail">codeXtechnologies@hkUK.co</p>
                            <div class="socials">
                                <div class="sc">
                                    <img src="../Assets/icons/Twitter.svg" alt="">
                                </div>
                                <div class="sc">
                                    <img src="../Assets/icons/Instagram.svg" alt="">
                                </div>
                                <div class="sc">
                                    <img src="../Assets/icons/Vector.svg" alt="">
                                </div>
                                <div class="sc">
                                    <img src="../Assets/icons/Linkedin.svg" alt="">
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

            <script src="../JS/cat.js"></script>
        </body>

        </html>

    <?php
    }
    ?>

<?php
} else { //GUEST 
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
        <link rel="stylesheet" href="../CSS/navbar.css">

        <title>CodeX | Category</title>
    </head>

    <body>
        <!-- ad space -->
        <main>
            <!-- MOBILE BREAD CRUMB -->
            <section class="mb_crumb">
                <div class="content">
                    <div class="b_menu">
                        <div class="cat_img">
                            <a href="../index.php"><img src="../Assets/icons/bi_house.svg" alt=""></a>
                        </div>
                        <div class="cat_img">
                            <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                        </div>
                        <a href="">Categories</a>
                        <div class="cat_img">
                            <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                        </div>
                        <a href="" class="active">All</a>
                    </div>
                </div>
            </section>

            <!-- breadcrumb menu -->
            <section class="b_crumb">
                <div class="content b_crumbMenu">
                    <div class="b_menu">
                        <div class="cat_img">
                            <a href="../index.php"><img src="../Assets/icons/bi_house.svg" alt=""></a>
                        </div>
                        <div class="cat_img">
                            <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                        </div>
                        <a href="">Categories</a>
                        <div class="cat_img">
                            <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                        </div>
                        <a href="" class="active">All</a>
                    </div>


                    <?php include_once (dirname(__FILE__)) . '/../navInclude.php'; ?>
                </div>
            </section>



            <!-- AD SPACE -->
            <section class="adSpace">
                <div class="content">
                    <div class="adblock">
                        <div class="left px">
                            <div class="adText py">
                                <p>Beautiful, elegant, quality and affordable products.</p>
                            </div>
                            <button>Buy Now</button>
                        </div>
                        <div class="right">
                            <img src="../Assets/Images/iPhone-13-PNG-Picture.png" alt="">
                        </div>
                    </div>
                </div>
            </section>


            <!-- CATEGORIES -->
            <section class="categories">
                <div class="content">
                    <div class="mb_cat">
                        <div class="heading py flex">
                            <h1>Categories</h1>
                        </div>
                        <div class="cats">
                            <a href="" class="cat">All</a>
                            <a href="" class="cat">Phones</a>
                            <a href="" class="cat">Tablets</a>
                            <a href="" class="cat">Laptops</a>
                            <a href="" class="cat">Desktops</a>
                            <a href="" class="cat">Watches</a>
                            <a href="" class="cat">Accessories</a>
                            <a href="" class="cat">Brands</a>
                            <a href="" class="cat">Sale</a>
                        </div>
                    </div>

                    <!-- desktop -->
                    <div class="d_cat">
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/fluent_select-all-off-24-regular.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php" onclick="activeLink(this)" class="linkactive">
                                <p>All</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/bi_phone.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Phones">
                                <p>Phones</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/bi_tablet-landscape.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Tablets">
                                <p>Tablets</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/ant-design_laptop-outlined.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Laptops">
                                <p>Laptops</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/fluent_desktop-32-regular.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Desktops">
                                <p>Desktops</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/ion_watch-outline.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Watches">
                                <p>Watches</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/fluent_headphones-24-regular.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Accessories">
                                <p>Accessories</p>
                            </a>
                        </div>
                        <div class="cat_holder">
                            <div class="cat_img">
                                <img src="../Assets/icons/tabler_brand-apple.svg" alt="">
                            </div>
                            <a href="../Actions/searchFunction.php?searchTerm=Brands">
                                <p>Brands</p>
                            </a>
                        </div>
                    </div>

                </div>
            </section>



            <!-- category results -->
            <section class="mb_f_section">
                <div class="content">
                    <div class="heading py flex">
                        <h1>All Products</h1>
                        <p>Search Results:</p>
                    </div>
                </div>
                <!-- mobile section -->
                <div class="mb_filters">
                    <div class="filter">
                        <p>Popular</p>
                        <p>Filters</p>
                    </div>
                </div>
                <div class="content">
                    <div class="product_grid">
                        <!---------------------------- Phone View ------------------------>
                        <?php
                        foreach ($Allproducts as $product) {
                        ?>
                            <div class="product_card my">
                                <!-- space for product image -->
                                <div class="imgSpace">
                                    <a href="./product.php?productID=<?php echo $product['product_id'] ?>">
                                        <img src="<?php echo $product['product_image'] ?>" alt="">
                                    </a>
                                </div>

                                <!-- product details -->
                                <div class="pd_details flex">
                                    <div class="left">
                                        <p class="category my"><?php echo $product['cat_name'] ?></p>
                                        <a href="./product.php?productID=<?php echo $product['product_id'] ?>">
                                            <h1 class="p_name my"><?php echo $product['product_title'] ?></h1>
                                        </a>
                                        <p class="price my">&#8373;<?php echo $product['product_price'] ?></p>
                                    </div>

                                    <div class="right">
                                        <div class="cart mx">
                                            <a href="../Actions/addCart.php?cartID=<?php echo $product['product_id'] ?> &qty=1"><img src="../Assets/icons/ion_cart-outline.svg" alt=""></a>
                                        </div>

                                        <div class="wish">
                                            <a href="../Actions/addWishlist.php?wishID=<?php echo $product['product_id'] ?> &qty=1"><img src="../Assets/icons/akar-icons_heart.svg" alt=""></a>
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


            <section class="cat_results">
                <div class="content">
                    <div class="heading py flex">
                        <h1>All Products</h1>
                    </div>
                    <div class="res_container">
                        <div class="rightCnt py">
                            <div class="product_grid">
                                <?php
                                if (!empty($search_results)) {
                                    foreach ($search_results as $result) {
                                ?>
                                        <div class="product_card my">
                                            <!-- space for product image -->
                                            <div class="imgSpace">
                                                <a href="./product.php?productID=<?php echo $result['product_id'] ?>">
                                                    <img src="<?php echo $result['product_image'] ?>" alt="">
                                                </a>
                                            </div>

                                            <!-- product details -->
                                            <div class="pd_details flex">
                                                <div class="left">
                                                    <p class="category my"><?php echo $result['cat_name'] ?></p>
                                                    <a href="./product.php?productID=<?php echo $result['product_id'] ?>">
                                                        <h1 class="p_name my"><?php echo $result['product_title'] ?>
                                                    </a></h1>
                                                    <p class="price my">&#8373;<?php echo $product['product_price'] ?></p>
                                                </div>

                                                <div class="right">
                                                    <div class="cart mx">
                                                        <a href="../Actions/addCart.php?cartID=<?php echo $result['product_id'] ?> &qty=1"><img src="../Assets/icons/ion_cart-outline.svg" alt=""></a>
                                                    </div>

                                                    <div class="wish">
                                                        <a href="../Actions/addWishlist.php?wishID=<?php echo $result['product_id'] ?> &qty=1"><img src="../Assets/icons/akar-icons_heart.svg" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </main>

        <!-- footer -->
        <footer>
            <div class="content">
                <div class="compInf">
                    <div class="brandLogo">
                        <img src="../Assets/Images/CodeX-white.svg" alt="">
                        <p class="mail">codeXtechnologies@hkUK.co</p>
                        <div class="socials">
                            <div class="sc">
                                <img src="../Assets/icons/Twitter.svg" alt="">
                            </div>
                            <div class="sc">
                                <img src="../Assets/icons/Instagram.svg" alt="">
                            </div>
                            <div class="sc">
                                <img src="../Assets/icons/Vector.svg" alt="">
                            </div>
                            <div class="sc">
                                <img src="../Assets/icons/Linkedin.svg" alt="">
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

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script src="../JS/cat.js"></script>
        <script src="../JS/pagination.js"></script>
    </body>

    </html>

<?php
}
?>