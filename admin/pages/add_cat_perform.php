<?php
//  Kết nối đến CSDL
include("../../config/dbconfig.php");

// Lấy các dữ liệu bên trang thêm mới
$title   = $_POST['title'];
$content = $_POST['content'];


$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$type = finfo_file($finfo, $fileanhtam);

if (!(isset($type) && in_array($type, array("image/png", "image/jpeg", "image/gif")))) {
	echo '
		<script type="text/javascript">
			alert("'.$image.' Not an image :(");
			window.location.href="' . $site_admin . '?page=add_cat";
		</script>';
}
else {
	$result     = move_uploaded_file($fileanhtam, '../public/images/category/' . $image);

	if (!$result) {	
	    $image = NULL;
	}

	// Chèn dữ liệu vào bảng tbl_category
	$sql = "insert into tbl_category(title, content, image) value('$title', '$content' , '$image')";

	// Cho thực thi câu lệnh SQL trên
	$run = mysqli_query($conn, $sql);

	echo '
		<script type="text/javascript">
			alert("Thêm mới danh mục thành công!!!");
			window.location.href="' . $site_admin . '?page=list_cat";
		</script>';;
}
?>