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
    <title>CodeX | Login</title>
</head>

<body>
    <!-- Flex for bg & form -->
    <div class="reg-container">
        <div class="form-container">
            <div class="log_background"></div>
            <div class="form">
                <div class="form-img">
                    <h2>Login</h2>
                    <div class="img_close">
                        <img src="../Assets/icons/ci_close-small.svg" alt="close_icon">
                    </div>
                </div>
                <!-- Register action Form -->
                <form id="form" method="POST" action="../Actions/loginprocess.php">
                    <div>
                        <div class="form-element">
                            <label for="">Email </label>
                            <input type="email" placeholder=" Enter Email" name="Email" id="Email">
                            <small>Error Message</small>
                        </div>
                        <div class="form-element">
                            <label for="">Password </label>
                            <input type="password" placeholder=" Enter Password" name="Pass" id="Pass">
                            <small>Error Message</small>
                        </div>
                        <div class="form-terms log">
                            <input type="checkbox" name="Terms" id="Terms">
                            <div class="p">
                                <p>Keep me logged in.</p>
                            </div>
                        </div>
                        <div class="form-account a register">
                            <label for="">Don't Have an Account?</label>
                            <div class="link-log">
                                <a href="register.php">Create Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="submitButton">
                        <button type="submit" id="submitForm" name="submitForm">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../JS/login.js"></script>
    <script src="../JS/Loader.js"></script>
</body>

</html>