<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaUkuran'];

	

	if($nama=="") {
		echo "<script>alert('Nama ukuran harus diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahMetode';</script>";
	}else{  
	$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_itemNamaUkuran(namaUkuran) VALUES ('$nama')");

		if($querySimpan){
			echo "<script>alert ('Data nama ukuran berhasil masuk'); window.location =  '$admin_url'+'adminweb.php?module=namaUkuran';</script>";
		}else{
			echo "<script>alert ('Data nama ukuran gagal masuk'); window.location =   '$admin_url'+'adminweb.php?module=tambahNamaUkuran';</script>";
		}
	}	

?>
