<?php

include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

    $id = $_GET['id'];
    $idUkuran = $_GET['idUkuran'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_itemUkuran WHERE idItemUkuran='$id'");

	if ($queryHapus) {
		 header('location:'.$admin_url.'adminweb.php?module=ubahUkuran&id='.$idUkuran);
	}else{
		header('location:'.$admin_url.'adminweb.php?module=ubahUkuran&id='.$idUkuran);
    }
    
    ?>