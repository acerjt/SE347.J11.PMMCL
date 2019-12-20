<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Cart || James </title>
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
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong> Shopping cart</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-table-process">
                        <table class="table table-hover">

                            <?php
                            $cartprocess = array();
                            if(!($_SESSION['confirmorder']) || ($_POST['cartlist'] && $_SESSION['confirmorder'] != $_POST['cartlist'] ))
                            {
                                $_SESSION['confirmorder'] = $_POST['cartlist'];
                            }
                            foreach ($_SESSION['confirmorder'] as  $cartkey => $cartitem) {
                                $cartelement = json_decode($cartitem, true);
                                $cartprocess[$cartkey] = $cartelement;
                            }

                            $total = 0;
                            if ($cartprocess) {

                                foreach ($cartprocess as $cartkey =>  $cartitem) {
                                    // $price = adddotstring($cartitem['price']);
                                    ?>

                                    <tr class="cart-item-row">
                                        <td class="cart-item-img">
                                            <a href="single-product.html">
                                                <img style="width:100px; height: 100px" src="<?php echo $cartitem['image'] ?>" alt="">

                                            </a>
                                            <div class="cart-product-name-1">
                                                <a href="single-product.html"><?php echo $cartitem['name'] ?></a>

                                            </div>
                                        </td>
                                        <!-- <td class="cart-product-name">
                                            </td> -->


                                        <td class="table-item-price">
                                            <div class="cart-item-align cart-item-price"><?php echo $cartitem['price'] ?> VND</div>
                                            <div class="cart-actions">
                                                <button type="button" class="remove-confirm-item" value="<?php echo $cartkey; ?>" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i> </button>
                                            </div>
                                        </td>
                                        <td class="table-item-quantity quantity-product">
                                            <!-- <input class="cart-item-align cart-item-quantity pquantity" type="number" value="<?php echo $cartitem['quantity'] ?>">
                                            <span></span> -->
                                            <p class="cart-item-align pquantity">Qty: <span class="item-quantity-value"><?php echo $cartitem['quantity'] ?></span> </p>
                                        </td>

                                        <td class="productid" style="display:none;"><?php echo $cartitem['id'] ?></td>

                                        <td class="productdetailid" style="display:none;"><?php echo $cartitem['productdetailid'] ?></td>





                                    </tr>


                            <?php }
                            } ?>
                        </table>

                    </div>
                    <div class="col-sm-4 pull-right">
                        <div class="totals summary-cart customer-infor-container">
                            <!-- <p>subtotal <span>$1,540.00</span> </p> -->
                            <div>
                                <h3>Your Information</h3>
                            </div>
                            <form id="place-order" action="?page=place-order" method="post">
                                <?php
                                if ($_SESSION['username']) {
                                    include('config/dbconfig.php');
                                    $query = "SELECT *  FROM tbl_customer WHERE id = $_SESSION[customerid]";
                                    $run = mysqli_query($conn, $query);
                                    $customer = mysqli_fetch_array($run);

                                    ?>
                                    <div class="firstname-container">
                                        <div class="customer-filed-container">
                                            <input class="firstname" type="text" name="firstname" placeholder="First Name" value="<?php echo $customer['firstname'] ?>" required readonly>
                                            <button type="button" class="cart-edit-btn" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </button>
                                        </div>
                                    </div>
                                    <div class="lastname-container">
                                        <div class="customer-filed-container">
                                            <input class="lastname" type="text" name="lastname" placeholder="Last Name" value="<?php echo $customer['lastname'] ?>" required readonly>
                                            <button type="button" class="cart-edit-btn" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </button>

                                        </div>
                                    </div>
                                    <div class="address-container">
                                        <div class="customer-filed-container">
                                            <input class="address" type="text" name="address" placeholder="Address" value="<?php echo $customer['address'] ?>" required readonly>
                                            <button type="button" class="cart-edit-btn" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </button>

                                        </div>
                                    </div>
                                    <div class="email-container">
                                        <div class="customer-filed-container">
                                            <input class="email" type="email" name="email" placeholder="Email" value="<?php echo $customer['email'] ?>" required readonly>
                                            <button type="button" class="cart-edit-btn" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </button>

                                        </div>
                                    </div>
                                    <div class="phone-number-container">
                                        <div class="customer-filed-container">
                                            <input class="phone-number" type="number" name="phonenumber" placeholder="Phone Number" value="<?php echo $customer['phone_number'] ?>" required readonly>
                                            <button type="button" class="cart-edit-btn" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i> </button>

                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="firstname">
                                        <input type="text" name="firstname" placeholder="First Name" value="" required>
                                    </div>
                                    <div class="lastname">
                                        <input type="text" name="lastname" placeholder="Last Name" value="" required>
                                    </div>
                                    <div class="address">
                                        <input type="text" name="address" placeholder="Address" value="" required>
                                    </div>
                                  
                                    <div class="phone-number">
                                        <input type="number" name="phonenumber" placeholder="Phone Number" value="" required>
                                    </div>
                                <?php } ?>
                            </form>
                            <div>
                                <h3>Order Summary</h3>
                            </div>
                            <div class="checkout-summary-row">
                                <div class="checkout-summary-label">
                                    Subtotal (<span class="total-select-item">0</span> items)
                                </div>
                                <div class="checkout-summary-value cart-total">0 VND</div>
                            </div>
                            <div class="checkout-summary-row">
                                <div class="checkout-summary-label">Shipping Fee</div>
                                <div class="checkout-summary-value cart-shipping-fee">0 VND</div>
                            </div>
                            <div class="checkout-order-total-row">
                                <div class="checkout-order-total-title">Total</div>
                                <div class="checkout-order-total-fee cart-order-total">0 VND</div>
                            </div>
                            <div class="process-order">
                                <button class="place-order-btn" type="submit" form="place-order">proceed to checkout</button>
                            </div>
                            <!-- <a href="#">Checkout with Multiple Addresses</a> -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">

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

    <script src="public/js/process-cart-1.js"></script>
    <script src="public/js/place-order.js"></script>
    <script src="public/js/edit-order-infor.js"></script>
    <script src="public/js/save-order-infor.js"></script>
    <script src="public/js/remove-confirm-item.js"></script>
    <!-- <script>
        if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                      }
    </script> -->
</body>

</html>