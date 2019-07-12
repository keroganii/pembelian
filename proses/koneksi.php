<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_pembelian"; 

$conn=mysqli_connect($server,$username,$password);
mysqli_select_db($conn,$database);

?>
