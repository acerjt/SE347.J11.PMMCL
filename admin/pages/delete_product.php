<?php

$id = $_GET['id'];
include("../config/dbconfig.php");
// Xóa dữ liệu trong bảng		


$sql_get_avatar = "SELECT image from tbl_product where id ='$id';";
$run =mysqli_query($conn,$sql_get_avatar);
$image = mysqli_fetch_array($run);
$image =$image['image'];
$targetDir = "../../images/product/";
unlink($targetDir . $image);

$sql_get_avatar = "SELECT file_name from tbl_img_product where id_product ='$id';";
$run =mysqli_query($conn,$sql_get_avatar);
$image = mysqli_fetch_all($run);
$targetDir = "../images/product/";
for($count=0;$count<count($image);$count++) {
    for($count1=0;$count1<count($image[$count]);$count1++)
        unlink($targetDir . $image[$count][$count1]);
}



$sql  = "DELETE from tbl_product where id = " . $id;

$sql2 = "DELETE from tbl_comment where idproduct = " . $id;

$sql3 = "DELETE from tbl_product_detail where product_id = " . $id;

$sql4 = "DELETE from tbl_img_product where id_product = " . $id;

$run  = mysqli_query($conn, $sql);
$run2 = mysqli_query($conn, $sql2);
$run3 = mysqli_query($conn, $sql3);
$run4 = mysqli_query($conn, $sql4);
echo '
		<script type="text/javascript">
			alert("Xóa sản phẩm thành công!!!");
			window.location.href="' . $site_admin . '?page=list_product";
		</script>';
;
?>