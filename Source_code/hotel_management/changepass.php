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
    $pass = $_POST["pass"];
    $query = "UPDATE customers SET password = '{$pass}' WHERE customer_id = {$id};";
    $rs = mysqli_query($conn, $query);
    if (!$rs) {
        die('Error: ' . mysqli_error($conn));
    } else {
        echo '<span align="center" style="color:blue">change password sucessfull</span>';
    }
endif;
global $conn;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hotel Booking</title>
    </head>
    <body>
        <form align="center" method="post">
            <table class="border border-hover" > 
                <tr>
                    <td align="right">Email:</td>
                    <td>
                        <input name="email" value="<?= $fields['email'] ?>"> 
                    </td>
                </tr>
                <tr>
                    <td align="right">New Password:</td>
                    <td>
                        <input name="pass" type="password"> 
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td>
                        <input type="submit" name="btnOK" value="Change Pass">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
