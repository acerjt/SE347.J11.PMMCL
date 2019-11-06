<?php
//  Kết nối đến CSDL
include("../../config/dbconfig.php");

//Lấy các dữ liệu bên trang Thêm mới bài viết
$name     = $_POST['name'];
// $soluong  = $_POST['soluong'];
$price    = $_POST['price'];
$sale     = $_POST['sale'];
$category = $_POST['category'];
$chitiet  = $_POST['chitiet'];
$mota     = $_POST['mota'];

// Upload hình ảnh
$image      = $_FILES["image"]["name"];
$fileanhtam = $_FILES["image"]["tmp_name"];
if (file_exists('../../images/product/' . $image)) {
    echo '
		<script type="text/javascript">
			alert("Tên file đã trùng!!!");
			window.location.href="' . $site_admin . '?page=add_product";
		</script>';;
} else {

    $result     = move_uploaded_file($fileanhtam, '../../images/product/' . $image);
    if (!$result) {
        echo '
    <script type="text/javascript">
        alert("Tên file đã trùng!!!");
        window.location.href="' . $site_admin . '?page=add_product";
    </script>';
    } else {

        $query = "SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = '$csdl'
        AND   TABLE_NAME   = 'tbl_product';";
        $getidproduct = mysqli_query($conn, $query);
        $idproduct = mysqli_fetch_array($getidproduct);
        $idproduct = $idproduct['AUTO_INCREMENT'];

        // upload multi image
        $targetDir = "../../images/product/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        if (!empty(array_filter($_FILES['files']['name']))) {
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path
                $fileName = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert sql
                        // $query = "INSERT INTO tbl_img_product (id_product,file_name) VALUE ('$idproduct', '$val');";
                        // $addlistimage = mysqli_query($conn, $query);
                        $insertValuesSQL .= "('" . $idproduct . "','" . $fileName . "', NOW()),";
                    } else {
                        $errorUpload .= $_FILES['files']['name'][$key] . ', ';
                    }
                } else {
                    $errorUploadType .= $_FILES['files']['name'][$key] . ', ';
                }
            }

            if (!empty($insertValuesSQL)) {
                $insertValuesSQL = trim($insertValuesSQL, ',');
                $sql_img = "INSERT INTO tbl_img_product (id_product, file_name, uploaded_on) VALUES $insertValuesSQL";
                $run_img = mysqli_query($conn, $sql_img);

                if ($insert) {
                    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . $errorUpload : '';
                    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . $errorUploadType : '';
                    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                    $statusMsg = "Files are uploaded successfully." . $errorMsg;
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }









        // Chèn dữ liệu vào bảng tbl_product
        $sql = "insert into tbl_product (name,code,price,image,category, detail,sale, description,uploaded_on) value('$name','$name','$price','$image','$category','$chitiet', '$sale', '$mota' ,NOW());";

        // Cho thực thi câu lệnh SQL trên
        $run = mysqli_query($conn, $sql);


        for ($count = 0; $count < count($_POST["product-size"]); $count++) {
            $size =    $_POST["product-size"][$count];
            $color  =  $_POST["product-color"][$count];
            $amount =    $_POST["product-quantity"][$count];
            $query = "INSERT INTO tbl_product_detail (product_id, size, color, amount) VALUE ('$idproduct', '$size', '$color', '$amount');";
            $run2 = mysqli_query($conn, $query);
        }



        if ($run && $run2) {
            echo '
		<script type="text/javascript">
			alert("Thêm mới sản phẩm thành công!!!");
			window.location.href="' . $site_admin . '?page=list_product";
        </script>';;
        } else {

            $targetDir = "../../images/product/";
            unlink($targetDir . $image);

            foreach ($_FILES['files']['name'] as $key => $val) {
                unlink($targetDir . $_FILES["files"]["name"][$key]);
            }
            $sql = "DELETE FROM tbl_product WHERE tbl_product.id = $idproduct";
            $run3 = mysqli_query($conn, $sql);

            for ($count = 0; $count < count($_POST["product-size"]); $count++) {
                $size =    $_POST["product-size"][$count];
                $color  =  $_POST["product-color"][$count];
                $amount =    $_POST["product-quantity"][$count];
                $query = "DELETE FROM tbl_product_detail  where (product_id = '$idproduct' and size = '$size'and color = '$color' and amount = '$amount');";
                $run2 = mysqli_query($conn, $query);
            }
            foreach ($_FILES['files']['name'] as $key => $val) {

                $query = "DELETE FROM tbl_img_product where (id_product = '$idproduct' and file_name = '$val');";
                $deletelistimage = mysqli_query($conn, $query);
            }
        }
    }
}
