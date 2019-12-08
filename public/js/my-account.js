$('document').ready(function() {
    $('.login-btn').on('click', function() {
        var username = $('.user-name').val();
        var password = $('.user-password').val();
        // proceed with form submission
        $('.account-info').empty();
        $.ajax({
            url: 'pages/login.php',
            type: 'post',
            data: {
                'login_check': 1,
                'username': username,
                'password': password,
            },
            success: function(response) {
                if (response == 'fail') {
                    $('.user-password').parent().removeClass();
                    $('.user-password').parent().addClass("login-fail");
                    $('.user-password').siblings("div").text('Username and Password is not correct');
                } else {
                    
                    window.location.href = '?page=home';
                }
            }
        });
    });
    
});