<?php
include("../../config/dbconfig.php");
$title      = $_POST['title'];
$title1      = $_POST['title1'];
$title2      = $_POST['title2'];
$title3      = $_POST['title3'];
$active     = $_POST['active'];
$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
$result     = move_uploaded_file($fileanhtam, '../../images/banner/' . $image);
if (!$result) {
    $image = NULL;
}
if ($title1 == '' || $title2 == '' || $title3 == '' ||$title == '' || $active == '') {
    echo '
   		<script type="text/javascript">
   			alert("Vui lòng điền đầy đủ thông tin!!!");
   			window.location.href="' . $site_admin . '?page=add_banner";
   		</script>';
} else {
    $sql = "insert into tbl_banner (title,image,active,title1,title2,title3) value('$title','$image','$active','$title1','$title2','$title3')";
    
    // Cho thực thi câu lệnh SQL trên
    $run = mysqli_query($conn, $sql);
    echo '
   		<script type="text/javascript">
   			alert("Thêm mới banner thành công!!!");
   			window.location.href="' . $site_admin . '?page=list_banner";
   		</script>';
}
;
?>