<?php 
include "../../../lib/config.php";
include "../../../lib/koneksi.php";
$output = "";
$id = $_POST['id_penjahit'];
if ($_POST['tgl_mulai']!='' && $_POST['tgl_selesai']!='') {
    $tglMulai = date_format(new DateTime($_POST['tgl_mulai']),'Y/m/d');
    $tglSelesai = date_format(new DateTime ($_POST['tgl_selesai']),'Y/m/d');

    if($_POST['cek']!='yes'){
        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
        ON A.idPelanggan = B.idPelanggan INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori
        INNER JOIN tbl_pembayaran D ON A.idPesanan = D.idPesanan WHERE idPenjahit = '$id' AND tglOrder BETWEEN '$tglMulai' AND '$tglSelesai' ");
    }else{
    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
    ON A.idPelanggan = B.idPelanggan INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori
    INNER JOIN tbl_pembayaran D ON A.idPesanan = D.idPesanan WHERE idPenjahit = '$id' AND ( statusPesanan = 'F'  OR statusPesanan = 'U') AND tglOrder BETWEEN '$tglMulai' AND '$tglSelesai'");
       
    }
    
}else{
    if ($_POST['cek']!='yes') {
        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
        ON A.idPelanggan = B.idPelanggan INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori
        INNER JOIN tbl_pembayaran D ON A.idPesanan = D.idPesanan WHERE idPenjahit = '$id'");
    }else{
        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
        ON A.idPelanggan = B.idPelanggan INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori
        INNER JOIN tbl_pembayaran D ON A.idPesanan = D.idPesanan WHERE idPenjahit = '$id' AND (statusPesanan = 'F' OR statusPesanan = 'U')");
    }
}
$no = 1;
$total = 0;
$ongkir= 0;
while ($res=mysqli_fetch_array($kueri)) {
$st = $res['statusPesanan'];
$output .= "
    <tr>
    <th>".$no."</th>
    <td>".$res['idPesanan']."</td>
    <td>".$res['nama']."</td>
    <td>".$res['namaKategori']."</td>
    <td>".date_format(new DateTime($res['tglOrder']),'d/m/Y')."</td>
    <td>";
    
    if($st=='MK'){
        $output .= "<span class='badge badge-pill badge-primary'>Menunggu Konfirmasi</span>";
    }else if($st=='MB'){
        $output .="<span class='badge badge-pill badge-secondary'>Menunggu Pembayaran</span>";
    }else if($st=='MP'){
        $output .= "<span class='badge badge-pill badge-warning'>Menunggu Proses</span>";
    }else if($st=='P'){
        $output .= "<span class='badge badge-pill badge-info'>Proses Penjahitan</span>";
    }else if($st=='S'){
        $output .= "<span class='badge badge-pill badge-info'>Selesai Penjahitan</span>";
    }else if($st=='K'){
        $output .= "<span class='badge badge-pill badge-light'>Dikirim</span>";
    }else if($st=='F'||$st=='U'){
        $output .= "<span class='badge badge-pill badge-success'>Selesai</span>";
    }else if($st=='B'){
        $output .= "<span class='badge badge-pill badge-danger'>Batal</span>";
    }
    
    $output .= "</td>
                <td>Rp".number_format($res['totalBayar'])."</td>
                <td>Rp".number_format($res['biayaKirim'])."</td>
                <td>Rp".number_format($res['totalBayar']+$res['biayaKirim'])."</td>  
                </tr>";

        $no++ ;
        $total = $total+$res['totalBayar'];
        $ongkir = $ongkir+$res['biayaKirim'];
        }
        $output .= ".<tr>
    <td colspan='6' class='text-center'><b>Total</b></td>
    <td><b>Rp".number_format($total)."</b></td>
    <td><b>Rp".number_format($ongkir)."</b></td>
    <td><b>Rp".number_format($ongkir+$total)."</b></td>
    </tr>";

echo $output;