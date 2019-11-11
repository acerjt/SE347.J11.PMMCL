<?php
// Kết nối đến CSDL
include("../config/dbconfig.php");
?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="public/js/jquery.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
      //var maxField = 10; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      var fieldHTML = '<div><label for="product-size">Size</label><input type="text" name="size[]" value="" required/><label for="product-color">Màu</label><input type="text" name="color[]" value="" required/><label for="product-quantity">Số lượng</label><input type="text" name="amount[]" value="" required/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="public/images/icons/remove-icon.png"/></a></div>'; //New input field html 
      //var x = 1; //Initial field counter is 1
      $(addButton).click(function() { //Once add button is clicked
         // if(x < maxField){ //Check maximum number of input fields
         //x++; //Increment field counter
         $(wrapper).append(fieldHTML); // Add field html
         // }
      });
      $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
         e.preventDefault();
         $(this).parent('div').remove(); //Remove field html
         // x--; //Decrement field counter
      });
   });
   $(document).ready(function() {
      var wrapper = $('.field_wrapper1');
      $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
         e.preventDefault();
         $(this).parent('div').remove(); //Remove field html
      });
   });
   $(document).ready(function() {
    var $chkboxes = $('.checkdelete');
    var lastChecked = null;

    $chkboxes.click(function(e) {
        if (!lastChecked) {
            lastChecked = this;
            return;
        }

        if (e.shiftKey) {
            var start = $chkboxes.index(this);
            var end = $chkboxes.index(lastChecked);

            $chkboxes.slice(Math.min(start,end), Math.max(start,end)+ 1).prop('checked', lastChecked.checked);
        }

        lastChecked = this;
    });
});
</script>
<style type="text/css">
   input[type="text"] {
      height: 20px;
      vertical-align: top;
   }

   .field_wrapper div {
      margin-bottom: 10px;
   }

   .add_button {
      margin-top: 10px;
      margin-left: 10px;
      vertical-align: text-bottom;
   }

   .remove_button {
      margin-top: 10px;
      margin-left: 10px;
      vertical-align: text-bottom;
   }
</style>




<div id="main-content-wp" class="add-cat-page">
   <div class="section" id="title-page">
      <div class="clearfix">
         <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a>
         <h3 id="index" class="fl-left">Sửa sản phẩm</h3>
      </div>
   </div>
   <div class="wrap clearfix">
      <?php require 'inc/sidebar.php'; ?>
      <div id="content" class="fl-right">
         <div class="section" id="detail-page">
            <div class="section-detail">
               <form method="POST" action="pages/change_product_perform.php" enctype="multipart/form-data">
                  <?php
                  // Bước 1: Kết nối đến CSDL
                  include("../config/dbconfig.php");
                  $id = $_GET["id"];
                  //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                  $sql = "select * from tbl_product where id = " . $id;
                  $run = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($run);
                  $id_product = $row["id"];
                  $sql_img = "select file_name from tbl_img_product where id_product='" . $id_product . "' ";
                  $run_img = mysqli_query($conn, $sql_img);
                  $row_img = mysqli_fetch_array($run_img);
                  ?>
                  <input type="hidden" name="id" value='<?php echo $row["id"]; ?>'>
                  <label for="product-name">Tên sản phẩm</label>
                  <input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>" required>


                  <div class="field_wrapper">
                     <div>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="public/images/icons/add-icon.png" /></a>
                     </div>
                  </div>



                  <?php
                  $sql_product_detail = "select * from tbl_product_detail where product_id='" . $id_product . "'; ";
                  $run_product_detail = mysqli_query($conn, $sql_product_detail);
                  $row_product_detail = mysqli_fetch_all($run_product_detail);





                  for ($count = 0; $count < count($row_product_detail); $count++) {
                     echo ' 
                     <div class="field_wrapper1">
                     <div>
                     
                     <label for="size">Size</label>
                     <input type="text" name="size[]" id="size" value="' . $row_product_detail[$count][1] . '" required>
                     <label for="color">Màu</label>
                     <input type="text" name="color[]" id="color" value="' . $row_product_detail[$count][2] . '"required>
                     <label for="amount">Số lượng</label>
                     <input type="text" name="amount[]" id="amount" value="' . $row_product_detail[$count][3] . '"required>
                     <a href="javascript:void(1);" class="remove_button" title="Remove field"><img src="public/images/icons/remove-icon.png"/></a>
                    
                     </div>
                     </div>
                     ';
                  }

                  ?>
                  <label for="price">Giá sản phẩm</label>
                  <input type="text" name="price" id="price" value="<?php echo $row["price"]; ?>" required>
                  <label for="price">Giá khuyến mại</label>
                  <input type="text" name="sale" id="price" value="<?php echo $row["sale"]; ?>" required>
                  <label for="desc">Mô tả ngắn</label>
                  <textarea name="mota" id="desc"><?php echo $row["description"]; ?></textarea>
                  <label for="desc">Chi tiết</label>
                  <textarea name="chitiet" id="chitiet"><?php echo $row["detail"]; ?></textarea>
                  <script>
                     var chitiet = CKEDITOR.replace('chitiet');
                  </script>
                  <label>Ảnh Đại Diện : </label>
                  <div id="uploadFile">
                     <input type="file" name="image" id="upload-thumb">
                     <img src="index.php/../../images/product/<?php echo $row["image"]; ?>" alt="">
                  </div>
                  <label>Ảnh Tương Tự :</label>
                  <div id="uploadFile" class="row">
                     <?php
                     include("../config/dbconfig.php");
                     $id_temp = $row['id']; /*echo $name_temp;*/
                     $sql_img = "SELECT * from tbl_img_product WHERE  id_product = '" . $id_temp . "'";
                     $run_img = mysqli_query($conn, $sql_img);
                     $i = 0;
                     while ($row2 = mysqli_fetch_array($run_img)) {
                        $i++;; ?>
                        <div class="col-img-sm-4">
                           <label class="checkdeleteimage">
                              <input class="checkdelete" type="checkbox" name="delete-image-changing[]" value="<?php echo $row2["idpost"];?>">
                              <span class="fa fa-trash" aria-hidden="true"></span>
                           </label>
                           <input type="hidden" name="id_product" value='<?php echo $row2["idpost"]; ?>'>
                           <?php echo $row2["idpost"]; ?>
                           <img src="index.php/../../images/product/<?php echo $row2['file_name'] ?>" class="" alt="">
                        </div>

                     <?php } ?>
                     <input type="file" name="files[]" multiple id="upload-thumb">
                  </div>
                  <label>Danh mục sản phẩm</label>
                  <select name="category">
                     <?php
                     //Hiển thị các dữ liệu trong bảng tbl_tl_sach ra đây
                     $sql1 = "select * from tbl_category";
                     $run1 = mysqli_query($conn, $sql1);
                     while ($row1 = mysqli_fetch_array($run1)) {
                        if ($row['category'] == $row1['id']) {; ?>
                           <option value="<?php echo $row1["id"]; ?>" selected><?php echo $row1["title"]; ?></option>
                        <?php
                           } else {
                              ?>
                           <option value="<?php echo $row1["id"]; ?>"><?php echo $row1["title"]; ?></option>
                     <?php
                        }
                     }; ?>
                  </select>
                  <button type="submit" name="btn-submit" id="btn-submit">Sửa đổi</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>