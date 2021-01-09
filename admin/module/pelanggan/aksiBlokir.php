<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	
    $idPelanggan = $_GET['id'];
    $idPenjahit = $_SESSION['id_penjahit'];
    $status = $_GET['status'];
	

    if ($status=='blokir') {
        $queryBlokir = mysqli_query($koneksi, "INSERT INTO tbl_blokir (idPelanggan,idPenjahit) VALUES ('$idPelanggan','$idPenjahit')");

        if ($queryBlokir) {
            echo "<script>alert ('Pelanggan berhasil diblokir'); window.location =  '$admin_url'+'adminweb.php?module=lihatPelanggan';</script>";
        } else {
            echo "<script>alert ('Pelanggan gagal diblokir'); window.location =   '$admin_url'+'adminweb.php?module=lihatPelanggan';</script>";
        }
    }else{
        $queryBlokir = mysqli_query($koneksi, "DELETE FROM tbl_blokir WHERE idPelanggan = '$idPelanggan' AND idPenjahit = '$idPenjahit'");

        if ($queryBlokir) {
            echo "<script>alert ('Blokir berhasil dibuka'); window.location =  '$admin_url'+'adminweb.php?module=lihatPelanggan';</script>";
        } else {
            echo "<script>alert ('Blokir gagal dibuka'); window.location =   '$admin_url'+'adminweb.php?module=lihatPelanggan';</script>";
        }
    }

?>
