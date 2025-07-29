<?php
include_once (dirname(__FILE__)) . '/../controller/user_controller.php';

if (isset($_POST['submitForm'])) {
    $fname = $_POST['Firstname'];
    $lname = $_POST['Lastname'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];
    $pass = $_POST['Pass'];
    $pass1 = $_POST['cPass'];


    $password = password_hash($pass, PASSWORD_DEFAULT);
    //check if email exists
    $verify_email = verify_email($email);

    if ($verify_email) {
        echo "<script type='text/javascript'> alert('Email already exists');              
        window.history.back();
        </script>";
    } else {
        //add new user
        $addCust = add_user_function($fname, $lname, $email, $password, $phone);
        if ($addCust) {
            echo "<script type='text/javascript'> alert('Successfully Registered');
            window.location.href = '../View/login.php';
            </script>";
        } else {
            echo "Failed";
        }
    }
}
