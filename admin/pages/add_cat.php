<?php
   // Kết nối đến CSDL
   include("../config/dbconfig.php");
   ?>
<div id="main-content-wp" class="add-cat-page">
   <div class="section" id="title-page">
      <div class="clearfix">
         <!-- <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a> -->
         <h3 id="index" class="fl-left" style="margin-left: 30px">Thêm mới danh mục</h3>
      </div>
   </div>
   <div class="wrap clearfix">
      <div id="sidebar" class="fl-left">
         <ul id="list-cat">
            <li>
               <a href="?page=add_product" title="">Thêm sản phẩm</a>
            </li>
            <li>
               <a href="?page=list_product" title="">Danh sách sản phẩm</a>
            </li>
            <li>
               <a href="?page=list_cat" title="">Danh mục sản phẩm</a>
            </li>
         </ul>
      </div>
      <div id="content" class="fl-right">
         <div class="section" id="detail-page">
            <div class="section-detail">
               <form method="POST" action="pages/add_cat_perform.php" enctype="multipart/form-data">
                  <label for="title">Tên danh mục</label>
                  <input type="text" name="title" id="title" required>
                  <label for="image">Hình ảnh</label>
                  <input type="file" name="image" id="image" required>
                  <label >Mô tả</label>
                  <textarea name="content" id="content" required></textarea>
                  <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>