<?php
session_start();

include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$id = $_POST['idPenjahit'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$bank = $_POST['bank'];
$alamat = $_POST['alamat'];
$rekening = $_POST['rekening'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$hargaMinimal = $_POST['hargaMinimal'];
$kuotaPesanan = $_POST['kuotaPesanan'];
$statusAktif = $_POST['statusAktif'];
$deskripsi = $_POST['deskripsi'];


$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

if($statusAktif=="0"){
    $queryNonAktif = mysqli_query($koneksi, "UPDATE tbl_penjahit SET statusAktif='0' WHERE idPenjahit= '$id'");
    echo "<script>alert('Akun Anda berhasil dinon-aktifkan, masuk untuk mengaktifkan kembali'); window.location='$admin_url'+'logout.php';</script>";
}else{
    if ($nama_file!='') {
       
      $path = "../../upload/" . $nama_file;
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $querySimpan = mysqli_query($koneksi, "UPDATE tbl_penjahit 
                    SET username='$username', 
                    nama='$nama',
                    alamat='$alamat',
                    idKecamatan='$kecamatan',
                    idKelurahan='$kelurahan',
                    nohp='$nohp',
                    email='$email',
                    deskripsi='$deskripsi',
                    kodeBank='$bank',
                    rekening='$rekening',
                    foto='$nama_file',
                    hargaMinimal='$hargaMinimal',
                    kuotaPesanan='$kuotaPesanan' WHERE idPenjahit = '$id'");
                    echo "<script>alert('Profil berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=profilPenjahit';</script>";
                } else {
                    echo "<script>alert('Profil Gagal diubah'); window.location= '$admin_url'+'adminweb.php?module=profilPenjahit';</script>";
                }
            } else {
                echo "<script>alert('Profil Gagal diubah, Ukuran melebihi 1Mb'); window.location='$admin_url'+'adminweb.php?module=profilPenjahit';</script>";
            }
        } else {
            echo "<script>alert('Profil Gagal diubah, Format tidak didukung'); window.location= '$admin_url'+'adminweb.php?module=profilPenjahit';</script>";
        }
    } else {
        $querySimpan = mysqli_query($koneksi, "UPDATE tbl_penjahit 
                    SET username='$username', 
                    nama='$nama',
                    alamat='$alamat',
                    idKecamatan='$kecamatan',
                    idKelurahan='$kelurahan',
                    nohp='$nohp',
                    email='$email',
                    deskripsi='$deskripsi',
                    kodeBank='$bank',
                    rekening='$rekening',
                    hargaMinimal='$hargaMinimal',
                    kuotaPesanan='$kuotaPesanan' WHERE idPenjahit = '$id'");

        if ($querySimpan) {
            echo "<script>alert('Profil berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=profilPenjahit';</script>";
        } else {
            echo "<script>alert('Profil diubah'); window.location= '$admin_url'+'adminweb.php?module=profilPenjahit';</script>";
        }
    }
}
