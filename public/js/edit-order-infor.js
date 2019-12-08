$('document').ready(function() {

    $(".cart-edit-btn").click(function() {

        $(this).closest("div").find("input").attr("readonly", false);
        $(this).closest("div").find("input").css('background-color', '#a5a5a5');
        $(this).find("i").removeClass("fa-edit");
        $(this).find("i").addClass("fa-save");

        $(this).attr("data-original-title", "Save");

        $(this).removeClass("cart-edit-btn");
        $(this).addClass('cart-save-btn');
        $(".cart-save-btn").click(function() {
            
            var firstname = $('.firstname').val();
            var lastname = $('.lastname').val();
            var address = $('.address').val();
            var email = $('.email').val();
            var phonenumber = $('.phone-number').val();
            $.ajax({
                url: 'pages/changeprofile.php',
                type: 'post',
                data: {
                    'change-profile-2': 1,
                    'firstname': firstname,
                    'lastname': lastname,
                    'address': address,
                    'email': email,
                    'phonenumber': phonenumber,
                },
                success: function(response) {
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                      }
                    location.reload();
                   

                }

            });
        });
    });

});