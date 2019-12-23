<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <!-- <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a> -->
            <h3 id="index" class="fl-left" style="margin-left: 30px">Danh sách khách hàng</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
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
                                    <td><span class="thead-text">ID</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Doanh số</span></td>
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
                                        $sql = "SELECT *,(select COALESCE(sum(amount),0)FROM tbl_order WHERE tbl_customer.id = tbl_order.customerid AND tbl_order.status = 'Đã giao') totalamount FROM `tbl_customer` where id LIKE '%$s%' or CONCAT(`firstname`, ' ', `lastname`) LIKE '%$s%'  order by totalamount desc limit $trang,8";
                                    } else {
                                        $sql = "select * from tbl_order order by id desc limit $trang,8";
                                    }
                                } else {
                                    $sql = "SELECT *,(select COALESCE(sum(amount),0) FROM tbl_order WHERE tbl_customer.id = tbl_order.customerid AND tbl_order.status = 'Đã giao') totalamount FROM `tbl_customer`  order by totalamount desc limit $trang,8";
                                }
                                $run = mysqli_query($conn, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($run)) {
                                     $i++;
                                    // $query = "SELECT * FROM tbl_customer WHERE id = '$row[customerid]'";
                                    // $run1 = mysqli_query($conn, $query);
                                    // $customer = mysqli_fetch_array($run1);
                                    ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $i +(8* ($stt-1)); ?></span></td>
                                        <td><span class="tbody-text"><?php echo $row["id"]; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $row["firstname"] ." " . $row['lastname']; ?></span></td>
                                        <td>
                                            <!-- <div class="tb-title fl-left">
                                                <a href="?page=detail_order&id=<?php echo $row["id"]; ?>" title=""><?php echo $customer['firstname'] ." ". $customer['lastname']; ?></a>
                                            </div> -->
                                            <span class="tbody-text"><?php echo $row["email"]; ?></span>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $row["phone_number"]; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $row["address"]; ?></span></td>
                                        <td><span class="tbody-text"><?php echo number_format( $row['totalamount']); ?></span></td>
                                        <td><a href="?page=list_order&customerid=<?php echo $row['id']; ?>" title="" class="tbody-text">Chi tiết</a></td>
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
                            <a href="" title="">
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
                                                echo '<li><a href="?page=list_customer&trang=' . $b . '" style="text-decoration:none">' . ' ' . $b . ' ' . '</a></li>';
                                            }
                                            ?> <li>
                                    <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>