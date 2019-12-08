<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['removecart']) && !$_SESSION['customerid']) {
    unset($_SESSION['cart'][$_POST['productid']]);
    echo 'success';
    exit();
}
else if (isset($_POST['removecart']) && $_SESSION['customerid']) {
    $query = "delete from tbl_cart where id = '$_POST[cartid]'";
    $results = mysqli_query($conn, $query);
    if ($results)
        echo "success";
    exit();
}
if (isset($_POST['clearcart'])) {
    unset($_SESSION['cart']);
    echo 'success';
    exit();
}
   
