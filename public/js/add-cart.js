$('document').ready(function() {
    $('.add-cart').on('click', function() {
        var productid = $(this).val();
        var quantity = $('.cart-plus-minus-box').val();
        // proceed with form submission
        $.ajax({
            url: 'pages/add-cart.php',
            type: 'post',
            data: {
                'productid': productid,
                'action': 'add',
                'quantity' : quantity,
            },
            success: function(response) {
                if(response=='success')
                    alert('Đã thêm sản phẩm vào giỏ hàng');
                    location.reload();
               }

        });
    });
});