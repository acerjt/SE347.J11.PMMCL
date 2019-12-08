$('document').ready(function() {
    $('.remove-wishlist').on('click', function() {
        var productid = $(this).val();

        // proceed with form submission
        $.ajax({
            url: 'pages/remove-wishlist.php',
            type: 'post',
            data: {
                'removewishlist' : 1,
                'productid': productid,
            },
            success: function(response) {
                if(response == 'success') {
                    alert('Đã xóa sản phẩm khỏi danh sách yêu thích');
                    location.reload();
                }
                else if(response == 'fail') 
                    alert('Xóa sản phẩm khỏi danh sách yêu thích thất bại');
                   
            }

        });
    });
});