<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['action']) && $_POST['action'] == "add" && !$_SESSION['username']) {
    if (isset($_POST['productdetailid'])) { 
        $productdetailid = $_POST['productdetailid'];
        // $productid = $_POST['productid'];
        $query = "SELECT * FROM tbl_product_detail WHERE id = '$productdetailid' limit 1";
        $run = mysqli_query($conn, $query);
        $productdetail = mysqli_fetch_array($run);
        if (isset($_SESSION['cart'][$productdetailid])) {
            if (!$_POST['quantity']) {
                $_SESSION['cart'][$productdetailid]['quantity']++;
                echo 'success';
            } else {
                $_SESSION['cart'][$productdetailid]['quantity'] += $_POST['quantity'];
                echo 'success';
            }
        } else {
            $quantity = 1;
            if ($_POST['quantity'])
                $quantity = $_POST['quantity'];
            $sql_s = "SELECT * FROM tbl_product 
                WHERE id ='$productdetail[product_id]'";
            $query_s = mysqli_query($conn, $sql_s);
            if (mysqli_num_rows($query_s) != 0) {
                $row_s = mysqli_fetch_array($query_s);
                $_SESSION['cart'][$productdetailid] = array(
                    "productid" => $productid,
                    "name" => $row_s['name'],
                    "category" => $row_s['category'],
                    "image" => $row_s['image'],
                    "quantity" => $quantity,
                    "price" => $row_s['price'],
                    "sale" => $row_s['sale'],
                    "color" => $productdetail['color'],
                    "size" => $productdetail['size'],
                );
                echo 'success';
            } else {
                echo 'fail';
                $message = "This product id it's invalid!";
            }
        }
    } else if (isset($_POST['productid'])) {
        $id = intval($_POST['productid']);
        $query = "SELECT * FROM tbl_product_detail WHERE product_id = '$id' limit 1";
        $run = mysqli_query($conn, $query);
        $productdetail = mysqli_fetch_array($run);

        if (isset($_SESSION['cart'][$productdetail['id']])) {
            if (!$_POST['quantity']) {
                $_SESSION['cart'][$productdetail['id']]['quantity']++;
                echo 'success';
            } else {
                $_SESSION['cart'][$productdetail['id']]['quantity'] += $_POST['quantity'];
                echo 'success';
            }
        } else {
            $quantity = 1;
            if ($_POST['quantity'])
                $quantity = $_POST['quantity'];
            $sql_s = "SELECT * FROM tbl_product 
                WHERE id ={$productdetail['product_id']}";
            $query_s = mysqli_query($conn, $sql_s);
            if (mysqli_num_rows($query_s) != 0) {
                $row_s = mysqli_fetch_array($query_s);
                $_SESSION['cart'][$productdetail['id']] = array(
                    "productid" => $id,
                    "name" => $row_s['name'],
                    "category" => $row_s['category'],
                    "image" => $row_s['image'],
                    "quantity" => $quantity,
                    "price" => $row_s['price'],
                    "sale" => $row_s['sale'],
                    "color" => $productdetail['color'],
                    "size" => $productdetail['size'],
                );
                echo 'success';
            } else {
                echo 'fail';
                $message = "This product id it's invalid!";
            }
        }
    }
} else if (isset($_POST['action']) && $_POST['action'] == "add" && $_SESSION['username']) {
    if ($_POST['productdetailid']) {
        $query = "SELECT * FROM tbl_cart where customerid = $_SESSION[customerid] and productdetailid = '$_POST[productdetailid]'";
        $run = mysqli_query($conn, $query);
        if (mysqli_num_rows($run) == 0) {
            // $query = "SELECT * FROM tbl_product_detail WHERE product_id = '$id' limit 1";
            // $run = mysqli_query($conn,$query);
            // $productdetail = mysqli_fetch_array($run);
            $query = "INSERT INTO tbl_cart (customerid,productdetailid,quantity) VALUES ('$_SESSION[customerid]','$_POST[productdetailid]','1')";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo 'success';
        } else {
            $cart = mysqli_fetch_array($run);
            if (!$_POST['quantity'])
                $quantity = ++$cart['quantity'];
            else
                $quantity = $_POST['quantity'] + $cart['quantity'];

            $query = "UPDATE tbl_cart SET quantity = '$quantity' where customerid = $_SESSION[customerid] and productdetailid =$_POST[productdetailid]";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo 'success';
        }
    } else if ($_POST['productid']) {
        $id = intval($_POST['productid']);
        $query = "SELECT * FROM tbl_product_detail WHERE product_id = '$id' limit 1";
        $run = mysqli_query($conn, $query);
        $productdetail = mysqli_fetch_array($run);

        $query = "SELECT * FROM tbl_cart where customerid = $_SESSION[customerid] and productdetailid = '$productdetail[id]'";
        $run = mysqli_query($conn, $query);
        if (mysqli_num_rows($run) == 0) {

            $query = "INSERT INTO tbl_cart (customerid,productdetailid,quantity) VALUES ('$_SESSION[customerid]','$productdetail[id]','1')";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo 'success';
        } else {
            $cart = mysqli_fetch_array($run);
            if (!$_POST['quantity'])
                $quantity = ++$cart['quantity'];
            else
                $quantity = $_POST['quantity'] + $cart['quantity'];

            $query = "UPDATE tbl_cart SET quantity = '$quantity' where customerid = $_SESSION[customerid] and productdetailid =$productdetail[id]";
            $run = mysqli_query($conn, $query);
            if ($run)
                echo 'success';
        }
    }
}
