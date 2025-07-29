<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';



$get_user = $_SESSION['user_id'];
$get_product = $_GET['product_id'];
$p_date = date("Y/m/d");



if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
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

            <!-- CUSTOM CSS -->

            <link rel="stylesheet" href="../CSS/usP.css">
            <title>Write a review</title>

        </head>

        <body class="cntrBody">
            <div class="form-container">
                <div class="heading">
                    <h1>Write a Review</h1>
                </div>
                <form action="../Actions/addReview.php" method="GET" id="form">

                    <div class="form-element">
                        <input type="hidden" name="user_id" value="<?php echo $get_user?>">
                        <input type="hidden" name="product_id" value="<?php echo $get_product?>">
                        <input type="hidden" name="post_date" value="<?php echo $p_date?>">
                        <label for="">Review</label>
                        <textarea id="desc" name="desc" cols="50" placeholder="Review Message" rows="10" style="resize: none"></textarea>
                        <br>
                    </div>
                   
                    <div>
                        <button type="submit" id="add" name="submitReview">Submit Review</button>
                    </div>
                    <br>

                    <a href=""></a>
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
        alert('User not logged in');
        document.location.href='../index.php';
        </script>

        ";
}

?>