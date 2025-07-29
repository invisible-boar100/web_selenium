<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';


if (isset($_SESSION['user_id'])) { //gets session of customer(logged in)
    $user_id = $_SESSION['user_id'];  //user_id is now session
    $product_cart = select_all_cart_lg_controller($user_id);
    $cart_amount_lg = sum_cart_lg_controller($user_id);
    $total_checkout = total_checkout_lg_controller($user_id);
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

            <title>CodeX | Checkout</title>
        </head>

        <body>
            <!-- ad space -->
            <main>

                <!-- MOBILE BREAD CRUMB -->
                <section class="mb_crumb chk">
                    <div class="content">
                        <div class="b_menu">
                            <div class="cat_img">
                                <a href="../index.php" class=""><img src="../Assets/icons/bi_house.svg" alt=""></a>
                            </div>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Checkout</a>
                        </div>
                    </div>
                    <hr>
                </section>

                <!-- DESKTOP BREAD CRUMB -->
                <section class="b_crumb chk">
                    <div class="content ">
                        <div class="b_menu">
                            <div class="cat_img">
                                <a href="../index.php"><img src="../Assets/icons/bi_house.svg" alt=""></a>
                            </div>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Checkout</a>
                        </div>

                    </div>
                    <hr>
                </section>

                <section class="chk_details">
                    <div class="content">
                        <div class="left">
                            <div class="heading">
                                <h1>Checkout</h1>
                            </div>

                            <div class="step">
                                <div class="step_icon">
                                    <img src="../Assets/icons/gg_check-r.svg" alt="">
                                </div>
                                <div class="step_content">
                                    <h4>Your contacts</h4>
                                    <div class="step_2_content">
                                        <div class="c_info">
                                            <p>anna6785agmail.com,</p>
                                            <p>+38 (098) 897-87-65</p>
                                        </div>
                                        <div class="edit_icon">
                                            <img src="../Assets/icons/clarity_edit-solid.svg" alt="">
                                            <a href="">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="step">
                                <div class="step_icon">
                                    <img src="../Assets/icons/gg_check-r.svg" alt="">
                                </div>
                                <div class="step_content">
                                    <h4>Delivery</h4>
                                    <div class="step_2_content">
                                        <div class="c_info">
                                            <p>Kiev Pickup from the store,</p>
                                            <p>Ave. S. Bandera, 23</p>
                                        </div>
                                        <div class="edit_icon">
                                            <img src="../Assets/icons/clarity_edit-solid.svg" alt="">
                                            <a href="">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="step">
                                <div class="step_icon">
                                    <img src="../Assets/icons/gg_check-r-1.svg" alt="">
                                </div>
                                <div class="step_content">
                                    <h4>Payment</h4>
                                    <div class="payment">
                                        <div class="p_options">
                                            <div class="p_plq ">
                                                <div class="icon">
                                                    <img src="../Assets/icons/bi_cash.svg" alt="">
                                                </div>
                                                <p>Cash on delivery</p>
                                            </div>
                                            <div class="p_plq active">
                                                <div class="icon">
                                                    <img src="../Assets/icons/bi_credit-card-2-front-fill.svg" alt="">
                                                </div>
                                                <p>Bank card</p>
                                            </div>
                                        </div>
                                        <p>You can make a payment at any Bank branch to our card account</p>
                                        <p style="color: red;">Important! An additional 1% service charge will be charged</p>
                                    </div>
                                </div>
                            </div>

                            <div class="chkBtn">
                                <a href="./cardInfo.php"><button>Checkout</button></a>
                            </div>
                        </div>

                        <div class="right">
                            <div class="o_det">
                                <h1>My Order</h1>
                                <?php
                                foreach ($product_cart as $order) {
                                ?>
                                    <!-- checkout items -->
                                    <div class="chk_item">
                                        <div class="left">
                                            <div class="p_img">
                                                <img src="<?php echo $order['product_image'] ?>" alt="">
                                            </div>

                                            <div class="p_content">
                                                <h4 class="chk_it_name"><?php echo $order['product_title'] ?></h4>
                                            </div>
                                        </div>

                                        <div class="p_price">
                                            <h3>&#8373;<?php echo $order['product_price'] * $order['quantity'] ?></h3>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <hr style="border-color: white;">

                                <div class="price_dets">
                                    <div class="price_plq">
                                        <p class="name">Sum</p>
                                        <p class="price">&#8373;<?php echo $cart_amount_lg['result'] ?></p>
                                    </div>


                                    <div class="price_plq">
                                        <p class="name">Additional Services</p>
                                        <p class="price">&#8373;0.01</p>
                                    </div>

                                    <div class="price_plq">
                                        <p class="name">Delivery</p>
                                        <p class="price">&#8373;0.01</p>
                                    </div>

                                    <div class="price_plq">
                                        <p class="name">Total</p>

                                        <p class="price">&#8373;<?php echo $total_checkout['total'] ?></p>

                                    </div>
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
    ?>
<?php
}
?>