$('document').ready(function() {
    $('.remove-confirm-item').on('click', function() {
        if ($('.cart-item-row').length == 1) {
            alert('Add items to your cart before proceeding to checkout.');
            return false;
        } else {
            var cartitemconfirm = $(this).val();

            // proceed with form submission
            $.ajax({
                url: 'pages/remove-confirm-item.php',
                type: 'post',
                data: {
                    'removeconfirmitem': 1,
                    'cartitemconfirm': cartitemconfirm,
                },
                success: function(response) {
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    location.reload();
                }

            });
        }
    });
});