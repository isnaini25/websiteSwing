<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_POST['idPesanan'];

 
    
    if(!isset($_POST['status'])){
        $statusPesanan = 'MB';
    }else{
        $statusPesanan = $_POST['status'];
    }
    
    if(!isset($_POST['resi'])){
        $resi= '';
    }else{
        $resi= $_POST['resi'];
    }
    
    if(!isset($_POST['harga'])){
        $harga= '';
    }else{
        $harga= $_POST['harga'];
    }
    $tglSelesai = $_POST['tglSelesai'];
    
   
	

 
	$query= mysqli_query($koneksi,"UPDATE tbl_pesanan SET statusPesanan = '$statusPesanan', tglSelesai ='$tglSelesai', resi = '$resi', cek=2,timestamp = current_timestamp WHERE idPesanan = '$id'");

    $queryCekBayar = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran WHERE idPesanan= '$id'");
    $count = mysqli_num_rows($queryCekBayar);
    $idBayar = 'B'.substr($id,1,5);
    
    if($count<=0){
        $queryBayar = mysqli_query($koneksi, "INSERT INTO tbl_pembayaran (idPembayaran,idPesanan,totalBayar,cek) VALUES ('$idBayar','$id','$harga',1)");
    }
    
    if($query){
        echo "<script>alert ('Berhasil menyimpan data'); window.location ='$admin_url'+'adminweb.php?module=detailPesanan&id=$id';</script>";
    }else{
        echo "<script>alert ('Gagal menyimpan data'); window.location ='$admin_url'+'adminweb.php?module=detailPesanan&id=$id';</script>";
    }
		

?>
