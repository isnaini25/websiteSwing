<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['id'];
	
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_katalog WHERE idKatalog='$id'");

	if ($queryHapus) {
		echo "<script >alert('Data katalog berhasil dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=lihatKatalog';</script>	";
	}else{
		echo "<script >alert('Data katalog gagal dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=lihatKatalog';</script>	";
    }
    
    ?>