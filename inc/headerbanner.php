<?php
 ?>
<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-quiv="x-ua-compatible" content="ie=edge">
    <title>Home 2 || TradeZ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="public/img/favicon.ico"> 
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/bootstrap.min.css">
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/font-awesome.min.css">
        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/owl.carousel.css">
        <link rel="stylesheet" href="theme/css/owl.theme.css">
        <link rel="stylesheet" href="theme/css/owl.transitions.css">
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/jquery-ui.css">
        <!-- meanmenu CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/meanmenu.min.css">
        <!-- nivoslider CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/lib/css/nivo-slider.css">
        <link rel="stylesheet" href="theme/lib/css/preview.css">
        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/animate.css">
        <!-- magic CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/magic.css">
        <!-- normalize CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/normalize.css">
        <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/main.css">
        <!-- style CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/style.css">
        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="theme/css/responsive.css">
        <!-- modernizr JS
        ============================================ -->
        <script src="theme/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>
   
                            <!-- slider area start -->
        <div class="slider-area home1">
            <div class="bend niceties preview-2">
                <div id="nivoslider" class="slides">
                    <?php 
                        include("config/dbconfig.php");
                        $sql = "SELECT * from tbl_banner  where active = 1 limit 3";
                        $run = mysqli_query($conn, $sql);
                        $i = 0;
                        $array ='#slider-direction-';
                        $listbanner =array();
                        while ($row = mysqli_fetch_array($run)) {
                        $i++; 
                        ;?>
                         <img src="index.php/../images/banner/<?php echo $row['image']?>" alt=""title="<?php echo($array.$i);?>">
                         
                         <?php 
                         
                         $listbanner[] =  "  <div id='slider-direction-" .$i."' class='t-cn slider-direction'>
                         <div class='slider-progress'></div>
                         <div class='slider-content t-lfl s-tb slider-1'>
                             <div class='title-container s-tb-c title-compress'>
                                
                                 <h1 class='title1'>".$row['title1']."</h1>
                                 <h2 class='title2' >".$row['title2']."</h2>
                                 <h3 class='title3' >".$row['title3']."</h3>
                                 <a href='#'><span>read more</span></a>
                             </div>
                         </div>
                     </div>";
                         
                         ?>

                        
                         
                         <?php } ?>
                        
                </div>
                <?php 
                for($i=0;$i<count($listbanner);$i++)
                echo $listbanner[$i];
                
                ?>
                <!-- direction 1 -->
                <!-- <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                           
                            <h1 class="title1">Academy of sport</h1>
                            <h2 class="title2" >sports center james</h2>
                            <h3 class="title3" >Lorem Ipsum is simply dummy text of the printing</h3>
                            <a href="#"><span>read more</span></a>
                        </div>
                    </div>
                </div> -->
                <!-- direction 2 -->
                
            </div>
        </div>
            
    
</body>