<?php
include_once (dirname(__FILE__)) . '/../controller/cart_controller.php';
if (isset($_GET['deleteOrdID'])) {

$o_id = $_GET['deleteOrdID'];

// call the function
$result = delete_order_controller($o_id);

if ($result === true) {
    echo "<script type='text/javascript'> alert('Successfully deleted Order');
            document.location.href = '../Admin/orders.php';
            </script>";
} else {
    echo "<script type='text/javascript'> alert('Delete Failed');              
        window.history.back();
        </script>";
    }
}


if (isset($_GET['deletePayID'])) {

    $p_id = $_GET['deletePayID'];
    
    // call the function
    $result = delete_payment_controller($p_id);
    
    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted Payment');
                document.location.href = '../Admin/payments.php';
                </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
            window.history.back();
            </script>";
    }
}


if (isset($_GET['deletecusID'])) {

    $o_id = $_GET['deletecusID'];
    
    // call the function
    $result = delete_order_customers_controller($o_id);
    
    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted Customer');
                document.location.href = '../Admin/customers.php';
                </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
            window.history.back();
            </script>";
    }
}
?>