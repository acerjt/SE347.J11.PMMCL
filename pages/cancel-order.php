<?php
//Khai báo sử dụng session
session_start();
//Kết nối tới database
include('../config/dbconfig.php');

if (isset($_POST['cancel'])) {
    $orderid = $_POST['orderid'];
    $query = "UPDATE tbl_order SET status ='Hủy đơn' WHERE id =  '$orderid'";
    $run = mysqli_query($conn, $query);
    if ($run) {
        $query = "SELECT * FROM tbl_order_detail WHERE orderid =  '$orderid'";
        $run = mysqli_query($conn, $query);
        while ($orderdetail = mysqli_fetch_array($run)) {
            // $query = "SELECT * FROM tbl_product_detail WHERE id = '$orderdetail[productdetailid]'";
            $query = "SELECT amount FROM tbl_product_detail WHERE id = '$orderdetail[productdetailid]'";
            $run1 = mysqli_query($conn, $query);
            $amount = mysqli_fetch_array($run1);
            $amount = $amount['amount'];
            $query = "UPDATE tbl_product_detail SET amount = $amount + $orderdetail[quantity] WHERE id = '$orderdetail[productdetailid]';";
            $run1 = mysqli_query($conn, $query);
        }
        echo "
            success;
            ";
    } else {
        echo "
            fail;
            ";
    }
}
