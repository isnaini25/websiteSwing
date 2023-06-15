<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";


	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	$nama= $_POST['namaKatalog'];
	$deskripsi = $_POST['deskripsi'];
	$idPenjahit = $_SESSION['id_penjahit'];
	
	
	
		$kueri = mysqli_query($koneksi, "SELECT RIGHT((SELECT MAX(idKatalog)FROM tbl_katalog where idPenjahit='$idPenjahit'), 3) as lastID");
        
		$res = mysqli_fetch_assoc ($kueri);
		$number = (int)$res['lastID'];
	if($idPenjahit<10){
		if($number<=9){
			$noKatalog = "00".strval($number+1);
		}else if($number>=10 && $number<100){
			$noKatalog = "0".strval($number+1);
		}else{
			$noKatalog = strval($number+1);
		}
		$IDKatalog = "K0".$idPenjahit.$noKatalog;
		
	}else{
		if($number<=9){
			$noKatalog = "00".strval($number+1);
		}else if($number>=10 && $number<100){
			$noKatalog = "0".strval($number+1);
		}else{
			$noKatalog = strval($number+1);
		}
		$IDKatalog = "K".$idPenjahit.$noKatalog;
	}
	

	if($nama==""||$deskripsi=="") {
		echo "<script>alert('Nama Katalog dan Deskripsi harus diisi'); window.location= '$admin_url'+'adminweb.php?module=tambahKatalog';</script>";
	}else{  
		$path = "../../upload/".$nama_file;
		if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
			if ($ukuran_file <= 1000000) {
				if (move_uploaded_file($tmp_file, $path)) {
					$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_katalog (idKatalog,idPenjahit, namaKatalog, foto, deskripsi) 
						VALUES ('$IDKatalog','$idPenjahit','$nama','$nama_file','$deskripsi' )" );
					echo "<script>alert('Data katalog berhasil masuk'); window.location='$admin_url'+ 'adminweb.php?module=tambahKatalog';</script>";
				}else{
					echo "<script>alert('katalog Gagal Dimasukkan'); window.location= '$admin_url'+ 'adminweb.php?module=tambahKatalog';</script>";
				}
			}else{
				echo "<script>alert('Data Gambar katalog Gagal dimasukkan, Ukuran melebihi 1Mb'); window.location= '$admin_url'+'adminweb.php?module=tambahKatalog';</script>";
			}
		}else{
			echo "<script>alert('Data Gambar katalog Gagal dimasukkan, Format tidak didukung'); window.location= '$admin_url'+'adminweb.php?module=tambahKatalog';</script>";
		}
	}	

?>

