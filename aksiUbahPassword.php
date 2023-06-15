<?php
session_start();

include "lib/config.php";
include "lib/koneksi.php";

$id = $_POST['idPelanggan'];

$newpassword = md5($_POST['newpassword']);
$oldpassword = md5($_POST['oldpassword']);
$cari = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE idPelanggan='$id' AND password='$oldpassword'");
$ketemu1 = mysqli_num_rows($cari);

if ($ketemu1 > 0) {
    $querySimpan = mysqli_query($koneksi, "UPDATE tbl_pelanggan 
                    SET password = '$newpassword'
                    WHERE idPelanggan = '$id'");
    if($querySimpan)
    {
        echo "<script>alert('Kata sandi berhasil diubah'); window.location='passwordChanged.php';</script>";
    }
} else {
    echo "<script>alert ('Kata sandi yang Anda masukkan salah!'); window.location = 'passwordChanged.php';
    </script>";
}
