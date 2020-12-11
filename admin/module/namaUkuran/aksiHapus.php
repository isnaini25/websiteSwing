<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['id'];
    
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_itemNamaUkuran WHERE idItemNamaUkuran='$id'");

	if ($queryHapus) {
		echo "<script >alert('Data item nama ukuran berhasil dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=namaUkuran';</script>	";
	}else{
		echo "<script >alert('Data item nama ukuran gagal dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=namaUkuran';</script>	";
    }
    
    ?>