<?php
include_once (dirname(__FILE__)) . '/../Settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/product_controller.php';

if (isset($_GET['submitReview'])) {
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];
    $review = $_GET['desc'];
    $post_date = $_GET['post_date'];

    $addReview = add_order_reviews_controller($user_id, $product_id, $review, $post_date);

    if ($addReview) {
        echo "<script>alert('Review added successfully'); document.location.href='../View/review.php';</script>";
    } else {
        echo "<script>alert('Review not added'); document.location.href='../View/review.php';</script>";
    }
}
