$('document').ready(function() {
    $('.add-wishlist').on('click', function() {
        var productid = $(this).val();

        // proceed with form submission
        $.ajax({
            url: 'pages/add-wishlist.php',
            type: 'post',
            data: {
                'addwishlist' : 1,
                'productid': productid,
            },
            success: function(response) {
                if(response == 'success') 
                    alert('Đã thêm sản phẩm vào danh sách yêu thích');
                else if(response == 'fail') 
                    alert('Sản phẩm đã có trong danh sách yêu thích');
                    else {
                        alert('Vui lòng đăng nhập tài khoản');      
                    }
            }

        });
    });
});