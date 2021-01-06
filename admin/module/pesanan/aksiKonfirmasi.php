<?php

session_start();
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
$idPesanan = $_GET['idPesanan'];

    $query = mysqli_query($koneksi, "UPDATE tbl_pesanan SET konfirmasiBahan = 1 ,cek=2,timestamp = current_timestamp WHERE idPesanan = '$idPesanan' ");

    if ($query) {
        echo "<script>alert ('Berhasil mengkonfirmasi'); window.location ='$admin_url'+'adminweb.php?module=detailPesanan&id=$idPesanan';</script>";
    }


?>