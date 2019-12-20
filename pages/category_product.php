<style type="text/css">
    .nivoSlider {
        position: relative;
        width: 100%;
        height: 292px;
        overflow: hidden;
    }

    #slider-direction-1,
    #slider-direction-2 {
        display: none !important;
    }

    .slider-content .title-container h1,
    .slider-content .title-container h2,
    .slider-content .title-container h3 {
        display: none !important;
    }

    #main-content-wp {
        margin-top: -77px;
    }
</style>
<!-- product main items area start -->
<div class="product-main-items">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="?page=home" title="go to homepage">Home<span>/</span></a> </li>
                        <li><strong> shop</strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">
                <div class="product-bar">
                    <ul class="product-navigation" role="tablist">
                        <li role="presentation" class="active gird">

                            <a href="#gird" aria-controls="gird" role="tab" data-toggle="tab">
                                <span>
                                    <img class="primary" src="theme/img/product/grid-primary.png" alt="">
                                    <img class="secondary" src="theme/img/product/grid-secondary.png" alt="">
                                </span>
                                Gird
                            </a>
                        </li>
                        <li role="presentation" class="list">
                            <a href="#list" aria-controls="list" role="tab" data-toggle="tab">
                                <span>
                                    <img class="primary" src="theme/img/product/list-primary.png" alt="">
                                    <img class="secondary" src="theme/img/product/list-secondary.png" alt="">
                                </span>
                                List
                            </a>
                        </li>
                    </ul>
                    <div class="sort-by">
                        <label>Sort By</label>
                        <select name="sort">
                            <option value="#" selected>Position</option>
                            <option value="#">Name</option>
                            <option value="#">Price</option>
                        </select>
                        <a href="#" title="Set Descending Direction">
                            <img src="theme/img/product/i_asc_arrow.gif" alt="">
                        </a>
                    </div>
                    <div class="limit-product">
                        <label>Show</label>
                        <select name="show">
                            <option value="#" selected>9</option>
                            <option value="#">12</option>
                            <option value="#">24</option>
                            <option value="#">36</option>
                        </select>
                        per page
                    </div>
                </div>
                <div class="row">
                    <div class="product-content">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in home2" id="gird">
                                <?php
                                // $cat = $_GET['id'];

                                include("config/dbconfig.php");
                                $sql = "SELECT * from tbl_product WHERE category = '$_GET[id]' order by id desc limit 8";
                                $run = mysqli_query($conn, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($run)) {
                                    $i++;; ?>
                                    <div class="col-lg-3">
                                        <div class="single-product">
                                            <div class="level-pro-new">
                                                <span>new</span>
                                            </div>
                                            <div class="product-img">
                                                <a href="?page=product-detail&productid=<?php echo $row['id'] ?>" title="" class="thumb">
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
                            <div role="tabpanel" class="tab-pane fade home2" id="list">
                                <div class="product-catagory">
                                <?php
                                // $cat = $_GET['id'];

                                include("config/dbconfig.php");
                                $sql = "SELECT * from tbl_product WHERE category = '$_GET[id]' order by id desc limit 8";
                                $run = mysqli_query($conn, $sql);
                                $i = 0;
                                while ($row = mysqli_fetch_array($run)) {
                                    $i++;; ?>
                                    <div class="single-list-product">
                                        <div class="col-sm-4">
                                            <div class="list-product-img">
                                                <a href="?page=product-detail&productid=<?php echo $row['id'] ?>">
                                                <img src="index.php/../images/product/<?php echo $row['image'] ?>" class="primary-img-1" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="list-product-info">
                                                <a href="?page=product-detail&productid=<?php echo $row['id'] ?>" class="list-product-name"> <?php echo $row['name'] ?></a>
                                                <div class="price-rating">
                                                    <span class="old-price"><?php echo number_format( $row['price']).'đ' ?></span>
                                                    <span><?php echo number_format( $row['sale']).'đ';?></span>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <a href="#" class="review">1 Review(s)</a>
                                                        <a href="#" class="add-review">Add Your Review</a>
                                                    </div>
                                                </div>
                                                <div class="list-product-details">
                                                    <p><?php echo $row['detail'] ?>
                                                        <a href="?page=product-detail&productid=<?php echo $row['id'] ?>">Learn More</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="toolbar-bottom">
                            <ul>
                                <li><span>Pages:</span></li>
                                <li class="current"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"> <img src="theme/img/product/pager_arrow_right.gif" alt=""> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product main items area end -->