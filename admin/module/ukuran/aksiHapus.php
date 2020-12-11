<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['id'];
    
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_ukuran WHERE idUkuran='$id'");

	if ($queryHapus) {
		echo "<script >alert('Data ukuran berhasil dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=lihatUkuran';</script>	";
	}else{
		echo "<script >alert('Data ukuran gagal dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=lihatUkuran';</script>	";
    }
    
    ?>