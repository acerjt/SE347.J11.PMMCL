<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['updatecart']) && !$_SESSION['username']) {




    $oldproductdetailid = $_POST['oldproductdetailid'];
    $productdetailid = $_POST['productdetailid'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$productdetailid] = $_SESSION['cart'][$oldproductdetailid];
    $_SESSION['cart'][$productdetailid]['size'] = $size;
    $_SESSION['cart'][$productdetailid]['color'] = $color;
    $_SESSION['cart'][$productdetailid]['quantity'] = $quantity;
    if ($productdetailid != $oldproductdetailid )
        unset($_SESSION['cart'][$oldproductdetailid]);


    echo 'success';
    exit();
} else if (isset($_POST['updatecart']) && $_SESSION['username']) {
    $cartid = $_POST['cartid'];
    $productdetailid = $_POST['productdetailid'];
    $quantity = $_POST['quantity'];
    $query = "SELECT * FROM tbl_cart where customerid = $_SESSION[customerid] and productdetailid = '$productdetailid' and id <> '$cartid'";
    $run = mysqli_query($conn, $query);
    $cart = mysqli_fetch_array($run);
    if (mysqli_num_rows($run) == 0) {
        $query = "SELECT * FROM tbl_cart where id = '$cartid'";
        $run = mysqli_query($conn, $query);
        if (mysqli_num_rows($run) == 0) {
            $query = "INSERT INTO  tbl_cart (id,customerid,productdetailid,quantity)
            VALUES( '$cartid','$_SESSION[customerid]','$productdetailid','$quantity')";
            $run = mysqli_query($conn, $query);
        } else {
            $query = "UPDATE  tbl_cart SET productdetailid = '$productdetailid' WHERE id = '$cartid'";
            $run = mysqli_query($conn, $query);
        }
        if ($run)
            echo 'success';
        else
            echo 'fail';
        exit();
    } else {
        $query = "SELECT * FROM tbl_cart where id = '$cartid'";
        $run = mysqli_query($conn, $query);
        if (mysqli_num_rows($run) == 0) {
            $query = "INSERT INTO  tbl_cart (id,customerid,productdetailid,quantity)
            VALUES( '$cartid','$_SESSION[customerid]','$productdetailid','$quantity')";
            $run = mysqli_query($conn, $query);
        } else {
            $query = "UPDATE  tbl_cart SET productdetailid = '$productdetailid' WHERE id = '$cartid'";
            $run = mysqli_query($conn, $query);
        }
        if ($run) {
            $query = "delete from tbl_cart where id = '$cart[id]'";
            $run = mysqli_query($conn, $query);
            echo 'success';
        } else
            echo 'fail';
        exit();
    }
}


if (isset($_POST['changequantity']) && !$_SESSION['username']) {
    $_SESSION['cart'][$_POST['productdetailid']]['quantity'] = $_POST['quantity'];
    echo 'success';
    exit();
} else if (isset($_POST['changequantity']) && $_SESSION['username']) {
    $quantity = $_POST['quantity'];
    $cartid = $_POST['cartid'];
    $query =   "UPDATE tbl_cart SET quantity = '$quantity' WHERE id = '$cartid'";
    $run =  mysqli_query($conn, $query);
    exit();
}
