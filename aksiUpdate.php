<?php

session_start();
include "lib/config.php";
include "lib/koneksi.php";
$idPesanan = $_GET['idPesanan'];

if (isset($_GET['batal'])) {
    $queryBatal = mysqli_query($koneksi, "UPDATE tbl_pesanan SET statusPesanan = 'B' ,cek=0,timestamp = current_timestamp WHERE idPesanan = '$idPesanan' ");

    if ($queryBatal) {
        header('location:orderConfirmed.php?id='.$idPesanan);
    }
}else {
    $queryTerima = mysqli_query($koneksi, "UPDATE tbl_pesanan SET statusPesanan = 'F' ,cek=0,timestamp = current_timestamp WHERE idPesanan = '$idPesanan' ");

    if ($queryTerima) {
        header('location:history.php');
    }
}  


?>