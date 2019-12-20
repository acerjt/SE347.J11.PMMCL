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
                    <div class="cart-table">
                        <form id="cart-process-order" action="?page=process-order" method="post">
                            <table class="table table-hover">
                                <?php
                                if ($_SESSION['username']) {
                                    include('config/dbconfig.php');
                                    $query = "SELECT count(productdetailid) as count FROM tbl_cart WHERE customerid = $_SESSION[customerid]";
                                    $run = mysqli_query($conn, $query);
                                    $cartnum = mysqli_fetch_array($run);
                                    $cartnum = $cartnum['count'];
                                    $total = 0;
                                    if ($cartnum) {
                                        echo '<tbody>
                                        <tr>
                                            <td>
                                                <input class="cart-item-check-all" type="checkbox" />
                                            </td>
                                            <td>Select All</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>';
                                        $query = "SELECT * FROM tbl_cart WHERE customerid = $_SESSION[customerid]";
                                        $run = mysqli_query($conn, $query);
                                        $cart = mysqli_fetch_all($run);
                                        for ($i = 0; $i < count($cart); $i++) {
                                            $query = "SELECT * FROM tbl_product,tbl_product_detail WHERE tbl_product_detail.product_id = tbl_product.id and tbl_product_detail.id =" . $cart[$i][2];
                                            $run = mysqli_query($conn, $query);
                                            $product = mysqli_fetch_array($run);
                                            $price = adddotstring($product['sale']);


                                            ?>

                                            <tr>
                                                <td class="cart-check">
                                                    <input class="cart-item-check" type="checkbox" autocomplete="off" />
                                                </td>
                                                <td class="cart-item-img" style="display: flex">
                                                    <a href="?page=product-detail&productid=<?php echo $product['product_id'] ?>">
                                                        <img style="width:100px; height: 100px" src="index.php/../images/product/<?php echo $product['image'] ?>" alt="">
                                                    </a>
                                                    <div style="width: 80%;">
                                                        <div class="cart-name" style="margin-left:12px;margin-bottom:12px;">
                                                            <a href="?page=product-detail&productid=<?php echo $product['product_id'] ?> "><?php echo $product['name'] ?></a>
                                                        </div>
                                                        <div class="detail-product" style="display: flex">
                                                            <?php
                                                                        $query = "SELECT  DISTINCT size FROM tbl_product_detail WHERE product_id = '$product[product_id]'";
                                                                        $run1 = mysqli_query($conn, $query);
                                                                        ?>
                                                            <div class="input-box" style="margin-left:12px ; width:30%">
                                                                <select class="size-box">

                                                                    <?php
                                                                                while ($productsizelist = mysqli_fetch_array($run1)) {
                                                                                    if ($productsizelist['size'] == $product['size'])
                                                                                        continue;
                                                                                    echo  ' <option value="' . $product['product_id'] . '">' . $productsizelist['size'] . '</option>';
                                                                                }
                                                                                ?>
                                                                    <option value="<?php echo $product['product_id'] ?>" selected><?php echo $product['size'] ?></option>

                                                                </select>
                                                            </div>
                                                            <?php
                                                                        $query = "SELECT  color FROM tbl_product_detail WHERE product_id = '$product[product_id]' and size ='$product[size]'";
                                                                        $run1 = mysqli_query($conn, $query);
                                                                        ?>
                                                            <div class="input-box" style="margin-left:12px; width:50%">
                                                                <select class="color-box">
                                                                    <option value="<?php echo $product['product_id'] ?>" selected><?php echo $product['color'] ?></option>
                                                                    <?php
                                                                                while ($productcolorlist = mysqli_fetch_array($run1)) {
                                                                                    if ($productcolorlist['color'] == $product['color'])
                                                                                        continue;
                                                                                    echo  ' <option value="' . $product['product_id'] . '">' . $productcolorlist['color'] . '</option>';
                                                                                }
                                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!-- <td class="cart-product-name">
                                                    </td> -->


                                                <td class="table-item-price">
                                                    <div class=" cart-item-price"><?php echo adddotstring($product['sale']) ?> VND</div>
                                                    <div class="cart-actions">
                                                        <button type="button" class="add-wishlist" value="<?php echo $product['product_id'] ?>" data-toggle="tooltip" title="Add to wishlist"> <i class="fa fa-heart fa-1x"></i> </button>
                                                        <button type="button" class="remove-cart-my-cart" value="<?php echo $cart[$i][0] ?>" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i> </button>
                                                    </div>
                                                </td>
                                                <td class="table-item-quantity quantity-product">
                                                    <input class=" cart-item-quantity pquantity" type="number" value="<?php echo $cart[$i][3] ?>">
                                                    <span></span>
                                                </td>
                                                <td>
                                                    <div class=" cart-item-subtotal"><?php echo adddotstring($product['sale'] * $cart[$i][3]) . " VND";
                                                                                                    // $total += $cartvalue['sale'] * $cartvalue['quantity']; 
                                                                                                    ?>
                                                    </div>
                                                </td>

                                                <td class="productid" style="display:none;"><?php echo $product['product_id'] ?></td>
                                                <td class="cartid" style="display:none;"><?php echo $cart[$i][0] ?></td>
                                                <td class="productdetailid" style="display:none;"><?php echo $product['id'] ?></td>



                                            </tr>

                                            </tbody>
                                    <?php }
                                        }
                                    } else {

                                        ?>
                                    <?php $cartnum = count($_SESSION['cart']);
                                        $total = 0;
                                        if ($cartnum) {
                                            echo '<tbody>
                                <tr>
                                    <td>
                                        <input class="cart-item-check-all" type="checkbox" />
                                    </td>
                                    <td>Select All</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>';
                                            foreach ($_SESSION['cart'] as $cartkey => $cartvalue) {
                                                $price = adddotstring($cartvalue['sale']);
                                                ?>

                                            <tr>
                                                <td class="cart-check">
                                                    <input class="cart-item-check" type="checkbox" autocomplete="off" />
                                                </td>
                                                <td class="cart-item-img" style="display: flex">
                                                    <a href="single-product.html">
                                                        <img style="width:100px; height: 100px" src="index.php/../images/product/<?php echo $cartvalue['image'] ?>" alt="">
                                                    </a>


                                                    <div style="width: 80%;">
                                                        <div class="cart-name" style="margin-left:12px;margin-bottom:12px;">
                                                            <a href="?page=product-detail&productid=<?php echo $cartkey ?> "><?php echo $cartvalue['name'] ?></a>
                                                        </div>
                                                        <div class="detail-product" style="display: flex">
                                                            <?php
                                                                        $query = "SELECT  DISTINCT size FROM tbl_product_detail WHERE product_id = '$cartvalue[productid]'";
                                                                        $run1 = mysqli_query($conn, $query);
                                                                        ?>
                                                            <div class="input-box" style="margin-left:12px ; width:30%">
                                                                <select class="size-box">

                                                                    <?php
                                                                                while ($productsizelist = mysqli_fetch_array($run1)) {
                                                                                    if ($productsizelist['size'] == $cartvalue['size'])
                                                                                        continue;
                                                                                    echo  ' <option value="' . $cartvalue['productid'] . '">' . $productsizelist['size'] . '</option>';
                                                                                }
                                                                                ?>
                                                                    <option value="<?php echo $cartvalue['productid'] ?>" selected><?php echo $cartvalue['size'] ?></option>

                                                                </select>
                                                            </div>
                                                            <?php
                                                                        $query = "SELECT  color FROM tbl_product_detail WHERE product_id = '$cartvalue[productid]' and size ='$cartvalue[size]'";
                                                                        $run1 = mysqli_query($conn, $query);
                                                                        ?>
                                                            <div class="input-box" style="margin-left:12px; width:50%">
                                                                <select class="color-box">
                                                                    <option value="<?php echo $cartvalue['productid'] ?>" selected><?php echo $cartvalue['color'] ?></option>
                                                                    <?php
                                                                                while ($productcolorlist = mysqli_fetch_array($run1)) {
                                                                                    if ($productcolorlist['color'] == $cartvalue['color'])
                                                                                        continue;
                                                                                    echo  ' <option value="' . $cartvalue['productid'] . '">' . $productcolorlist['color'] . '</option>';
                                                                                }
                                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <!-- <div class="cart-product-name-1">
                                                        <a class="cart-product-name-2" href="single-product.html"><?php echo $cartvalue['name'] ?></a>
                                                    </div> -->
                                                </td>
                                                <!-- <td class="cart-product-name">
                                            </td> -->


                                                <td class="table-item-price">
                                                    <div class="cart-item-align cart-item-price"><?php echo adddotstring($cartvalue['sale']) ?> VND</div>
                                                    <div class="cart-actions">
                                                        <button type="button" class="remove-cart-my-cart" value="<?php echo $cartvalue['id']; ?>" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i> </button>
                                                    </div>
                                                </td>
                                                <td class="table-item-quantity quantity-product">
                                                    <input class="cart-item-align cart-item-quantity pquantity" type="number" value="<?php echo $cartvalue['quantity'] ?>">
                                                    <span></span>
                                                </td>
                                                <td>
                                                    <div class="cart-item-align cart-item-subtotal"><?php echo adddotstring($cartvalue['sale'] * $cartvalue['quantity']) . " VND";
                                                                                                                // $total += $cartvalue['sale'] * $cartvalue['quantity']; 
                                                                                                                ?>
                                                    </div>
                                                </td>

                                                <td class="productid" style="display:none;"><?php echo $cartvalue['productid'] ?></td>
                                                <td class="productdetailid" style="display:none;"><?php echo $cartkey ?></td>




                                            </tr>

                                            </tbody>
                                <?php }
                                    }
                                } ?>
                            </table>
                        </form>
                        <div class="shopping-button">
                            <div class="continue-shopping">
                                <button type="submit">continue shopping</button>
                            </div>
                            <div class="shopping-cart-left">
                                <button class="clear-cart">Clear Shopping Cart</button>
                                <?php
                                if (!$_SESSION['customerid']) {
                                    ?>
                                    <button class="update-cart1">Update Shopping Cart</button>
                                <?php } else if ($_SESSION['customerid']) {
                                    ?>
                                    <button class="update-cart">Update Shopping Cart</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pull-right">
                        <div class="totals summary-cart">
                            <!-- <p>subtotal <span>$1,540.00</span> </p> -->
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
                                <button class="process-btn" type="submit" form="cart-process-order" value="Submit">proceed to checkout</button>
                            </div>
                            <!-- <a href="#">Checkout with Multiple Addresses</a> -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <!-- <div class="col-sm-4">
                    <div class="discount-code">
                        <h3>Discount Codes</h3>
                        <p>Enter your coupon code if you have one.</p>
                        <input type="text">
                        <div class="shopping-button">
                            <button type="submit">apply coupon</button>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-sm-4">
                    <div class="estimate-shipping">
                        <h3>Estimate Shipping and Tax</h3>
                        <p>Enter your destination to get a shipping estimate.</p>
                        <form action="#">
                            <div class="form-box">
                                <div class="form-name">
                                    <label> country <em>*</em> </label>
                                    <select>
                                        <option value="1">Afghanistan</option>
                                        <option value="1">Algeria</option>
                                        <option value="1">American Samoa</option>
                                        <option value="1">Australia</option>
                                        <option value="1">Bangladesh</option>
                                        <option value="1">Belgium</option>
                                        <option value="1">Bosnia and Herzegovina</option>
                                        <option value="1">Chile</option>
                                        <option value="1">China</option>
                                        <option value="1">Egypt</option>
                                        <option value="1">Finland</option>
                                        <option value="1">France</option>
                                        <option value="1">United State</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="form-name">
                                    <label> State/Province </label>
                                    <select>
                                        <option value="1">Please select region, state or province</option>
                                        <option value="1">Arizona</option>
                                        <option value="1">Armed Forces Africa</option>
                                        <option value="1">California</option>
                                        <option value="1">Florida</option>
                                        <option value="1">Indiana</option>
                                        <option value="1">Marshall Islands</option>
                                        <option value="1">Minnesota</option>
                                        <option value="1">New Mexico</option>
                                        <option value="1">Utah</option>
                                        <option value="1">Virgin Islands</option>
                                        <option value="1">West Virginia</option>
                                        <option value="1">Wyoming</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-box">
                                <div class="form-name">
                                    <label> Zip/Postal Code </label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="shopping-button">
                                <button type="submit">get a quote</button>
                            </div>
                        </form>
                    </div>
                </div> -->

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
    <script src="public/js/add-wishlist.js"></script>
    <script src="public/js/remove-cart.js"></script>
    <script src="public/js/update-cart.js"></script>
    <script src="public/js/cart-item-check.js"></script>
    <script src="public/js/update-quantity-onchange.js"></script>
    <script src="public/js/process-cart.js"></script>
    <script src="public/js/onchangesizecart.js"></script>
</body>

</html>