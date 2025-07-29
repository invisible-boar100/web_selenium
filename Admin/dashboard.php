<?php

include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';
include_once (dirname(__FILE__)) . '/../controller/user_controller.php';

$userCount = count_users_func();
$orderCount = count_orders_controller();
$productCount = count_products_controller();
$sumRevenue = sum_revenue_controller();

$ordersAdmin = select_orderDetails_admin_controller();

if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"])) {

    if ($_SESSION["user_role"] === '1') {

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
            <link rel="stylesheet" href="../CSS/admin.css">
            <title>Admin | Dashboard</title>
        </head>

        <body>
            <!-- Admin dashboard -->
            <main>
                <!-- content container -->
                <div class="container">
                    <div class="content">
                        <div class="left">
                            <div class="heading">
                                <h2>CodeX</h2>
                            </div>

                            <!-- admin navigation -->
                            <div class="ad_nav">
                                <a href="./dashboard.php" class="nav_item active">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/ic_round-dashboard.svg" alt="">
                                    </div>
                                    <p class="nav_name">Home</p>
                                </a>
                                <a href="./productView.php" class="nav_item ">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/dashicons_products.svg" alt="">
                                    </div>
                                    <p class="nav_name">Products</p>
                                </a>
                                <a href="./payments.php" class="nav_item ">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/fluent_payment-24-filled.svg" alt="">
                                    </div>
                                    <p class="nav_name">Payments</p>
                                </a>
                                <a href="./orders.php" class="nav_item">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/fa-solid_clipboard-list.svg" alt="">
                                    </div>
                                    <p class="nav_name" style="margin-left: 10px;">Orders</p>
                                </a>
                                <a href="./customers.php" class="nav_item ">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/bi_people-fill.svg" alt="">
                                    </div>
                                    <p class="nav_name">Customers</p>
                                </a>

                                <div class="bottom">
                                    <a href="./settings.php" class="nav_item ">
                                        <div class="nav_icon">
                                            <img src="../Assets/icons/clarity_settings-solid.svg" alt="">
                                        </div>
                                        <p class="nav_name">Settings</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- page content -->
                        <div class="right">
                            <div class="content">
                                <div class="heading">
                                    <div class="gret">
                                        <h2>Dashboard</h2>
                                        <p>Wednesday, 20 October 2021</p>
                                    </div>

                                    <!-- dropdown menu -->
                                    <div class="dropdown">
                                        <a href="#">
                                            <img src="../Assets/icons/mdi_account-circle-outline.svg" alt="">
                                        </a>
                                        <div class="dropdown-content">
                                            <a href="./settings.php">Settings</a>
                                            <a href="../Settings/logout.php">Logout</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- page content -->
                                <div class="pg_content">
                                    <div class="dash_left">
                                        <div class="stats_plq">
                                            <div class="stat_item">
                                                <div class="icon" id="i1">
                                                    <img src="../Assets/icons/bi_people-fill-1.svg" alt="">
                                                </div>
                                                <div class="text">
                                                    <p class="st_title">Max Users</p>
                                                    <h3><?php echo $userCount['count']?></h3>
                                                </div>
                                            </div>

                                            <span class="v-line"></span>

                                            <div class="stat_item">
                                                <div class="icon" id="i2">
                                                    <img src="../Assets/icons/fa-solid_clipboard-list-1.svg" alt="">
                                                </div>
                                                <div class="text">
                                                    <p class="st_title">Orders</p>
                                                    <h3><?php echo $orderCount['count']?></h3>
                                                </div>
                                            </div>

                                            <span class="v-line"></span>

                                            <div class="stat_item">
                                                <div class="icon" id="i3">
                                                    <img src="../Assets/icons/dashicons_products-1.svg" alt="">
                                                </div>
                                                <div class="text">
                                                    <p class="st_title">Products</p>
                                                    <h3><?php echo $productCount['count'] ?></h3>
                                                </div>
                                            </div>

                                            <span class="v-line"></span>

                                            <div class="stat_item">
                                                <div class="icon" id="i4">
                                                    <img src="../Assets/icons/fa-solid_money-check-alt.svg" alt="">
                                                </div>
                                                <div class="text">
                                                    <p class="st_title">Revenue</p>
                                                    <h3>&#8373;<?php echo $sumRevenue['result']/(10 ** 2) ?></h3>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- chart -->
                                        <div class="chart">

                                        </div>

                                        <!-- page stats -->
                                        <div class="page_stats">
                                            <div class="p_stat_item">
                                                <div class="heading">
                                                    <h3>New Users</h3>
                                                </div>

                                                
                                            </div>
                                            <div class="p_stat_item" id="purple">
                                                <div class="heading">
                                                    <h3>Profit</h3>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash_right">
                                        <!-- orders -->
                                        <div class="orders pr_table">
                                            <div class="heading">
                                                <h3>Orders</h3>
                                                <a href="">View all</a>
                                            </div>

                                            <table class="table" id="dor_data">

                                                <tbody>
                                                    <?php
                                                    foreach ($ordersAdmin as $order) {
                                                    ?>
                                                        <!-- order items -->
                                                        <tr>
                                                        <td>
                                                        <div class="order_items">
                                                            <div class="order_item">
                                                                <div class="oi_left">
                                                                    <div class="p_image">
                                                                        <img src="<?php echo $order['product_image']; ?>" alt="">
                                                                    </div>
                                                                    <div class="p_info">
                                                                        <p><?php echo $order['product_title']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="oi_right">
                                                                    <p class="price">&#8373;<?php echo $order['product_price']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>


                                        </div>

                                        <div class="top_selling">
                                            <div class="heading">
                                                <h3>Top Selling</h3>
                                            </div>

                                            <div class="top_product">
                                                <div class="tp_image">
                                                    <img src="../Assets/Images/products/apple.png" alt="">
                                                </div>
                                                <div class="tp_text">
                                                    <h2>Apple Macbook Pro</h2>
                                                    <P>With M1 Chip</P>
                                                </div>
                                            </div>

                                            <div class="sales">
                                                <div class="sale_item">
                                                    <p>Sales</p>
                                                    <h2>150</h2>
                                                </div>
                                                <span class="v-line"></span>
                                                <div class="sale_item">
                                                    <p>Profit</p>
                                                    <h2>$300,000</h2>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="../JS/pagination.js"></script>
        </body>

        </html>
<?php
    }
} else {
    echo "
        <script>
        alert('Administrator not logged in');
        document.location.href='../index.php';
        </script>

        ";
}
