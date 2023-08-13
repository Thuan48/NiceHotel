<!DOCTYPE html>
<?php
include './DBConnect.php';
?>
<html>
    <head >
        <title>Hotel Booking</title>   
        <meta charset="utf-8">  
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="./style.css">
        <!-- <link rel="stylesheet" type="text/css" href="./css/style2.css"> -->
        <link rel="stylesheet" type="text/css" href="./css/color/color.css">
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/owl.transitions.css"/>
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"/>
    </head>
    <body>
        <!-- Navbar
                ================================================= -->
        <nav id="menu-wrap" class="menu-back cbp-af-header">
            <div class="menu-top background-black">
                <div class="container">
                    <div class="row">
                        <div class="col-10 px-0 px-md-3 pl-1 py-3">
                            <span class="call-top"></span> 
                            <a href="#" class="call-top"></a>
                        </div>	
                        <div class="col-2 px-0 px-md-3 py-3" style="">                            
                            <ul id="mmn">
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                    </svg>
                                    <?php
                                    if (isset($_SESSION['login'])) {
                                        echo '<span style="color:blue">' . $_SESSION['login'] . '</span>';
                                    }
                                    ?>
                                    <ul class="mnc">
                                        <?php
                                        if (isset($_SESSION['ua'])) {
                                            if ($_SESSION['ua'] > 0 && $_SESSION['ua'] == '1') {
                                                ?>
                                                <li><a href="./information.php?email=' <?= $_SESSION['login'] ?>'" target="loadpage">account</a></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li><a href="./information.php?id=' <?= $_SESSION['id'] ?>'" target="loadpage">information</a></li>
                                                <?php
                                            }
                                        } else {
                                            echo '<li><a href="./register.php" target="loadpage">register</a></li>';
                                        }
                                        ?>

                                        <?php
                                        if (isset($_SESSION['login'])) {
                                            echo '<li><a href="./logout.php">logout</a></li>';
                                        } else {
                                            echo '<li><a href="./login.php" >login</a></li>';
                                        }
                                        ?>    
                                    </ul>
                                </li>                                
                            </ul>
                        </div>				
                    </div>	
                </div>		
            </div>
            <div class="menu">			
                <ul>
                    <li>
                        <a class="curent-page" href="./home.php" target="loadpage">home</a>					
                    </li>
                    <li>
                        <a href="./rooms.php" target="loadpage">rooms</a>
                    </li>
                    <li>
                        <a href="#">about us</a>
                    </li>
                    <li>
                        <a href="#">contact</a>
                    </li>
                    <li>
                        <a href="#"><span>My bookings</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- comment -->
        <div class="slideshow">
            <div class="slide slide--current parallax-top" id="slide-index">

                <figure class="slide__figure">
                    <div class="slide__figure-inner">
                        <div class="slide__figure-img" style="background-image: url(./1.jpg)"></div>
                        <div class="slide__figure-reveal"></div>
                    </div>
                </figure>
            </div>
            <div class="slide parallax-top">
                <figure class="slide__figure">
                    <div class="slide__figure-inner">
                        <div class="slide__figure-img" style="background-image: url(img/2.jpg)"></div>
                        <div class="slide__figure-reveal"></div>
                    </div>
                </figure>
            </div>	
        </div>
    </div>
    <!--iframe ========================================= -->
    <iframe name="loadpage" src="./home.php" width="100%" height="1600px" frameborder="0" ></iframe>
    <!-- Footer =============================== -->
    <div class="section padding-top-bottom-small background-black over-hide footer">		
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center text-md-left">
                    <img src="img/logo.png" alt="">
                    <p class="color-grey mt-4"><br></p>
                </div>
                <div class="col-md-4 text-center text-md-left">
                    <h6 class="color-white mb-3"></h6>
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                </div>
                <div class="col-md-5 mt-4 mt-md-0 text-center text-md-left logos-footer">
                    <h6 class="color-white mb-3">About us</h6>
                    <p class="color-grey mb-4"></p>
                    <img src="" alt=""  title="">
                    <img src="" alt="" title="">
                    <img src="" alt="" title="">
                </div>
            </div>	
        </div>	
    </div>

    <div class="section py-4 background-dark over-hide footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-2 mb-md-0">
                    <p>2023 © Group04.</p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>        
                    <a href="#" title="Isnstagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>	
        </div>		
    </div>

    <div class="scroll-to-top" class="bi bi-arrow-up-circle"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
</svg></div>
    <!-- JAVASCRIPT
        =================================== -->
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/plugins.js"></script>	
    <script src="js/custom.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">

