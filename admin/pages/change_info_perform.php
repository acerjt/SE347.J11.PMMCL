<?php
//Khai báo sử dụng session
session_start();
//Kết nối tới database
include('../../config/dbconfig.php');

$username        = $_POST['username'];
$name     = $_POST['display-name'];
$email     = $_POST['email'];
$phone_number = $_POST['tel'];
$address = $_POST['address'];
$sql = "UPDATE tbl_user SET name = '$name', email = '$email', phone = '$phone_number', address = '$address' WHERE username = '$username'";
                $run = mysqli_query($conn, $sql);
                echo "
					<script language='javascript'>
						alert('Cập nhật thành công!');
						window.open('" . $site_admin . "?page=info_account','_self', 1);
					</script>";
?>