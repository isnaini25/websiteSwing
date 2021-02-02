<?php 
$server = "sql12.freesqldatabase.com";
$username = "sql12390249";
$password = "J6pBWShhG4";
$database = "sql12390249";
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "swing";
$koneksi = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_errno()){
	echo "Failde to connect to MySQL : ". mysqli_connect_error();
	exit();
}

 ?>
