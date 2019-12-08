$('document').ready(function() {
    $('.update-cart').on('click', function() {
        $('.quantity-product').each(function() {
            var productid = $(this).closest("tr")
                .find(".productid").text();
            var quantity = $(this).find('.pquantity').val();
            $.ajax({
                url: 'pages/update-cart.php',
                type: 'post',
                data: {
                    'updatecart': 1,
                    'productid': productid,
                    'quantity': quantity,
                },
                success: function(response) {
                    alert('Cập nhật giỏ hàng thành công');
                    location.reload();
                    //     if(response == 'success') {
                    //         alert('Đã xóa sản phẩm khỏi giỏ hàng');
                    //         location.reload();
                    //     }
                    //     else if(response == 'fail') 
                    //         alert('Xóa sản phẩm khỏi giỏ hàng thất bại');

                }

            });



        });





    });
});