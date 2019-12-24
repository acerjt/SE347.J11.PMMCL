<?php

include("../../config/dbconfig.php");
$id     = $_POST['id'];
$title  = $_POST['title'];
$active = $_POST['active'];
$title1  = $_POST['title1'];
$title2 = $_POST['title2'];
$title3  = $_POST['title3'];

$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
$result     = move_uploaded_file($fileanhtam, '../../images/banner/' . $image);
if (!$result) {
    $image = NULL;
}

if ($id == '' || $title == '' || $active == '') {
    echo '
		<script type="text/javascript">
			alert("Sửa bài viết lỗi. Vui lòng điền đầy đủ thông tin!!!");
			window.location.href="' . $site_admin . 'page=change_banner&id=$id";
		</script>';
} else {
    if ($image == NULL) {
        $sql = "UPDATE tbl_banner SET title = '$title', active = '$active',title1 = '$title1',title2 = '$title2',title3 = '$title3'  WHERE id = '$id'";
    } else {
        $sql = "UPDATE tbl_banner SET title = '$title', active = '$active', image = '$image',title1 = '$title1',title2 = '$title2',title3 = '$title3' WHERE id = '$id'";
    }
}

$run = mysqli_query($conn, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa banner thành công!!!");
			window.location.href="' . $site_admin . '?page=list_banner";
		</script>';
;
?>