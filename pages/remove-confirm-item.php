<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['removeconfirmitem'])) {
    unset($_SESSION['confirmorder'][$_POST['cartitemconfirm']]);
    exit();
}

   
