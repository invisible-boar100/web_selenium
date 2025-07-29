<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
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

                gtag('config', 'G-3REF7M7KW9');
            </script>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../CSS/admin.css">
            <title>Admin | Customers</title>
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
                                <a href="./productView.php" class="nav_item">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/dashicons_products.svg" alt="">
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
                                <a href="./customers.php" class="nav_item">
                                    <div class="nav_icon">
                                        <img src="../Assets/icons/bi_people-fill.svg" alt="">
                                    </div>
                                    <p class="nav_name">Customers</p>
                                </a>

                                <div class="bottom">
                                    <a href="./settings.php" class="nav_item active">
                                        <div class="nav_icon">
                                            <img src="../Assets/icons/clarity_settings-solid-white.svg" alt="">
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
                                        <h2>Settings</h2>
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
                                <div class="pg_content sm">
                                    <div class="settings_plq">
                                        <!-- account form -->
                                        <div class="acc_form">
                                            <form action="">
                                                <div class="form_control">
                                                    <p class="p_title">Change email</p>

                                                    <label for="">Email Address</label>
                                                    <input type="text">
                                                </div>
                                                <div class="form_control">
                                                    <p class="p_title">Change Password</p>
                                                    <label for="">Old Password</label>
                                                    <input type="password">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password">
                                                </div>
                                                <div class="sbs btn">
                                                    <button id="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
