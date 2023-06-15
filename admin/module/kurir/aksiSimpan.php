<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaKurir'];
	

	if($nama=="") {
		echo "<script>alert('Nama kurir harus diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahKurir';</script>";
	}else{  
	$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_kurir(namaKurir) VALUES ('$nama')");

		if($querySimpan){
			echo "<script>alert ('Data Kurir bayar berhasil masuk'); window.location =  '$admin_url'+'adminweb.php?module=kurir';</script>";
		}else{
			echo "<script>alert ('Data Kurir bayar gagal masuk'); window.location =   '$admin_url'+'adminweb.php?module=tambahKurir';</script>";
		}
	}	

?>
