<div id="main-content-wp" class="home-page">

    <!-- service area start -->
    <div class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-service">
                        <div class="sirvice-img">
                            <img src="theme/img/service/icon-1.png" alt="">
                        </div>
                        <div class="service-info">
                            <h3>FREE SHIPPING</h3>
                            <p>FREE shipping on order over $25 shipped by TradeZ</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-service">
                        <div class="sirvice-img">
                            <img src="theme/img/service/icon-1.png" alt="">
                        </div>
                        <div class="service-info">
                            <h3>7 DAYS RETURNS</h3>
                            <p>TradeZ has a strong dedication to customer satisfaction.
                                If you are not 100% satisfied with your purchase,
                                you can return your order to our address, as soon as we have inspected the items and deemed that they warrant a refund.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-service">
                        <div class="sirvice-img">
                            <img src="theme/img/service/icon-1.png" alt="">
                        </div>
                        <div class="service-info">
                            <h3>PAY AFTER DELIVERY</h3>
                            <p>TradeZ's "Pay after delivery " feature that allow you to pay after you received.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!-- new products area start -->
    <div class="new-product home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-title">
                        <h2>new products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="features-home2-slider">
                    <?php
                    // $cat = $_GET['id'];

                    include("config/dbconfig.php");
                    $sql = "SELECT * from tbl_product order by id desc limit 8";
                    $run = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_array($run)) {
                        $i++;; ?>
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="level-pro-new">
                                    <span>new</span>
                                </div>
                                <div class="product-img">
                                    <a href="?page=product-detail&productid=<?php echo $row['id']; ?>" title="" class="thumb">
                                        <?php
                                            include("config/dbconfig.php");
                                            $id_temp = $row['id'];
                                            $sql_img = "SELECT file_name from tbl_img_product WHERE  id_product = '" . $id_temp . "' LIMIT 9";
                                            /*$sql_img = "SELECT file_name from tbl_img_product as A left JOIN tbl_product as B ON A.id_product=B.id LIMIT 2" ;*/
                                            $run_img = mysqli_query($conn, $sql_img);
                                            if (mysqli_num_rows($run_img) == 9) {
                                                ?>
                                            <img style="width:263px; height: 329px;" src="index.php/../images/product/<?php echo $row['image'] ?>" class="primary-img-1" alt="">

                                            <?php
                                                    $i = 0;
                                                    while ($row2 = mysqli_fetch_array($run_img)) {
                                                        $i++;; ?>
                                                <!-- <?php $array = 'primary-img-'; ?> -->
                                                <!-- <?php echo ($array . $i) ?> -->
                                                <img src="index.php/../images/product/<?php echo $row2['file_name'] ?>" class="primary-img-2" alt="">
                                            <?php }
                                                } else { ?>
                                            <img style="width:263px; height: 329px;" src="index.php/../images/product/<?php echo $row['image'] ?>" alt="">
                                        <?php } ?>
                                    </a>
                                </div>
                                <div class="actions">
                                    <button onclick="location.href='?page=add_cart&id=<?php echo $row['id'] ?>'" type="submit" class="cart-btn" title="Add to cart">Buy Now</button>
                                    <ul class="add-to-link">
                                        <li><a class="modal-view" data-target="#productModal" data-toggle="modal" href="#"> <i class="fa fa-search"></i></a></li>
                                        <li class="add-wishlist" value="<?php echo $row['id']; ?>"><a><i class="fa fa-heart"></i></a></li>
                                        <li class="add-cart" value="<?php echo $row['id']; ?>"><a> <i class="fa fa-shopping-cart"></i></a></li>

                                    </ul>
                                </div>
                                <div class="product-price">
                                    <div class="product-name">
                                        <a href="?page=detail_product&id=<?php echo $row['id']; ?>" title="" class="name-product"><?php echo $row['name'] ?></a>
                                    </div>
                                    <div class="price-rating">
                                        <span class="prod-sale"><?php echo number_format($row['sale']).'đ'; ?></span>
                                        <small class="prod-price"><?php echo number_format($row['price']).'đ'; ?></small>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>


                <?php
                include("config/dbconfig.php");
                $cat = "SELECT * from tbl_category order by id desc";
                $runcat = mysqli_query($conn, $cat);
                $c = 0;
                while ($rowcat = mysqli_fetch_array($runcat)) {
                    $category = $rowcat['id'];
                    $c++;; ?>

                    <!-- feature products area start -->
                    <div class="features-product home2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-title">
                                       <a href="?page=category_product&id=<?php echo $rowcat['id'] ?>">   <h2><?php echo $rowcat['title'] ?></h2></a>  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="features-home2-slider">
                                    <?php
                                        include("config/dbconfig.php");
                                        $sql = "SELECT tbl_product.id, name,code,price,image,category,detail,sale,description, sum(tbl_product_detail.amount) as totalamount 
                                        from tbl_product, tbl_product_detail 
                                        where category = '$category' and tbl_product.id = tbl_product_detail.product_id GROUP BY tbl_product.id ORDER by totalamount DeSC";
                                        $run = mysqli_query($conn, $sql);
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($run)) {
                                            $i++;; ?>
                                        <div class="col-md-12">
                                            <div class="single-product">
                                                <div class="level-pro-new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-img" style="width:263px; height: 329px;">
                                                    <a href="?page=product-detail&productid=<?php echo $row['id']; ?>" title="" class="thumb">
                                                        <?php
                                                                include("config/dbconfig.php");
                                                                $id_temp = $row['id'];
                                                                $sql_img = "SELECT file_name from tbl_img_product WHERE  id_product = '" . $id_temp . "' LIMIT 9";
                                                                /*$sql_img = "SELECT file_name from tbl_img_product as A left JOIN tbl_product as B ON A.id_product=B.id LIMIT 2" ;*/
                                                                $run_img = mysqli_query($conn, $sql_img);
                                                                if (mysqli_num_rows($run_img) == 9) {
                                                                    ?>
                                                            <img style="width:263px; height: 329px;" src="index.php/../images/product/<?php echo $row['image'] ?>" class="primary-img-1" alt="">

                                                            <?php
                                                                        $i = 0;
                                                                        while ($row2 = mysqli_fetch_array($run_img)) {
                                                                            $i++;; ?>
                                                                <!-- <?php $array = 'primary-img-'; ?> -->
                                                                <!-- <?php echo ($array . $i) ?> -->
                                                                <img src="index.php/../images/product/<?php echo $row2['file_name'] ?>" class="primary-img-2" alt="">
                                                            <?php }
                                                                    } else { ?>
                                                            <img style="width:263px; height: 329px;" src="index.php/../images/product/<?php echo $row['image'] ?>" alt="">
                                                        <?php } ?>
                                                    </a>
                                                </div>
                                                <div class="actions">
                                                    <button  value="<?php echo $row['id']; ?>" type="submit" class="cart-btn add-cart1" title="Add to cart">Buy Now</button>
                                                    <ul class="add-to-link">
                                                        <li><a class="modal-view" data-target="#productModal" data-toggle="modal" href="#"> <i class="fa fa-search"></i></a></li>
                                                        <li><a href="#"> <i class="fa fa-heart-o"></i></a></li>
                                                        <li><a href="#"> <i class="fa fa-refresh"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-price">
                                                    <div class="product-name">
                                                        <a href="?page=product-detail&productid=<?php echo $row['id']; ?>" title="" class="name-product"><?php echo $row['name'] ?></a>
                                                    </div>
                                                    <div class="price-rating">
                                                        <span><?php echo number_format($row['sale']).'đ'; ?></span>
                                                        <small><?php echo number_format($row['price']).'đ'; ?></small>
                                                        <div class="ratings">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- feature products area end -->


                <?php } ?>


            </div>
        </div>
    </div>
    <!-- new products area end -->

    <!-- blog area start -->
    <!-- <div class="blog-area home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-heading">
                        <h2>From <strong> The Blog</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                include("config/dbconfig.php");
                //Bước 2: Hiển thị các dữ liệu trong bảng ra đây
                $sql = "select * from tbl_post LIMIT 2";
                $run = mysqli_query($conn, $sql);
                $i = 0;
                while ($row = mysqli_fetch_array($run)) {
                    $i++;
                    ?>
                    <div class="col-sm-6">
                        <div class="single-home2-blog-post">
                            <div class="blog-img">
                                <a href="?page=detail_news&id=<?php echo $row['id']; ?>">
                                    <img src="index.php/../images/post/<?php echo $row['image'] ?>" alt="">
                                    <i class="fa fa-file-photo-o"></i>
                                </a>
                            </div>
                            <div class="blog-content">
                                <a href="?page=detail_news&id=<?php echo $row['id']; ?>" class="blog-title"><?php echo $row['title'] ?></a>
                                <span><a href="#">By plaza themes - </a>17 Aug 2015 ( 0 comments )</span>
                                <p><?php echo $row['description']; ?></p>
                                <a href="?page=detail_news&id=<?php echo $row['id']; ?>" class="readmore">read more ></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div> -->
    <!-- blog area end -->

    <div style="margin-top: 30px;"></div>
</div>
<script src="public/js/add-wishlist.js"></script>
<script src="public/js/add-cart.js"></script>