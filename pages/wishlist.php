<!doctype html>
<html class="no-js" lang="">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Wishlist || James </title>
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header area start -->
       
        <div class="wishlist-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.html" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> wishlist </strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      
                 <?php 
                  $query = "SELECT *FROM tbl_wishlist where customerid = '$_SESSION[customerid]'";
                  $results = mysqli_query($conn, $query);
                    if(mysqli_num_rows($results) == 0){
                        echo '<div style="height: 500px"><h3 style="text-align:center">Wishlist is empty</h3></div>';
                    }
                    else{
                 ?>
                 
                        <div class="wishlist-content">
                                        <div class="table-responsive">

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Model</th>
                                                        <th>Stock</th>
                                                        <th>Unit Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                       
                                                        while ($row = mysqli_fetch_array($results)) {
                                                            $query = "SELECT *FROM tbl_product where id = '$row[productid]'";
                                                            $run = mysqli_query($conn,$query);
                                                            $product = mysqli_fetch_array($run);
                                                            ?>

                                                            <td><a href="#" class="text-center"><img style="width: 100px; height: 100px;" src="index.php/../images/product/<?php echo $product['image']?>" alt=""> </a></td>
                                                            <td>
                                                                <a href="single-product.html"><?php echo $product['name'];?></a>
                                                            </td>
                                                            <td><?php 
                                                              $query = "SELECT *FROM tbl_category where id = '$product[category]'";
                                                              $run1 = mysqli_query($conn,$query);
                                                              $category = mysqli_fetch_array($run1);
                                                            echo $category['title'];
                                                            ?></td>
                                                            <td>
                                                            <?php
                                                            $run2 = mysqli_query($conn, "select sum(amount) as sum from tbl_product_detail where product_id = $row[productid];");
                                                            $amount = mysqli_fetch_array($run2);
                                                            echo $amount['sum'];
                                                            ?>
                                                            </td> 
                                                            <td class="unit-price"><?php echo $product['price'];?></td>
                                                            <td>
                                                                <div class="wishlist-actions">
                                                                    <button class="add-cart" value="<?php echo $product['id']; ?>" type="button" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button type="button" class="remove-wishlist" value="<?php echo $product['id'];?>" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i> </button>
                                                                </div>
                                                            </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                            <!-- <button type="submit" value="Continue" class="check-button">Continue</button> -->
                        </div>
                                                        <?php }?>
                    </div>
                </div>
            </div>
        </div>


        <!-- wishlist area end -->
        <!-- footer top area start -->
        

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



        <script src="public/js/remove-wishlist.js"></script>
        <script src="public/js/add-cart.js"></script>
    </body>

</html>
