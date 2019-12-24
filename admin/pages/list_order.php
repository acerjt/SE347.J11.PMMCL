<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <!-- <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a> -->
            <h3 id="index" class="fl-left" style="margin-left: 30px">Đơn hàng</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all">Tất cả <span class="count">(
                                    <?php
                                    $result = mysqli_query($conn, "select * from tbl_order");
                                    echo mysqli_num_rows($result);
                                    ?>
                                    )</span> đơn hàng
                        </ul>
                        <form method="POST" action="" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <?php
                    if (isset($_GET['trang'])) {
                        $get_trang = $_GET['trang'];
                    } else {
                        $get_trang = '';
                    }
                    if ($get_trang == '' || $get_trang == 1) {
                        $trang = 0;
                        $stt = 1;
                    } else {
                        $trang = ($get_trang * 8) - 8;
                        $stt = $get_trang;
                    }


                    ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Ngày đặt</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số sản phẩm</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Phí vận chuyển</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Bước 1: Kết nối đến CSDL
                                include("../config/dbconfig.php");
                                if (isset($_POST['s'])) {
                                    if ($_POST['s'] != '') {
                                        $s = $_POST['s'];
                                        $sql = "select tbl_order.id, tbl_order.customerid,tbl_order.amount,tbl_order.status,tbl_order.date,tbl_customer.id AS cusid, tbl_customer.firstname, tbl_customer.lastname from tbl_order, tbl_customer where tbl_order.customerid = tbl_customer.id and (tbl_order.id LIKE '%$s%' or CONCAT(`firstname`, ' ', `lastname`) LIKE '%$s%') ORDER BY `tbl_customer`.`id` ASC limit $trang,8 ";
                                    } else {
                                        $sql = "select * from tbl_order order by id desc limit $trang,8";
                                    }
                                } else if (isset($_GET['customerid'])) {
                                    $sql = "select * from tbl_order where customerid = $_GET[customerid] order by id desc limit $trang,8";
                                } else {
                                    $sql = "select * from tbl_order order by id desc limit $trang,8";
                                }
                                $run = mysqli_query($conn, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($run)) {
                                    $i++;
                                    $query = "SELECT * FROM tbl_customer WHERE id = '$row[customerid]'";
                                    $run1 = mysqli_query($conn, $query);
                                    $customer = mysqli_fetch_array($run1);
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $i + (8 * ($stt - 1)); ?></span>
                                        <td><span class="tbody-text"><?php echo $row["id"]; ?></span>
                                        <td><span class="tbody-text"><?php echo $row["date"]; ?></span>
                                        <td>
                                            <div class="tb-title fl-left">
                                                <a href="?page=list_customer&id=<?php echo $row["customerid"]; ?>" title=""><?php echo $customer['firstname'] . " " . $customer['lastname']; ?></a>
                                            </div>

                                        </td>
                                        <td><span class="tbody-text"><?php
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
                                                                        ?></span></td>
                                        <td><span class="tbody-text"><?php echo number_format($row["amount"]); ?></span></td>
                                        <td><span class="tbody-text"><?php echo number_format($row["shipping_fee"]); ?></span></td>
                                        <td><span class="tbody-text"><?php echo $row['status']; ?></span></td>
                                        <td><a href="?page=detail_order&id=<?php echo $row['id']; ?>" title="" class="tbody-text">Chi tiết</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="?page=list_order&trang=<?php
                                                            if ($stt > 1)
                                                                echo ($stt - 1);
                                                            else
                                                                echo ($stt);
                                                            ?>" title="">
                                <</a> </li> <?php
                                            $sql_trang = "select * from tbl_order";
                                            $run_trang = mysqli_query($conn, $sql_trang);
                                            $sosanpham = mysqli_num_rows($run_trang);
                                            $sotrang = ceil($sosanpham / 8);
                                            if ($sotrang == 0) {
                                                echo ' Không có sản phẩm nào!';
                                            } else {
                                                echo ' ';
                                            }
                                            for ($b = 1; $b <= $sotrang; $b++) {
                                                echo '<li><a href="?page=list_order&trang=' . $b . '" style="text-decoration:none">' . ' ' . $b . ' ' . '</a></li>';
                                            }
                                            ?> <li>
                                    <a href="?page=list_order&trang=<?php
                                                                    if ($stt > 0 && $_GET['trang'] < $sotrang)
                                                                        echo ($stt + 1);
                                                                    else
                                                                        echo ($stt['trang']);
                                                                    ?>" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>