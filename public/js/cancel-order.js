$('document').ready(function() {
    $('.cancel-btn').on('click', function() {

        var orderid = $(this).val();
        $.ajax({
            url: 'pages/cancel-order.php',
            type: 'post',
            data: {
                'orderid': orderid,
                'cancel': 1
            },
            success: function(response) {
                if (response == 'success') {
                    alert('Đã hủy đơn hàng');
                    location.reload();


                } else {
                    alert('Đã hủy đơn hàng');
                    location.reload();
                }
            }

        });

    });

});