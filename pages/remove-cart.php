<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['removecart']) && !$_SESSION['customerid']) {
    unset($_SESSION['cart'][$_POST['productdetailid']]);
    echo 'success';
    exit();
} else if (isset($_POST['removecart']) && $_SESSION['customerid']) {
    $query = "delete from tbl_cart where id = '$_POST[cartid]'";
    $results = mysqli_query($conn, $query);
    if ($results)
        echo "success";
    exit();
}
if (isset($_POST['clearcart'])) {
    if (!$_SESSION['customerid']) {
        unset($_SESSION['cart']);
        echo 'success';
    } else {
        $query = "delete from tbl_cart where customerid='$_SESSION[customerid]'";
        $run = mysqli_query($conn, $query);
        echo 'success';
    }

    exit();
}
