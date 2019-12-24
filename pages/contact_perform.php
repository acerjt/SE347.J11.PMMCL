<?php
session_start();
//Kết nối tới database
include('../config/dbconfig.php');
if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $sql = "INSERT INTO tbl_contact (name,email,phone_number,subject,content) VALUES ('$name','$email','$phone_number','$subject','$content')";
    $results = mysqli_query($conn, $sql);
    if($results)
    {
        echo '
		<script type="text/javascript">
			alert("Send contact imformation successfully");
			window.location.href="' . $site_url . '?page=contact";
		</script>';
    }
    exit();
}
