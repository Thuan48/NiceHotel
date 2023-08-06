<!DOCTYPE html>
<?php
include './DBConnect.php';
global $conn;
?>
<html>
    <head >
        <title>Hotel Booking</title>   
        <meta charset="utf-8">  
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="./style.css">
        <link rel="stylesheet" type="text/css" href="./css/color/color.css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- Primary Page Layout
        ================================================== -->
        <div class="section background-dark over-hide">
            <div class="form-center-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8 col-sm-6">							
                            <div class="login" method="get">                          
                                <?php
                                if ($_POST) {
                                    $email = $_POST['email'];
                                    $password = $_POST['pass'];
                                    $result = mysqli_query($conn, "SELECT * from Customers where email='$email' and password='$password'");
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        $_SESSION['login'] = $row['last_name'];
                                        $_SESSION['ua'] = $row['role'];
                                        $_SESSION['id'] = $row['customer_id'];
                                        header("Location:index.php");
                                    } else {
                                        echo '<p style="color:red">Username or password is incorrect!</p>';
                                    }
                                }
                                ?>							
                                <form class="login" action="" method="post">
                                    <div class="text-center">
                                        <h1 class="text-center mb-4">Login</h1>
                                    </div>
                                    <div class="login-input">
                                        <input type="text" id="email" name="email" aria-describedby="emailHelp" required>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="login-input">
                                        <input type="Password" id="password" name="pass"required>
                                        <label for="password">Password</label>
                                    </div>
                                    <button type="submit"class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <div  class="text-center col-6 col-sm-4 col-lg-12 mb-3">
                                    <a class="account-help" href=""></a>
                                    <a class="account-help" href="register.php">Create a new account</a>
                                </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slideshow">
                <div class="slide">
                    <figure class="slide__figure">
                        <div class="slide__figure-inner">
                            <div class="slide__figure-img" style="background-image: url(./img/home-background.jpg)" width="100%" height="300px"></div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </body>
</html>
