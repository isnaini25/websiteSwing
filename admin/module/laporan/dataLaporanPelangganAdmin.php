<?php
include "../../../lib/config.php";
include "../../../lib/koneksi.php";


$output = "";
if ($_POST['cari'] != '') {
    $key = $_POST['cari'];
    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE nama LIKE '%$key%' ");
} else {
    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");
}
$no = 1;

while ($res = mysqli_fetch_array($kueri)) {
  

    $output .= "
    <tr>
    <th>" . $no . "</th>
    <td>" . $res['idPelanggan'] . "</td>
    <td>" . $res['nama'] . "</td> 
    <td>" . $res['email'] . "</td> 
    <td>" . date_format(new DateTime($res['tglDaftar']), 'd/m/Y') . "</td>
    <td>";

    if ($res['statusAktif'] == 1) {
        $output .= "<span class='badge badge-pill badge-primary'>Aktif</span>";
    } elseif ($res['statusAktif'] == 0) {
        $output .= "<span class='badge badge-pill badge-secondary'>Non-Aktif</span>";
    }

    $output .= "</tr>";
    $no++;
}
echo $output;
