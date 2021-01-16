<?php

include "lib/config.php";
include "lib/koneksi.php";
$idPesanan = $_POST['idPesanan'];

$nama_file = $_FILES['bukti']['name'];
$ukuran_file = $_FILES['bukti']['size'];
$tipe_file = $_FILES['bukti']['type'];
$tmp_file = $_FILES['bukti']['tmp_name'];
date_default_timezone_set('Asia/Jakarta');
    $waktu = date("Y-m-d H:i:s");
if ($nama_file!='') {
    $path = "admin/upload/" . $nama_file;
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                $queryBayar = mysqli_query($koneksi, "UPDATE tbl_pembayaran SET bukti = '$nama_file', tglBayar = '$waktu' WHERE idPesanan = '$idPesanan' ");
                $queryPesan = mysqli_query($koneksi, "UPDATE tbl_pesanan SET statusPesanan = 'KB' WHERE idPesanan = '$idPesanan' ");
                if ($queryBayar && $queryPesan) {
                    echo "<script>alert('Bukti pembayaran berhasil masuk! Silakan menunggu konfirmasi'); window.location= 'home.php';</script>";
                } else {
                    echo "<script>alert('Gagal'); window.location= 'pembayaran.php?idPesanan=$idPesanan;</script>";
                }
            } else {
                echo "<script>alert('Gagal'); window.location= 'pembayaran.php?idPesanan=$idPesanan';</script>";
            }
        } else {
            echo "<script>alert('Gagal ukuran melebihi 1Mb'); window.location='pembayaran.php?idPesanan=$idPesanan';</script>";
        }
    } else {
        echo "<script>alert('Gagal format tidak didukung'); window.location= 'pembayaran.php?idPesanan=$idPesanan';</script>";
    }
}