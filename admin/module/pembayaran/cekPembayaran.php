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
                <li class="breadcrumb-item"><a href="adminweb.php?module=cekBayar">Pembayaran</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Cek Pembayaran</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="d-inline">Rincian Pembayaran</h4>
                            
                        </div>

                        <div class="form-validation">
                            <form class="form-valide" action="module/pembayaran/aksiCek.php" method="post" enctype="multipart/form-data">
                                <?php
                                $idPembayaran = $_GET['id'];
                                include "../lib/config.php";
                                include "../lib/koneksi.php";

                                $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran A INNER JOIN tbl_metodeBayar B ON A.idMetodeBayar = B.idMetodeBayar WHERE A.idPembayaran= '$idPembayaran'");
                           
                                while ($res = mysqli_fetch_array($kueri)) {
                                    
                                ?>
                                    <?php if($res['statusBayar']=='B'){?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button> <strong>Pembayaran belum dikonfirmasi!</strong></div>
                                     <?php }else{?>
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button> <strong>Pembayaran telah dikonfirmasi!</strong></div>
                                            <?php }?>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">ID Pembayaran
                                        </label>
                                        <div class="col-md-6">
                                        <input type="text" class="form-control " hidden name="idPembayaran" value="<?php echo $res['idPembayaran']; ?>">
                                            <input type="text" class="form-control " disabled="disabled" name="idPembayaran" value="<?php echo $res['idPembayaran']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">ID Pesanan
                                        </label>
                                        <div class="col-md-6">
                                        <input type="text" class="form-control " hidden name="idPesanan" value="<?php echo $res['idPesanan']; ?>">
                                            <input type="text" class="form-control " disabled="disabled" name="idPesanan" value="<?php echo $res['idPesanan']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Metode Bayar
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control " disabled="disabled" name="metode" value="<?php echo $res['namaMetode']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Total Bayar
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control " disabled="disabled" name="total" value="<?php echo "Rp".number_format($res['biayaKirim']+$res['totalBayar']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Tanggal Bayar
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control " disabled="disabled" name="tglBayar" value="<?php echo date_format(date_create($res['tglBayar']), 'd M y G:ia'); ?>">
                                        </div>
                                    </div>
                                 
                                    <div class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">

                                                <div class="carousel-item active">
                                                    <img style="object-fit: contain;" data-id="100" class="d-block w-100 img-zoom" height="400" src="upload/<?php echo $res['bukti']; ?>">
                                                </div>
                                        </div>
                                        
                                        <button type="submit" onClick ="return confirm('Konfirmasi pembayaran?')" class="btn btn-primary gradient-1 mt-4 float-right">
                                        Konfirmasi
                                        </button>
                                   
                                        <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->



</div>
<script type="text/javascript">
    function modal_image(id, src) {
        var modal_content = '<div class="modal-dialog" id="dialog-img-' + id + '">'
        modal_content += '<div class="modal-content">';
        modal_content += '<div class="modal-body">';
        modal_content += '<a class="modal-title btn btn-primary unduh" href="' + src + '" download><i class="ti-download"></i></a>'
        modal_content += '<span class="close">&times;</span>'
        modal_content += '</div>'
        modal_content += '<div class="modal-body" id=img-"' + id + '" >';
        modal_content += '<img src="' + src + '" width="400" >';
        modal_content += '</div>'
        modal_content += '</div>'
        modal_content += '</div>'
        $('.foto-modal').html(modal_content);
    }


    $(document).on('click', '.img-zoom', function() {
        var id_foto = $(this).data('id');
        var src = $(this).attr('src');
        modal_image(id_foto, src);
        $('#modal-img').modal('show');
        $('#dialog-img-' + id_foto).dialog('open');
    });

   


    
</script>