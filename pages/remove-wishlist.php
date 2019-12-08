<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['removewishlist']) && $_SESSION['username']) {
    $productid = $_POST['productid'];

    $customerid = $_SESSION['customerid'];
    $query = "SELECT * FROM tbl_wishlist where customerid = '$customerid' and productid = '$productid'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) {
        $query = "delete from tbl_wishlist where customerid = '$customerid' and productid = '$productid'";
        $results = mysqli_query($conn, $query);
        if ($results) {
            echo "success";
        } else {
            echo 'fail';
        }
    } else {
        echo 'fail';
    }

    exit();
}
else {
    echo "notlogin";
}
