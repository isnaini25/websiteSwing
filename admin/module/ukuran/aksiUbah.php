<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idUkuran = $_POST['idUkuran'];
	$size= $_POST['size'];
	$itemS = $_POST['item'];
	$idUkuranS = $_POST['idItemUkuran'];
	$ukuranS = $_POST['ukuran'];
	
   				 

				
       if ($size==""||$ukuranS=="") {
            echo "<script>alert('Kode ukuran harus dipilih'); window.location= '$admin_url'+'adminweb.php?module=ubahUkuran';</script>";
        } else {
            $queryUbah = mysqli_query($koneksi, "UPDATE tbl_ukuran SET size = '$size' WHERE idUkuran = '$idUkuran'");

            if ($queryUbah) {
                for ($i=0; $i < count($itemS); $i++) {
                    $idItem = $idUkuranS[$i];
                    $item = $itemS[$i];
                    $ukuran = $ukuranS[$i];
					$queryItem = mysqli_query($koneksi, "UPDATE tbl_itemUkuran SET idItemNamaUkuran = '$item', nilaiUkuran = '$ukuran' WHERE idItemUkuran='$idItem'");	
				}
				
				if (!empty($_POST['itemBaru'])) {
					$itemBaruS = $_POST['itemBaru'];
					$ukuranBaruS = $_POST['ukuranBaru'];
	
					
					for ($j=0; $j < count($itemBaruS); $j++) {
						$itemNew= $itemBaruS[$j];
						$ukuranNew = $ukuranBaruS[$j];
						$querySimpan= mysqli_query($koneksi, "INSERT INTO tbl_itemUkuran(idUkuran, idItemNamaUkuran, nilaiUkuran) VALUES ('$idUkuran', '$itemNew', '$ukuranNew')");
						
						if($querySimpan){
							echo "<script>alert ('Data ukuran berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=lihatUkuran';</script>";
						}
					}
				}elseif($queryUbah){
					echo "<script>alert ('Data ukuran berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=lihatUkuran';</script>";
				}
            } else {
                echo "<script>alert ('Data ukuran gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=lihatUkuran';</script>";
			}
			
			
        }
    

?>

<!-- if ($queryItem) {
                        echo "<script>alert ('Data ukuran berhasil diubah'); window.location =  '$admin_url'+'adminweb.php?module=lihatUkuran';</script>";
                    } else {
                        echo "<script>alert ('Data ukuran gagal diubah'); window.location =   '$admin_url'+'adminweb.php?module=lihatUkuran';</script>";
                    } -->