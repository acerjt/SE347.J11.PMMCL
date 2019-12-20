$('document').ready(function() {
    $('.add-cart').on('click', function() {
        var productid = $(this).val();
        var quantity = $('.cart-plus-minus-box').val();
        var productdetailid = $('.color-box').val();
        if (!productdetailid ) {
            if(!productid){
            alert('Vui lòng chọn sản phẩm');
            return false;
            }
            else{
                $.ajax({
                    url: 'pages/add-cart.php',
                    type: 'post',
                    data: {
                        'productdetailid': productdetailid,
                        'productid': productid,
                        'action': 'add',
                        'quantity': quantity,
                    },
                    success: function(response) {
                        if (response == 'success')
                            alert('Đã thêm sản phẩm vào giỏ hàng');
                        location.reload();

                    }
    
                });
            }
        } else {
            $.ajax({
                url: 'pages/add-cart.php',
                type: 'post',
                data: {
                    'productdetailid': productdetailid,
                    'productid': productid,
                    'action': 'add',
                    'quantity': quantity,
                },
                success: function(response) {
                    if (response == 'success')
                        alert('Đã thêm sản phẩm vào giỏ hàng');
                    location.reload();
                }

            });
        }
    });
    $('.add-cart1').on('click', function() {
        var productid = $(this).val();
        var quantity = $('.cart-plus-minus-box').val();
        var productdetailid = $('.color-box').val();
        
            $.ajax({
                url: 'pages/add-cart.php',
                type: 'post',
                data: {
                    'productdetailid': productdetailid,
                    'productid': productid,
                    'action': 'add',
                    'quantity': quantity,
                },
                success: function(response) {
                    
                    location.href='?page=my-cart';
                }

            });

    });
});