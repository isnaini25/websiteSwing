<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $uname= $_POST['username'];
    $id = $_POST['idAdmin'];

    $pass = md5($_POST['oldPassword']);

    $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE idAdmin='$id' AND passwordAdmin='$pass'" );
	$ketemu = mysqli_num_rows($query);
    
    if ($ketemu>0) {
        if ($uname=="") {
            echo "<script>alert('Username harus diisi'); window.location= '$admin_url'+'adminweb.php?module=profilAdmin';</script>";
        } else {
            if($_POST['newPassword']!=''){
                $newpass = md5($_POST['newPassword']);
                $queryUbah = mysqli_query($koneksi, "UPDATE tbl_admin SET username = '$uname', passwordAdmin = '$newpass' WHERE idAdmin = '$id'");
            }else{
                $queryUbah = mysqli_query($koneksi, "UPDATE tbl_admin SET username = '$uname' WHERE idAdmin = '$id'");
            }
           

            if ($queryUbah) {
                echo "<script>alert ('Data admin berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=profilAdmin';</script>";
            } else {
                echo "<script>alert ('Data admin gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=profilAdmin';</script>";
            }
        }
    }else{
        echo "<script>alert ('Password salah!'); window.location =   '$admin_url'+'adminweb.php?module=profilAdmin';</script>";
    }


?>
