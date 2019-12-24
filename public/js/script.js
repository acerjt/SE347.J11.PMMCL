$('document').ready(function() {

    var username_state = false;
    var email_state = false;
    var required_state = false;
    $('.user-name').on('blur', function() {
        var username = $('.user-name').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: 'pages/register.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username,
            },
            success: function(response) {
                if (response == 'taken') {
                    username_state = false;
                    $('.username-message').html('Sorry... Username already taken').css('color', 'red');

                } else if (response == 'not_taken') {
                    username_state = true;
                    $('.username-message').html('Username available').css('color', 'green');


                }
            }
        });
    });
    $('.user-email').on('blur', function() {
        var email = $('.user-email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: 'pages/register.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email,
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $('.email-message').html('Sorry... Email already taken').css('color', 'red');

                } else if (response == 'not_taken') {
                    email_state = true;
                    $('.email-message').html('Email Available').css('color', 'green');
                }
            }
        });
    });

    $('.reg-btn').on('click', function() {
        var username = $('.user-name').val();
        var email = $('.user-email').val();
        var password = $('.user-password').val();
        var firstname = $('.firstname').val();
        var lastname = $('.lastname').val();
        var phonenumber = $('.phonenumber').val();
        var province = $('.province-value').val();
        var district = $('.district-value').val();
        var ward = $('.ward-value').val();
        var p = $('.province-group').val();
        var d = $('.district-group').val();
        var w = $('.ward-group').val();
        if (username == '' ||
            email == '' ||
            password == '' ||
            firstname == '' ||
            lastname == '' ||
            phonenumber == '' ||
            province == '' ||
            district == '' ||
            ward == ''
        ) {
            required_state = false;
        } else {
            required_state = true;
        }







        // 
        if (username_state == false || email_state == false || required_state == false) {
            $('#error_msg').text('Fix the errors in the form first');
        } else {
            // proceed with form submission
            $.ajax({
                url: 'pages/register.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': username,
                    'password': password,
                    'firstname': firstname,
                    'lastname': lastname,
                    'phonenumber': phonenumber,
                    'province': province,
                    'district': district,
                    'ward': ward,
                    'p':p,
                    'd':d,
                    'w':w,
                },
                success: function(response) {
                    if (response == 'Fail!')
                        alert('Đăng kí không thành công')
                    else {
                        $.ajax({
                            url: 'pages/login_perform.php',
                            type: 'post',
                            data: {
                                'login_check': 1,
                                'username': username,
                                'password': password,
                            },
                            success: function(response) {
                                if (response == 'success') {
                                    alert('Đăng kí thành công');
                                    window.location.href = '?page=home';
                                }
                            }
                        });
                    }
                }
            });
        }
    });
    
});