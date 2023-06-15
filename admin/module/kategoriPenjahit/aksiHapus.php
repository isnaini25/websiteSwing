<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['idKategori'];
    
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kategori WHERE idKategori='$id'");

	if ($queryHapus) {
		echo "<script >alert('Data kategori berhasil dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=kategoriPenjahit';</script>	";
	}else{
		echo "<script >alert('Data kategori gagal dihapus'); window.location = '$admin_url'+ 'adminweb.php?module=kategoriPenjahit';</script>	";
    }
    
    ?>