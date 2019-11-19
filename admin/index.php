<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$path = "./pages/{$page}.php";
if (file_exists($path)) {
	if($page == 'login') {
		if (!isset($_SESSION['username'])) {
			require "{$path}";
		}
		else {
			require './inc/header.php';
			require "./pages/list_product.php";
			require './inc/footer.php';
		}
	}else {
		if (isset($_SESSION['username'])) {
			require './inc/header.php';
			require "{$path}";
			require './inc/footer.php';
		}else{
			echo '<script type="text/javascript">
		    alert("Vui lòng đăng nhập để sử dụng");
		    window.location.href="'.$site_url.'?page=login";
		    </script>';
		}
	}
} else {
    require "./pages/404.php";
}
?>