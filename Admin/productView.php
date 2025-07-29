<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/product_controller.php';
$all_products = select_all_products_controller();
$all_categories = select_all_categories_controller();
$all_brands = select_all_brands_controller();

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
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

                gtag('config', 'G-3REF7M7KW9');
            </script>
            
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../CSS/admin.css">
            <title>Admin | Products</title>
        </head>

        <body>
            <!-- Admin products -->
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
                                <a href="./dashboard.php" class="nav_item">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/ic_round-dashboard-black.svg" alt="">
                                    </div>
                                    <p class="nav_name">Home</p>
                                </a>
                                <a href="./productView.php" class="nav_item active">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/dashicons_products-1.svg" alt="">
                                    </div>
                                    <p class="nav_name">Products</p>
                                </a>
                                <a href="./payments.php" class="nav_item">
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
                                        <h2>Products</h2>
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
                                <div class="pg_content cl">
                                    <div class="product_stats">
                                        <div class="pr_stat_item">
                                            <div class="icon" id="i1">
                                                <img src="../Assets/icons/fluent_select-all-off-24-filled.svg" alt="">
                                            </div>
                                            <div class="text">
                                                <p class="st_title">All Products</p>
                                                <h3>440,123</h3>
                                            </div>
                                        </div>

                                        <div class="pr_stat_item">
                                            <div class="icon" id="i2">
                                                <img src="../Assets/icons/bx_bxs-add-to-queue.svg" alt="">
                                            </div>
                                            <div class="text">
                                                <a href="./Brand.php" class="ad_add">Add Brand</a>
                                            </div>
                                        </div>

                                        <div class="pr_stat_item">
                                            <div class="icon" id="i3">
                                                <img src="../Assets/icons/bx_bxs-add-to-queue.svg" alt="">
                                            </div>
                                            <div class="text">
                                                <a href="./Category.php" class="ad_add">Add Category</a>

                                            </div>
                                        </div>

                                        <div class="pr_stat_item">
                                            <div class="icon" id="i4">
                                                <img src="../Assets/icons/bx_bxs-add-to-queue.svg" alt="">
                                            </div>
                                            <div class="text">
                                                <a href="./Product.php" class="ad_add">Add Product</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- category and brands table -->
                                    <div class="cat_Brand">
                                        <div class="pr_table cat">
                                            <div class="heading">
                                                <h2>Category Details</h2>
                                                <!-- add product button -->

                                            </div>


                                            <table class="table" id="data3">

                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Category Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                foreach ($all_categories as $category) {
                                                ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $category['cat_id'] ?></td>

                                                            <td><?php echo $category['cat_name'] ?></td>
                                                            <td class="actions">
                                                                <a href="<?php echo "../Admin/Category.php?c_id=" . $category['cat_id']; ?>"><img src="../Assets/icons/ci_edit.svg" alt=""></a>
                                                                <a href="<?php echo "../Actions/updateFunction.php?deleteCatID=" . $category['cat_id']; ?>"><img src="../Assets/icons/fluent_delete-20-filled-black.svg" alt=""></a>


                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                        <div class="pr_table cat">
                                            <div class="heading">
                                                <h2>Brand Details</h2>
                                                <!-- add product button -->

                                            </div>


                                            <table class="table" id="data">

                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Brand Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                foreach ($all_brands as $brand) {
                                                ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $brand['brand_id'] ?></td>

                                                            <td><?php echo $brand['brand_name'] ?></td>
                                                            <td class="actions">

                                                                <a href="<?php echo "../Admin/Brand.php?b_id=" . $brand['brand_id']; ?>"><img src="../Assets/icons/ci_edit.svg" alt=""></a>
                                                                <a href="<?php echo "../Actions/updateFunction.php?deleteBrandID=" . $brand['brand_id']; ?>"><img src="../Assets/icons/fluent_delete-20-filled-black.svg" alt=""></a>


                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                    </div>

                                    <!-- products table -->
                                    <div class="pr_table">
                                        <div class="heading">
                                            <h2>Product Details</h2>
                                            <!-- add product button -->

                                        </div>


                                        <table class="table" id="data2">

                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Stock</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <?php

                                            foreach ($all_products as $products) {
                                            ?>

                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $products['product_id'] ?></td>
                                                        <td class="pr_image">
                                                            <img src="<?php echo $products['product_image'] ?>" alt="">
                                                        </td>
                                                        <td><?php echo $products['product_title'] ?></td>
                                                        <td>&#8373;<?php echo $products['product_price'] ?></td>
                                                        <td><?php echo $products['cat_name'] ?></td>
                                                        <td><?php echo $products['brand_name'] ?></td>
                                                        <td><?php echo $products['stock'] ?></td>
                                                        <td class="actions">
                                                            <a href="<?php echo "../Admin/Product.php?p_id=" . $products['product_id']; ?>"><img src="../Assets/icons/ci_edit.svg" alt=""></a>
                                                            <a href="<?php echo "../Actions/productFunction.php?deleteProductID=" . $products['product_id']; ?>"><img src="../Assets/icons/fluent_delete-20-filled-black.svg" alt=""></a>
                                                            <!-- <a href="../Actions/productFunction.php?deleteProductID={$products['product_id']}"><img src="../Assets/icons/fluent_delete-20-filled-black.svg" alt=""></a> -->

                                                        </td>
                                                    </tr>
                                                </tbody>
                                    </div>
                                <?php
                                            }
                                ?>
                                </table>
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
