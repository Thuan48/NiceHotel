<!DOCTYPE html>
<?php
include './DBConnect.php';
if (!isset($_GET["id"])):
    echo 'nothing to change';
endif;
$id = $_GET["id"];
$query = "select * from customers where customer_id = {$id}";
$rs = mysqli_query($conn, $query);
$fields = mysqli_fetch_array($rs);

if (isset($_POST['btnOK'])):
    $pass = $_POST["newpass"];
    $password = $_POST["pass"];
    $compass=$_POST["compass"];
    if ($password != $fields['password']) {
        echo'<span align="center" style="color:red">Error password!</span>';
    } else if($compass!=$pass){
        echo'<span align="center" style="color:red">comfirm password not same!</span>';
    }else{
        $query = "UPDATE customers SET password = '{$pass}' WHERE customer_id = {$id};";
        $rs = mysqli_query($conn, $query);
        if (!$rs) {
            die('Error: ' . mysqli_error($conn));
        } else {
            echo '<span align="center" style="color:blue">change password sucessfull</span>';
        }
    }
endif;
global $conn;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotel Booking</title>
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"/>
    </head>
    <body>
        <form  method="post">
            <table class="border border-hover" align="center"> 
                <tr>
                    <td align="right">Email:</td>
                    <td>
                        <input name="email" value="<?= $fields['email'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td align="right">Password:</td>
                    <td>
                        <input name="pass" type="password"> 
                    </td> 
                </tr>  
                <tr>
                    <td align="right">New Password:</td>
                    <td>
                        <input name="newpass" type="password"> 
                    </td> 
                </tr>
                <tr>
                    <td align="right">Comfirm Password:</td>
                    <td>
                        <input name="compass" type="password"> 
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td>
                        <input type="submit" name="btnOK" value="Change Pass" style="background-color: #169b6b">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
