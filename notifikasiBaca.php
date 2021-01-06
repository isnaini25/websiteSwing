<?php
include "lib/config.php";
include "lib/koneksi.php";

$id =  $_POST['id_pelanggan'];

$output = "";


if (isset($_POST['view'])) {
    $query = mysqli_query($koneksi, "UPDATE tbl_pesanan SET  cek = 3  WHERE idPelanggan = '$id' AND cek = 2");
   
}


$query = mysqli_query($koneksi, "SELECT * from tbl_pesanan WHERE idPelanggan = '$id' AND (statusPesanan <> 'U' AND statusPesanan <> 'F') ORDER BY timestamp DESC");
while ($res = mysqli_fetch_array($query)) {
    // $simpan[] = array(
    //     'id' => $res['idPesanan'],
    //     'status' => $res['statusPesanan'],
    //     'tanggal' => $res['timestamp']
    // );

    $output .=  "<li class='notification-item'>
                    <a href='orderConfirmed.php?id=" . $res['idPesanan'] . "'>
                    <div class='notification-content'>";
    if ($res['statusPesanan'] == 'MK') {
        $output .=  "  <div class='notification-heading'>Pesanan Berhasil Dibuat</div>
        <span class='notification-text'>Pesanan " . $res['idPesanan'] . " berhasil dibuat</span>";
    } else if (($res['statusPesanan'] == 'MB' && $res['konfirmasiBahan']==1)|| ($res['statusPesanan'] == 'MP' && $res['konfirmasiBahan']==1)) {
        $output .=  "  <div class='notification-heading'>Pesanan Dikonfirmasi <span class='notification-icon'><i class='ti-check'></i></span> </div>
                        <span class='notification-text'>Bahan Pesanan " . $res['idPesanan'] . " telah diterima penjahit</span>";
    } else if ($res['statusPesanan'] == 'MB') {
        $output .=  "  <div class='notification-heading'>Pesanan Dikonfirmasi <span class='notification-icon'><i class='ti-check'></i></span> </div>
                        <span class='notification-text'>Pesanan " . $res['idPesanan'] . " telah dikonfirmasi penjahit</span>";
    } else if ($res['statusPesanan'] == 'MP') {
        $output .=  "  <div class='notification-heading'>Pembayaran Dikonfirmasi<span class='notification-icon'> <i class='ti-money'></i></span> </div>
                    <span class='notification-text'>Pembayaran pesanan " . $res['idPesanan'] . " telah dikonfirmasi</span>";
    }else if ($res['statusPesanan'] == 'P') {
        $output .=  "  <div class='notification-heading'>Pesanan Diproses</div>
                    <span class='notification-text'>Pesanan " . $res['idPesanan'] . " sedang diproses</span>";
    } else if ($res['statusPesanan'] == 'S') {
        $output .=  "  <div class='notification-heading'>Pesanan Selesai Diproses</div>
                    <span class='notification-text'>Pesanan " . $res['idPesanan'] . " selesai diproses</span>";
    }else if ($res['statusPesanan'] == 'K') {
        $output .=  "  <div class='notification-heading'>Pesanan Dikirim<span class='notification-icon'><i class='ti-truck'></i></span> </div>
                    <span class='notification-text'>Pesanan " . $res['idPesanan'] . " sedang dikirim</span>";
    }  else {
        $output .=  "  <div class='notification-heading'>Pesanan Dibatalkan <span class='notification-icon'><i class='ti-close'></i></span> </div>
                        <span class='notification-text'>Pesanan " . $res['idPesanan'] . " berhasil dibatalkan</span>";
    }
    $output .=  " </div>
                    </a>
                    </li>
                    ";
    
}







$rowPesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * from tbl_pesanan WHERE idPelanggan = '$id' AND cek = 2 ORDER BY tglOrder DESC"));
$count = $rowPesan;


$data = array(
    'notifikasi_pesanan' => $output,
    'count'  => $count
);
echo json_encode($data);
