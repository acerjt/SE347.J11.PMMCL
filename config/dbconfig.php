﻿<?php
	$tenmaychu="localhost";
	$tentaikhoan="root";
	$pass="";
	$csdl="mydatabase";
	$site_url = 'http://localhost:80/SE347.J11.PMMCL/';
	$site_admin = 'http://localhost:80/SE347.J11.PMMCL/admin/';
	$conn=mysqli_connect($tenmaychu, $tentaikhoan, $pass, $csdl) or die("Không kết nối được");
	mysqli_set_charset($conn,"utf8");
?>
