<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['changeproductdetail']) && $_SESSION['username']) {
    $size = $_POST['size'];
    $color = $_POST['color'];
    $productid = $_POST['productid'];
    $query =   "SELECT * FROM tbl_product_detail WHERE size = '$size' and color = '$color' and product_id = '$productid'";
    $run =  mysqli_query($conn, $query);
    $id = mysqli_fetch_array($run);
    $id = $id['id'];
    echo $id;
    exit();
} else if (isset($_POST['changeproductdetail']) && !$_SESSION['username']) {
    $size = $_POST['size'];
    $color = $_POST['color'];
    $productid = $_POST['productid'];
    $query =   "SELECT * FROM tbl_product_detail WHERE size = '$size' and color = '$color' and product_id = '$productid'";
    $run =  mysqli_query($conn, $query);
    $productdetail = mysqli_fetch_array($run);

    $productdetailid = $productdetail['id'];
    $productdetailsize = $productdetail['size'];
    $productdetailcolor = $productdetail['color'];

    $productdetail_arr = array("id" => $productdetailid, "size" => $productdetailsize, "color" => $productdetailcolor);

    // encoding array to json format
    echo json_encode($productdetail_arr);




    
    exit();
}
