<?php include('register_perform.php'); ?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Register || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.ico">

    <!-- Google Fonts
        ============================================ -->
    <link href='../../../fonts.googleapis.com/cssc9f6.css?family=Norican' rel='stylesheet' type='text/css'>
    <link href='../../../fonts.googleapis.com/csse3e5.css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='../../../fonts.googleapis.com/css4c5c.css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/css/owl.public.css">
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
    <link rel="stylesheet" href="public/style.css">
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

    <!-- cart item area start -->
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong>Register page</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>Register</h2>
                                <span>Please Register using account detail bellow.</span>
                            </div>
                            <div class="login-form">
                                <form class="form">
                                    <div id="error_msg"></div>
                                    <div>
                                        <input type="text" name="username" placeholder="Username" class="user-name" required>
                                        <div class="username-message"></div>
                                    </div>

                                    <div>
                                        <input type="password" name="password" placeholder="Password" class="user-password" required>
                                    </div>
                                    <input class="user-confirmpassword" type="password" name="user-confirmpassword" placeholder="Confirm Password" required>
                                    <span class='message'></span>
                                    <div>
                                        <input class="firstname" type="text" name="firstname" placeholder="First Name" required>
                                    </div>
                                    <div>
                                        <input class="lastname" type="text" name="lastname" placeholder="Last Name" required>
                                    </div>
                                    <table>
                                        <tr>
                                            <th>Tỉnh thành </th>
                                            <th>Quận Huyện </th>
                                            <th>Xã Phường </th>

                                        </tr>
                                        <tr>
                                            <td>

                                                <select class="province-group" name="province" required>
                                                    <option value="">- Select -</option>
                                                    <?php
                                                    // Fetch Department
                                                    $sql_department = "SELECT * FROM devvn_tinhthanhpho";
                                                    $department_data = mysqli_query($conn, $sql_department);
                                                    while ($row = mysqli_fetch_assoc($department_data)) {
                                                        $departid = $row['matp'];
                                                        $depart_name = $row['name'];

                                                        // Option
                                                        echo "<option value='" . $departid . "' >" . $depart_name . "</option>";
                                                    }
                                                    ?>
                                                </select>

                                            </td>
                                            <td>
                                                <div class="clear"></div>


                                                <select class="district-group" name="district" required>
                                                    <option value="">- Select -</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="clear"></div>
                                                <select class="ward-group" name="ward" required>
                                                    <option value="">- Select -</option>
                                                </select>

                                            </td>
                                        </tr>







                                        <div>
                                    </table>

                                    <div>

                                        <input type="email" name="email" placeholder="Email" class="user-email" required>
                                        <span class="email-message"></span>
                                    </div>
                                    <div>

                                        <input class="phonenumber" type="number" name="phonenumber" placeholder="Phone Number" style=" -moz-appearance: textfield;" required>
                                    </div>

                            </div>
                            <div class="button-box">
                                <div>
                                    <button type="button" name="register" class="default-btn reg-btn">Register</button>
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
    <script>
        $('.user-password, .user-confirmpassword').on('keyup', function() {
            if ($('.user-password').val() == "" || $('.user-confirmpassword').val() == "")
                $('.message').html('');
            else if ($('.user-password').val() == $('.user-confirmpassword').val()) {
                $('.message').html('Matching').css('color', 'green');
            } else
                $('.message').html('Not Matching').css('color', 'red');

        });

        $(function() {
            $(".reg-btn").click(function() {
                var password = $(".user-password").val();
                var confirmPassword = $(".user-confirmpassword").val();
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/script.js"></script>
</body>

</html>