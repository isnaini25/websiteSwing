<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idPenjahit = $_SESSION['id_penjahit'];
	$size= $_POST['size'];
	$itemS = $_POST['item'];
	$ukuranS = $_POST['ukuran'];
	

	if($size=="") {
		echo "<script>alert('Kode ukuran harus dipilih'); window.location= '$admin_url'+'adminweb.php?module=tambahUkuran';</script>";
	}else{		  
	$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_ukuran(idPenjahit, size) VALUES ('$idPenjahit','$size')");

		if($querySimpan){
			$last_id = mysqli_insert_id($koneksi);
            for ($i=0; $i < count($itemS); $i++) {
                $item = $itemS[$i];
                $ukuran = $ukuranS[$i];
        

                $queryItem = mysqli_query($koneksi, "INSERT INTO tbl_itemUkuran(idUkuran, idItemNamaUkuran, nilaiUkuran) VALUES ('$last_id', '$item', '$ukuran')");

                if ($queryItem) {
                    echo "<script>alert ('Data ukuran berhasil masuk'); window.location =  '$admin_url'+'adminweb.php?module=tambahUkuran';</script>";
                }else{
					echo "<script>alert ('Data ukuran gagal masuk'); window.location =   '$admin_url'+'adminweb.php?module=tambahUkuran';</script>";
				}
            }
			
		}else{
			echo "<script>alert ('Data ukuran gagal masuk'); window.location =   '$admin_url'+'adminweb.php?module=tambahUkuran';</script>";
		}
		
	}	

?>