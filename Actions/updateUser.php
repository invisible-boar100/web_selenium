<?php
include_once (dirname(__FILE__)) . '/../controller/user_controller.php';
include_once (dirname(__FILE__)) . '/../Settings/core.php';

if (isset($_SESSION["user_id"])){
    $c_id = $_SESSION["user_id"]; 
    $customers =select_one_user_controller($c_id);
}

if (isset($_POST['submitForm'])) {
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['contact'];
    $email = $_POST['email'];
   

    
    $update_cus = update_user_controller($user_id, $fname, $lname, $email, $phone);
    if($update_cus){
            echo "<script type='text/javascript'> alert('Successfully Updated User Information');
            window.location.href = '../View/userprofile.php';
            </script>";
    }else{
            echo "<script type='text/javascript'> alert('Failed to update');              
            window.history.back();
            </script>";
        }

}



?>