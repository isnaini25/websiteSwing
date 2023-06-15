<?php 
include "../lib/koneksi.php";
$username = $_POST['username'];
$pass = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND passwordAdmin='$pass'" );
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

	if($ketemu > 0 ){
		session_start();
		
		$_SESSION['id_admin'] = $r['id_admin'];
		$_SESSION['namauser'] = $r['username'];
		$_SESSION['passuser'] = $r['password'];
        $_SESSION['level']='admin';
        
		header('location:adminweb.php');
	}else{
		echo $pass;
		exit();
        echo "<script>alert ('Password salah!'); window.location ='$admin_url';</script>";
        
    }


 ?>