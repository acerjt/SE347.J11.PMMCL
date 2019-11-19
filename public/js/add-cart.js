$('document').ready(function() {
    $('.add-cart').on('click', function() {
        var nameproduct = $('.name-product').val();

        // proceed with form submission
        $.ajax({
            url: 'inc/header.php',
            type: 'post',
            data: {
                'nameproduct': nameproduct,
            },
            success: function(response) {
                $('.list-cart').append('<li><div class="cart-img"><img class="prod-img').append($('.primary-img-1')).append('<div class="cart-details"><a href="#">').append($('.name-product')).append('</a></div></li>');


                // $('.user-password').parent().addClass("login-fail");
                // $('.user-password').siblings("div").text('Username and Password is not correct');
            }

        });
    });
});