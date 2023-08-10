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
                                    $fname = $_POST['fname'];
                                    $lname = $_POST['lname'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $password = $_POST['pass'];
                                    $result = mysqli_query($conn, "insert into customers(first_name,last_name,email,phone_number,password) "
                                            . " values('{$fname}','{$lname}','{$email}','{$phone}','{$password}')");
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        header("Location:login.php");
                                    } else {
                                        echo '<p style="color:red">Registration failed!</p>';
                                    }
                                }
                                ?>
                                <form class="login" action="" method="post">
                                    <div class="text-center">
                                        <h1 class="text-center mb-4">Register</h1>
                                    </div>
                                <div class="login-input">
                                    <input type="text" id="username" name="fname" required>
                                    <label for="username">First Name</label>
                                </div>
                                <div class="login-input">
                                    <input type="text" id="username" name="lname" required>
                                    <label for="username">Last Name</label>
                                </div>
                                <div class="login-input">
                                    <input type="email" id="email" name="email" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="login-input">
                                    <input type="Password" id="password" name="pass" required>
                                    <label for="password">Password</label>
                                </div>

                                <div class="login-input">
                                    <input type="Password" id="comfirm-password" required>
                                    <label for="comfirm-password">Comfirm password</label>
                                </div>

                                <div class="login-input">
                                    <input type="text" id="phone-number" name="phone" required>
                                    <label for="phone-number">Phone number</label>
                                </div>
                                <button type="submit"class="btn btn-primary btn-user btn-block">
                                        Submit
                                </button>
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
                            <div class="slide__figure-img" style="background-image: url(./img/home-background.jpg)"></div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </body>
</html>
