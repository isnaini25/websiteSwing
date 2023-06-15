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
                
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kategori Penjahit</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <div class="card-title " >
                            <h4 class="d-inline ">Kategori Penjahit</h4>
                            <a href="<?php echo $admin_url;?>adminweb.php?module=tambahKategori" class="btn gradient-1 mb-3 btn-primary float-right" >Tambah<span class="btn-icon-right"><i class="fa fa-plus" aria-hidden="true"></i></span></a>
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                    $no = 1;
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $no;?></th>
                                        <td><?php echo $res['namaKategori'];?></td>
                                        <td><span class="badge badge-pill badge-primary px-3">0</span>
                                        </td>
                                        <td><a href="<?php echo $admin_url;?>adminweb.php?module=ubahKategori&idKategori=<?php echo $res['idKategori']?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil color-muted m-r-5"></i> </a> &nbsp;&nbsp;
                                        <a onClick ="return confirm('Anda yakin ingin menghapus data ini?')" href="<?php echo $admin_url;?>module/kategoriPenjahit/aksiHapus.php?idKategori=<?php echo $res['idKategori']?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-close color-danger"></i></a></td>
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