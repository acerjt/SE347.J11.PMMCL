<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$path = "./pages/{$page}.php";

if (file_exists($path) && !isset($_SESSION['username'])) {

	if($page == 'my-account' ||
		$page == 'my-wishlist') {
		require './inc/header.php';
		require './inc/headerbanner.php';
		require "./pages/home.php";
		require './inc/footer.php';
	}
	else if ($page == 'home') {
		require './inc/header.php';
		require './inc/headerbanner.php';
		require "{$path}";
		require './inc/footer.php';
	} else {
		require './inc/head.php';
		require "{$path}";
		require './inc/footer.php';
	}
}

else if (file_exists($path)) {
	if ($page == 'home') {
		require './inc/header.php';
		require './inc/headerbanner.php';
		require "{$path}";
		require './inc/footer.php';
	} else {
		require './inc/head.php';
		require "{$path}";
		require './inc/footer.php';
	}
} else {
	require "./pages/404.php";
}
