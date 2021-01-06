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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pesanan</a></li>
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

                        $kueri = mysqli_query($koneksi, "SELECT *, A.jenisKelamin as gender FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
                                    ON A.idPelanggan = B.idPelanggan INNER JOIN tbl_ukuran C ON A.idUkuran = C.idUkuran 
                                    INNER JOIN tbl_kategori D ON A.idKategori = D.idKategori 
                                    WHERE A.idPesanan= '$idPesanan'");
                        $no = 1;
                        while ($res = mysqli_fetch_array($kueri)) {
                            $status = $res['statusPesanan'];
                            $resi = $res['resi'];
                        ?>
                            <div class="card-title">
                                <h4 class="d-inline">Detail Pesanan</h4>
                                <a href="adminweb.php?module=cetakData&idPelanggan=<?php echo $res['idPelanggan']; ?>&idPenjahit=<?php echo $res['idPenjahit']; ?>" class="btn btn-success float-right mb-3" data-toggle="tooltip" data-placement="top" title="Cetak Data Pengiriman"><i class="ti-printer"></i></a>
                                <?php if($status=='U'){?>
                                            <a class="btn btn-sm btn-secondary" href="<?php echo $admin_url;?>adminweb.php?module=ulasan&id=<?php echo $res['idPesanan']?>"><i class="ti-comment-alt"></i> Ulasan</a>
                                            <?php }?>

                            </div>

                            <div class="form-validation">
                                <?php
                                if ($status == 'B') { ?>
                                    <div class="alert alert-warning alert-dismissible fade show mt-4">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> Pesanan dibatalkan! Anda tidak bisa melakukan proses penjahitan pada pesanan ini. </div>
                                <?php } ?>

                                <form class="form-valide" action="module/pesanan/aksiProses.php" method="post" enctype="multipart/form-data">

                                    <?php if ($status == "MK") {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button> <strong>Pesanan belum dikonfirmasi!</strong> Berikan konfirmasi kepada pelanggan bahwa Anda akan memproses pesanan</div>
                                    <?php } ?>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">ID Pesanan
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control " hidden name="idPesanan" value="<?php echo $idPesanan; ?>">
                                            <input type="text" class="form-control " disabled="disabled" name="idPesanan" value="<?php echo $idPesanan; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Nama Pelanggan
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control " disabled="disabled" name="nama" value="<?php echo $res['nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Jumlah
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control " disabled="disabled" name="jumlah" value="<?php echo $res['jumlah']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Bahan Jahit
                                        </label>
                                        <div class="col-md-8">
                                        <?php if($res['bahan']=='Y'){ ?>
                                            
                                            <div class="alert alert-warning">
                                        Pelanggan akan menggunakan bahan jahit sendiri dan akan mengirimkannya kepada Anda. Berikan konfirmasi setelah menerima bahan jahit dari pelanggan
                                        <?php if($res['kurirKirim']!='' && $res['konfirmasiBahan']=='0'){ ?> <hr>Bahan akan dikirim dengan jasa  <?php echo $res['kurirKirim']; ?></div>
                                    
                                                <a class="btn btn-sm btn-primary" href="module/pesanan/aksiKonfirmasi.php?idPesanan=<?php echo $res['idPesanan'];?>" onClick="return confirm('Bahan dari pelanggan sudah Anda terima?')">Diterima</a>
                                                <?php  }else{
                                                    echo "</div>";
                                                } ?>
                                                <?php  }else{ ?>
                                        <div class="alert alert-warning">
                                        Seluruh bahan jahit dari penjahit </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Tanggal Pesan
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control " disabled="disabled" name="jumlah" value="<?php echo date_format(date_create($res['tglOrder']), 'd/m/Y'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Ukuran
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control " disabled="disabled" name="ukuran" value="<?php echo $res['size']; ?>">
                                            <a class="btn btn-sm btn-primary" href="adminweb.php?module=lihatUkuran">Lihat Ukuran</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Jenis
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control " disabled="disabled" name="jenisKelamin" value="<?php
                                                                                                                                    if ($res['gender'] == 'L') {
                                                                                                                                        echo "Laki-laki";
                                                                                                                                    } else if ($res['gender'] == 'P') {
                                                                                                                                        echo "Perempuan";
                                                                                                                                    } else {
                                                                                                                                        echo "Unisex";
                                                                                                                                    } ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Kategori
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control " disabled="disabled" name="ukuran" value="<?php echo $res['namaKategori']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Deskripsi
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $res['deskripsi']; ?>
                                        </div>
                                    </div>

                                    <div class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $idKatalog = $res['idKatalog'];
                                            $queryKat = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idKatalog= '$idKatalog'");
                                            while ($resK = mysqli_fetch_array($queryKat)) {

                                            ?>
                                                <div class="carousel-item active">
                                                    <img style="object-fit: contain;" data-id="100" class="d-block w-100 img-zoom" height="400" src="upload/<?php echo $resK['foto']; ?>">
                                                </div>
                                                <div>

                                                    <h5 class="text-center"><?php echo $resK['idKatalog'] . "-" . $resK['namaKatalog']; ?></h5>
                                                </div>
                                            <?php

                                            } ?>

                                        </div>
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $queryFoto = mysqli_query($koneksi, "SELECT * FROM tbl_itemFoto WHERE idPesanan= '$idPesanan'");
                                                $no = 1;
                                                while ($resF = mysqli_fetch_array($queryFoto)) {

                                                ?>
                                                    <div class="carousel-item 
                                            <?php if ($no == 1) {
                                                        echo "active";
                                                    } ?>" id="img-container">
                                                        <img style="object-fit: cover;" data-id="<?php echo $no ?>" class="d-block w-100 img-zoom" height="400" src="upload/<?php echo $resF['foto']; ?>">
                                                    </div>

                                                <?php
                                                    $no++;
                                                } ?>
                                            </div><a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carouselExampleControls" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                                        </div>

                                        <?php

                                        $queryBayar = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran WHERE idPesanan= '$idPesanan'");
                                        $count = mysqli_num_rows($queryBayar);
                                        $resB = mysqli_fetch_array($queryBayar);
                                        if ($count <= 0) {
                                        ?>
                                            <div class="alert alert-info alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button> Masukkan total biaya jasa jahit untuk pesanan ini. Anda hanya dapat memasukkannya sekali </div>
                                        <?php } ?>
                                        <div class="form-group row mt-2">
                                            <label class="col-md-2 col-form-label">Biaya Jahit
                                            </label>
                                            <div class="col-md-8 input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control " name="harga" <?php if ($resB['totalBayar'] != '') {
                                                                                                            echo "disabled='disabled' value='" . number_format($resB['totalBayar']) . "'";
                                                                                                        } ?>>

                                            </div>
                                        </div>
                                        <?php if ($resB['totalBayar'] != '') {?>
                                        <div class="form-group row mt-2">
                                            <label class="col-md-2 col-form-label">Biaya Kirim
                                            </label>
                                            <div class="col-md-8 input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control " name="harga" <?php if ($resB['totalBayar'] != '') {
                                            echo "disabled='disabled' value='" . number_format($resB['biayaKirim']) . "'";
                                        } ?>>

                                            </div>
                                        </div>
                                        <?php }?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Perkiraan Tanggal Selesai</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="tglSelesai" id="mdate" value="<?php if ($res['tglSelesai'] != '20-20-2020') {
                                                                                                                                echo date_format(new DateTime('now', new DateTimeZone('Asia/Jakarta')), 'Y/m/d');
                                                                                                                            } else {
                                                                                                                                echo date_format(new DateTime($res['tglSelesai']), 'Y/m/d');
                                                                                                                            } ?>">
                                            </div>
                                        </div>

                                        <?php if ($res['idKurir'] != 0) {
                                            $idKurir = $res['idKurir'];
                                            $queryKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir WHERE idKurir= '$idKurir'");
                                            $resKur = mysqli_fetch_array($queryKurir);

                                        ?>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Kurir
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control " disabled="disabled" name="kurir" value="<?php echo $resKur['namaKurir'] . " - " . $res['detailKurir']; ?>">
                                                </div>
                                            </div>

                                        <?php } ?>

                                        <?php if ($status != "MK") {
                                        ?>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="val-username">Status Pesanan
                                                </label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" id="statusPesanan" name="status" <?php
                                                                                                                    if ($status == 'B' || $status == 'U' || $status == 'F') {
                                                                                                                        echo "disabled";
                                                                                                                    } ?>>
                                                       
                                                            
                                                        
                                                        <option value="MP" <?php if ($status == 'MP') {
                                                                                echo "selected";
                                                                            } ?>>Menunggu Proses</option>
                                                        <option value="P" <?php if ($status == 'P') {
                                                                                echo "selected";
                                                                            } ?>>Proses Penjahitan</option>
                                                        <option value="S" <?php if ($status == 'S') {
                                                                                echo "selected";
                                                                            } ?>>Selesai Penjahitan</option>
                                                        <option value="K" <?php if ($status == 'K') {
                                                                                echo "selected";
                                                                            } ?>>Dikirim</option>

                                                        <?php
                                                        if ($status == 'B' || $status == 'U' || $status == 'F') {
                                                        ?>
                                                            <option <?php if ($status == 'F' || $status == 'U') {
                                                                        echo "selected";
                                                                    } ?>>Selesai</option>
                                                    
                                                        <?php }else if($status == 'B'){ ?>
                                                            <option>Dibatalkan</option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row resi">

                                            </div>

                                        <?php } ?>


                                        <?php
                                        if ($status != 'B' && $status != 'K' && $status != 'U' && $status != 'F') {


                                        ?>
                                            <button type="submit" onClick="return confirm('Anda yakin ingin menyimpan data ini?')" class="btn btn-primary gradient-1 mt-4 float-right">
                                                <?php
                                                if ($status == 'MK') {
                                                    echo "Proses Pesanan";
                                                } else {
                                                    echo "Simpan";
                                                }
                                                ?>
                                            </button>

                                    <?php }
                                    } ?>
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

    function input_resi(resi) {
        var grup = '<label class="col-md-2 col-form-label">Resi';
        grup += '</label>';
        grup += '<div class="col-md-8">';
        grup += '<input type="text" class="form-control"  name="resi" value="' + resi + '">';
        grup += '</div>';
        $('.resi').html(grup);
    }



    $(document).ready(function() {
        var status = "<?php echo $status; ?>";
        var resi = "<?php echo $resi; ?>";
        if (status == 'K') {
            input_resi(resi);
        }

    })

    $(document).on('change', '#statusPesanan', function() {
        var status = $('#statusPesanan').val();
        if (status == "K") {
            input_resi('');
        } else {
            $('.resi').html('');
        }
    });
</script>