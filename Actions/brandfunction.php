<?php

include_once (dirname(__FILE__)) . '/../controller/product_controller.php';

if (isset($_POST['addBrand'])) {
    $brand_name = $_POST['brandname'];

    $check_brand = check_brand_function($brand_name);
    if ($check_brand) {
        echo "<script>alert('This Brand already exists'); 
        window.history.back();
        </script>";
    } else {
        //add brand
        $addBrand = add_brand_function($brand_name);
        if ($addBrand) {
            echo "<script type='text/javascript'> alert('Successfully added Brand');
            window.location.href = '../Admin/Brand.php';
            </script>";
        } else {
            echo "Failed";
        }
    }
} else {
    echo "<script type='text/javascript'> alert('Adding brand Failed');              
        window.history.back();
        </script>";
}
