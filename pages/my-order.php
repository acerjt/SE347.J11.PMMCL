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
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        .cancel-btn {
            background-color:
                #f35e62;
            border: 1px solid #f2f2f2;
            color:
                #fff;
            height: 35px;
            width: 40px;
        }
    </style>
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
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><strong> My order </strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">


                    <div class="wishlist-content">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Orderid</th>
                                        <th>Order Date</th>
                                        <th>Amount</th>
                                        <th>Total</th>
                                        <th>Shipping Fee</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = "SELECT *FROM tbl_order where customerid = '$_SESSION[customerid]'";
                                        $results = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_array($results)) {
                                            // $query = "SELECT *FROM tbl_product where id = '$row[productid]'";
                                            // $run = mysqli_query($conn,$query);
                                            // $product = mysqli_fetch_array($run);
                                        ?>

                                            <td><?php echo $row['id']; ?></td>
                                            <td>
                                                <?php echo $row['date']; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $maOder = $row['id'];
                                                $sql2 = "select * from tbl_order_detail where orderid = " . $maOder;;
                                                //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                                                $run2 = mysqli_query($conn, $sql2);
                                                $j = 0;
                                                $tongsl = 0;
                                                while ($row2 = mysqli_fetch_array($run2)) {
                                                    $j++;
                                                    $tongsl += $row2['quantity'];
                                                }
                                                echo $tongsl;
                                                ?>
                                            </td>
                                            <td>


                                                <?php echo number_format($row['amount']); ?>

                                            </td>
                                            <td>


                                                <?php echo number_format($row['shipping_fee']); ?>

                                            </td>
                                            <td>
                                                <?php
                                                echo $row['status'];
                                                if ($row['status'] == 'Chờ duyệt') {
                                                ?>
                                                    <button style="margin-left: 16px" type="button" class="cancel-btn" value="<?php echo $row['id']; ?>" data-toggle="tooltip" title="" data-original-title="Cancel"> <i class="fa fa-times"></i> </button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="?page=detail_order&id=<?php echo $row['id']; ?>" title="" class="tbody-text">Chi tiết</a>
                                            </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <button type="submit" value="Continue" class="check-button">Continue</button> -->
                    </div>
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

    <script src="public/js/cancel-order.js"></script>


</body>

</html>