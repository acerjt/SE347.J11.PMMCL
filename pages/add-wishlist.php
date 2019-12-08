<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['addwishlist']) && $_SESSION['username']) {
    $productid = $_POST['productid'];

    $customerid = $_SESSION['customerid'];
    $query = "SELECT * FROM tbl_wishlist where customerid = '$customerid' and productid = '$productid'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) {
        echo 'fail';
    } else {
        $query = "INSERT INTO tbl_wishlist (customerid,productid ) 
  	       	VALUES ('$customerid', '$productid')";
        $results = mysqli_query($conn, $query);


        if ($results) {
            echo "success";
        } else {
            echo 'fail';
        }
    }

    exit();
}
else {
    echo "notlogin";
}
