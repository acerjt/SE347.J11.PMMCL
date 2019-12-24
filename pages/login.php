<?php include('login_perform.php'); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Login || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/css/owl.theme.css">
    <link rel="stylesheet" href="public/css/owl.transitions.css">
    <!-- jquery-ui CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/jquery-ui.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/meanmenu.min.css">
    <!-- nivoslider CSS
        ============================================ -->
    <link rel="stylesheet" href="public/lib/css/nivo-slider.css">
    <link rel="stylesheet" href="public/lib/css/preview.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- magic CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/magic.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/normalize.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/main.css">
    <!-- style CSS
        ============================================ -->
    <!-- <link rel="stylesheet" href="public/style.css"> -->
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="public/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->

    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong>Login page</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>login</h2>
                                <span>Please login using account detail bellow.</span>
                            </div>
                            <div class="login-form">
                                <form>
                                    <input class="user-name" type="text" name="user-name" placeholder="Username" autocomplete="username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
                                    <div>
                                        <input class="user-password" type="password" name="user-password" placeholder="Password" autocomplete="current-password" >
                                        <div></div>
                                    </div>

                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" id="remember">
                                            <label for="remember">Remember me</label>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <div>
                                            <button type="button" name="login" class="login-btn default-btn">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery
        ============================================ -->
    <script src="public/js/vendor/jquery-1.12.1.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="public/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="public/js/jquery-price-slider.js"></script>
    <!-- nivoslider JS
        ============================================ -->
    <script src="public/lib/js/jquery.nivo.slider.js"></script>
    <script src="public/lib/home.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="public/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="public/js/owl.carousel.min.js"></script>
    <!-- elevatezoom JS
        ============================================ -->
    <script src="public/js/jquery.elevatezoom.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="public/js/jquery.scrollUp.min.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="public/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="public/js/main.js"></script>

    <script src="public/js/login.js"></script>
</body>

</html>