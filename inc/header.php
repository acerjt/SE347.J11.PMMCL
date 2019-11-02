<?php
 session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-quiv="x-ua-compatible" content="ie=edge">
    <title>Home 2 || TradeZ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
    <header>

        <!--This is 3 col for currency, language, call support-->
        <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">
            <div class="site-option">
                <ul>
                    <!-- List for change money USD or EUR -->
                    <li  class="currency"><a href="#"> USD <i ></i></a> 
                        <ul class="sub-site-option">
                            <li><a href="#">Eur</a></li>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </li>

                 <!-- List for Language: English or VietNamese-->
                    <li class="language"><a href="#">English<i></i></a>
                        <ul class="lang-site-option">
                            <li><a href="#"> English</a></li>
                            <li><a href="#"> VietNamese </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="call-support">
                <p> Call support free: <span> 0335 157 358 </span></p>
            </div>
        </div>

        <!--This is 3 col for search, fa-fa bar, cart details-->
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
                                        <input type="text"> <button type="submit"> <i class="fa fa-search"></i> </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-bars"></i>
                            </a>
                            <ul>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">My Cart</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Log in</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="cart-menu">
                    <ul>
                        <li><a href="#"> <img src="theme/img/icon-cart.png" alt=""> <span>2</span> </a>
                            <div class="cart-info">
                                <ul>
                                    <li>
                                        <div class="cart-img">
                                            <img src="theme/img/cart/1.png" alt="">
                                        </div>
                                        <div class="cart-details">
                                            <a href="#">Chua co</a>
                                            <p>1 x $22.00</p>
                                        </div>
                                            <div class="btn-edit"></div>
                                            <div class="btn-remove"></div>
                                    </li>
                                    <li>
                                        <div class="cart-img">
                                            <img src="theme/img/cart/2.png" alt="">
                                        </div>
                                        <div class="cart-details">
                                            <a href="#">Chua co</a>
                                            <p>1 x $11.00</p>
                                        </div>
                                        <div class="btn-edit"></div>
                                        <div class="btn-remove"></div>
                                    </li>
                                </ul>
                                    <h3>Subtotal: <span> $10000</span></h3>
                                    <a href="#" class="checkout">checkout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            
    </header>
</body>