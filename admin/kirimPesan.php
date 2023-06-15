<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$output ="";
$idPenjahit = $_POST['id_penjahit'];
$idPelanggan = $_POST['id_pelanggan'];
$pengirim = $_POST['pengirim'];

$prev ='';
$datePrev = new DateTime();
if(isset($_POST['pesan'])){
    $pesan = $_POST['pesan'];
    $cek = 0;
    date_default_timezone_set('Asia/Jakarta');
    $waktu = date("Y-m-d H:i:s");
    $pengirim = $_POST['pengirim'];
    
    $rowPesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * from tbl_pesan WHERE idPenjahit = '$idPenjahit' AND idPelanggan = '$idPelanggan'"));

    if($rowPesan>0){

        $get = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from tbl_pesan WHERE idPenjahit = '$idPenjahit' AND idPelanggan = '$idPelanggan'"));
        $idPesan = $get['idPesan'];

        $queryItem = mysqli_query($koneksi, "INSERT INTO tbl_itemPesan(idPesan, pesan, tanggal,pengirim,cek) VALUES 
        ('$idPesan', '$pesan', '$waktu','$pengirim', '$cek')");

        $queryUpdate = mysqli_query($koneksi, "UPDATE tbl_pesan SET waktuTerakhir = '$waktu', status = '2' WHERE idPesan = '$idPesan'");
    }else{
        $query = mysqli_query($koneksi, "INSERT INTO tbl_pesan (idPelanggan, idPenjahit, status, waktuTerakhir) values
         ('$idPelanggan','$idPenjahit', 2, '$waktu')");


            $idPesan = mysqli_insert_id($koneksi);
        

        $queryItem = mysqli_query($koneksi, "INSERT INTO tbl_itemPesan (idPesan, pesan, tanggal,pengirim,cek) VALUES 
        ('$idPesan', '$pesan', '$waktu','$pengirim', '$cek')");
        
    }
    


}


$query = mysqli_query($koneksi, "SELECT *, B.nama as namaPelanggan, C.nama as namaPenjahit FROM tbl_pesan A INNER JOIN tbl_pelanggan B ON A.idPelanggan = B.idPelanggan
    INNER JOIN tbl_penjahit C ON C.idPenjahit = A.idPenjahit INNER JOIN tbl_itemPesan D ON D.idPesan = A.idPesan
WHERE A.idPelanggan = '$idPelanggan' AND A.idPenjahit = '$idPenjahit' ORDER BY D.tanggal ASC");

while ($res = mysqli_fetch_array($query)) {
  
    if($datePrev!=date_format(new DateTime($res['tanggal']), 'd/m/Y')){
        $date = "<div class='tanggal'> <span>".date_format(new DateTime($res['tanggal']), 'd F Y')."</span></div>";
    }else{
        $date ="";
    }
    if ($prev!=$res['pengirim']) {
        if ($res['pengirim']=='penjahit') {
            $no=2;
            $username = "<span class='nama-pesan".$no."'>".$res['namaPenjahit']."</span>";
        } else {
            $no=1;
            $username = "<span class='nama-pesan".$no."'>".$res['namaPelanggan']."</span>";
        }
    }else{
        $username = "";
        
    }
        $output .="".$date."
                <div class='bubble-pesan'>".$username."
                 <div class='pesan".$no."'>
                    <p class='teks_pesan'>".$res['pesan']."</p>
                    <small>".date_format(new DateTime($res['tanggal']),'G:ia')."</small>
                </div>
                </div>";
    


    $prev = $res['pengirim'];
    $datePrev = date_format(new DateTime($res['tanggal']), 'd/m/Y');
}

if($query){
    echo $output;
}

?>