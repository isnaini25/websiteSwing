<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaUkuran'];
    $id = $_POST['idNamaUkuran'];
	

	if($nama=="") {
		echo "<script>alert('Nama ukuran diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahNamaUkuran';</script>";
	}else{  
	$queryUbah = mysqli_query($koneksi,"UPDATE tbl_itemNamaUkuran SET namaUkuran = '$nama' WHERE idItemNamaUkuran = '$id'");

		if($queryUbah){
			echo "<script>alert ('Data item nama ukuran berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=namaUkuran';</script>";
		}else{
			echo "<script>alert ('Data item nama ukuran  gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=ubahNamaUkuran';</script>";
		}
	}	

?>
