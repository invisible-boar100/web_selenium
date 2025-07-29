<?php

require('../controller/product_controller.php');

//update brand
if (isset($_POST["addBrand"])) {

    $brand_id = $_POST['brand_id'];
    $updateValue = $_POST['brandname'];

    // call method from controller
    $result = update_brand_controller($brand_id, $updateValue);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully Updated Brand');
            window.history.back();
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Update Failed');              
            window.history.back();
            </script>";
    }
} else {
    header('location: ../Admin/productView.php');
}

//update category
if (isset($_POST["addCat"])) {

    $cat_id = $_POST['cat_id'];
    $updateValue = $_POST['catname'];

    // call method from controller
    $result = update_category_controller($cat_id, $updateValue);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully Updated Category');
            document.location.href='../Admin/productView.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Update Failed');              
            window.history.back();
            </script>";
    }
} else {
    header('location: ../Admin/productView.php');
}


// delete category

if (isset($_GET['deleteCatID'])) {

    $id = $_GET['deleteCatID'];

    // call the function
    $result = delete_category_function($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted Category');
                document.location.href = '../Admin/productView.php';
                </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
            window.history.back();
            </script>";
    }
}


//delete Brand
if (isset($_GET['deleteBrandID'])) {

    $id = $_GET['deleteBrandID'];

    // call the function
    $result = delete_brand_function($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted Brand');
            document.location.href = '../Admin/productView.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
        window.history.back();
        </script>";
    }
}
