<?php

//Kết nối tới database
include('config/dbconfig.php');
if (isset($_POST['placeorder']) && !$_SESSION['username']) {
    $firtName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $amount = $_POST['amount'];

    $cartprocess = array();
    foreach ($_POST['orderlist'] as  $cartkey => $cartitem) {
        $cartelement = json_decode($cartitem, true);
        array_push($cartprocess, $cartelement);
    }

    $query = "SELECT `AUTO_INCREMENT`
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = '$csdl'
    AND   TABLE_NAME   = 'tbl_customer';";
    $getcustomerid = mysqli_query($conn, $query);
    $customerid = mysqli_fetch_array($getcustomerid);
    $customerid = $customerid['AUTO_INCREMENT'];


    $query = "SELECT `AUTO_INCREMENT`
            FROM  INFORMATION_SCHEMA.TABLES
            WHERE TABLE_SCHEMA = '$csdl'
            AND   TABLE_NAME   = 'tbl_order';";
    $getorderid = mysqli_query($conn, $query);
    $orderid = mysqli_fetch_array($getorderid);
    $orderid = $orderid['AUTO_INCREMENT'];

    $query = "INSERT INTO `tbl_customer` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone_number`, `address`) VALUES
                (NULL,'','','$firtName', '$lastName','$email','$phonenumber','$address')";
    $results = mysqli_query($conn, $query);

    if (!$results) {
        echo "
	<script language='javascript'>
		alert('Đặt hàng không thành công');
		window.open('" . $site_url . "?page=my-cart','_self', 1);
	</script>
	";
        exit();
    } else {
        $query = "INSERT INTO `tbl_order` (`customerid`, `amount`, `status`) VALUES
        ('$customerid', '$amount','Chờ duyệt')";
        $results = mysqli_query($conn, $query);
        if (!$results) {
            $query = "delete from tbl_customer where id = '$customerid'";
            $results = mysqli_query($conn, $query);
            echo "
            <script language='javascript'>
                alert('Đặt hàng không thành công');
                window.open('" . $site_url . "?page=my-cart','_self', 1);
            </script>
            ";
            exit();
        } else {
            foreach ($cartprocess as  $cartkey => $cartitem) {
                $query = "INSERT INTO tbl_order_detail (productid, quantity, price,orderid) VALUES
                ('$cartitem[id]','$cartitem[quantity]','$cartitem[price]','$orderid')";
                $results = mysqli_query($conn, $query);
                if (!$results) {
                    $query = "delete from tbl_customer where id = '$customerid'";
                    $results = mysqli_query($conn, $query);
                    $query = "delete from tbl_order where id = '$orderid'";
                    $results = mysqli_query($conn, $query);
                    $query = "delete from tbl_order_detail where id = '$orderid'";
                    $results = mysqli_query($conn, $query);
                    echo "
            <script language='javascript'>
                alert('Đặt hàng không thành công');
                window.open('" . $site_url . "?page=my-cart','_self', 1);
            </script>
            ";
                    exit();
                }
                echo "
            <script language='javascript'>
                alert('Đặt hàng thành công');
                window.open('" . $site_url . "?page=home','_self', 1);
            </script>
            ";
            }
        }
    }
}
else if (isset($_POST['placeorder']) && $_SESSION['username']) {
   
    $amount = $_POST['amount'];

    $cartprocess = array();
    foreach ($_POST['orderlist'] as  $cartkey => $cartitem) {
        $cartelement = json_decode($cartitem, true);
        array_push($cartprocess, $cartelement);
    }



    $query = "SELECT `AUTO_INCREMENT`
            FROM  INFORMATION_SCHEMA.TABLES
            WHERE TABLE_SCHEMA = '$csdl'
            AND   TABLE_NAME   = 'tbl_order';";
    $getorderid = mysqli_query($conn, $query);
    $orderid = mysqli_fetch_array($getorderid);
    $orderid = $orderid['AUTO_INCREMENT'];

   
        $query = "INSERT INTO `tbl_order` (`customerid`, `amount`, `status`) VALUES
        ('$_SESSION[customerid]', '$amount','Chờ duyệt')";
        $results = mysqli_query($conn, $query);
        if (!$results) {
            $query = "delete from tbl_customer where id = '$_SESSION[customerid]'";
            $results = mysqli_query($conn, $query);
            echo "
            <script language='javascript'>
                alert('Đặt hàng không thành công');
                window.open('" . $site_url . "?page=my-cart','_self', 1);
            </script>
            ";
            exit();
        } else {
            foreach ($cartprocess as  $cartkey => $cartitem) {
                $query = "INSERT INTO tbl_order_detail (productid, quantity, price,orderid) VALUES
                ('$cartitem[id]','$cartitem[quantity]','$cartitem[price]','$orderid')";
                $results = mysqli_query($conn, $query);
                if (!$results) {
                    $query = "delete from tbl_customer where id = '$_SESSION[customerid]'";
                    $results = mysqli_query($conn, $query);
                    $query = "delete from tbl_order where id = '$orderid'";
                    $results = mysqli_query($conn, $query);
                    $query = "delete from tbl_order_detail where id = '$orderid'";
                    $results = mysqli_query($conn, $query);
                    echo "
            <script language='javascript'>
                alert('Đặt hàng không thành công');
                window.open('" . $site_url . "?page=my-cart','_self', 1);
            </script>
            ";
                    exit();
                }
                echo "
            <script language='javascript'>
                alert('Đặt hàng thành công');
                window.location.replace('" . $site_url . "?page=my-cart');
               
                
            </script>
            ";
            }
        }

}
else {
    echo "
    <script language='javascript'>
        window.location.replace('" . $site_url . "?page=my-cart');
       
        
    </script>
    ";
}
