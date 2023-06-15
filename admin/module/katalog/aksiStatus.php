<?php

include "../../../lib/config.php";
include "../../../lib/koneksi.php";

    $id = $_GET['id'];
	
	$queryCek = mysqli_query($koneksi, "SELECT status FROM tbl_katalog WHERE idKatalog='$id'");

	while($res = mysqli_fetch_array($queryCek)){

		if($res['status']==0){
			$queryHide = mysqli_query($koneksi, "UPDATE tbl_katalog SET status = '1' WHERE idKatalog='$id'");
			header('location:'.$admin_url.'adminweb.php?module=lihatKatalog');
		}else{
			$queryHide = mysqli_query($koneksi, "UPDATE tbl_katalog SET status = '0' WHERE idKatalog='$id'");
			header('location:'.$admin_url.'adminweb.php?module=lihatKatalog');
		}
	}

    
    ?>