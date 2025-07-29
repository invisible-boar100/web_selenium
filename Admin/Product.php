<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/product_controller.php';

$allproducts = select_all_products_controller();
$Allcategory = select_all_categories_controller();
$Allbrands = select_all_brands_controller();
if (isset($_GET['p_id'])) {
    $one_product = select_a_product_controller($_GET['p_id']);
}

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
            <title>Product</title>
        </head>

        <body class="cntrBody prod_P">
            <div class="form-container">
                <div class="heading">
                    <h1><?php if (isset($_GET['p_id'])) {
                            echo "Update Product";
                        } else {
                            echo "Add Product";
                        } ?></h1>
                </div>

                <form method="POST" action="../Actions/productFunction.php" enctype="multipart/form-data">
                    <div class="flex">
                        <div class="form-element">
                            <label for="">Category</label>
                            <select name="category" id="category">
                                <option selected disabled hidden>Select Product Category</option>
                                <?php
                                if (isset($_GET['p_id'])) {
                                    echo "<option value='$one_product[cat_id]' selected>$one_product[cat_name]</option>";
                                    foreach ($Allcategory as $cat) {
                                        echo "<option value='$cat[cat_id]'>$cat[cat_name]</option>";
                                    }
                                } else {
                                    echo "<option selected disabled hidden> Select Product Category</option>";
                                    foreach ($Allcategory as $cat) {
                                        echo "<option value='$cat[cat_id]'>$cat[cat_name]</option>";
                                    }
                                }
                                ?>

                            </select>
                            <small></small>
                        </div>
                        <div class="form-element">
                            <label for="">Brand</label>
                            <select name="brand" id="brand">
                                <option selected disabled hidden>Select Product Brand</option>
                                <?php
                                if (isset($_GET['p_id'])) {
                                    echo "<option value='$one_product[brand_id]' selected>$one_product[brand_name]</option>";
                                    foreach ($Allbrands as $brand) {
                                        echo "<option value='$brand[brand_id]'>$brand[brand_name]</option>";
                                    }
                                } else {
                                    echo "<option selected disabled hidden>Select Product Brand</option>";
                                    foreach ($Allbrands as $brand) {
                                        echo "<option value='$brand[brand_id]'>$brand[brand_name]</option>";
                                    }
                                }

                                ?>

                            </select>
                            <small></small>
                        </div>
                    </div>
                    <div class="form-element">
                        <label for="">Title</label>

                        <?php
                        if (isset($_GET['p_id'])) {
                            echo '<input type="text" placeholder="Product Title" id="title" name="title" value="' . $one_product['product_title'] . '">';
                        } else {
                            echo '<input type="text" placeholder="Product Title" id="title" name="title" value="" >';
                        } ?>
                        <small></small>
                    </div>
                    <div class="form-element">
                        <label for="">Price</label>
                        <?php
                        if (isset($_GET['p_id'])) {
                            echo '<input type="text" placeholder="Product Price" id="price" name="price" value="' . $one_product['product_price'] . '">';
                        } else {
                            echo '<input type="text" placeholder="Product Price" id="price" name="price" value="">';
                        } ?>
                        <small></small>
                    </div>
                    <div class="form-element">
                        <label for="">Description</label>
                        <?php
                        if (isset($_GET['p_id'])) {

                            echo '<input type="text" placeholder="Product Description" id="desc" name="desc" value= "' . $one_product['product_desc'] . '">';
                        } else {
                            echo '<textarea id="desc" name="desc" cols="30" placeholder="Product Description" rows="10" style="resize: none"></textarea>';
                        } ?>
                        <small></small>
                    </div>
                    <div class="form-element">
                        <label for="">Image</label>
                        <?php
                        if (isset($_GET['p_id'])) {
                            echo '<input type="file" id="image" name="image" accept="image/*"  >
                                    <img src="' . $one_product['product_image'] . '" height = "100">';
                        } else {
                            echo '<input type="file" id="image" name="image" accept="image/*">';
                        }
                        ?>
                        <small></small>
                    </div>
                    <div class="form-element">
                        <label for="">Keyword</label>
                        <?php
                        if (isset($_GET['p_id'])) {
                            echo '<input type="text" placeholder="Product Keyword" id="keyword" name="keyword" value="' . $one_product['product_keywords'] . '">';
                        } else {
                            echo '<input type="text" placeholder="Product Keyword" id="keyword" name="keyword" value="">';
                        }
                        ?>
                        <small></small>
                    </div>
                    <div class="form-element">
                        <label for="">Stock</label>
                        <?php
                        if (isset($_GET['p_id'])) {
                            echo '<input type="text" placeholder="Product Stock" id="stock" name="stock" value="' . $one_product['stock'] . '">';
                        } else {
                            echo '<input type="text" placeholder="Product Stock" id="stock" name="stock" value="">';
                        }
                        ?>
                        <small></small>
                    </div>
                    <input type="hidden" name="p_id" value=<?php echo $one_product['product_id']; ?>>
                    <div>
                        <button type="submit" id="addProduct" name=<?php if (isset($_GET['p_id'])) {
                                                                        echo "updateProd";
                                                                    } else {
                                                                        echo "addProduct";
                                                                    } ?> id="addPBtn"><?php if (isset($_GET['p_id'])) {
                                                                                            echo "Update Product";
                                                                                        } else {
                                                                                            echo "Add Product";
                                                                                        } ?></button>
                    </div>
                    <a style="display: block; text-align: center;" href=<?php if (isset($_GET['p_id'])) {
                                                                            echo "./productView.php";
                                                                        } else {
                                                                            echo "./productView.php";
                                                                        } ?>><?php if (isset($_GET['p_id'])) {
                                                                                    echo "Back to Product View";
                                                                                } else {
                                                                                    echo "Back to home";
                                                                                } ?></a>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="../JS/pagination.js"></script>
            <script type="text/javascript" src="../JS/product.js"></script>
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


?>