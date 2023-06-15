<?php 
session_start();

	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idPenjahit = $_SESSION['id_penjahit'];
	$deskripsi= $_POST['deskripsi'];
	$itemS = $_POST['item'];
    $hargaMinimal = $_POST['hargaMinimal'];
    $kuotaPesanan = $_POST['kuotaPesanan'];
    $bank = $_POST['bank'];
    $rekening = $_POST['rekening'];
	
		  
	$querySimpan = mysqli_query($koneksi,"UPDATE tbl_penjahit SET deskripsi='$deskripsi', hargaMinimal='$hargaMinimal',kuotaPesanan='$kuotaPesanan',kodeBank='$bank',rekening='$rekening' WHERE idPenjahit = '$idPenjahit' ");

		if($querySimpan){
            for ($i=0; $i < count($itemS); $i++) {
                $item = $itemS[$i];

                $queryItem = mysqli_query($koneksi, "INSERT INTO tbl_itemKategori(idKategori, idPenjahit) VALUES ('$item','$idPenjahit')");

                if ($queryItem) {
                    echo "<script>alert ('Data pendaftaran berhasil masuk'); window.location ='$admin_url'+'adminweb.php?module=homePenjahit&sukses=sukses';</script>";
                }else{
					echo "<script>alert ('Data pendaftaran gagal masuk'); window.location ='$admin_url'+'adminweb.php?module=homePenjahit';</script>";
				}
            }
			
		}else{
			echo "<script>alert ('Data pendaftaran gagal masuk'); window.location ='$admin_url'+'adminweb.php?module=homePenjahit';</script>";
        }
