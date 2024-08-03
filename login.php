<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 14:57:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>DocCare login</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="container-fluid px-0">
            <div class="row">

                <div class="col-lg-6 login-wrap">
                    <div class="login-sec">
                        <div class="log-img">
                            <img class="img-fluid" src="assets/img/login-02.png" alt="Logo">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <a href="index.html"><img src="assets/img/favicon.png" alt=""><b>
                                                DocCare
                                            </b></a>
                                    </div>
                                    <h2>Login</h2>
                                    <!-- <?php
                                            // Include the login processing script (login_process.php)
                                            include 'login_process.php';

                                            // Display error messages if any (from login_process.php)
                                            if (isset($errorMsg)) {
                                                echo "<div class='error-message'>$errorMsg</div>";
                                            }
                                            ?> -->
                                    <br>

                                    <form action="login_process.php" method="post">
                                        <div class="input-block">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" type="text" required>
                                        </div>
                                        <div class="input-block">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" name="password" type="password" required>
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                        </div>
                                        <div class="forgotpass">
                                            <div class="remember-me">
                                                <label class="custom_check mr-2 mb-0 d-inline-flex remember-me">
                                                    Remember me
                                                    <input type="checkbox" name="remember_me" required>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <a href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                    </form>

                                    <div class="next-sign">
                                        <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a>
                                        </p>

                                        <div class="social-login">
                                            <a href="javascript:;"><img src="assets/img/icons/login-icon-01.svg" alt></a>
                                            <a href="javascript:;"><img src="assets/img/icons/login-icon-02.svg" alt></a>
                                            <a href="javascript:;"><img src="assets/img/icons/login-icon-03.svg" alt></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.7.1.min.js" type="0fbc54e0b7324b58bd658fdd-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="0fbc54e0b7324b58bd658fdd-text/javascript"></script>

    <script src="assets/js/feather.min.js" type="0fbc54e0b7324b58bd658fdd-text/javascript"></script>

    <script src="assets/js/app.js" type="0fbc54e0b7324b58bd658fdd-text/javascript"></script>
    <script src="assets/js/rocket-loader.min.js" data-cf-settings="0fbc54e0b7324b58bd658fdd-|49" defer></script>
</body>

<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 14:57:44 GMT -->

</html>