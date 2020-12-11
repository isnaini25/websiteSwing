<?php 

include "lib/koneksi.php";
$pengirim= $_POST['nama'];
$pesan =  $_POST['saran'];




	$feedback = mysqli_query($koneksi, "INSERT INTO tbl_feedback (pengirim,pesan) VALUES ('$pengirim', '$pesan')");

if ($feedback) {
	echo "<script> alert('Terimakasih telah mengirimkan feedback kepada kami'); window.location = 'index.php';</script>";
}


?>
