<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>

<!-- <style>
    @media print {
    body:not(#main) { 
       visibility: hidden; }
     #print{ 
       display: block;
    }
    }
</style> -->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Laporan Pembayaran</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid" id="main">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-4">

                            <h4 class="d-inline">Laporan Pembayaran</h4>
                            <a href="" id="print" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="Cetak Laporan"><i class="ti-printer"></i></a>

                        </div>
                        
                        
                        
                        <div class="table-responsive" id="printArea">
                        <h4 class="text-center">Laporan Pembayaran</h4>
 
                            <table class="table table-bordered verticle-middle" >
                                <thead>
                                
                                    <tr>
                                        <th width="200">Bulan</th>
                                        <th>ID Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Penjahit</th>
                                        <th>Jumlah Pembayaran</th>

                                    </tr>
                                </thead>
                                <tbody id="laporan" >
                                    <?php

                                        $kueri = mysqli_query($koneksi, "SELECT *, MONTHNAME(tglBayar) as namaBulan FROM tbl_pembayaran A  
                                        INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan INNER JOIN tbl_penjahit C ON B.idPenjahit = C.idPenjahit WHERE DATE_FORMAT(tglBayar,'%Y-%m') ORDER BY namaBulan DESC ");
                                        
                                        while ($res=mysqli_fetch_array($kueri)) {
                                            ?>
                                                <tr>
                                                <td><?php echo $res['namaBulan']." ".date_format(new DateTime($res['tglBayar']),'Y');?></td>
                                                <td><?php echo $res['idPembayaran'];?></td>
                                                <td><?php echo date_format(new DateTime($res['tglBayar']),'d/m/Y');?></td>
                                                <td><?php echo ($res['nama']);?></td>
                                                <td>Rp<?php echo number_format($res['totalBayar']+$res['biayaKirim']);?></td>
                                                </tr>
                                        <?php
                                        }?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function() {
        $("#print").on("click", function() {
           print();
        }
        )

        function print(){
            var printContents = document.getElementById("printArea").innerHTML;
            var original = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = original;
        }
   });
</script>