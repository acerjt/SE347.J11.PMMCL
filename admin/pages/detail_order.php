<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        // oldPage.removeClass("product-img");

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>

<body>
    <?php
    include("../config/dbconfig.php");
    $tongsoluong = 0;
    // if (isset($_POST['sm_status'])) {
    //     $tinhtrang = $_POST['status'];
    //     $id = $_GET['id'];
    //     $sql = "UPDATE tbl_oder SET tinhtrang = '$tinhtrang' WHERE id = '$id'";
    //     $run = mysqli_query($conn, $sql);
    // }
    ?>
    <div id="main-content-wp" class="list-product-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <!-- <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a> -->
                <h3 id="index" class="fl-left" style="margin-left: 30px">Đơn hàng</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            <?php require 'inc/sidebar.php'; ?>
            <div id="content" class="detail-exhibition fl-right">
                <div class="section" id="info" style="width: 974px; margin: auto; margin-bottom: 30px; ">
                    <div class="section-head">
                        <h3 class="section-title">Thông tin đơn hàng</h3>
                    </div>
                    <?php
                    // Bước 1: Kết nối đến CSDL
                    include("../config/dbconfig.php");
                    $id = $_GET["id"];
                    //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                    $sql = "select * from tbl_order where id = " . $id;
                    $run = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_array($run)) {
                        $i++;
                        ?>
                        <ul class="list-item">
                            <li>
                                <?php
                                    $sql = "select * from tbl_customer where id = " . $row['customerid'];
                                    $run1 = mysqli_query($conn, $sql);
                                    $customer = mysqli_fetch_array($run1);
                                    ?>
                                <h3 class="title">Tên khách hàng</h3>
                                <span class="detail"><?php echo $customer['firstname'] . " " . $customer['lastname']; ?></span>
                            </li>
                            <li>
                                <h3 class="title">Mã đơn hàng</h3>
                                <span class="detail"><?php echo $row["id"]; ?></span>
                            </li>
                            <li>
                                <h3 class="title">Địa chỉ nhận hàng</h3>
                                <span class="detail"><?php echo $customer["address"]; ?></span>
                            </li>

                            <form method="POST" action="pages/update_order_status.php">
                                <li>
                                    <h3 class="title">Tình trạng đơn hàng</h3>
                                    <select name="status">
                                        <?php
                                            $lst = array(
                                                "Chờ duyệt",
                                                "Đang vận chuyển",
                                                "Đã giao",
                                                "Hủy đơn"
                                            );

                                            for ($i = 0; $i < count($lst); $i++) {
                                                if ($lst[$i] == $row['status']) {
                                                    echo "<option value='$row[status]' selected='selected'>$row[status]</option>";

                                                    continue;
                                                }
                                                echo "<option value='$lst[$i]'>$lst[$i]</option>";
                                            }

                                            ?> </select>
                                    <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                                    <input type="hidden" name="updateorder" value="1">
                                    <input type="hidden" name="orderid" value="<?php echo $id ?>">
                                    <input type="hidden" name="oldstatus" value="<?php echo $row['status'] ?>">
                                </li>
                            </form>
                        </ul>
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
                                    <tr>
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
                                                        <img src="index.php/../../images/product/<?php echo $row2["image"]; ?>" alt="">
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
                                    <td style="text-align: left">Tổng đơn hàng</td>
                                    <td style="text-align: right"><?php echo number_format($row['amount']); ?> VNĐ</td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php } ?>

                </div>
                <div style="position: relative; height:38px;width: 974px; margin:auto;margin-top:30px">
                    <div style=" position: absolute;right: 0;bottom: 0;">

                        <button class="print-btn" type="submit" onclick="javascript:printDiv('printablediv')" name="print">Print</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

</body>