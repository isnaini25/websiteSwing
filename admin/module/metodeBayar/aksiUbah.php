<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama= $_POST['namaMetode'];
	$rekening = $_POST['rekening'];
    $id = $_POST['idMetode'];
	

	if($nama==""||$rekening=="") {
		echo "<script>alert('Nama Metode dan Rekening harus diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahMetode';</script>";
	}else{  
	$queryUbah = mysqli_query($koneksi,"UPDATE tbl_metodeBayar SET namaMetode = '$nama', rekening ='$rekening' WHERE idMetodeBayar = '$id'");

		if($queryUbah){
			echo "<script>alert ('Data metode bayar berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=metodeBayar';</script>";
		}else{
			echo "<script>alert ('Data metode bayar gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=ubahMetode';</script>";
		}
	}	

?>
