<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My account || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Google Fonts
        ============================================ -->
    <link href='../../../fonts.googleapis.com/cssc9f6.css?family=Norican' rel='stylesheet' type='text/css'>
    <link href='../../../fonts.googleapis.com/csse3e5.css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='../../../fonts.googleapis.com/css4c5c.css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- jquery-ui CSS
        ============================================ -->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- nivoslider CSS
        ============================================ -->
    <link rel="stylesheet" href="lib/css/nivo-slider.css">
    <link rel="stylesheet" href="lib/css/preview.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- magic CSS
        ============================================ -->
    <link rel="stylesheet" href="css/magic.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
        ============================================ -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>







    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>






</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header area start -->

    <!-- header area end -->
    <!-- my account area start -->
    <div class="account-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="?page=home" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong> my account</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-sm-3">
                        <div class="product-sidebar">
                            <div class="sidebar-title">
                                <h2>Shopping Options</h2>
                            </div>
                            <div class="single-sidebar">
                                <div class="single-sidebar-title">
                                    <h3>Category</h3>
                                </div>
                                <div class="single-sidebar-content">
                                    <ul>
                                        <li><a href="#">Dresses (4)</a></li>
                                        <li><a href="#">shoes (6)</a></li>
                                        <li><a href="#">Handbags (1)</a></li>
                                        <li><a href="#">Clothing (3)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <div class="single-sidebar-title">
                                    <h3>Color</h3>
                                </div>
                                <div class="single-sidebar-content">
                                    <ul>
                                        <li><a href="#">Black (2)</a></li>
                                        <li><a href="#">Blue (2)</a></li>
                                        <li><a href="#">Green (4)</a></li>
                                        <li><a href="#">Grey (2)</a></li>
                                        <li><a href="#">Red (2)</a></li>
                                        <li><a href="#">White (2)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <div class="col-sm-9">
                    <div class="my-account-accordion">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                         
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <!-- <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> -->
                                            <i class="fa fa-user"></i>
                                            My personal information
                                        <!-- </a> -->
                                    </h4>
                                </div>
                                <div >
                                    <div id="tabs">
                                        <ul>
                                            <li><a href="#fragment-1"><span>My Profile</span></a></li>
                                            <li><a href="#fragment-2"><span>Change Password</span></a></li>
                                            <!-- <li><a href="#fragment-3"><span>Three</span></a></li> -->
                                        </ul>
                                        <?php
                                        include 'config/dbconfig.php';
                                        $query = "select * from tbl_customer where username =" . "'$_SESSION[username]'";
                                        $run = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($run);
                                        $query = "select * from tbl_customer_address where customerid =" . $row['id'];
                                        $run = mysqli_query($conn, $query);
                                        $row1 = mysqli_fetch_array($run);
                                        ?>
                                        <div id="fragment-1">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="delivery-details">

                                                        <form action="pages/changeprofile.php" method="post">
                                                            <div class="list-style">
                                                                <div class="account-title">
                                                                    <h4>Please be sure to update your personal information if it has changed. </h4>
                                                                </div>
                                                                <div class="form-name">
                                                                    <label>First Name <em>*</em> </label>
                                                                    <input type="text" placeholder="First Name" name="firstname" value="<?php echo $row['firstname'] ?>">
                                                                </div>
                                                                <div class="form-name">
                                                                    <label>Last Name <em>*</em> </label>
                                                                    <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $row['lastname'] ?>">
                                                                </div>
                                                                <div class="form-name">
                                                                    <label> Tỉnh/Thành phố <em>*</em> </label>
                                                                    <select class="province-group" name="province" required>

                                                                        <?php
                                                                        // Fetch Department
                                                                        $query = "SELECT * FROM devvn_tinhthanhpho";
                                                                        $run = mysqli_query($conn, $query);
                                                                        while ($row2 = mysqli_fetch_assoc($run)) {
                                                                            $provinceid = $row2['matp'];
                                                                            $name = $row2['name'];
                                                                            if ($provinceid == $row1['matp']) {
                                                                                echo "<option value='" . $provinceid . "' selected>" . $name . "</option>";
                                                                                continue;
                                                                            }
                                                                            // Option
                                                                            echo "<option value='" . $provinceid . "' >" . $name . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-name">
                                                                    <label> Quận/Huyện<em>*</em> </label>
                                                                    <select class="district-group" name="district" required>

                                                                        <?php
                                                                        // Fetch Department
                                                                        $query = "SELECT * FROM devvn_quanhuyen WHERE matp = '$row1[matp]'";
                                                                        $run = mysqli_query($conn, $query);
                                                                        while ($row2 = mysqli_fetch_assoc($run)) {
                                                                            $districtid = $row2['maqh'];
                                                                            $name = $row2['name'];
                                                                            if ($districtid == $row1['maqh']) {
                                                                                echo "<option value='" . $districtid . "' selected>" . $name . "</option>";
                                                                                continue;
                                                                            }
                                                                            // Option
                                                                            echo "<option value='" . $districtid . "' >" . $name . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-name">
                                                                    <label> Xã/Phường/Thị Trấn<em>*</em> </label>
                                                                    <select class="ward-group" name="ward" required>

                                                                        <?php
                                                                        // Fetch Department
                                                                        $query = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = '$row1[maqh]'";
                                                                        $run = mysqli_query($conn, $query);
                                                                        while ($row2 = mysqli_fetch_assoc($run)) {
                                                                            $wardid = $row2['xaid'];
                                                                            $name = $row2['name'];
                                                                            if ($wardid == $row1['mapx']) {
                                                                                echo "<option  value='" . $wardid . "' selected>" . $name . "</option>";
                                                                                continue;
                                                                            }
                                                                            // Option
                                                                            echo "<option  value='" . $wardid . "' >" . $name . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-name">
                                                                    <label> Email<em>*</em> </label>
                                                                    <input type="email" name="email" placeholder="Email" class="user-email" value="<?php echo $row['email'] ?>" required>
                                                                    <span class="email-message"></span>
                                                                </div>
                                                                <div class="form-name">
                                                                    <label> Số điện thoại<em>*</em> </label>
                                                                    <input class="phonenumber" type="number" name="phonenumber" value="<?php echo $row['phone_number'] ?>" placeholder="Phone Number" style=" -moz-appearance: textfield;" required>
                                                                </div>
                                                                <div class="form-name">
                                                                    <input type="hidden" name="change-profile" value="1">
                                                                </div>
                                                                <div class="save-button">
                                                                    <button>save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="fragment-2">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="delivery-details">
                                                        <form action="pages/changeprofile.php" method="post">
                                                            <div class="list-style">

                                                                <div class="form-name">
                                                                    <label>Current <em>*</em> </label>
                                                                    <input class="current-password" type="password" placeholder="Old Password" name="old-password" required>
                                                                </div>
                                                                <div class="form-name">
                                                                    <label>New <em>*</em> </label>
                                                                    <input class="new-password" type="password" placeholder="New Password" name="new-password" required>
                                                                </div>

                                                                <div class="form-name">
                                                                    <label>Re-type New <em>*</em> </label>
                                                                    <input class="retype-new-password" type="password" placeholder="Confirm Password" name="confirm-password" required>
                                                                    <div class='message'></div>
                                                                </div>

                                                                <div class="form-name">
                                                                    <input type="hidden" name="change-password" value="1">
                                                                </div>
                                                                <div class="save-button change-password-button">
                                                                    <button>save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div id="fragment-3">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                        </div> -->
                                    </div>

                                    <script>
                                        $("#tabs").tabs();
                                    </script>


                                </div>
                            </div>
                          
                        </div>
                        <!-- <div class="account-button">
                            <div class="back-btn"> <a href="#">Back to your Account</a> </div>
                            <div class="home"> <a href="index.html"> home</a> </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>








    </div>

    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.1.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- nivoslider JS
        ============================================ -->
    <script src="lib/js/jquery.nivo.slider.js"></script>
    <script src="lib/home.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- elevatezoom JS
        ============================================ -->
    <script src="js/jquery.elevatezoom.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>


    <script src="public/js/changingaddress.js"></script>
    <script src="public/js/remove-wishlist.js"></script>
    <script>
        $('.new-password, .retype-new-password').on('keyup', function() {
            if ($('.new-password').val() == "" || $('.retype-new-password').val() == "")
                $('.message').html('');
            else if ($('.new-password').val() == $('.retype-new-password').val()) {
                $('.message').html('Matching').css('color', 'green');
            } else
                $('.message').html('Not Matching').css('color', 'red');

        });

        $(function() {
            $(".change-password-button").click(function() {
                var password = $(".new-password").val();
                var confirmPassword = $(".retype-new-password").val();
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>
    



</body>

</html>