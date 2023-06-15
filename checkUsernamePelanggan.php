<?php
include "lib/config.php";
include "lib/koneksi.php";
$Username = $_POST['username'];
$queryCekUsername = mysqli_query($koneksi, "SELECT username from tbl_pelanggan WHERE username = '$Username'");

$find = mysqli_num_rows($queryCekUsername);
echo $find;
?>