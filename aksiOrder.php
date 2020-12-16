<?php

include "lib/config.php";
include "lib/koneksi.php";


$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$idPenjahit = $_POST['idPenjahit'];
$idPelanggan = $_POST['idPelanggan'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$jenis = $_POST['jenis'];
$ukuran = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];
$status = 'B';
//cek angka 
if (is_numeric($jumlah) != 1) {
    //echo "<script>alert('Masukkan jumlah angka!'); window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
}

//cek katalog
if (!empty($_POST['idKatalog'])) {
    $idKatalog = $_POST['idKatalog'];
} else {
    $idKatalog = '';
}

//ID Pesanan
$kueri = mysqli_query($koneksi, "SELECT RIGHT((SELECT MAX(idPesanan)FROM tbl_pesanan where idPelanggan='$idPelanggan'), 3) as lastID");

$res = mysqli_fetch_assoc($kueri);
$number = (int)$res['lastID'];
if ($idPelanggan < 10) {
    if ($number <= 9) {
        $noPesanan = "00" . strval($number + 1);
    } else if ($number >= 10 && $number < 100) {
        $noPesanan = "0" . strval($number + 1);
    } else {
        $noPesanan = strval($number + 1);
    }
    $idPesanan = "P0" . $idPelanggan . $noPesanan;
} else {
    if ($number <= 9) {
        $noPesanan = "00" . strval($number + 1);
    } else if ($number >= 10 && $number < 100) {
        $noPesanan = "0" . strval($number + 1);
    } else {
        $noPesanan = strval($number + 1);
    }
    $idPesanan = "P" . $idPelanggan . $noKatalog;
}


if ($nama_file!='') {
    $path = "admin/upload/" . $nama_file;
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
        if ($ukuran_file <= 1000000) {
            if (move_uploaded_file($tmp_file, $path)) {
               
                $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pesanan 
                 (idPesanan,idPelanggan, idPenjahit, idKatalog, idKategori,deskripsi,fotoReferensi, jenisKelamin, idUkuran, jumlah,statusPesanan) 
                    VALUES ('$idPesanan', '$idPelanggan', '$idPenjahit','$idKatalog','$kategori','$deskripsi','$nama_file', '$jenis', '$ukuran', '$jumlah', '$status' )");
                if ($querySimpan) {
                    echo "<script>alert('Pesanan berhasil masuk'); window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
                }else{
                    //echo $idPesanan."<br>".$idPelanggan."<br>".$idPenjahit."<br>".$idKatalog."<br>".$kategori."<br>".$deskripsi."<br>".$nama_file."<br>".$jenis."<br>".$ukuran."<br>".$jumlah."<br>".$status;
                
                    echo "<script>alert('Pesanan gagal');window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
                }
            } else {
                echo "<script>alert('Pesanan gagal');window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
            }
        } else {
            echo "<script>alert('Data gambar pesanan gagal dimasukkan, Ukuran melebihi 1Mb');window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
        }
    } else {
       echo "<script>alert('Data Gambar pesanan Gagal dimasukkan, Format tidak didukung'); window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
    }
} else {
    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pesanan 
                 (idPesanan,idPelanggan, idPenjahit, idKatalog, idKategori,deskripsi, jenisKelamin, idUkuran, jumlah,statusPesanan) 
        VALUES ('$idPesanan', '$idPelanggan', '$idPenjahit','$idKatalog','$kategori','$deskripsi', '$jenis', '$ukuran', '$jumlah', '$status' )");
    if ($querySimpan) {
        echo "<script>alert('Pesanan berhasil masuk'); window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
    } else {
        //echo $idPesanan."<br>".$idPelanggan."<br>".$idPenjahit."<br>".$idKatalog."<br>".$kategori."<br>".$deskripsi."<br>".$jenis."<br>".$ukuran."<br>".$jumlah."<br>".$status;
                
        echo "<script>alert('Pesanan gagal');window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
    }
}
