<?php
   // Kết nối đến CSDL
   include("../config/dbconfig.php");
   ?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>


<script src="public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div><label for="product-size">Size</label><input type="text" name="product-size[]" value="" required/><label for="product-color">Màu</label><input type="text" name="product-color[]" value="" required/><label for="product-quantity">Số lượng</label><input type="text" name="product-quantity[]" value="" required/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="public/images/icons/remove-icon.png"/></a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>
<style type="text/css">
input[type="text"]{height:20px; vertical-align:top;}
.field_wrapper div{ margin-bottom:10px;}
.add_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
.remove_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
</style>





<div id="main-content-wp" class="add-cat-page">
   <div class="section" id="title-page">
      <div class="clearfix">
         <!-- <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a> -->
         <h3 id="index" class="fl-left" style="margin-left: 30px">Thêm sản phẩm</h3>
      </div>
   </div>
   <div class="wrap clearfix">
      <?php require 'inc/sidebar.php'; ?>
      <div id="content" class="fl-right">
         <div class="section" id="detail-page">
            <div class="section-detail">
               <form method="POST" action="pages/add_product_perform.php" enctype="multipart/form-data">
                  <label for="product-name">Tên sản phẩm</label>
                  <input type="text" name="name" id="name" required>
                  <!-- <label for="product-code">Số lượng</label>
                  <input type="text" name="soluong" id="masp"> -->



                <div class="field_wrapper">
	                <div>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="public/images/icons/add-icon.png"/></a>
                        <label for="product-size">Size</label>
    	                  <input type="text" name="product-size[]" value="" required/>
                        <label for="product-color">Màu</label>
                        <input type="text" name="product-color[]" value="" required/>
                        <label for="product-quantity">Số lượng</label>
    	                <input type="text" name="product-quantity[]" value="" required/>
                    </div>
                </div>







                  <label for="price">Giá sản phẩm</label>
                  <input type="text" name="price" id="price" required>
                  <label for="price">Giá khuyến mại</label>
                  <input type="text" name="sale" id="price" required>
                  <label for="desc">Mô tả ngắn</label>
                  <textarea name="mota" id="desc" required></textarea>
                  <label for="desc">Chi tiết</label>
                  <textarea name="chitiet" id="chitiet" required></textarea>
                  <script>
                     var chitiet = CKEDITOR.replace('chitiet');
                  </script>
                  <label>Hình ảnh đại diện</label>
                  <div id="uploadFile">
                     <input type="file" name="image" id="upload-thumb" required>
                  </div>
                  <label>Các hình ảnh khác</label>
                  <div id="uploadFile">
                     <input type="file" name="files[]" multiple  id="upload-thumb" required>
                  </div>
                  <label>Danh mục sản phẩm</label>
                  <select name="category">
                     <?php
                        $sql = "select * from tbl_category";
                        $run = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($run)) {
                        ;
                    ?>
                     <option value="<?php echo $row["id"];?>"><?php echo $row["title"];?></option>
                     <?php
                        }
                        ;?>
                  </select>
                  <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
