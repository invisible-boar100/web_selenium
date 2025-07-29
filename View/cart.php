<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';

if (isset($_SESSION['user_id'])) { //gets session of customer(logged in)
    $user_id = $_SESSION['user_id'];  //user_id is now session
    $product_cart = select_all_cart_lg_controller($user_id);
    $cart_amount_lg = sum_cart_lg_controller($user_id);
} else {
    $ipAddress = getIpAddress();
    $product_cart = select_all_cart_gst_controller($ipAddress);
    $cart_amount_gst = sum_cart_gst_controller($ipAddress);
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

            <title>CodeX | My Cart</title>
        </head>

        <body>
            <main>

                <!-- MOBILE BREAD CRUMB -->
                <section class="mb_crumb chk">
                    <div class="content ">
                        <div class="b_menu">
                            <a href="index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">My Cart</a>
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
                            <a href="category.php"> Customer My Cart</a>
                        </div>

                        <?php include_once (dirname(__FILE__)) . '/../navInclude.php'; ?>

                    </div>
                    <hr>
                </section>

                <?php if (empty($product_cart)) {
                ?>
                    <section class="cart_details">
                        <div class="content">
                            <div class="cart_content">
                                <div class="left">
                                    <div class="cart_item">
                                        <div class="item_det">
                                            <div class="text">
                                                <h3>Cart is Empty</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                } else {
                ?>
                    <section class="cart_details">
                        <div class="content">
                            <div class="heading py">
                                <h1>Cart</h1>
                            </div>


                            <div class="cart_content">
                                <div class="left">
                                    <?php
                                    foreach ($product_cart as $product) {
                                    ?>
                                        <div class="cart_item">

                                            <div class="item_det">
                                                <div class="icon">
                                                    <img src="<?php echo $product['product_image'] ?>" alt="">
                                                </div>
                                                <div class="text">
                                                    <h3><?php echo $product['product_title'] ?></h3>
                                                    <p class="item_price">&#8373;<?php echo $product['product_price'] ?></p>
                                                </div>
                                            </div>
                                            <!-- <hr> -->
                                            <div class="nxtLn">
                                                <div class="randW">

                                                    <div class="qty_icon">
                                                        <a href="<?php echo "../Actions/remove_from_cart.php?p_id=" . $product['p_id']; ?>"><img src="../Assets/icons/ant-design_delete-outlined.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="qty">
                                                    <div class="qty_icon">
                                                        <a href="../Actions/manageQuantity.php?dec_id=<?php echo $product['p_id'] ?>"><img src="../Assets/icons/fluent_subtract-circle-12-regular.svg" alt=""></a>
                                                    </div>
                                                    <p style="margin-bottom: 10px;"><?php echo $product['quantity'] ?></p>
                                                    <div class="qty_icon">
                                                        <a href="../Actions/manageQuantity.php?add_id=<?php echo $product['p_id'] ?>"><img src="../Assets/icons/carbon_add-alt.svg" alt=""></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="right">
                                    <div class="heading">
                                        <h1>Cart Total</h1>
                                    </div>

                                    <div class="cost_items">
                                        <div class="costItem">
                                            <p class="title">Subtotal</p>
                                            <p class="t_cost">&#8373;<?php echo $cart_amount_lg['result'] ?></p>

                                        </div>
                                        <hr>
                                        <div class="costItem">
                                            <p class="title">Shipping</p>
                                            <div class="ship_dets">
                                                <p>Free Delivery</p>
                                                <p>Shipping to Accra, Ghana</p>
                                                <a href="">Change address</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="costItem">
                                            <p class="title">Total</p>
                                            <p class="t_cost">&#8373;<?php echo $cart_amount_lg['result'] ?></p>
                                        </div>
                                    </div>

                                    <div class="button">
                                        <a href="./checkout.php"><button>Proceed to Checkout</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                }
                ?>
            </main>
        <?php
    } //OR Admin
        ?>
    <?php
} else { // If CUSTOMER IS GUEST
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
            <!-- <link rel="stylesheet" href="../CSS/cart.css"> -->

            <title>CodeX | My Cart</title>
        </head>

        <body>
            <main>

                <!-- MOBILE BREAD CRUMB -->
                <section class="mb_crumb chk">
                    <div class="content">
                        <div class="b_menu">
                            <a href="index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">My Cart</a>
                        </div>
                    </div>
                    <hr>
                </section>

                <!-- DESKTOP BREAD CRUMB -->
                <section class="b_crumb chk">
                    <div class="content">
                        <div class="b_menu">
                            <a href="../index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="category.html"> Guest My Cart</a>
                        </div>
                    </div>
                    <hr>
                </section>
                <?php if (empty($product_cart)) {
                ?>
                    <section class="cart_details">
                        <div class="content">
                            <div class="cart_content">
                                <div class="left">
                                    <div class="cart_item">
                                        <div class="item_det">
                                            <div class="text">
                                                <h3>Cart is Empty</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                } else {
                ?>
                    <section class="cart_details">
                        <div class="content">
                            <div class="heading py">
                                <h1>Cart</h1>
                            </div>
                            <div class="cart_content">
                                <div class="left">
                                    <?php
                                    foreach ($product_cart as $product) {
                                    ?>
                                        <div class="cart_item">
                                            <div class="item_det">
                                                <div class="icon">
                                                    <img src="<?php echo $product['product_image'] ?>" alt="">
                                                </div>
                                                <div class="text">
                                                    <h3><?php echo $product['product_title'] ?></h3>
                                                    <p class="item_price">&#8373;<?php echo $product['product_price'] ?></p>
                                                </div>
                                            </div>
                                            <!-- <hr> -->
                                            <div class="nxtLn">
                                                <div class="randW">

                                                    <div class="qty_icon">
                                                        <a href="<?php echo "../Actions/remove_from_cart.php?p_id=" . $product['p_id']; ?>"><img src="../Assets/icons/ant-design_delete-outlined.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="qty">
                                                    <div class="qty_icon">
                                                        <a href="../Actions/manageQuantity.php?dec_id=<?php echo $product['p_id'] ?>"><img src="../Assets/icons/fluent_subtract-circle-12-regular.svg" alt=""></a>
                                                    </div>
                                                    <p style="margin-bottom: 10px;"><?php echo $product['quantity'] ?></p>
                                                    <div class="qty_icon">
                                                        <a href="../Actions/manageQuantity.php?add_id=<?php echo $product['p_id'] ?>"><img src="../Assets/icons/carbon_add-alt.svg" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="right">
                                    <div class="heading">
                                        <h1>Cart Total</h1>
                                    </div>

                                    <div class="cost_items">
                                        <div class="costItem">
                                            <p class="title">Subtotal</p>
                                            <p class="t_cost">&#8373;<?php echo $cart_amount_gst['result'] ?></p>
                                        </div>
                                        <hr>
                                        <div class="costItem">
                                            <p class="title">Shipping</p>
                                            <div class="ship_dets">
                                                <p>Free Delivery</p>
                                                <p>Shipping to Accra, Ghana</p>
                                                <a href="">Change address</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="costItem">
                                            <p class="title">Total</p>
                                            <p class="t_cost">&#8373;<?php echo $cart_amount_gst['result'] ?></p>
                                        </div>
                                    </div>
                                    <?php
                                    if (!isset($_SESSION['user_id'])) {
                                    
                                    ?>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="button">
                                            <a href="./checkout.php?product_id=<?php echo $product['p_id'] ?>"></a><button>Proceed to Checkout</button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                }
                ?>
            <?php
        }
            ?>