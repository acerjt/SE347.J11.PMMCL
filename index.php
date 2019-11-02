<?php
$page = isset($_GET['page']) ? $_GET['page'] :'home';
$path= "./paths/{$page}.php";
if(file_exists($path))
{
    if($page=="login"){
        require "{$path}";
    }
    else {
        require './inc/header.php';
        require "{$path}";
        require './inc/footer.php';
    }
}
else require "./pages/404.php";

?>