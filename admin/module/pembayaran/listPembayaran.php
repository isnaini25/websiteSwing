<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pembayaran</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="card-title" >
                            <h4>Pembayaran</h4>
                
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Pembayaran</th>
                                        <th>ID Pesanan</th>
                                        <th>Metode Bayar</th>
                                        <th>Total Bayar</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran");
                                    $no = 1;
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $no;?></th>
                                        <td><?php echo $res['idPembayaran'];?></td>
                                        <td><?php echo $res['idPesanan'];?></td>
                                        <td><?php echo $res['namaMetode'];?></td>
                                        <td><?php echo $res['totalBayar'];?></td>
                                        <td><?php echo $res['bukti'];?></td>
                                        <td><?php echo $res['statusBayar'];?></td>
                                        <td><a href="<?php echo $admin_url;?>adminweb.php?module=cekPembayaran&id=<?php echo $res['idPembayaran']?>" > <span>Cek</span></a></td>
                                    </tr>
                                    <?php $no++ ;}?>
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