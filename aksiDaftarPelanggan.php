<?php
session_start();

include "lib/config.php";
include "lib/koneksi.php";

$nama = $_POST['namaPL'];
$username = $_POST['usernamePL'];
$password = md5($_POST['passwordPL']);
$alamat = $_POST['alamatPL'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$alamat = $_POST['alamatPL'];
$nohp = $_POST['nohpPL'];
$email = $_POST['emailPL'];
$jenkel = $_POST['jenisKelamin'];
$tanggal = date("Y-m-d");



    if (!empty($_FILES['gambarPL'])) {
        $nama_file = $_FILES['gambarPL']['name'];
        $ukuran_file = $_FILES['gambarPL']['size'];
        $tipe_file = $_FILES['gambarPL']['type'];
        $tmp_file = $_FILES['gambarPL']['tmp_name'];

        $path = "admin/upload/" . $nama_file;
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pelanggan (username,password,nama,alamat,id_kota,id_provinsi,nohp,email,jenisKelamin,foto,statusAktif,tglDaftar)
                VALUES ('$username','$password','$nama','$alamat','$kota','$provinsi','$nohp','$email','$jenkel','$nama_file','1','$tanggal')");
                    echo "<script>alert('Selamat Anda berhasil mendaftar'); window.location='$base_url';</script>";
                // if ($querySimpan) {

                //     $queryLogin = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE username ='$username' AND password='$password'");
                //     $resultQuery = mysqli_num_rows($queryLogin);

                //     $result = mysqli_fetch_array($queryLogin);

                //     if ($resultQuery > 0) {
                //         session_start();

                //         $_SESSION['id_penjahit'] = $result['idPenjahit'];
                //         $_SESSION['namauser'] = $result['username'];
                //         $_SESSION['passuser'] = $result['password'];
                //         $_SESSION['level'] = 'penjahit';


                //         echo "<script> alert('Selamat Anda Sudah Terdaftar'); window.location = '$admin_url+'adminweb.php?module=homePenjahit';</script>";
                //     }
                // } else {
                //     echo "<script>alert('Anda gagal mendaftar'); window.location= '$base_url';</script>";
                // }
                } else {
                    echo "<script>alert('Anda gagal mendaftar'); window.location= '$base_url';</script>";
                }
            } else {
                echo "<script>alert('Anda gagal mendaftar, Ukuran melebihi 1Mb'); window.location='$base_url';</script>";
            }
        } else {
            echo "<script>alert('Anda gagal mendaftar, Format tidak didukung'); window.location= '$base_url';</script>";
        }
    } else {
        $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pelanggan (username,password,nama,alamat,id_kota,id_provinsi,nohp,email,jenisKelamin,statusAktif,tglDaftar)
                VALUES ('$username','$password','$nama','$alamat','$kota','$provinsi','$nohp','$email','$jenkel','1','$tanggal')");

        if ($querySimpan) {
            echo "<script>alert('Selamat Anda berhasil mendaftar'); window.location='$base_url';</script>";
        } else {
            echo "<script>alert('Anda gagal mendaftar'); window.location= '$base_url';</script>";
        }
    }


?>