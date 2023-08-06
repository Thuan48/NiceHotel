
<?php 
session_start();
#1. Database Information
$server = "localhost:3307";
$account = "root";
$pass = "";
$database ="hotel_management";

#2.Database connection String
$conn = mysqli_connect($server,$account,$pass,$database);

#3.test connection
//if (!$conn):
//  die ('Connection fails');
//   else:
//   die ('Congretulation');
//endif;

