<?php 
// $server = "sql12.freesqldatabase.com";
// $username = "sql12388197";
// $password = "k2lV7LVneh";
// $database = "sql12388197";
$server = "localhost";
$username = "root";
$password = "root";
$database = "swing";
$koneksi = mysqli_connect($server, $username, $password, $database);

if(mysqli_connect_errno()){
	echo "Failde to connect to MySQL : ". mysqli_connect_error();
	exit();
}

 ?>