<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "swing";

$koneksi = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_errno()){
	echo "Failde to connect to MySQL : ". mysqli_connect_error();
	exit();
}

 ?>