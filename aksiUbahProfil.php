<?php
session_start();

include "lib/config.php";
include "lib/koneksi.php";

$id = $_POST['idPelanggan'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$jenis = $_POST['jenis'];
$statusAktif = $_POST['status'];
$password = md5($_POST['password']);

$cari= mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE idPelanggan='$id' AND password='$password'");
$ketemu1 = mysqli_num_rows($cari);

if ($ketemu1 > 0) {
   
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

if($statusAktif=="0"){
    $queryNonAktif = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET statusAktif='0' WHERE idPelanggan= '$id'");
    echo "<script>alert('Akun Anda berhasil dinon-aktifkan, masuk untuk mengaktifkan kembali'); window.location='$base_url';</script>";
}else{
    if ($nama_file!='') {
       
      $path = "admin/upload/" . $nama_file;
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $querySimpan = mysqli_query($koneksi, "UPDATE tbl_pelanggan 
                    SET username='$username', 
                    nama='$nama',
                    alamat='$alamat',
                    id_kota='$kota',
                    id_provinsi='$provinsi',
                    nohp='$nohp',
                    email='$email',
                    alamat='$alamat',
                    jenisKelamin='$jenis',
                    foto='$nama_file'
                    WHERE idPelanggan = '$id'");
                    echo "<script>alert('Profil berhasil diubah'); window.location='profil.php';</script>";
                } else {
                    echo "<script>alert('Profil Gagal diubah'); window.location='profil.php';</script>";
                }
            } else {
                echo "<script>alert('Profil Gagal diubah, Ukuran melebihi 1Mb'); window.location='profil.php';</script>";
            }
        } else {
            echo "<script>alert('Profil Gagal diubah, Format tidak didukung'); window.location='profil.php';</script>";
        }
    } else {
        $querySimpan = mysqli_query($koneksi, "UPDATE tbl_pelanggan 
                    SET username='$username', 
                    nama='$nama',
                    alamat='$alamat',
                    id_kota='$kota',
                    id_provinsi='$provinsi',
                    nohp='$nohp',
                    email='$email',
                    jenisKelamin='$jenis'
                    WHERE idPelanggan = '$id'");

        if ($querySimpan) {
            echo "<script>alert('Profil berhasil diubah'); window.location='profil.php';</script>";
        } else {
            echo "<script>alert('Profil gagal diubah'); window.location='profil.php';</script>";
        }
    }
}
} else {
    echo "<script>alert ('Password yang Anda masukkan salah!'); window.location = 'profil.php';
    </script>";
}
