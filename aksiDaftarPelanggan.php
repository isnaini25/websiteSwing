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

$nama_file = $_FILES['gambarPL']['name'];
$ukuran_file = $_FILES['gambarPL']['size'];
$tipe_file = $_FILES['gambarPL']['type'];
$tmp_file = $_FILES['gambarPL']['tmp_name'];

$queryCekUsername = mysqli_query($koneksi, "SELECT username from tbl_pelanggan WHERE username = '$username'");

$find = mysqli_num_rows($queryCekUsername);
echo $find;

if($find!=0){
    echo "<script>alert('Username telah terdaftar'); window.location= 'daftar.php';</script>";
}else{
    if ($nama_file!='') {
        $path = "admin/upload/" . $nama_file;
        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pelanggan (username,password,nama,alamat,id_kota,id_provinsi,nohp,email,jenisKelamin,foto,statusAktif,tglDaftar)
                VALUES ('$username','$password','$nama','$alamat','$kota','$provinsi','$nohp','$email','$jenkel','$nama_file','1','$tanggal')");
                
                    if ($querySimpan) {
                        $login1 = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE username='$username' AND password='$password'");
                        $ketemu1 = mysqli_num_rows($login1);
                        $r1 = mysqli_fetch_array($login1);

                        if ($ketemu1 > 0) {
                            $_SESSION['id_pelanggan'] = $r1['idPelanggan'];
                            $_SESSION['namauser'] = $r1['username'];
                            $_SESSION['passuser'] = $r1['password'];

                            echo "<script> alert('Selamat Anda Sudah Terdaftar'); window.location = 'home.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Anda gagal mendaftar'); window.location= 'daftar.php';</script>";
                    }
                } else {
                    echo "<script>alert('Anda gagal mendaftar'); window.location= 'daftar.php';</script>";
                }
            } else {
                echo "<script>alert('Anda gagal mendaftar, Ukuran melebihi 1Mb'); window.location='daftar.php';</script>";
            }
        } else {
            echo "<script>alert('Anda gagal mendaftar, Format tidak didukung'); window.location= 'daftar.php';</script>";
        }
    } else {
        $querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_pelanggan (username,password,nama,alamat,id_kota,id_provinsi,nohp,email,jenisKelamin,statusAktif,tglDaftar)
                VALUES ('$username','$password','$nama','$alamat','$kota','$provinsi','$nohp','$email','$jenkel','1','$tanggal')");

        if ($querySimpan) {
            echo "<script>alert('Selamat Anda berhasil mendaftar'); window.location='daftar.php';</script>";
        } else {
            echo "<script>alert('Anda gagal mendaftar'); window.location= 'daftar.php';</script>";
        }
    }
}