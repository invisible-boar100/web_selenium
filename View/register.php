<!DOCTYPE html>
<html lang="en">

<head>

        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3REF7M7KW9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3REF7M7KW9');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../CSS/style.css">
    <title>CodeX | Register</title>
</head>

<body>
    <!-- Flex for bg & form -->
    <div class="reg-container">
        <div class="form-container">
            <div class="reg_background"></div>
            <div class="form">
                <div class="form-img">
                    <h2>Register</h2>
                    <div class="img_close">
                        <img src="../Assets/icons/ci_close-small.svg" alt="close_icon">
                    </div>
                </div>
                <!-- Register action Form -->

                <form id="form" method="POST" action="../Actions/registerprocess.php">
                    <div>
                        <div class="f1">
                            <div class="form-element">
                                <label for="">First Name</label>
                                <input type="text" placeholder=" Enter First Name" name="Firstname" id="Firstname">
                                <small>Error message</small>
                            </div>
                            <div class="form-element">
                                <label for="">Last Name</label>
                                <input type="text" placeholder=" Enter Last Name" name="Lastname" id="Lastname">
                                <small>Error message</small>
                            </div>
                        </div>
                        <div class="f2">
                            <div class="form-element">
                                <label for="">Phone Number</label>
                                <input type="text" placeholder=" Enter Contact Number" name="Phone" id="Phone">
                                <small>Error message</small>
                            </div>
                            <div class="form-element">
                                <label for="">Email </label>
                                <input type="email" placeholder=" Enter Email" name="Email" id="Email">
                                <small>Error message</small>
                            </div>
                        </div>
                        <div class="f3">
                            <div class="form-element">
                                <label for="">Password </label>
                                <input type="password" placeholder=" Enter Password" name="Pass" id="Pass">
                                <small>Error message</small>
                            </div>
                            <div class="form-element">
                                <label for="">Confirm Password</label>
                                <input type="password" placeholder=" Confirm Password" name="cPass" id="cPass">
                                <small>Error message</small>
                            </div>
                        </div>
                        <div class="form-terms">
                            <input type="checkbox" name="Terms" id="Terms">
                            <div class="p">
                                <p>Creating an account means you’re okay with our Terms of Service, Privacy Policy, and our default Notification Settings.</p>
                            </div>
                        </div>
                        <div class="form-account a">
                            <label for="">Already Have an Account?</label>
                            <div>
                                <a href="login.php">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="submitButton">
                        <button type="submit" id="submitForm" name="submitForm">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../JS/register.js"></script>
    <script src="../JS/Loader.js"></script>
</body>

</html>