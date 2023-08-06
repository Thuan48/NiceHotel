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
        <form>
            <table class="table table-bodered table-hover" method="post">            
                <?php
                if (isset($_SESSION['ua'])) {
                    if ($_SESSION['ua'] == '1') {
                        $result = mysqli_query($conn, "SELECT * from Customers");
                        $row = mysqli_fetch_assoc($result);
                        echo
                        '
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Pass</th>
                </tr>';
                        while ($fields = mysqli_fetch_array($result)):
                            ?>
                            <tr>
                                <td><?= $fields[1] ?></td>
                                <td><?= $fields[2] ?></td>
                                <td><?= $fields[3] ?></td>
                                <td><?= $fields[4] ?></td>
                                <td><?= $fields[5] ?></td>
                                <td><?= $fields[6] ?></td>
                                <td>
                                    <a href="deleteacc.php?email=<?= $fields[3] ?>"onclick="return confirm('are you sure to delete this record?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                        endwhile;
                    } else {
                        if (!isset($_GET["id"])):
                            header("location:index.php?msgErr= nothing to update");
                        endif;
                        $id = $_GET["id"];
                        $query = "select * from customers where customer_id = {$id}";
                        $rs = mysqli_query($conn, $query);
                        $fields = mysqli_fetch_array($rs);
                        
                        if (isset($_POST['btnOK'])):
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $pass = $_POST['pass'];
                            
                            $query = "update customers set "
                                    . "first_name ='{$fname}',last_name ='{$lname}',email = '{$email}',phone_number ='{$phone}',address ='{$address}',password='{$pass}' "
                                    . "where customer_id = {$id}";
                            $rs = mysqli_query($conn, $query);                            
                            if (!$rs):
                                error_clear_last();
                                echo 'lỗi';
                            else:
                                echo 'ok';
                            endif;
                        endif;
                        
                        ?>
                            <form method="post">
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
                        <tr>
                            <td align="right">Pass:</td>
                            <td>
                                <input name ="pass" value="<?= $fields[6] ?>" type="password"> 
                            </td>
                        </tr>
                        <tr>
                            <td align="right"></td>
                            <td>
                                <input type="submit" name="btnOK" value="Update" >
                            </td>
                        </tr>
                            </form>
                        <?php
                    }
                }
                ?>
            </table>
        </form>
    </body>
</html>