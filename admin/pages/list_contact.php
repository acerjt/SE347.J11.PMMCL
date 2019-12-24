<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <!-- <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a> -->
            <h3 id="index" class="fl-left" style="margin-left: 30px">Danh sách liên hệ</h3>
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
                                    <!-- <td><span class="thead-text">ID</span></td> -->
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Chủ đề</span></td>
                                    <td><span class="thead-text">Nội dung</span></td>
                                    <td><span class="thead-text">Ngày gửi</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Bước 1: Kết nối đến CSDL
                                include("../config/dbconfig.php");
                                if (isset($_POST['s'])) {
                                    if ($_POST['s'] != '') {
                                        $s = $_POST['s'];
                                        $sql = "SELECT * from tbl_contact where name LIKE '%$s%' or content LIKE '%$s%' LIMIT $trang,8";
                                    } 
                                   
                                    else {
                                        $sql = "SELECT * from tbl_contact where name LIKE '%$s%' or content LIKE '%$s%' LIMIT $trang,8";
                                    }
                                } 
                                else {
                                    $sql = "SELECT * from tbl_contact LIMIT $trang,8";
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
                                        <td><span class="tbody-text"><?php echo $row["name"]; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $row["email"] ; ?></span></td>
                                        <td>
                                            <!-- <div class="tb-title fl-left">
                                                <a href="?page=detail_order&id=<?php echo $row["phone_number"]; ?>" title=""><?php echo $customer['firstname'] ." ". $customer['lastname']; ?></a>
                                            </div> -->
                                            <span class="tbody-text"><?php echo $row["subject"]; ?></span>
                                        </td>
                                        <td><span class="tbody-text"><?php echo $row["content"]; ?></span></td>

                                        <td><span class="tbody-text"><?php echo $row["date"]; ?></span></td>
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
                            <a href="?page=list_customer&trang=<?php
                                                            if ($stt > 1)
                                                                echo ($stt - 1);
                                                            else
                                                                echo ($stt);
                                                            ?>" title="">
                                <</a> </li> <?php
                                            $sql_trang = "select * from tbl_contact";
                                            $run_trang = mysqli_query($conn, $sql_trang);
                                            $sosanpham = mysqli_num_rows($run_trang);
                                            $sotrang = ceil($sosanpham / 8);
                                            if ($sotrang == 0) {
                                                echo ' Không có sản phẩm nào!';
                                            } else {
                                                echo ' ';
                                            }
                                            for ($b = 1; $b <= $sotrang; $b++) {
                                                echo '<li><a href="?page=list_contact&trang=' . $b . '" style="text-decoration:none">' . ' ' . $b . ' ' . '</a></li>';
                                            }
                                            ?> <li>
                                    <a href="?page=list_contact&trang=<?php
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