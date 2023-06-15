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
                <li class="breadcrumb-item"><a href="adminweb.php?module=lihatPesanan">Pesanan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ulasan Pesanan</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $idPesanan = $_GET['id'];
                        include "../lib/config.php";
                        include "../lib/koneksi.php";

                        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_ulasan A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan 
                                    WHERE A.idPesanan= '$idPesanan'");
                        
                        $res = mysqli_fetch_array($kueri);
                    
                        ?>
                            <div class="card-title">
                                <h4 class="d-inline">Ulasan Pesanan</h4>

                            </div>

                            
                            <div>
                             <h6>Nilai <span class='badge badge-pill badge-warning'><?php echo $res['nilai'];?>/5</span></h6>
                              <p>Komentar Pelanggan :</p>  
                              <p><?php echo $res['ulasan'];?></p>
                             <img class="img-zoom" data-id="100" src="upload/<?php echo $res['fotoReview'];?>" alt="" width="150px">
                            </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>


<script>
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