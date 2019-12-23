<?php
include('pages/function.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-quiv="x-ua-compatible" content="ie=edge">
    <title>Home 2 || TradeZ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <base href="http://localhost/webproject/"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet"> -->
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.ico">
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
    <link rel="stylesheet" href="theme/lib/css/nivo-slider.css">
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
    <script src="theme/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="public/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script> -->

</head>

<body>
    <header>
        <!--header area-->
        <div class="header-group">
            <div class="top-link">
                <div class="container">
                    <div class="row">
                        <!--This is 3 col for currency, language, call support-->
                        <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">
                            <div class="site-option">
                                <ul>
                                    <li class="currency"><a href="#">USD <i class="fa fa-angle-down"></i> </a>
                                        <ul class="sub-site-option">
                                            <li><a href="#">VND</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </li>
                                    <li class="language"><a href="#">English <i class="fa fa-angle-down"></i> </a>
                                        <ul class="sub-site-option">
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">VietNamese</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="call-support">
                                <p>Call support free: <span> 0335 157 358</span></p>
                            </div>
                        </div>
                        <!--This is 3 col for search, menu-account, cart details -->
                        <div class="col-md-2 col-sm-3">
                            <div class="dashboard">
                                <div class="account-menu">
                                    <ul>
                                        <li class="search">
                                            <a href="#">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <ul class="search">
                                                <li>
                                                    <form action="#">
                                                        <input type="text">
                                                        <button type="submit"> <i class="fa fa-search"></i> </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <?php
                                            if (!$_SESSION['username']) {
                                                echo '<ul>
                                                <li><a href="?page=my-cart">My cart</a></li>
                                                <li><a href="#">Checkout</a></li>
                                                <li><a href="?page=register">Register</a></li>
                                                <li><a href="?page=login">Login</a></li>
                                            </ul>';
                                            } else
                                                echo '<ul>
                                                <li><a href="?page=my-account">My account</a></li>
                                                <li><a href="?page=wishlist">My wishlist</a></li>
                                                <li><a href="?page=my-cart">My cart</a></li>
                                                <li><a href="#">Checkout</a></li>
                                                <li><a href="?page=my-order">My Order</a></li>
                                                <li><a href="?page=logout">Logout</a></li>
                                            </ul>';
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-menu">
                                    <ul>
                                        <?php
                                        if(isset($_SESSION['cart']))
                                        $cartnum = count($_SESSION['cart']);
                                        include('config/dbconfig.php');
                                        $query = "SELECT count(productdetailid) as count FROM tbl_cart WHERE customerid = $_SESSION[customerid]";
                                        $run = mysqli_query($conn, $query);
                                        $ucartnum = mysqli_fetch_array($run);
                                        $ucartnum = $ucartnum['count'];
                                        ?>
                                        <li><a href="?page=my-cart"> <img src="theme/img/icon-cart.png" alt=""> <span>
                                                    <?php if ($ucartnum)
                                                        echo $ucartnum;
                                                    else if ($cartnum && !$_SESSION['customerid'])
                                                        echo $cartnum;
                                                    else
                                                        echo 0;
                                                    ?>
                                                </span> </a>
                                            <?php if (!$_SESSION['username']) { ?>
                                                <div class="cart-info">
                                                    <ul class="list-cart">

                                                        <?php
                                                            $total = 0;
                                                            foreach ($_SESSION['cart'] as $cartkey => $cartvalue) {
                                                                $price = adddotstring($cartvalue['sale']);
                                                                ?>
                                                            <li class="cart-product-id" value="<?php echo $cartkey ?>">
                                                                <div class="cart-img">
                                                                    <a href="?page=product-detail&productid=<?php echo $cartvalue['productid'] ?>">
                                                                    <img style="width:100px; height: 100px" src="index.php/../images/product/<?php echo $cartvalue['image'] ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <a class="cart-product-name" href="?page=product-detail&productid=<?php echo $cartvalue['productid'] ?>"><?php echo $cartvalue['name'] ?></a>
                                                                <p style="text-align: right; font-size:14px;margin-top: 20px;"><?php echo $cartvalue['quantity'] ?> x <?php echo adddotstring($cartvalue['sale']) ?>

                                                                    <?php $total += $cartvalue['sale'] * $cartvalue['quantity'] ?>
                                                                </p>
                                                                <div class="cart-details">

                                                                </div>
                                                                <div class="btn-edit"></div>
                                                                <div class="btn-remove remove-cart"></div>
                                                            </li>


                                                        <?php }

                                                            ?>

                                                    </ul>
                                                    <h3>Subtotal: <span> <?php echo adddotstring($total) ?></span></h3>
                                                    <a href="#" class="checkout">checkout</a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="cart-info">
                                                    <ul class="list-cart">

                                                        <?php
                                                            $query = "SELECT * FROM tbl_cart WHERE customerid = $_SESSION[customerid]";
                                                            $run = mysqli_query($conn, $query);
                                                            $cart = mysqli_fetch_all($run);
                                                            $total = 0;
                                                            for ($i = 0; $i < count($cart); $i++) {
                                                                $query = "SELECT * FROM tbl_product,tbl_product_detail WHERE tbl_product_detail.product_id = tbl_product.id and tbl_product_detail.id =" . $cart[$i][2];
                                                                $run = mysqli_query($conn, $query);
                                                                $product = mysqli_fetch_array($run);
                                                                $price = adddotstring($product['sale']);
                                                                ?>
                                                            <li class="cart-product-id" value="<?php echo $product['product_id'] ?>">
                                                                <div class="cart-img">
                                                                    <a href="?page=product-detail&productid=<?php echo $product['product_id']?>">
                                                                    <img style="width:100px; height: 100px" src="index.php/../images/product/<?php echo $product['image'] ?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <a class="cart-product-name" href="?page=product-detail&productid=<?php echo $product['product_id']?>"><?php echo $product['name'] ?></a>
                                                                <p style="text-align: right; font-size:14px;margin-top: 20px;"><?php echo $cart[$i][3] ?> x <?php echo adddotstring($product['sale']) ?>

                                                                    <?php $total += $product['sale'] * $cart[$i][3] ?>
                                                                </p>
                                                                <div class="cart-details">
                                                                <input class="cart-id" type="hidden" value="<?php echo $cart[$i][0] ?>">
                                                                </div>
                                                                <div class="btn-edit"></div>
                                                                <div class="btn-remove remove-cart"></div>
                                                            </li>


                                                        <?php }

                                                            ?>

                                                    </ul>
                                                    <h3>Subtotal: <span> <?php echo adddotstring($total) ?></span></h3>
                                                    <a href="#" class="checkout">checkout</a>
                                                </div>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main menu area-->
            <div class="mainmenu-area home1 product-items">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="?page=home">
                                    <img src="theme/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li><a href="?page=home">Home</a>
                                        </li>
                                        <li class="mega-women"><a href="#">Women</a>
                                            <div class="mega-menu women">
                                                <div class="part-1">
                                                    <?php
                                                    include("config/dbconfig.php");
                                                    $sql = "SELECT * from tbl_category";
                                                    $run = mysqli_query($conn, $sql);
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($run)) {
                                                        $i++;; ?>
                                                        <span>
                                                            <a href="?page=category_product&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                                <div class="part-2">
                                                    <a href="#">
                                                        <img src="theme/img/banner/menu-banner.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mega-men"><a href="#">Men</a>
                                            <div class="mega-menu women">
                                                <div class="part-1">
                                                    <?php
                                                    include("config/dbconfig.php");
                                                    $sql = "SELECT * from tbl_category";
                                                    $run = mysqli_query($conn, $sql);
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($run)) {
                                                        $i++;; ?>
                                                        <span>
                                                            <a href="?page=category_product&id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                                <div class="part-2">
                                                    <a href="#">
                                                        <img src="theme/img/banner/menu-banner.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mega-footwear"><a href="#">Footwear</a>
                                            <div class="mega-menu footwear">
                                                <span>
                                                    <a href="#">Footwear Man</a>
                                                    <a href="#">gifts</a>
                                                </span>
                                                <span>
                                                    <a href="#">Footwear Womens</a>
                                                    <a href="#">boots</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="mega-jewellery"><a href="#">Jewellery</a>
                                            <div class="mega-menu jewellery">
                                                <span>
                                                    <a href="#">Rings</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li><a href="#">accessories</a></li>
                                        <li><a href="#">Pages</a>
                                            <div class="sub-menu pages">
                                                <span>
                                                    <a href="#">About us</a>
                                                </span>
                                                <span>
                                                    <a href="#">Blog</a>
                                                </span>
                                                <span>
                                                    <a href="#">Blog Details</a>
                                                </span>
                                                <span>
                                                    <a href="#">Cart</a>
                                                </span>
                                                <span>
                                                    <a href="#">Checkout</a>
                                                </span>
                                                <span>
                                                    <a href="#">Contact</a>
                                                </span>
                                                <span>
                                                    <a href="#">My account</a>
                                                </span>
                                                <span>
                                                    <a href="#">Shop</a>
                                                </span>
                                                <span>
                                                    <a href="#">Shop list</a>
                                                </span>
                                                <span>
                                                    <a href="#">Single Shop</a>
                                                </span>
                                                <span>
                                                    <a href="?page=login">Login page</a>
                                                </span>
                                                <span>
                                                    <a href="?page=register">Register page</a>
                                                </span>
                                                <span>
                                                    <a href="#">Wishlist</a>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mobile-menu">
                                <nav>
                                    <ul>
                                        <li><a href="?page=home">Home</a>
                                        </li>
                                        <li><a href="#">Women</a>
                                            <ul>
                                                <li><a href="#">Dresses</a>
                                                    <ul>
                                                        <li><a href="#">Coctail</a></li>
                                                        <li><a href="#">day</a></li>
                                                        <li><a href="#">evening</a></li>
                                                        <li><a href="#">sports</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">shoes</a>
                                                    <ul>
                                                        <li><a href="#">Sports</a></li>
                                                        <li><a href="#">run</a></li>
                                                        <li><a href="#">sandals</a></li>
                                                        <li><a href="#">boots</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">handbags</a>
                                                    <ul>
                                                        <li><a href="#">Blazers</a></li>
                                                        <li><a href="#">table</a></li>
                                                        <li><a href="#">coats</a></li>
                                                        <li><a href="#">kids</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">clothing</a>
                                                    <ul>
                                                        <li><a href="#">T-shirts</a></li>
                                                        <li><a href="#">coats</a></li>
                                                        <li><a href="#">Jackets</a></li>
                                                        <li><a href="#">jeans</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Men</a>
                                            <ul>
                                                <li><a href="#">Bags</a>
                                                    <ul>
                                                        <li><a href="#">Bootees bag</a></li>
                                                        <li><a href="#">Blazers</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">clothing</a>
                                                    <ul>
                                                        <li><a href="#">coats</a></li>
                                                        <li><a href="#">T-shirts</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Lingerie</a>
                                                    <ul>
                                                        <li><a href="#">Bands</a></li>
                                                        <li><a href="#">Furniture</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Foorwear</a>
                                            <ul>
                                                <li><a href="#">footwear men</a>
                                                    <ul>
                                                        <li><a href="#">gifts</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">footwear women</a>
                                                    <ul>
                                                        <li><a href="#">boots</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Jewellery</a>
                                            <ul>
                                                <li><a href="#">Rings</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="#">About us</a></li>
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="#">Blog Details</a></li>
                                                <li><a href="#">Cart</a></li>
                                                <li><a href="#">Checkout</a></li>
                                                <li><a href="#">Contact</a></li>
                                                <li><a href="#">My account</a></li>
                                                <li><a href="#">Shop</a></li>
                                                <li><a href="#">Shop list</a></li>
                                                <li><a href="#">Single Shop</a></li>
                                                <li><a href="#">Wishlist</a></li>
                                                <li><a href="?page=login">login page</a></li>
                                                <li><a href="?page=register">register page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="transparent-header"></div>
    </header>
    <!-- header area end -->
    <!-- slider area start -->


    </header>
</body>

<script src="public/js/remove-cart.js"></script>
<script src="theme/lib/js/jquery.nivo.slider.js"></script>  