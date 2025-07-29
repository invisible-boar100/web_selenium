<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/user_controller.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';



if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"])) {
    $get_user = select_one_user_controller($_SESSION["user_id"]);
    $total_checkout = total_checkout_lg_controller($_SESSION["user_id"]);
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

            <title>CodeX | Card Information</title>
        </head>

        <body>
            <main>

                <!-- MOBILE BREAD CRUMB -->
                <section class="mb_crumb ci_dets">
                    <div class="content">
                        <div class="b_menu">
                            <a href="../index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Card Information</a>
                        </div>
                    </div>
                    <hr>
                </section>

                <!-- DESKTOP BREAD CRUMB -->
                <section class="b_crumb ci_dets">
                    <div class="content ">
                        <div class="b_menu">
                            <a href="../index.php" class="cat_img">
                                <img src="../Assets/icons/bi_house.svg" alt="">
                            </a>
                            <div class="cat_img">
                                <img src="../Assets/icons/eva_arrow-ios-back-fill-1-black.svg" width="20" alt="">
                            </div>
                            <a href="">Card Information</a>
                        </div>

                    </div>
                    <hr>
                </section>


                <section class="card_details">
                    <div class="content">
                        <div class="left">
                            <div class="heading py">
                                <h1>Payment</h1>
                            </div>

                            <p class="py">Select your preferred card</p>

                            <div class="card_sel">
                                <div class="card">
                                    <img src="../Assets/icons/simple-icons_visa.svg" alt="">
                                </div>
                                <div class="card">
                                    <img src="../Assets/icons/logos_mastercard.svg" alt="">
                                </div>
                            </div>

                            <!-- form -->
                            <div class="ci_form_container">
                                <form action="">

                                    <div class="form-control">
                                        <label for="">Email</label>
                                        <input type="email" id="email-address" placeholder="<?php echo $get_user['user_email'] ?>" value="<?php echo $get_user['user_email'] ?>">
                                    </div>
                                    <div class="form-control">
                                        <label for="">Phone Number</label>
                                        <input type="text" id="phone" placeholder="<?php echo $get_user['user_contact'] ?>" value="<?php echo $get_user['user_contact'] ?>">
                                    </div>

                                    <div class="form-control">
                                        <button id="pay" type="button" value="<?php echo $total_checkout['total'] ?>" onclick="payWithPaystack()">Pay <span>&#8373;<?php echo $total_checkout['total'] ?></span></button>
                                    </div>

                                </form>
                            </div>
                        </div>


                        <div class="right">
                            <div class="card_img">
                                <img src="../Assets/Images/backgrounds/pngwing 4.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <!-- PAYSTACK INLINE SCRIPT -->
            <script src="https://js.paystack.co/v1/inline.js"></script>

            <script>
                const paymentForm = document.getElementById('paymentForm');
                paymentForm.addEventListener("submit", payWithPaystack, false);

                // PAYMENT FUNCTION
                function payWithPaystack() {

                    let handler = PaystackPop.setup({
                        key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
                        // key: 'pk_test_b28f7685fbbab527a165b02f5d271541fa8e95fa', // Replace with your public key
                        //pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd
                        email: document.getElementById("email-address").value,
                        phone: document.getElementById("phone").value,
                        amount: document.getElementById("pay").value * 100,
                        currency: 'GHS',
                        onClose: function() {
                            // window.location = "http://localhost/CodeX/index.php?transaction=cancel"
                            alert('Transaction Cancelled.');
                        },
                        callback: function(response) {

                            let message = "Payment Successful! Reference: " + response.reference;
                            alert(message);
                            window.location = "http://codexx.ukwest.cloudapp.azure.com/Actions/processPayment.php?reference=" + response.reference;
                            // window.location = "http://localhost/CodeX/Actions/processPayment.php?reference=" + response.reference;
                        }
                    });
                    handler.openIframe();
                }
            </script>

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
