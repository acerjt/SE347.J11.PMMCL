$('document').ready(function() {
    $('.remove-cart').on('click', function() {
        var productdetailid = $(this).parent().val();
        var cartid = $(this).closest('li').find('.cart-id').val();
        // proceed with form submission
        $.ajax({
            url: 'pages/remove-cart.php',
            type: 'post',
            data: {
                'removecart' : 1,
                'cartid': cartid,
                'productdetailid': productdetailid,
            },
            success: function(response) {
                if(response == 'success') {
                    alert('Đã xóa sản phẩm khỏi giỏ hàng');
                    location.reload();
                }
                else if(response == 'fail') 
                    alert('Xóa sản phẩm khỏi giỏ hàng thất bại');
                   
            }

        });
    });

    $('.remove-cart-my-cart').on('click', function() {
        var productid = $(this).closest("tr")  
        .find(".productid").text();
        var cartid = $(this).val();
        var productdetailid = $(this).closest("tr")  
        .find(".productdetailid").text();
        $.ajax({
            url: 'pages/remove-cart.php',
            type: 'post',
            data: {
                'removecart' : 1,
                'cartid': cartid,
                'productid' : productid,
                'productdetailid':productdetailid
            },
            success: function(response) {
                if(response == 'success') {
                    alert('Đã xóa sản phẩm khỏi giỏ hàng');
                    location.reload();
                }
                else if(response == 'fail') 
                    alert('Xóa sản phẩm khỏi giỏ hàng thất bại');
                   
            }

        });
    });
    $('.clear-cart').on('click', function() {

        $.ajax({
            url: 'pages/remove-cart.php',
            type: 'post',
            data: {
                'clearcart' : 1,
            },
            success: function(response) {
                if(response == 'success') {
                    alert('Đã làm sạch giỏ hàng');
                    location.reload();
                }
                
            }

        });
    });
});