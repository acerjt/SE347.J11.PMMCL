$('.pquantity').on('change keyup', function() {
    var sanitized = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(sanitized);

});

$('document').ready(function() {
    $('.pquantity').on('blur', function() {
        var productid = $(this).closest("tr")
                .find(".productid").text();
        var quantity = $(this).val();
        var cartid = $(this).closest("tr")
        .find(".cartid").text();
        var productdetailid = $(this).closest("tr")
                        .find(".productdetailid").text();
        $.ajax({
            url: 'pages/update-cart.php',
            type: 'post',
            data: {
                'productdetailid' : productdetailid,
                'changequantity': 1,
                'productid': productid,
                'quantity': quantity,
                'cartid': cartid
            },
            success: function(response) {
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