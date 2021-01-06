<?php
session_start();
include "lib/config.php";
include "lib/koneksi.php";
$idPesanan = $_POST['idPesanan'];
if(!isset($_POST['kurirDetail'])|| !isset($_POST['biayaKirim'])){
    echo "<script>alert ('Pilih kurir terlebih dahulu'); window.location = 'orderConfirmed.php?id=$idPesanan';
    </script>";
}else{
    $idKurir = $_POST['kurir'];
    $detailKurir = $_POST['kurirDetail'];
    $metode = $_POST['metodeBayar'];
    $ongkir = $_POST['biayaKirim'];
    
    $queryBayar = mysqli_query($koneksi, "UPDATE tbl_pembayaran SET biayaKirim = '$ongkir', idMetodeBayar = '$metode', statusBayar='B' WHERE idPesanan = '$idPesanan' ");
    $queryPesan = mysqli_query($koneksi, "UPDATE tbl_pesanan SET idKurir = '$idKurir', detailKurir = '$detailKurir',statusPesanan='MB'  WHERE idPesanan = '$idPesanan' ");

    if($queryBayar&&$queryPesan){
        header('location:pembayaran.php?idPesanan='.$idPesanan);
    }
    
}

?>