<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaKategori'];
	

	if($nama=="") {
		echo "<script>alert('Nama kategori harus diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahKategori';</script>";
	}else{  
	$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_kategori(namaKategori) VALUES ('$nama')");

		if($querySimpan){
			echo "<script>alert ('Data kategori berhasil masuk'); window.location =  '$admin_url'+'adminweb.php?module=kategoriPenjahit';</script>";
		}else{
			echo "<script>alert ('Data kategori gagal masuk'); window.location =   '$admin_url'+'adminweb.php?module=tambahKategori';</script>";
		}
	}	

?>
