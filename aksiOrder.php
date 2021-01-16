<?php

include "lib/config.php";
include "lib/koneksi.php";

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$namaPenjahit = $_POST['namaPenjahit'];
$idPenjahit = $_POST['idPenjahit'];
$idPelanggan = $_POST['idPelanggan'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$jenis = $_POST['jenis'];
$ukuranBaju = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];
$bahan = $_POST['bahan'];
$status = 'MK';
$tglOrder = date("Y-m-d");

//cek angka 
if (is_numeric($jumlah) != 1) {
    echo "<script>alert('Masukkan jumlah angka!'); window.location= 'profilPenjahit.php?id=$idPenjahit';</script>";
}



//ID Pesanan
$kueri = mysqli_query($koneksi, "SELECT RIGHT((SELECT MAX(idPesanan)FROM tbl_pesanan where idPelanggan='$idPelanggan'), 3) as lastID");

$res = mysqli_fetch_assoc($kueri);
$number = (int)$res['lastID'];


    if ($number < 9) {
        $noPesanan = "00" . strval($number + 1);
    } else if ($number >= 9 && $number < 100) {
        $noPesanan = "0" . strval($number + 1);
    } else {
        $noPesanan = strval($number + 1);
    }
    

if ($idPelanggan < 10) {
    $idPesanan = "P0" . $idPelanggan . $noPesanan;
} else {
    $idPesanan = "P" . $idPelanggan . $noKatalog;
}


//echo $number."-".$idPesanan; exit();
if ($nama_file!='') {
    for ($i=0; $i < count($nama_file); $i++) {
        $nama = $nama_file[$i];
        $ukuran = $ukuran_file[$i];
        $tmp_item = $tmp_file[$i];
       
        $path = "admin/upload/" . $nama;
        if ($ukuran <= 1000000) {
            if (move_uploaded_file($tmp_item, $path)) {
                $queryItem = mysqli_query($koneksi, "INSERT INTO tbl_itemFoto (idPesanan,foto) VALUES ('$idPesanan','$nama')");
               
            } else {
              echo "<script>alert('Pesanan gagal');window.location= 'order.php?id=$idPenjahit'+'&nama=$namaPenjahit';</script>";
            }
        } else {
            echo "<script>alert('Data gambar pesanan gagal dimasukkan, Ukuran melebihi 1Mb');window.location= 'order.php?id=$idPenjahit'+'&nama=$namaPenjahit';</script>";
        }
    } 
    
} 

//cek katalog
if (!empty($_POST['idKatalog'])) {
    $idKatalog = $_POST['idKatalog'];
    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pesanan 
    (idPesanan,idPelanggan, idPenjahit, idKatalog, idKategori,deskripsi, jenisKelamin, idUkuran, jumlah,bahan, tglOrder,statusPesanan,idKurir) 
   VALUES ('$idPesanan', '$idPelanggan', '$idPenjahit','$idKatalog','$kategori','$deskripsi', '$jenis', '$ukuranBaju', '$jumlah','$bahan','$tglOrder', '$status' , NULL)");
} else {
    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pesanan 
    (idPesanan,idPelanggan, idPenjahit, idKatalog, idKategori,deskripsi, jenisKelamin, idUkuran, jumlah,bahan, tglOrder,statusPesanan, idKurir) 
   VALUES ('$idPesanan', '$idPelanggan', '$idPenjahit',NULL,'$kategori','$deskripsi', '$jenis', '$ukuranBaju', '$jumlah','$bahan','$tglOrder', '$status' , NULL)");
}



if ($querySimpan) {
    echo "<script>alert('Pesanan berhasil masuk'); window.location= 'orderConfirmed.php?id=$idPesanan';</script>";
} else {
  echo "<script>alert('Pesanan gagal');window.location= 'order.php?id=$idPenjahit'+'&nama=$namaPenjahit ';</script>";
}
