<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //Decrease the quantity in the cart
    if (isset($_GET['dec_id'])) {
        $p_id = $_GET['dec_id'];
        $cartItem = select_one_lg_controller($p_id, $user_id);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty - 1;
            if ($oldQty != 0 && $newQty != 0) {
                if (($stock_count['stock']) >= 0) {
                    $remain_stock = $stock_count['stock'] + $oldQty;
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_lg_controller($newQty, $p_id, $user_id);
                    echo "<script>window.history.back();</script>";
                }

                echo "<script>window.history.back();</script>";
            } else {
                echo "<script>window.history.back();</script>";
            }
        }
    }

    //Increase the quantity in the cart
    if (isset($_GET['add_id'])) {
        $p_id = $_GET['add_id'];
        $cartItem = select_one_lg_controller($p_id, $user_id);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty + 1;
            if (($stock_count['stock']) >= 0) {
                $remain_stock = $stock_count['stock'] - $newQty;
                if ($remain_stock < 0) {
                    echo "<script>alert('Out of stock');window.history.back();</script>";
                } else {
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_lg_controller($newQty, $p_id, $user_id);
                    echo "<script>window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Out of stock');window.history.back();</script>";
            }
            echo "<script>window.history.back();</script>";
        }
    }
} else { // GUEST
    $ipAddress = getIpAddress();
    //Decrease the quantity in the cart
    if (isset($_GET['dec_id'])) {
        $p_id = $_GET['dec_id'];
        $cartItem = select_one_gst_controller($p_id, $ipAddress);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty - 1;
            if ($oldQty != 0 && $newQty != 0) {
                if (($stock_count['stock']) >= 0) {
                    $remain_stock = $stock_count['stock'] + $oldQty;
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_gst_controller($newQty, $p_id, $ipAddress);
                    echo "<script>window.history.back();</script>";
                }

                echo "<script>window.history.back();</script>";
            } else {
                echo "<script>window.history.back();</script>";
            }
        }
    }

    //Increase the quantity in the cart
    if (isset($_GET['add_id'])) {
        $p_id = $_GET['add_id'];
        $cartItem = select_one_gst_controller($p_id, $ipAddress);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty + 1;
            if (($stock_count['stock']) >= 0) {
                $remain_stock = $stock_count['stock'] - $newQty;
                if ($remain_stock < 0) {
                    echo "<script>alert('Out of stock');window.history.back();</script>";
                } else {
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_gst_controller($newQty, $p_id, $ipAddress);
                    echo "<script>window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Out of stock');window.history.back();</script>";
            }
            echo "<script>window.history.back();</script>";
        }
    }
}
