<?php

session_start();
include "lib/config.php";
include "lib/koneksi.php";
$idPesanan = $_POST['idPesanan'];
$bahan = $_POST['bahan'];


if ($bahan=='Y') {
    $jasa = $_POST['jasa'];
    $query = mysqli_query($koneksi, "UPDATE tbl_pesanan SET kurirKirim = '$jasa' ,cek=0,timestamp = current_timestamp WHERE idPesanan = '$idPesanan' ");

    if ($query) {
        header('location:orderConfirmed.php?id='.$idPesanan);
    }
}else {
    $queryTerima = mysqli_query($koneksi, "UPDATE tbl_pesanan SET bahan = 'B' ,cek=0,timestamp = current_timestamp WHERE idPesanan = '$idPesanan' ");

    if ($queryTerima) {
        header('location:orderConfirmed.php?id='.$idPesanan);
    }
}  


?>