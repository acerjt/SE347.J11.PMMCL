<?php
session_start();
    //Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['login_check'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_customer WHERE username='$username' and password = '$password'";
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
        $_SESSION['username'] = $username;
        echo "success";
    } else {
        echo 'fail';
    }
	exit();
}

?>