<?php 
session_start();

if($_SESSION['level']=="admin"){
    $_SESSION['namauser'] = '';
    unset($_SESSION['namauser']);
    $_SESSION['passuser'] = '';
    unset($_SESSION['passuser']);
    
    session_unset();
    session_destroy();
    header("location:index.php");
}else{
    $_SESSION['namauser'] = '';
    unset($_SESSION['namauser']);
    $_SESSION['passuser'] = '';
    unset($_SESSION['passuser']);
    
    session_unset();
    session_destroy();
    header("location:../index.php");
}

 ?>