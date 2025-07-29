<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/product_controller.php';

$brands = select_all_brands_controller();
if (isset($_GET['b_id'])) {
    $one_brand = select_one_brand_controller($_GET['b_id']);
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

            <!-- CUSTOM CSS -->

            <link rel="stylesheet" href="../CSS/admin.css">
            <title>Brand</title>

        </head>

        <body class="cntrBody">
            <div class="form-container">
                <div class="heading">
                    <h1>
                        <?php
                        if (isset($_GET['b_id'])) {
                            echo "Update Brand";
                        } else {
                            echo "Add Brand";
                        }
                        ?>
                    </h1>
                </div>
                <form action=<?php
                                if (isset($_GET['b_id'])) {
                                    echo "../Actions/updateFunction.php";
                                } else {
                                    echo "../Actions/brandfunction.php";
                                }
                                ?> method="POST" id="form">

                    <div class="form-element">
                        <label for="">Brand</label>

                        <input type="text" id="brandname" name="brandname" value=<?php if (isset($_GET['b_id'])) {
                                                                                        echo $one_brand['brand_name'];
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?>>
                        <small>Error Message</small>
                    </div>
                    <div class="form-element">
                        <input type="hidden" name="brand_id" id="" value="<?php echo $one_brand['brand_id'] ?>">
                    </div>


                    <div>
                        <button type="submit" id="add" name="addBrand"><?php if (isset($_GET['b_id'])) {
                                                                            echo "Update Brand";
                                                                        } else {
                                                                            echo "Add Brand";
                                                                        } ?></button>
                    </div>
                    <br>

                    <a href=<?php
                            if (isset($_GET['b_id'])) {
                                echo './productView.php';
                            } else {
                                echo './productView.php';
                            }
                            ?>>
                        <?php
                        if (isset($_GET['b_id'])) {
                            echo 'Back to home';
                        } else {
                            echo 'Back to home';
                        }
                        ?>
                    </a>
                </form>
            </div>

            <script type="text/javascript" src="../JS/brand_cat.js"></script>
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