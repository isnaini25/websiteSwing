<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaKurir'];
    $id = $_POST['idKurir'];
	

	if($nama=="") {
		echo "<script>alert('Nama Kurir harus diisi'); window.location= '$admin_url'+'adminweb.php?module=ubahKurir;</script>";
	}else{  
	$queryUbah = mysqli_query($koneksi,"UPDATE tbl_kurir SET namaKurir = '$nama' WHERE idKurir = '$id'");

		if($queryUbah){
			echo "<script>alert ('Data Kurir berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=kurir';</script>";
		}else{
			echo "<script>alert ('Data Kurir gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=ubahKurir';</script>";
		}
	}	

?>
