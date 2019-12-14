<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['action']) && $_POST['action'] == "add" && !$_SESSION['username']) {

    $id = intval($_POST['productid']);

    if (isset($_SESSION['cart'][$id])) {
        if (!$_POST['quantity']) {
            $_SESSION['cart'][$id]['quantity']++;
            echo 'success';
        } else {
            $_SESSION['cart'][$id]['quantity'] += $_POST['quantity'];
            echo 'success';
        }
    } else {
        $quantity = 1;
        if ($_POST['quantity'])
            $quantity = $_POST['quantity'];
        $sql_s = "SELECT * FROM tbl_product 
                WHERE id ={$id}";
        $query_s = mysqli_query($conn, $sql_s);
        if (mysqli_num_rows($query_s) != 0) {
            $row_s = mysqli_fetch_array($query_s);
            $_SESSION['cart'][$row_s['id']] = array(
                "name" => $row_s['name'],
                "category" => $row_s['category'],
                "image" => $row_s['image'],
                "quantity" => $quantity,
                "price" => $row_s['price'],
                "sale" => $row_s['sale']
            );
            echo 'success';
        } else {
            echo 'fail';
            $message = "This product id it's invalid!";
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == "add" && $_SESSION['username']) {
    // if($_POST['productdetailid']){
    //     $query = "SELECT * FROM tbl_cart where customerid = $_SESSION[customerid] and productid = '$id'";
    // $run = mysqli_query($conn, $query);
    // }
    
    $id = intval($_POST['productid']);
    $query = "SELECT * FROM tbl_cart where customerid = $_SESSION[customerid] and productid = '$id'";
    $run = mysqli_query($conn, $query);
    if (mysqli_num_rows($run) == 0) {
         // $query = "SELECT * FROM tbl_product_detail WHERE product_id = '$id' limit 1";
        // $run = mysqli_query($conn,$query);
        // $productdetail = mysqli_fetch_array($run);
        $query = "INSERT INTO tbl_cart (customerid,productid,quantity) VALUES ('$_SESSION[customerid]','$id','1')";
        $run = mysqli_query($conn, $query);
        if ($run)
            echo 'success';
    } else {
        $cart = mysqli_fetch_array($run);
        if (!$_POST['quantity']) 
            $quantity = ++$cart['quantity'];
        else
        $quantity = $_POST['quantity']+$cart['quantity'];

        $query = "UPDATE tbl_cart SET quantity = '$quantity' where customerid = $_SESSION[customerid] and productid =$_POST[productid]";
        $run = mysqli_query($conn, $query);
        if ($run)
            echo 'success';
    }
}
