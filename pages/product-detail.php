<?php
include('config/dbconfig.php');
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Single Shop || TradeZ </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div>
    <?php

    $query = "SELECT * from tbl_product where id = '$_GET[productid]' ";
    $run = mysqli_query($conn, $query);
    $product = mysqli_fetch_array($run);
    ?>
    <div class="Single-product-location home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Home<span>/</span></a> </li>
                            <li><a href='#' title="go to gender product">Man<span>/</span></a> </li>
                            <?php
                            $query = "SELECT * from tbl_category where id = '$product[category]' ";
                            $run = mysqli_query($conn, $query);
                            $category = mysqli_fetch_array($run)
                            ?>
                            <li><a href='#' title="go to gender brand"><?php echo $category['title'] ?><span>/</span></a> </li>
                            <li><strong><?php echo $product['name'] ?></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product area end -->
    <!-- single product details start -->
    <div class="single-product-details">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-product-img tab-content">
                        <div class="single-pro-main-image tab-pane active" id="pro-large-img-1">
                            <a href="#"><img  class="optima_zoom" src="index.php/../images/product/<?php echo $product['image'] ?>" data-zoom-image="index.php/../images/product/<?php echo $product['image'] ?>" alt="optima" /></a>
                        </div>
                        <?php

                        $query = "SELECT * FROM tbl_img_product WHERE id_product = '$_GET[productid]'";
                        $run = mysqli_query($conn, $query);
                        $i = 1;
                        while ($listproductimage = mysqli_fetch_array($run)) {
                            $i++;
                            ?>
                            <div class="single-pro-main-image tab-pane" id="pro-large-img-<?php echo $i ?>">
                                <a href="#">
                                    <img class="optima_zoom"  src="index.php/../images/product/<?php echo $listproductimage['file_name'] ?>" data-zoom-image="index.php/../images/product/<?php echo $listproductimage['file_name'] ?>" alt="optima" />
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-page-slider">
                        <?php

                        $query = "SELECT * FROM tbl_img_product WHERE id_product = '$_GET[productid]'";
                        $run = mysqli_query($conn, $query);
                        $i = 1; ?>
                        <a href="#pro-large-img-1" data-toggle="tab">
                            <img src="index.php/../images/product/<?php echo $product['image'] ?>" alt="">
                        </a>
                        <?php
                        while ($listproductimage = mysqli_fetch_array($run)) {
                            $i++;
                            ?>
                            <div class="single-product-slider">
                                <a href="#pro-large-img-<?php echo $i ?>" data-toggle="tab">
                                    <img src="index.php/../images/product/<?php echo $listproductimage['file_name'] ?>" alt="">
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single-product-details">
                        <a href="#" class="product-name"><?php echo $product['name'] ?></a>
                        <div class="list-product-info">
                            <div class="price-rating">
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
                        </div>
                        <div class="avalable">
                            <?php
                            $query = "select sum(amount) as sum from tbl_product_detail where product_id = $product[id];";
                            $run2 = mysqli_query($conn, $query);
                            $row2 = mysqli_fetch_array($run2);
                            ?>
                            <p>Availability:<span> <?php
                                                    if ($row2['sum'])
                                                        echo "In Stock";
                                                    else
                                                        echo "Out Stock";
                                                    ?></span></p>
                        </div>
                        <div class="item-price">
                            <span><?php echo adddotstring($product['price']) ?></span>
                        </div>
                        <div class="single-product-info">
                            <p><?php echo $product['description'] ?> </p>
                            <div class="share">
                                <img src="public/img/product/share.png" alt="">
                            </div>
                        </div>
                        <div class="action">
                            <ul class="add-to-links">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="select-catagory">
                            <div class="size-select">
                                <?php
                                $query = "SELECT  DISTINCT size FROM tbl_product_detail WHERE product_id = '$product[id]'";
                                $run = mysqli_query($conn, $query);


                                ?>
                                <label class="required">
                                    <em>*</em> Size
                                </label>
                                <div class="input-box">
                                    <select class="size-box">
                                        <option value="">-- Please Select --</option>
                                        <?php
                                        while ($productdetail = mysqli_fetch_array($run)) {
                                            echo  ' <option value="' . $product['id'] . '">' . $productdetail['size'] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="color-select">
                                <label class="required">
                                    <em>*</em> Color
                                </label>
                                <div class="input-box">
                                    <select class="color-box">
                                        <option value="">-- Please Select --</option>

                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="cart-item">
                            <div class="price-box">
                                <span class="product-amount"></span>
                            </div>
                            <div class="single-cart">
                                <div class="cart-plus-minus">
                                    <label>Qty: </label>
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                                <button class="add-cart cart-btn" value="<?php echo $_GET['productid'] ?>">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product details end -->
    <!-- single product tab start -->
    <div class="single-product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-product-tab">
                        <ul class="single-product-tab-navigation" role="tablist">
                            <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Product Description</a></li>
                            <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">reviews</a></li>
                            <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">product tag</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content single-product-page">
                            <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                                <div class="single-p-tab-content">
                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis. </p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab2">
                                <div class="single-p-tab-content">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="product-review">
                                                <p> <a href="#"> plaza</a> <span>Review by</span> plaza </p>
                                                <div class="product-rating-info">
                                                    <p>value</p>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                                <div class="product-rating-info">
                                                    <p>Quality</p>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                                <div class="product-rating-info">
                                                    <p>Price</p>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                </div>
                                                <div class="review-date">
                                                    <p>plaza <em> (Posted on 8/27/2015)</em></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="rate-product hidden-xs">
                                                <div class="rate-product-heading">
                                                    <h3>You're reviewing: Fusce aliquam</h3>
                                                    <h3>How do you rate this product? <em>*</em></h3>
                                                </div>
                                                <form action="#">
                                                    <table class="product-review-table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>1 star</th>
                                                                <th>2 star</th>
                                                                <th>3 star</th>
                                                                <th>4 star</th>
                                                                <th>5 star</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>Price</th>
                                                                <td> <input type="radio" class="radio" name="ratings[1]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[1]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[1]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[1]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[1]"> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Value</th>
                                                                <td> <input type="radio" class="radio" name="ratings[2]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[2]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[2]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[2]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[2]"> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Quality</th>
                                                                <td> <input type="radio" class="radio" name="ratings[3]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[3]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[3]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[3]"> </td>
                                                                <td> <input type="radio" class="radio" name="ratings[3]"> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <ul class="form-list">
                                                        <li>
                                                            <label> nickname <em>*</em> </label>
                                                            <input type="text">
                                                        </li>
                                                        <li>
                                                            <label> Summary of Your Review <em>*</em> </label>
                                                            <input type="text">
                                                        </li>
                                                        <li>
                                                            <label> Review <em>*</em> </label>
                                                            <textarea cols="3" rows="5"></textarea>
                                                        </li>
                                                    </ul>
                                                    <button type="submit"> submit review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab3">
                                <div class="single-p-tab-content">
                                    <div class="add-tab-title">
                                        <p> add your tag </p>
                                    </div>
                                    <div class="add-tag">
                                        <form action="#">
                                            <input type="text">
                                            <button type="submit">add tags</button>
                                        </form>
                                    </div>
                                    <p class="tag-rules">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product tab end -->
    <!-- upsell product area start-->
    <div class="upsell-product home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-title">
                        <h2>upsell products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="upsell-slider">
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/25.png" alt="" class="primary-img">
                                    <img src="img/product/26.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/23.png" alt="" class="primary-img">
                                    <img src="img/product/24.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/21.png" alt="" class="primary-img">
                                    <img src="img/product/22.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/19.png" alt="" class="primary-img">
                                    <img src="img/product/20.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/17.png" alt="" class="primary-img">
                                    <img src="img/product/18.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/15.png" alt="" class="primary-img">
                                    <img src="img/product/16.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/13.png" alt="" class="primary-img">
                                    <img src="img/product/14.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/11.png" alt="" class="primary-img">
                                    <img src="img/product/12.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="list-product-info">
                                <div class="price-rating">
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
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- upsell product area end-->
    <!-- related product area start-->
    <div class="related-product home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-title">
                        <h2>related products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related-slider">
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/25.png" alt="" class="primary-img">
                                    <img src="img/product/26.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/23.png" alt="" class="primary-img">
                                    <img src="img/product/24.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/21.png" alt="" class="primary-img">
                                    <img src="img/product/22.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/19.png" alt="" class="primary-img">
                                    <img src="img/product/20.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/17.png" alt="" class="primary-img">
                                    <img src="img/product/18.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/15.png" alt="" class="primary-img">
                                    <img src="img/product/16.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/13.png" alt="" class="primary-img">
                                    <img src="img/product/14.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img src="img/product/11.png" alt="" class="primary-img">
                                    <img src="img/product/12.png" alt="" class="secondary-img">
                                </a>
                            </div>
                            <div class="product-price">
                                <div class="product-name">
                                    <a href="single-product.html" title="Fusce aliquam">Fusce aliquam</a>
                                </div>
                                <div class="price-rating">
                                    <span>$170.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="public/js/onchangesize.js"></script>
    <script src="public/js/add-cart.js"></script>
</body>

</html>