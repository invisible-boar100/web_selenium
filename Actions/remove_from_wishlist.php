<?php

//connect to the cart controller
include_once (dirname(__FILE__)) . '/../controller/wishlist_controller.php';
include_once (dirname(__FILE__)) . '/../Settings/core.php';

if (isset($_GET['p_id'])) {

    $pid = $_GET['p_id'];
    $ipadd = getIpAddress();

    if (isset($_SESSION['user_id'])) {
        $cid = $_SESSION['user_id'];
        $delete = delete_wishlist_lg_controller($pid, $cid);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from wishlist');
            document.location.href='../View/wishlist.php';
            </script>";
        } else {
            echo "something went wrong";
        }
    }
} else {
    header("location: ../index.php");
}
