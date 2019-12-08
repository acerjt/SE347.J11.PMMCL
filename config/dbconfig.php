<?php
	$tenmaychu="localhost";
	$tentaikhoan="root";
	$pass="DungNgoc@261297";
	$csdl="firstdb";
	$site_url = 'http://localhost:80/webproject';
	$site_admin = 'http://localhost:80/webproject/admin/';
	$conn=mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl) or die("Không kết nối được");
	mysqli_set_charset($conn,"utf8mb4");
?>
