<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaMetode'];
	$rekening = $_POST['rekening'];
	

	if($nama==""||$rekening=="") {
		echo "<script>alert('Nama Metode dan Rekening harus diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahMetode';</script>";
	}else{  
	$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_metodeBayar(namaMetode, rekening) VALUES ('$nama','$rekening')");

		if($querySimpan){
			echo "<script>alert ('Data metode bayar berhasil masuk'); window.location =  '$admin_url'+'adminweb.php?module=metodeBayar';</script>";
		}else{
			echo "<script>alert ('Data metode bayar gagal masuk'); window.location =   '$admin_url'+'adminweb.php?module=tambahMetode';</script>";
		}
	}	

?>
