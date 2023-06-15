<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['id'];
    
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_metodeBayar WHERE idMetodeBayar='$id'");

	if ($queryHapus) {
		echo "<script >alert('Data metode bayar berhasil dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=metodeBayar';</script>	";
	}else{
		echo "<script >alert('Data metode bayar gagal dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=metodeBayar';</script>	";
    }
  ?>