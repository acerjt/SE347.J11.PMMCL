<!doctype html>
<html class="no-js" lang="">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact || James </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

        <!-- Google Fonts
        ============================================ -->
        <link href='../../../fonts.googleapis.com/cssc9f6.css?family=Norican' rel='stylesheet' type='text/css'>
        <link href='../../../fonts.googleapis.com/csse3e5.css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='../../../fonts.googleapis.com/css4c5c.css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
        <!-- meanmenu CSS
        ============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- nivoslider CSS
        ============================================ -->
        <link rel="stylesheet" href="lib/css/nivo-slider.css">
        <link rel="stylesheet" href="lib/css/preview.css">
        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- magic CSS
        ============================================ -->
        <link rel="stylesheet" href="css/magic.css">
        <!-- normalize CSS
        ============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="css/main.css">
        <!-- style CSS
        ============================================ -->
        <!-- <link rel="stylesheet" href="style.css"> -->
        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS
        ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
       
        <!-- contact area start -->
        <div class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="?page=home" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> contact</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                 
                    <div class="col-sm-9">
                        <div class="contact-info">
                            <div id="googleMap"></div>
                            <div class="contact-details">
                                <div class="contact-title">
                                    <h3>contact us</h3>
                                </div>
                                <div class="contact-form">
                                    <div class="form-title">
                                        <h4>contact information</h4>
                                    </div>
                                    <form class="form-content" method="post" action="pages/contact_perform.php" name="form1" >
                                        <ul>
                                            <li>
                                                <div class="form-box">
                                                    <div class="form-name">
                                                        <label>Name <em>*</em> </label>
                                                        <input id="name" type="text" name="name"  required>
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-box">
                                                    <div class="form-name">
                                                        <label>Email <em>*</em> </label>
                                                        <input type="email" name="email"  required>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-box">
                                                    <div class="form-name">
                                                        <label>Phone number  <em>*</em></label>
                                                        <input type="text" maxlength="10" name="phone_number" required>
                                                    </div>
                                                </div>
                                                <div class="form-box">
                                                    <div class="form-name">
                                                        <label>Subject  <em>*</em></label>
                                                        <input type="text"  name="subject" required>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-box">
                                                    <div class="form-name">
                                                        <label>Comment <em>*</em> </label>
                                                        <textarea cols="5" rows="3" name="content" required ></textarea>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <input type="hidden" value="1" name="contact">
                                        <div class="buttons-set">
                                    <p> <em>*</em> Required Fields</p>
                                  
                                    <button type="submit"  >submit</button>
                                </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
       

        <!-- jquery
        ============================================ -->
        <script src="js/vendor/jquery-1.12.1.min.js"></script>
        <!-- bootstrap JS
        ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
        ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
        ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- nivoslider JS
        ============================================ -->
        <script src="lib/js/jquery.nivo.slider.js"></script>
        <script src="lib/home.js"></script>
        <!-- meanmenu JS
        ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
        ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- elevatezoom JS
        ============================================ -->
        <script src="js/jquery.elevatezoom.js"></script>
        <!-- scrollUp JS
        ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- plugins JS
        ============================================ -->
        <script src="js/plugins.js"></script>

        <!-- google map
        ============================================ -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgzm_dOzG-Hnrt95J-FOVJGm1uSGxkHnA"></script>
        <script>
            function initialize() {
                var mapOptions = {
                    zoom: 15,
                    scrollwheel: false,
                    center: new google.maps.LatLng(10.870281,106.7972509)
                };

                var map = new google.maps.Map(document.getElementById('googleMap'),
                                              mapOptions);


                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    animation:google.maps.Animation.BOUNCE,
                    icon: 'img/contact/map-marker.png',
                    map: map
                });

            }
            function myFunction() {
                var name = document.forms["form1"]["name"].value;
                var email = document.forms["form1"]["email"].value;
                var phone_number = document.forms["form1"]["phone_number"].value;
                var comment = document.forms["form1"]["comment"].value;
                if (name == "" ||email == "" ||phone_number == "" ||comment == "" )
                {
                    alert("Please fill out the blank fill");
                   // document.forms["form1"]["text1"].style.border: "solid 1px #8AAFE1";
                   return false;
                }
                else 
                {
                    
                confirm("Send contact imformation successfully");
                document.getElementById('name').value = '';
                }
            }
           

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

        <!-- main JS
        ============================================ -->
        <script src="js/main.js"></script>
    </body>
</html>
