<?php

include_once './DBConnect.php';
if (isset($_GET["email"])):
    header("location:information.php");
endif;
$email = $_GET["email"];
$query = "Delete from customers where email = '{$email}'";
$rs = mysqli_query($conn, $query);
$fields = mysqli_fetch_array($rs);
global $conn;
if (!$result):
    error_clear_last();
    header("location:information.php?msgErr=nothing to delete");
else:
    header("location:information.php?msgOK=delete sucessfull");
    endif;
