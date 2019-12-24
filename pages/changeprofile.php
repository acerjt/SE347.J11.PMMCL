<?php
//Khai báo sử dụng session
    session_start();
//Kết nối tới database
include('../config/dbconfig.php');

if ($_SESSION['username'] && isset($_POST['change-profile'])) {
    $firstname     = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $email     = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $sql = "UPDATE tbl_customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_number = '$phone_number' WHERE username = '$_SESSION[username]'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        $sql = "UPDATE tbl_customer_address SET matp ='$province', maqh ='$district', mapx = '$ward' WHERE customerid = $_SESSION[customerid]";
        $run = mysqli_query($conn, $sql);

        echo "
	<script language='javascript'>
		alert('Cập nhật thành công!');
		window.open('" . $site_url . "?page=my-account','_self', 1);
    </script>";
    }
    else{
        echo "
        <script language='javascript'>
            alert('Cập nhật không thành công!');
            window.open('" . $site_url . "?page=my-account','_self', 1);
        </script>";
    }
    
}

if ($_SESSION['username'] && isset($_POST['change-password'])) {
    $currentpassword     = md5($_POST['old-password']);
    $newpassword     = md5($_POST['new-password']);

    $sql = "SELECT * FROM tbl_customer WHERE username='$_SESSION[username]' and password = '$currentpassword'";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
        $sql = "UPDATE tbl_customer SET password = '$newpassword' WHERE id = $_SESSION[customerid]";
        $run = mysqli_query($conn, $sql);
        echo "
	<script language='javascript'>
		alert('Đổi mật khẩu thành công!');
		window.open('" . $site_url . "?page=logout','_self', 1);
    </script>";
    } else {
        echo "
        <script language='javascript'>
            alert('Đổi mật khẩu thất bại!');
            window.open('" . $site_url . "?page=my-account','_self', 1);
        </script>";
    }
}
if ($_SESSION['username'] && isset($_POST['change-profile-2'])) {
    $firstname     = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $email     = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $address = $_POST['address'];
    $sql = "UPDATE tbl_customer SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone_number = '$phone_number' ,address = '$address' WHERE username = '$_SESSION[username]'";
    $run = mysqli_query($conn, $sql);
}
