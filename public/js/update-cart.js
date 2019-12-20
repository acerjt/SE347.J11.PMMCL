$('document').ready(function() {
    $('.update-cart').on('click', function() {

        if (!$('.cart-item-check:checked').length) {
            alert('Vui lòng chọn sản phẩm');
            return false;
        } else {


            $('.cart-item-check').each(function() {
                if ($(this).is(":checked")) {
                    var productdetail = $(this).closest("tr")
                        .find(".productdetailid");

                    var size = $(this).closest("tr").find('.size-box').find("option:selected").text();
                    var color = $(this).closest("tr").find('.color-box').find("option:selected").text();
                    var productid = $(this).closest("tr")
                        .find(".productid").text();
                    var cartid = $(this).closest("tr").find(".cartid").text();
                    var quantity = $(this).closest("tr").find('.quantity-product').find('.pquantity').val();
                    $.ajax({
                        url: 'pages/change-product-detail.php',
                        type: 'post',
                        data: {
                            'changeproductdetail': 1,
                            'productid': productid,
                            'size': size,
                            'color': color
                        },
                        success: function(response) {
                            // console.log(productdetail.text());
                            productdetail.html(response);
                            var productdetailid = productdetail.text();
                            console.log(productdetailid);
                            // var cartobj = {
                            //     cartid: cartid,
                            //     productdetailid: productdetailid
                            // }
                            $.ajax({
                                url: 'pages/update-cart.php',
                                type: 'post',
                                data: {
                                    'updatecart': 1,
                                    'cartid': cartid,
                                    'productdetailid': productdetailid,
                                    'quantity': quantity
                                },
                                success: function(response) {
                                    if (response == 'success') {
                                        alert('Cập nhật giỏ hàng thành công');
                                        location.reload();
                                    } else {
                                        alert('Cập nhật giỏ hàng không thành công');
                                        location.reload();
                                    }
                                }
                            });
                        }
                    });


                }
            });
        }

    });
    $('.update-cart1').on('click', function() {

        if (!$('.cart-item-check:checked').length) {
            alert('Vui lòng chọn sản phẩm');
            return false;
        } else {


            $('.cart-item-check').each(function() {
                if ($(this).is(":checked")) {
                    var productdetail = $(this).closest("tr")
                        .find(".productdetailid");
                    var oldproductdetailid = productdetail.text();
                    var size = $(this).closest("tr").find('.size-box').find("option:selected").text();
                    var color = $(this).closest("tr").find('.color-box').find("option:selected").text();
                    var productid = $(this).closest("tr")
                        .find(".productid").text();
                    var quantity = $(this).closest("tr").find('.quantity-product').find('.pquantity').val();
                    $.ajax({
                        url: 'pages/change-product-detail.php',
                        type: 'post',
                        data: {
                            'changeproductdetail': 1,
                            'productid': productid,
                            'size': size,
                            'color': color
                        },
                        success: function(response) {
                            
                            var result = $.parseJSON(response);
                            productdetail.html(result['id']);

                            var productdetailid = productdetail.text();
                            var productdetailsize =result['size'];
                            var productdetailcolor =result['color'];
                       
                           
                            
                            
                       
                            // var cartobj = {
                            //     cartid: cartid,
                            //     productdetailid: productdetailid
                            // }
                            $.ajax({
                                url: 'pages/update-cart.php',
                                type: 'post',
                                data: {
                                    'updatecart': 1,
                                    'oldproductdetailid': oldproductdetailid,
                                    'productdetailid': productdetailid,
                                    'quantity': quantity,
                                    'size':productdetailsize,
                                    'color':productdetailcolor
                                },
                                success: function(response) {
                                    if (response == 'success') {
                                        alert('Cập nhật giỏ hàng thành công');
                                        location.reload();
                                    } else {
                                        alert('Cập nhật giỏ hàng không thành công');
                                        location.reload();
                                    }
                                }
                            });
                        }
                    });


                }
            });
        }

    });
});






// $('.quantity-product').each(function() {
// var productid = $(this).closest("tr")
//     .find(".productid").text();
//     var quantity = $(this).find('.pquantity').val();
// $.ajax({
//     url: 'pages/update-cart.php',
//     type: 'post',
//     data: {
//         'updatecart': 1,
//         'productid': productid,
//         'quantity': quantity,
//     },
//     success: function(response) {
//         alert('Cập nhật giỏ hàng thành công');
//         location.reload();
//         //     if(response == 'success') {
//         //         alert('Đã xóa sản phẩm khỏi giỏ hàng');
//         //         location.reload();
//         //     }
//         //     else if(response == 'fail') 
//         //         alert('Xóa sản phẩm khỏi giỏ hàng thất bại');

//     }

//     });



// });