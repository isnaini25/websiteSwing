<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
$string = file_get_contents("../data/bank.json");
$data_bank = json_decode($string, true);

$output = "";
if ($_POST['cari'] != '') {
    $key = $_POST['cari'];
    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE nama LIKE '%$key%' ");
} else {
    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit");
}
$no = 1;

while ($res = mysqli_fetch_array($kueri)) {
    $idPenjahit = $res['idPenjahit'];
    $kueriBayar = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan where B.idPenjahit = '$idPenjahit' AND MONTH(tglBayar) = MONTH(CURRENT_DATE())
    AND YEAR(tglBayar) = YEAR(CURRENT_DATE())");
    $total = 0;
    $totalBayar = 0;
    while ($resB = mysqli_fetch_array($kueriBayar)) {
        $total = $resB['totalBayar'] + $resB['biayaKirim'];
        $totalBayar = $total + $totalBayar;
    }


    $idBank = $res['kodeBank'];
    $bank='';
    foreach ($data_bank as $key => $tiap_bank) {
        if ($tiap_bank["code"] != $idBank) {
            continue;
        }
        echo ">";
        $bank = $tiap_bank["name"];
       
    }

    $output .= "
    <tr>
    <th>" . $no . "</th>
    <td>" . $res['idPenjahit'] . "</td>
    <td>" . $res['nama'] . "</td> 
    <td>" . date_format(new DateTime($res['tglDaftar']), 'd/m/Y') . "</td>
    <td>Rp " . number_format($totalBayar) . "</td>
    <td>" . $bank. "</td>
    <td>" . $res['rekening'] . "</td>
    <td>";

    if ($res['statusAktif'] == 1) {
        $output .= "<span class='badge badge-pill badge-primary'>Aktif</span>";
    } elseif ($res['statusAktif'] == 0) {
        $output .= "<span class='badge badge-pill badge-secondary'>Non-Aktif</span>";
    }

    $output .= "<td><a class='btn btn-sm btn-secondary' href='" . $admin_url . "adminweb.php?module=detailPenjahit&id=" . $idPenjahit . "'> <span>Detail</span></a></td></tr>";
    $no++;
}
echo $output;
