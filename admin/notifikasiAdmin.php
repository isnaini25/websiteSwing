<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$outputBayar = "";


if(isset($_POST['view'])){
    $queryBayar= mysqli_query($koneksi, "UPDATE tbl_pembayaran A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan SET A.cek = 2 WHERE A.cek = 1 AND  A.bukti <> '' ");
}

$countBayar= mysqli_query($koneksi, "SELECT * from tbl_pembayaran A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan WHERE A.bukti <> '' AND A.cek = 1 ");
$rowBayar = mysqli_num_rows($countBayar);
$queryBayar= mysqli_query($koneksi, "SELECT * from tbl_pembayaran A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan WHERE A.bukti <> '' AND A.statusBayar = 'B' ORDER BY tglBayar DESC");


while ($resB = mysqli_fetch_array($queryBayar)) {
    $outputBayar .=  "
                <li>
                <a href='adminweb.php?module=cekPembayaran&id=".$resB['idPembayaran']."'>
                <span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-money'></i></span>
                <div class='notification-content'>
                <h6 class='notification-heading'>Pembayaran pesanan <small>".$resB['idPesanan']."</small> </h6>
                <span class='notification-text'>".date_format(date_create($resB['tglBayar']),"d M y G:ia")."</span>
                </div>
                </a>
                </li>
                ";
     }


$count = $rowBayar;  

                            
$data = array(
    'notifikasi_pembayaran' => $outputBayar,
    'count'  => $count
 );
 echo json_encode($data);                                               
                                                   

?>