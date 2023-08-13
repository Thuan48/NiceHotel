<!DOCTYPE html>
<?php
#1.
include_once './DBConnect.php';
#2.get code
if (!isset($_GET['isbn'])):
    header("location:rooms.php");
endif;
$isbn = $_GET['isbn'];
#3.Execute query
$query = "select * from rooms where room_id='{$isbn}'";
$rs = mysqli_query($conn, $query);
$fields= mysqli_fetch_array($rs);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
        <title></title>
    </head>
    <body class="container">
        <h2>Account Details</h2>
        <form>
            <table class="table table-bordered table-hover">
            <tr>
                <th>Room Number</th>
                <th>image</th>
                <th>Max Occupancy</th>
                <th>Is Available</th>
                <th>Rate</th>
                <Th>description</Th>
            </tr>
                    <tr>
                        <td><?= $fields[1] ?></td>
                        <td><?= $fields[2] ?></td>
                        <td><?= $fields[3] ?></td> 
                        <td><?= $fields[4] ?></td>
                        <td><?= $fields[5] ?></td>
                        <td><?= $fields[6] ?></td>
                        <td>
                            <a href="Index.php">home page ...</a>
                        </td>
                    </tr>
        </table>
        </form>

    </body>
</html>