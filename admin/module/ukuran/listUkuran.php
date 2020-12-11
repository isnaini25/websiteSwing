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
                
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Standar Ukuran</a></li>
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
                            
                            <h4 class="d-inline">Standar Ukuran</h4>
                            <a href="<?php echo $admin_url;?>adminweb.php?module=tambahUkuran" class="btn mb-3 gradient-1 float-right btn-primary " >Tambah<span class="btn-icon-right"><i class="fa fa-plus" aria-hidden="true"></i></span></a>
                        </div>
                       
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                <?php 
                                        $id = $_SESSION['id_penjahit'];
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_ukuran WHERE idPenjahit = '$id'");
                                   
                                    while ($res=mysqli_fetch_array($kueri)) {
                                        $idU = $res['idUkuran'];
                                        ?>
                                    <tr>
                                        <th colspan="3">Kode Ukuran <?php echo $res['size'];?>  &nbsp;&nbsp;
                                        <button class="btn mb-1 btn-rounded btn-outline-secondary btn-sm">
                                        <a href="<?php echo $admin_url;?>adminweb.php?module=ubahUkuran&id=<?php echo $res['idUkuran']?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil color-muted m-r-5"></i> </a> 
                                        <button class="btn mb-1 btn-rounded btn-outline-danger btn-sm">
                                            <a onClick ="return confirm('Anda yakin ingin menghapus data ini?')" href="<?php echo $admin_url;?>module/ukuran/aksiHapus.php?id=<?php echo $res['idUkuran']?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-close color-danger"></i></a></th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Item</th>
                                        <th>Nilai Ukuran</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $kueri1 = mysqli_query($koneksi, "SELECT * FROM tbl_itemUkuran A INNER JOIN tbl_ukuran B ON A.idUkuran = B.idUkuran INNER JOIN tbl_itemNamaUkuran C ON A.idItemNamaUkuran = C.idItemNamaUkuran WHERE A.idUkuran = '$idU'");
                                    $no = 1;
                                    while ($res1=mysqli_fetch_array($kueri1)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $no;?></th>
                                        <td><?php echo $res1['namaUkuran'];?></td>
                                        <td><?php echo $res1['nilaiUkuran'];?></span>
                                        </td>
                      
                                    </tr>
                                    <?php $no++ ;}?>
                                </tbody>
                                    <?php }?>
                            </table>
                            
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>