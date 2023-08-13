<!DOCTYPE html>
<?php
include_once './DBConnect.php';

#4. Execute query
$query = "select * from rooms";
$rs = mysqli_query($conn, $query);
$count = mysqli_num_rows($rs);

if (isset($_GET['btnSearch'])):
    $search = $_GET['txtSearch'];
    $query = "select * from Customers where Title like '%{$search}%'";
    $rs = mysqli_query($conn, $query);
    $count = mysqli_num_rows($rs);
endif;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
        <title>Account</title>
    </head>
    <body class="container">
        <div>
            <h1 style="color:red">Room</h1>
        <div style="padding: 20px 0px; text-align:left">
            <a href="Create.php">Create New</a>
        </div>
        
        
        </div>
        <table class="table table-bordered table-hover">
            <tr>
                <th>Room Number</th>
                <th>image</th>
                <th>Max Occupancy</th>
                <th>Is Available</th>
                <th>Rate</th>
                <Th>description</Th>
            </tr>
            <?php
            if ($count == 0):
                echo 'Record not found!';
            else:
                while ($fields = mysqli_fetch_array($rs)):
                    ?>
                    <tr>
                        <td><?= $fields[1] ?></td>
                        <td><?= $fields[2] ?></td>
                        <td><?= $fields[3] ?></td> 
                        <td><?= $fields[4] ?></td>
                        <td><?= $fields[5] ?></td> 
                        <td><?= $fields[6] ?></td> 
                        <td>
                            <a href="detailroom.php?isbn=<?= $fields[0] ?>">View</a>
                        </td>
                    </tr>
                    <?php
                endwhile;
            endif;
            ?>
        </table>
    </body>
</html>