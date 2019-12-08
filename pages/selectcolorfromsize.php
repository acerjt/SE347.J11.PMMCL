<?php
include('../config/dbconfig.php');

if (isset($_POST['selectcolor'])) {
    $productid = $_POST['productid'];   // department id

    $sql = "SELECT * FROM tbl_product_detail WHERE product_id= " . $productid ." and size =". $_POST['size'];

    $result = mysqli_query($conn, $sql);

    $color_arr = array();

    while ($row = mysqli_fetch_array($result)) {
        $color = $row['color'];
        $id = $row['id'];
        $color_arr[] = array( "color" => $color, "id" => $id);
    }

    // encoding array to json format
    echo json_encode($color_arr);

    exit();
}

if (isset($_POST['getamount'])) {
    $id = $_POST['id'];   // department id

    $sql = "SELECT * FROM tbl_product_detail WHERE id= " . $id;

    $result = mysqli_query($conn, $sql);



    $row = mysqli_fetch_array($result);


    // encoding array to json format
    echo json_encode($row['amount']);

    exit();
}