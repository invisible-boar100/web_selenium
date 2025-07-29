<?php

//connect to the cart controller
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';
include_once (dirname(__FILE__)) . '/../Settings/core.php';

if (isset($_GET['p_id'])) {

    $pid = $_GET['p_id'];
    $ipadd = getIpAddress();

    if (isset($_SESSION['user_id'])) {
        $cid = $_SESSION['user_id'];
        $delete = delete_cart_lg_controller($pid, $cid);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from Cart');
            window.location.href = '../View/cart.php';
            </script>";
        } else {
            echo "something went wrong";
        }
    } else {
        $delete = delete_cart_gst_controller($pid, $ipadd);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from Cart');
            window.location.href = '../View/cart.php';
            </script>";
        } else {
            echo "<script type='text/javascript'> alert('Delete Failed');              
        window.history.back();
        </script>";
        }
    }
} else {
    header("location: ../index.php");
}
