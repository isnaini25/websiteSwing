<?php
session_start();
include "lib/config.php";
include "lib/koneksi.php";
$idPesanan = $_POST['idPesanan'];
$nilai= $_POST['nilai'];
$ulasan= $_POST['ulasan'];

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
if($nilai=='' || $ulasan==''){
    echo "<script>alert('Masukkan nilai dan ulasan terlebih dahulu'); window.location='ulasan.php?idPesanan=$idPesanan';</script>";
}

if ($nama_file!='') {
    $path = "admin/upload/" . $nama_file;
    
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
                $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_ulasan (idPesanan,ulasan,nilai,fotoReview) VALUES ('$idPesanan','$ulasan','$nilai','$nama_file')");
                $queryUpdate = mysqli_query($koneksi, "UPDATE tbl_pesanan SET statusPesanan = 'U' , cek = 0, timestamp = current_timestamp WHERE idPesanan = '$idPesanan'");
                if ($querySimpan) {
                    
                        echo "<script> alert('Ulasan berhasil terkirim'); window.location = 'history.php';</script>";
                
                } else {
                   echo "<script>alert('Gagal memberi ulasan'); window.location='ulasan.php?idPesanan=$idPesanan';</script>";
                }
            } else {
                echo "<script>alert('Gagal memberi ulasan'); window.location='ulasan.php?idPesanan=$idPesanan';</script>";
            }
        } else {
            echo "<script>alert('Gagal memberi ulasan, ukuran gambar  melebihi 1Mb'); window.location='ulasan.php?idPesanan=$idPesanan';</script>";
        }
    
}else{
    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_ulasan (idPesanan,ulasan,nilai) VALUES ('$idPesanan','$ulasan','$nilai')");
    $queryUpdate = mysqli_query($koneksi, "UPDATE tbl_pesanan SET statusPesanan = 'U' , cek = 0, timestamp = current_timestamp WHERE idPesanan = '$idPesanan'");     
    if ($querySimpan) {
        
            echo "<script> alert('Ulasan berhasil terkirim'); window.location = 'history.php';</script>";
    
    } else {
        echo "<script>alert('Gagal memberi ulasan'); window.location='ulasan.php?idPesanan=$idPesanan';</script>";
    }
}


?>