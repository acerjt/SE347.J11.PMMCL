<!doctype html>
<html class="no-js" lang="">

<head>
    <style>
        /*DETAIL ORDER*/

        .detail-exhibition .section {
            margin-bottom: 20px;
            font-size: 15px;
        }

        .detail-exhibition .section:last-child {
            padding: 0;
            margin-bottom: 0;
        }

        .detail-exhibition .section .list-item .title,
        .detail-exhibition .section .section-title {
            position: relative;
            padding-left: 30px;
            color: #272727;
            font-family: 'Roboto Medium';
        }

        .detail-exhibition .section .list-item .detail {
            color: #444;
            font-size: 14px;
        }

        .detail-exhibition .section .list-item .detail select {
            width: 180px;
        }

        .detail-exhibition .section .list-item li .title:before {
            position: absolute;
            font-family: 'Fontawesome';
            top: 0;
            left: 0;
            color: #07adc6;
            font-size: 17px;
        }

        .detail-exhibition .section .list-item li:nth-child(1) .title:before {
            content: '\f02a';
        }

        .detail-exhibition .section .list-item li:nth-child(2) .title:before {
            content: '\f041';
        }

        .detail-exhibition .section .list-item li:nth-child(3) .title:before {
            content: '\f23d';
        }

        .detail-exhibition .section .list-item li:nth-child(4) .title:before {
            content: '\f1fe';
        }

        .detail-exhibition .section .list-item li:nth-child(5) .title:before {
            content: '\f14b';
        }

        .detail-exhibition .section .section-title {
            padding: 0;
            line-height: inherit;
            border-bottom: none;
        }

        .detail-exhibition .section .section-detail {
            padding: 0;
        }

        .detail-exhibition .section .section-detail .list-item {
            border-top: 1px solid #f5f5f5;
            border-bottom: 1px solid #f5f5f5;
        }

        .detail-exhibition .section .section-detail .list-item li {
            float: left;
            padding: 12px 24px;
            border-left: 1px solid #f5f5f5;
        }

        .detail-exhibition .section .section-detail .list-item li:nth-child(1) {
            width: 20%;
            text-align: right;
            border-left: none;
        }

        .detail-exhibition .section .section-detail .list-item li:nth-child(2) {
            width: 80%;
            text-align: left;
        }

        .detail-exhibition .section .section-detail .list-item li span {
            display: block;
            padding-bottom: 5px;
            color: #333;
            font-size: 14px;
        }

        .detail-exhibition .section .section-detail .list-item li .total {
            font-size: 16px;
            color: #e60000;
            padding-bottom: 0;
            font-family: 'Roboto Medium';
            font-weight: normal;
        }

        .detail-exhibition .info-exhibition thead tr td {
            color: #272727;
            font-family: 'Roboto Medium';
            font-weight: normal;
            text-transform: uppercase;
        }

        .detail-exhibition .info-exhibition thead tr td:nth-child(1) {
            width: 5%;
        }

        .detail-exhibition .info-exhibition thead tr td:nth-child(n+4) {
            width: 12%;
        }

        .detail-exhibition .info-exhibition tbody tr td {
            color: #333;
            font-size: 14px;
            vertical-align: middle;
        }

        .detail-exhibition .info-exhibition tbody tr td:nth-child(2) .thumb {
            display: inline-block;
        }

        .detail-exhibition .info-exhibition tr td:nth-child(2) {
            width: 15%;
            text-align: center;
        }

        .detail-exhibition .info-exhibition tr td:nth-child(5) {
            text-align: center;
        }

        .table {
            margin-bottom: 0 !important;
        }

        .detail-exhibition .thumb {
            margin-top: 0 !important;
        }

        .detail-exhibition .section#info .list-item li {
            margin-bottom: 10px;
        }

        .detail-exhibition .section#info .list-item li:last-child {
            margin-bottom: 0 !important;
        }

        .info-exhibition .thumb img {
            width: 80px;
            height: 80px;
            border: 1px solid #ccc;
        }

        #info select {
            border: 1px solid #ccc;
            padding: 5px 20px;
            font-size: 13px;
            color: #666;
            border-radius: 3px;
        }

        #info input[type="submit"] {
            font-size: 13px;
            padding: 3px 10px;
            border: none;
            background: #0183f3;
            color: #fff;
            font-family: 'Roboto Medium';
            font-weight: normal;
            line-height: 23px;
            border-radius: 3px;
        }

        .detail-exhibition .section .section-title {
            font-weight: normal;
            text-transform: uppercase;
            font-size: 18px;
            margin-bottom: 20px;
        }

        #wrapper {
            width: 179px;
            height: 87px;
            position: relative;
        }

        #im {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("theme/img/logo.png");
            background-repeat: no-repeat;
            background-size: contain;
        }

        .print-btn:hover {
            background-color: #bf394e;
            color: #fff;
        }

        .print-btn {
            background-color: transparent;
            border: 1px solid #ccc;
            color: #888;
            display: inline-block;
            margin-left: 30px;
            padding: 6px 20px;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button;
            cursor: pointer;
        }
    </style>
</head>

