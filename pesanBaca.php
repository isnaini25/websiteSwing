<?php
include "lib/config.php";
include "lib/koneksi.php";

$id =$_POST['id_pelanggan'];

$output ="";


if(isset($_POST['view'])){
    $query= mysqli_query($koneksi, "UPDATE tbl_pesan SET  status = 3  WHERE idPelanggan = '$id' AND status = 2");   
}

$rowPesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * from tbl_pesan  WHERE idPelanggan = '$id' AND status = 2"));


$query= mysqli_query($koneksi, "SELECT *, B.nama as namaPenjahit from tbl_pesan A INNER JOIN tbl_penjahit B ON A.idPenjahit = B.idPenjahit  WHERE idPelanggan = '$id' ORDER BY waktuTerakhir DESC");

while ($res = mysqli_fetch_array($query)) {
$idP = $res['idPesan'];
$queryItem = mysqli_query($koneksi, "SELECT MAX(tanggal) AS waktu FROM tbl_itemPesan WHERE idPesan ='$idP' ");
$hasil = mysqli_fetch_assoc($queryItem);
$waktu= new DateTime($hasil['waktu']);
//$waktuNow = new DateTime();

$output .=   "
<li class='notification-unread'>
<a href='' data-toggle='modal' data-target='.chat'  class='pesan_penjahit' data-id='".$res['idPenjahit']."' data-nama='".$res['namaPenjahit']."' >
<img class='avatar-img' src='admin/upload/".$res['foto']."' alt='' style='object-fit:cover;width:50px;height:50px'>
<div class='notification-content chat-history' data-id='".$res['idPenjahit']."'>
<div class='notification-heading'>".$res['nama']."</div>
<div class='notification-timestamp'>".date_format($waktu,'d/m/Y G:ia')."</div>
</div>
</a>
</li>
";
 }



                            
$data = array(
    'notifikasi_pesan' => $output,
    'count'  => $rowPesan
 );
 echo json_encode($data);                                               
                                                   

?>