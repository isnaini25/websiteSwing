<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $nama= $_POST['namaKategori'];
    $id = $_POST['idKategori'];
	

	if($nama=="") {
		echo "<script>alert('Nama kategori harus diisi'); window.location= '$admin_url'+'adminweb.php?module=ubahKategori';</script>";
	}else{  
	$queryUbah = mysqli_query($koneksi,"UPDATE tbl_kategori SET namaKategori = '$nama' WHERE idKategori = '$id'");

		if($queryUbah){
			echo "<script>alert ('Data kategori berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=kategoriPenjahit';</script>";
		}else{
			echo "<script>alert ('Data kategori gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=ubahKategori';</script>";
		}
	}	

?>
