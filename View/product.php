<?php

include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/product_controller.php';
$selected_product = select_a_product_controller($_GET['productID']);
$Allproducts = select_all_products_controller();
$showReviews = select_order_reviews_controller($_GET['productID']);

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

    <title>CodeX | Product</title>
</head>

<body class="productBody">
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
                    <a href="../Actions/searchFunction.php">Categories</a>
                    <div class="cat_img">
                        <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                    </div>
                    <a href="" class="active">Product</a>
                </div>
            </div>
        </section>



        <!-- breadcrumb menu -->
        <section class="b_crumb pr_men">
            <div class="content">
                <div class="b_menu">
                    <div class="cat_img">
                        <a href="../index.php"><img src="../Assets/icons/bi_house.svg" alt=""></a>
                    </div>
                    <div class="cat_img">
                        <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                    </div>
                    <a href="../Actions/searchFunction.php">Categories</a>
                    <div class="cat_img">
                        <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                    </div>
                    <a href="" class="active">Single Product</a>
                </div>
            </div>
        </section>


        <!-- product display -->
        <section class="p_page">
            <div class="content">
                <div class="p_desc">
                    <div class="heading">
                        <p class="lg title"><?php echo $selected_product['product_title'] ?></p>
                        <p class="price md py">&#8373;<?php echo $selected_product['product_price'] ?></p>
                    </div>

                    <div class="d_accordian">
                        <div class="accor_item">
                            <p class="accordion">Product Info</p>
                            <div class="panel">
                                <?php echo $selected_product['product_desc'] ?>
                            </div>
                        </div>

                        <div class="accor_item">
                            <p class="accordion">Delivery & Returns</p>
                            <div class="panel">
                                <p>Delivery within 48hrs of purchase. Any faulty product can be returned within 7 days of purchase.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p_image">
                    <img src="<?php echo $selected_product['product_image'] ?>" alt="">
                </div>

                <div class="p_options">

                    <!-- reviews -->
                    <div class="reviews">
                        <div class="title">
                            <p>Reviews</p>
                        </div>

                        <?php foreach ($showReviews as $review) {
                        ?>
                            <div class="review_plaque">
                                <div class="top">
                                    <div class="left">
                                        <div class="p_img">
                                            <img src="../Assets/Images/profileImg/joseph-gonzalez-iFgRcqHznqg-unsplash.jpg" alt="">
                                        </div>
                                        
                                        <div class="text_content">
                                            <div class="name">
                                                <p><?php echo $review['user_fname']?></p>
                                                <!-- stars -->
                                            </div>
                                            <div class="stars">
                                                <div class="st_img">
                                                    <img src="../Assets/icons/bx_bxs-star.svg" alt="">
                                                </div>
                                                <div class="st_img">
                                                    <img src="../Assets/icons/bx_bxs-star.svg" alt="">
                                                </div>
                                                <div class="st_img">
                                                    <img src="../Assets/icons/bx_bxs-star.svg" alt="">
                                                </div>
                                                <div class="st_img">
                                                    <img src="../Assets/icons/bx_bxs-star.svg" alt="">
                                                </div>
                                                <div class="st_img">
                                                    <img src="../Assets/icons/bx_bxs-star-half.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <p>4 days ago</p>
                                    </div>
                                </div>
                                <p class="msg"><?php echo $review['review']?></p>
                            </div>
                        <?php
                        }
                        ?>



                        <div class="mb_accordian">
                            <div class="wh_ol">
                                <div class="accor_item">
                                    <p>Product Info</p>
                                    <div class="icon">
                                        <img src="../Assets/icons/akar-icons_plus.svg" alt="">
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="wh_ol">
                                <div class="accor_item">
                                    <p>Details</p>
                                    <div class="icon">
                                        <img src="../Assets/icons/akar-icons_plus.svg" alt="">
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="wh_ol">
                                <div class="accor_item">
                                    <p>Delivery & Returns</p>
                                    <div class="icon">
                                        <img src="../Assets/icons/akar-icons_plus.svg" alt="">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="cta">
                        <div class="wish">
                            <a href="../Actions/addWishlist.php?wishID=<?php echo $selected_product['product_id'] ?> &qty=1"><img src="../Assets/icons/mdi_heart-plus-outline.svg" alt=""></a>
                        </div>

                        <button class="addtoCart"><a href="../Actions/addCart.php?cartID=<?php echo $selected_product['product_id'] ?> &qty=1">Add To Cart</a></button>
                    </div>

                </div>
            </div>
        </section>


    </main>

    <script src="../JS/accordion.js"></script>
</body>

</html>