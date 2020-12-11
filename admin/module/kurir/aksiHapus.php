<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['id'];
    
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kurir WHERE idKurir='$id'");

	if ($queryHapus) {
		echo "<script >alert('Data Kurir berhasil dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=kurir';</script>	";
	}else{
		echo "<script >alert('Data Kurir gagal dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=kurir';</script>	";
    }
    
    ?>