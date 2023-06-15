<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$id = $_POST['id_penjahit'];

$output = "";

if (isset($_POST['view'])) {
    $query = mysqli_query($koneksi, "UPDATE tbl_pesanan SET  cek = 1  WHERE idPenjahit = '$id' AND cek = 0");
    $queryBayar = mysqli_query($koneksi, "UPDATE tbl_pesanan A INNER JOIN tbl_pembayaran B ON A.idPesanan = B.idPesanan SET B.cek = 3
    WHERE B.statusBayar = 'S' AND B.cek = 2 ");
}




$query = mysqli_query($koneksi, "SELECT * from tbl_pesanan WHERE idPenjahit = '$id' AND (statusPesanan <> 'S' AND statusPesanan <> 'P' AND statusPesanan <> 'K')  ORDER BY timestamp DESC");
while ($res = mysqli_fetch_array($query)) {
    
        $output .=  "
            <li>
            <a href='adminweb.php?module=detailPesanan&id=" . $res['idPesanan'] . "'>
            ";
        if ($res['statusPesanan'] == 'MK') {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-cut'></i></span>
            <div class='notification-content'>  
            <h6 class='notification-heading'>Pesanan Baru <small>" . $res['idPesanan'] . "</small></h6>
            ";
        }elseif ($res['kurirKirim'] != '' && $res['statusPesanan'] == 'MB') {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-truck'></i></span>
                <div class='notification-content'>  
                <h6 class='notification-heading'>Bahan Pesanan <small>" . $res['idPesanan'] . "</small> Dikirim pelanggan</h6>
                ";
        }elseif ($res['bahan']=='B' && $res['statusPesanan'] == 'MB') {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-truck'></i></span>
                <div class='notification-content'>  
                <h6 class='notification-heading'>Bahan Pesanan <small>" . $res['idPesanan'] . "</small> Batal dikirim pelanggan</h6>
                ";
        }  elseif ($res['statusPesanan'] == 'MP') {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-money'></i></span>
                <div class='notification-content'>  
                <h6 class='notification-heading'>Pesanan <small>" . $res['idPesanan'] . "</small> Menunggu diproses</h6>
                ";
        } elseif ($res['statusPesanan'] == 'F' || ($res['kurirKirim'] != '' && $res['statusPesanan'] == 'F' )) {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-thumb-up'></i></span>
                <div class='notification-content'>  
                <h6 class='notification-heading'>Pesanan <small>" . $res['idPesanan'] . "</small> Diterima Pelanggan</h6>
                ";
        } elseif ($res['statusPesanan'] == 'U' || ($res['kurirKirim'] != '' && $res['statusPesanan'] == 'U' )) {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-comment-alt'></i></span>
                <div class='notification-content'>  
                <h6 class='notification-heading'>Ulasan baru pesanan <small>" . $res['idPesanan'] . "</small></h6>
                ";
        } elseif ($res['statusPesanan'] == 'B' || ($res['kurirKirim'] != '' && $res['statusPesanan'] == 'B' )) {
            $output .= "<span class='mr-3 avatar-icon bg-success-lighten-2'><i class='ti-close'></i></span>
        <div class='notification-content'>  
        <h6 class='notification-heading'>Pesanan <small>" . $res['idPesanan'] . "</small> Dibatalkan</h6>
        ";
        }
        $output .= "<span class='notification-text'>" . date_format(date_create($res['timestamp']), "d M y G:ia") . "</span>
            </div>
            </a>
            </li>
            ";
    
}



$rowBayar = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pembayaran B ON A.idPesanan = B.idPesanan
WHERE  A.idPenjahit = '$id'  AND B.statusBayar = 'S' AND B.cek = 2 "));
$rowPesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * from tbl_pesanan WHERE idPenjahit = '$id' AND cek = 0 ORDER BY tglOrder DESC"));
$count = $rowPesan + $rowBayar;

$data = array(
    'notifikasi_pesanan' => $output,
    'count'  => $count
);
echo json_encode($data);
