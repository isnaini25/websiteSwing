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

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Katalog</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <?php
            $id = $_SESSION['id_penjahit'];
            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idPenjahit = '$id'");

            while ($res = mysqli_fetch_array($kueri)) {

            ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card" style="height: 390px;">
                        <img class="img-fluid" src="upload/<?php echo $res['foto']; ?>" alt="" style="width: 100%; height:200px;object-fit:contain;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $res['namaKatalog']; ?></h5>
                            <p class="card-text">
                                <?php $desk = strip_tags($res['deskripsi']);
                                if (strlen($desk) > 50) {
                                    $stringCut = substr($desk, 0, 50);
                                    $endPoint = strrpos($stringCut, ' ');

                                    
                                    $desk = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $desk .= '...';
                                }
                                echo $desk;

                                ?></p>
                        </div>
                        <div class="card-footer">
                        <a href="<?php echo $admin_url;?>adminweb.php?module=ubahKatalog&id=<?php echo $res['idKatalog']?>" class="card-link d-inline" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="ti-pencil-alt"></i></a>
                        <?php if($res['status']=='1'){?>
                        <a href="<?php echo $admin_url;?>module/katalog/aksiStatus.php?id=<?php echo $res['idKatalog']?>" class="card-link  d-inline" data-toggle="tooltip" data-placement="top" title="Sembunyikan"><i class="ti-eye"></i></a>
                        <?php }elseif($res['status']=='0'){ ?>
                            <a href="<?php echo $admin_url;?>module/katalog/aksiStatus.php?id=<?php echo $res['idKatalog']?>" class="card-link  d-inline" data-toggle="tooltip" data-placement="top" title="Tampilkan"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        <?php }?>
                        <a onClick ="return confirm('Anda yakin ingin menghapus data ini?')" href="<?php echo $admin_url;?>module/katalog/aksiHapus.php?id=<?php echo $res['idKatalog']?>" class="card-link  float-right" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="ti-trash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            <?php } ?>
        </div>
    </div>

</div>