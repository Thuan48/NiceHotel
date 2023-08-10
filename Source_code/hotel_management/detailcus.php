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
        <!-- <link rel="stylesheet" type="text/css" href="./css/style2.css"> -->
        <link rel="stylesheet" type="text/css" href="./css/color/color.css">
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/owl.transitions.css"/>
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        if (!isset($_GET["id"])):
            echo 'nothing to update';
        endif;
        $id = $_GET["id"];
        $query = "select * from customers where customer_id = '{$id}'";
        $rs = mysqli_query($conn, $query);
        $fields = mysqli_fetch_array($rs);
        ?>
        <table class="table table-bodered table-hover">
            <form method="get">
                <tr>
                    <td align="right">Frist Name:</td>
                    <td>
                        <input name="fname" value="<?= $fields[1] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td align="right">Last Name:</td>
                    <td>
                        <input name="lname" value="<?= $fields[2] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td>
                        <input name ="email" value="<?= $fields[3] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td align="right">Phone:</td>
                    <td>
                        <input name ="phone" value="<?= $fields[4] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td align="right">Address:</td>
                    <td>
                        <input name ="address" value="<?= $fields[5] ?>"> 
                    </td>
                </tr>            
            </form>
        </table>
    </body>
</html>