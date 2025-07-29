<?php
include_once (dirname(__FILE__)) . "/../Settings/core.php";
include_once (dirname(__FILE__)) . "/../controller/product_controller.php";

$searchCategory = $_GET['searchTerm'];

//get customers IP address
$ipAddress = getIpAddress();

if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
    $product_search = search_for_product($searchCategory);
    session_start();
    $_SESSION['search_result'] = $product_search;
    header("Location: ../View/category.php");
} else{
    $user = $ipAddress;
    $product_search = search_for_product($searchCategory);
    session_start();
    $_SESSION['search_result'] = $product_search;
    header("Location: ../View/category.php");
}


if (isset($_GET['submit'])) {
    $search = $_GET['searchTerm'];
    $product_search = search_for_product($search);

    session_start();
    $_SESSION['search_result'] = $product_search;

    header("Location: ../View/category.php");
}
