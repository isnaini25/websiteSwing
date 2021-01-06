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
                
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pesanan</a></li>
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
                            
                            <h4 class="d-inline">Pesanan</h4>
                            
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th>ID Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
                                    ON A.idPelanggan = B.idPelanggan WHERE idPenjahit = '$id'");
                                    $no = 1;
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $no;?></th>
                                        <td><?php echo $res['idPesanan'];?></td>
                                        <td><?php echo $res['nama'];?></td>
                                        <td><?php echo date_format(new DateTime($res['tglOrder']),'d/m/Y');?></td>
                                        <td><?php 
                                        $st = $res['statusPesanan'];
                                        if($st=='MK'){
                                            echo "<span class='badge badge-pill badge-primary'>Menunggu Konfirmasi</span>";
                                        }else if($st=='MB'){
                                          echo "<span class='badge badge-pill badge-secondary'>Menunggu Pembayaran</span>";
                                        }else if($st=='KB'){
                                            echo "<span class='badge badge-pill badge-secondary'>Konfirmasi Pembayaran</span>";
                                        }else if($st=='MP'){
                                            echo "<span class='badge badge-pill badge-warning'>Menunggu Proses</span>";
                                        }else if($st=='P'){
                                            echo "<span class='badge badge-pill badge-info'>Proses Penjahitan</span>";
                                        }else if($st=='S'){
                                            echo "<span class='badge badge-pill badge-info'>Selesai Penjahitan</span>";
                                        }else if($st=='K'){
                                            echo "<span class='badge badge-pill badge-light'>Dikirim</span>";
                                        }else if($st=='F' || $st=='U'){
                                            echo "<span class='badge badge-pill badge-success'>Selesai</span>";
                                        }else if($st=='B'){
                                            echo "<span class='badge badge-pill badge-danger'>Batal</span>";
                                        }
                                        
                                        ?>
                                        
                                    </td>
                                        
                                        <td><a class="btn btn-sm btn-primary mt-2" href="<?php echo $admin_url;?>adminweb.php?module=detailPesanan&id=<?php echo $res['idPesanan']?>">Detail</a>
                                       
                                        <?php if($st=='U'){?>
                                            <a class="btn btn-sm btn-secondary mt-2" href="<?php echo $admin_url;?>adminweb.php?module=ulasan&id=<?php echo $res['idPesanan']?>"><i class="ti-comment-alt"></i> Ulasan</a>
                                            <?php }?>
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