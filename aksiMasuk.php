<?php
include "lib/koneksi.php";
if (!empty($_POST['usernamePj']) && !empty($pass = $_POST['passwordPj'])) {
    $username = $_POST['usernamePj'];
    $pass = md5($_POST['passwordPj']);

  
    $login1 = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE username='$username' AND password='$pass'");
    $ketemu1 = mysqli_num_rows($login1);
    $r1 = mysqli_fetch_array($login1);

    if ($ketemu1 > 0) {
        session_start();
        $update = mysqli_query($koneksi, "UPDATE tbl_penjahit SET statusAktif=1 WHERE username='$username' ");
        $_SESSION['id_penjahit'] = $r1['idPenjahit'];
        $_SESSION['namauser'] = $r1['username'];
        $_SESSION['passuser'] = $r1['password'];
        $_SESSION['level'] = 'penjahit';

        header('location:admin/adminweb.php?module=homePenjahit');
    } else {
        echo "<script>alert ('Username atau password salah'); window.location = 'masuk.php';
        </script>";
    }
}
else{
    $username = $_POST['usernamePl'];
    $pass = md5($_POST['passwordPl']);

    $login1 = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE username='$username' AND password='$pass'");
    $ketemu1 = mysqli_num_rows($login1);
    $r1 = mysqli_fetch_array($login1);

    if ($ketemu1 > 0) {
        session_start();
        $update = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET statusAktif=1 WHERE username='$username' ");
        $_SESSION['id_pelanggan'] = $r1['idPelanggan'];
        $_SESSION['namauser'] = $r1['username'];
        $_SESSION['passuser'] = $r1['password'];
        
        header('location:home.php');
    } else {
        echo "<script>alert ('Username atau password salah'); window.location = 'masuk.php';
        </script>";
    }
}
