<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['updatecart']) && !$_SESSION['username']) {
    $_SESSION['cart'][$_POST['productid']]['quantity'] = $_POST['quantity'];
    echo 'success';
    exit();
}
else if (isset($_POST['updatecart']) && $_SESSION['username']) {
    $quantity = $_POST['quantity'];
    $cartid = $_POST['cartid'];
    $query =   "UPDATE tbl_cart SET quantity = '$quantity' WHERE id = '$cartid'";
    $run =  mysqli_query($conn,$query);
    exit();
}

   