<body>

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


                    <div class="wrap clearfix">
                       
                            <div class="section" id="info" style="width: 974px; margin: auto; margin-bottom: 30px; ">
                               
                                <?php
                                // Bước 1: Kết nối đến CSDL
                                include("config/dbconfig.php");
                                $id = $_GET["id"];
                                //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                                $sql = "select * from tbl_order where id = " . $id;
                                $run = mysqli_query($conn, $sql);
                                $i = 0;
                                $row = mysqli_fetch_array($run);
                                $sql = "select * from tbl_customer where id = " . $row['customerid'];
                                $run1 = mysqli_query($conn, $sql);
                                $customer = mysqli_fetch_array($run1);
                                ?>

                            </div>
                            <div id="printablediv" style="margin: 0 auto;text-align: center">
                                <div class="section" style="width: 974px;text-align: center; margin: 0 auto; ">
                                    <!-- <div class="section-head">
                            <h3 class="section-title">Sản phẩm đơn hàng</h3>
                        </div> -->
                                    <div class="table-responsive">
                                        <div style="display: flex">
                                            <div id="wrapper">
                                                <div id="im"></div>

                                            </div>
                                            <div style="text-align: left;">
                                                <div>

                                                    Địa chỉ: Khu phố 6, Phường Linh Trung, Quận Thủ Đức
                                                </div>
                                                <div>
                                                    Điện thoại: 0355.157.358 - 0332.795.582
                                                </div>
                                                <div>
                                                    Website: www.tradezshop.com
                                                </div>
                                            </div>
                                            <div style="text-align: left; margin-left:auto">
                                                <div>
                                                    Mã đơn hàng: <?php echo $id ?>
                                                </div>
                                                <div>
                                                    Ngày đặt hàng: <?php echo $row["date"]; ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div style="text-align:center;margin-top:40px;margin-bottom:40px">
                                            <label style="font-size:25px;  ">Hóa đơn bán hàng</label>
                                        </div>
                                        <div>
                                            <div style="display:flex">
                                                <div style="margin-right: 30px">
                                                    Tên khách hàng: <?php echo $customer['firstname'] . " " . $customer['lastname']; ?>
                                                </div>
                                                <div>
                                                    Số điện thoại: <?php echo $customer['phone_number'] ?>
                                                </div>
                                                <div style="margin-left: 30px">
                                                    Địa chỉ: <?php echo $customer['address'] ?>
                                                </div>
                                            </div>

                                        </div>
                                        <table class="table info-exhibition">
                                            <thead>
                                                <tr style="font-weight: bold">
                                                    <td class="thead-text">STT</td>
                                                    <td class="thead-text product-img">Ảnh sản phẩm</td>
                                                    <td class="thead-text">Tên sản phẩm</td>
                                                    <td class="thead-text" style="width:60px">Size</td>
                                                    <td class="thead-text">Màu</td>
                                                    <td class="thead-text">Đơn giá</td>
                                                    <td class="thead-text" style="text-align: center">Số lượng</td>
                                                    <td class="thead-text">Thành tiền</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql1 = "select * from tbl_order_detail where orderid = " . $row['id'];
                                                $run1 = mysqli_query($conn, $sql1);
                                                $j = 0;
                                                while ($row1 = mysqli_fetch_array($run1)) {
                                                    $j++;

                                                    $sql2 = "select * from tbl_product,tbl_product_detail where tbl_product_detail.id = " . $row1['productdetailid'] . " and tbl_product.id= tbl_product_detail.product_id ";
                                                    $run2 = mysqli_query($conn, $sql2);
                                                    $k = 0;
                                                    while ($row2 = mysqli_fetch_array($run2)) {
                                                        $k++;
                                                        ?>
                                                        <tr>
                                                            <td class="thead-text"><?php echo $j; ?></td>
                                                            <td class="thead-text product-img">
                                                                <div class="thumb">
                                                                    <img src="images/product/<?php echo $row2["image"]; ?>" alt="">
                                                                </div>
                                                            </td>
                                                            <td class="thead-text"><?php echo $row2["name"]; ?></td>
                                                            <td class="thead-text"><?php echo $row2["size"] ?></td>
                                                            <td class="thead-text"><?php echo $row2["color"] ?></td>
                                                            <td class="thead-text"><?php echo number_format($row1["price"]); ?> VNĐ</td>
                                                            <td class="thead-text" style="text-align: center"><?php $tongsoluong += $row1["quantity"];
                                                                                                                        echo $row1["quantity"]; ?></td>
                                                            <td class="thead-text" style="text-align: right"><?php echo (number_format($row1["price"] * $row1["quantity"])) ?> VNĐ</td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                            <tbody>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align: left">Phí ship</td>
                                                <td style="text-align: right"><?php echo number_format($row['shippingfee']); ?> VNĐ</td>
                                            </tbody>
                                            <tbody>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align: left;color: #F25862">Tổng đơn hàng</td>
                                                <td style="text-align: right;color: #F25862"><?php echo number_format($row['amount']); ?> VNĐ</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                           
                       
                    </div>

                </div>
            </div>
        </div>
    </div>




</body>

</html>