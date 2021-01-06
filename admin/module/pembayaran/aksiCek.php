<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $idPembayaran = $_POST['idPembayaran'];
    $idPesanan = $_POST['idPesanan'];

    $queryBayar= mysqli_query($koneksi,"UPDATE tbl_pembayaran SET statusBayar = 'S', cek = 2 WHERE idPembayaran = '$idPembayaran'");
    $query= mysqli_query($koneksi,"UPDATE tbl_pesanan SET statusPesanan = 'MP', cek = 2, timestamp = current_timestamp WHERE idPesanan = '$idPesanan'");
    if($queryBayar && $query){
        echo "<script>alert ('Berhasil mengkonfirmasi pembayaran'); window.location ='$admin_url'+'adminweb.php?module=cekPembayaran&id=$idPembayaran';</script>";
    }else{
        echo "<script>alert ('Gagal  mengkonfirmasi pembayaran'); window.location ='$admin_url'+'adminweb.php?module=cekPembayaran&id=$idPembayaran';</script>";
    }
    ?>