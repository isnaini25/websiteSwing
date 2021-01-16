<style>
    .checked {
        color: orange;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3 link-bread">
                <ul>

                    <li><a href="home.php">Beranda</a></li>
                    <li><i class="ti-angle-right"></i> Profil Penjahit</li>
                </ul>
            </div>
        </div>
        <div class="profil-penjahit">
            <div class="row p-3">

                <?php
                include "lib/config.php";
                include "lib/koneksi.php";
                $id = $_GET['id'];
                $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit ='$id'");
                while ($res = mysqli_fetch_array($kueri)) {
                    $nama = $res['nama'];
                    $id_kecamatan = $res['idKecamatan'];
                    $id_kelurahan = $res['idKelurahan'];
                ?>
                    <div class="col-sm-6">
                        <img src="admin/upload/<?php echo $res['foto']; ?>" alt="" class="img-fluid" width="500px">
                    </div>
                    <?php

                    $kueriUl = mysqli_query($koneksi, "SELECT AVG(nilai) as nilai FROM tbl_ulasan A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan WHERE B.idPenjahit = '$id' ");

                    $resUl = mysqli_fetch_array($kueriUl);

                    ?>
                    <div class="col-sm-6">
                        <div class="keterangan">
                            <h5 class="nama-penjahit"><?php echo $res['nama']; ?> <span class="penilaian"><?php echo number_format($resUl['nilai'], 0) . "/5"; ?></span></h5>
                            <div class="kategori">
                                <?php $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_itemKategori A INNER JOIN tbl_kategori B ON A.idKategori = B.idKategori WHERE A.idPenjahit ='$id'");
                                while ($resK = mysqli_fetch_array($kueriKategori)) {
                                ?>
                                    <span class="badge-kategori"><?php echo $resK['namaKategori']; ?></span>
                                <?php
                                } ?>

                            </div>


                            <p><b>Harga mulai dari Rp<?php echo number_format($res['hargaMinimal']); ?></b></p>
                            <p class="alamat-penjahit"><?php echo $res['alamat']; ?><span id="kelurahan"></span> <span id="kecamatan"></span></p>

                            <p><?php echo $res['deskripsi']; ?></p>
                        </div>
                        <div class="aksi">
                            <button class="aksi-chat" data-toggle="modal" data-target=".chat" data-id="<?php echo $res['idPenjahit']; ?>" data-nama=" <?php echo $res['nama']; ?>"><i class="ti-comments"></i> Chat </button>
                            <button class="aksi-pesan" onclick="window.location.href='order.php?id=<?php echo $res['idPenjahit']; ?>&nama=<?php echo $nama; ?>'">Buat Jahitan</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <hr>


        <div class="row">
            <div class="col-lg-12 katalog">
                <div class="owl-carousel owl-theme">
                    <?php
                    $kueriKat = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idPenjahit ='$id' AND status = 1 LIMIT 10");
                    while ($resKat = mysqli_fetch_array($kueriKat)) {
                    ?>
                        <div class="katalog-list">
                            <div class="katalog-next">
                                <a href="" data-toggle="tooltip" data-placement="right" title="Lihat secara lengkap"><i class="ti-arrow-circle-right"></i></a>
                            </div>
                            <img src="admin/upload/<?php echo $resKat['foto']; ?>" alt="">
                            <div class="nama-katalog">
                                <p>
                                    <?php $name = strip_tags($resKat['namaKatalog']);
                              
                                    if (strlen($name) > 20) {
                                        $stringCut = substr($name, 0, 20);
                                        $endPoint = strrpos($stringCut, ' ');

                                        $name = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                   
                                        $name .= '...';
                                    }
                                    echo $name;

                                    ?>
                                </p>

                                <a href="order.php?idKatalog=<?php echo $resKat['idKatalog']; ?>&id=<?php echo $id; ?>&nama=<?php echo $nama; ?>"><i class="ti-plus"></i></a>
                            </div>

                        </div>

                    <?php } ?>

                </div>
                <div class="row">
                    <div class="col-sm-12 link-katalog">
                        <a href="katalog.php?id=<?php echo $id; ?>&nama=<?php echo $nama; ?>"> Lihat katalog lengkap</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="ulasan-pelanggan">
                    <h5 class="text-center ulasan-title">Ulasan dan Penilaian Pelanggan</h5>
                    <?php
                    $kueriUl = mysqli_query($koneksi, "SELECT * FROM tbl_ulasan A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan 
                    INNER JOIN tbl_pelanggan C ON B.idPelanggan = C.idPelanggan WHERE B.idPenjahit ='$id' ");
                    while ($resUl = mysqli_fetch_array($kueriUl)) {
                    ?>
                        <div class="ulasan-item">
                            <div class="nilai">
                                <p><?php echo $resUl['username']; ?></p>
                                <?php $nilai = $resUl['nilai'];
                                $not = 5 - $nilai;
                                for ($i = 1; $i <= $nilai; $i++) { ?>
                                    <span class="fa fa-star rating checked" cek="" data-id="1"></span>
                                <?php }
                                for ($i = 1; $i <= $not; $i++) {
                                ?>
                                    <span class="fa fa-star rating" cek="" data-id="1"></span>
                                <?php }

                                ?>
                            </div>
                            <p><?php echo $resUl['ulasan']; ?></p>
                            <img src="admin/upload/<?php echo $resUl['fotoReview']; ?>" class="img-zoom" data-id="<?php echo $resUl['idUlasan']; ?>" width="100" alt="">
                        </div>

                    <?php } ?>


                    <!-- <div class="row">
                    <div class="col-sm-12 link-katalog">
                        <a href="katalog.php?id=<?php echo $id; ?>&nama=<?php echo $nama; ?>"> Lihat katalog lengkap</a>
                    </div>
                </div> -->
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Foto -->
    <div id="modal-img" role="dialog" class="foto-modal modal">
</main>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            stagePadding: 23,
            loop: true,
            margin: 2,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                    loop: false
                }
            }
        });

        var id_kecamatan = <?php echo $id_kecamatan; ?>;
        var id_kelurahan = <?php echo $id_kelurahan; ?>;
        $.ajax({
            type: 'post',
            data: 'id_kecamatan=' + id_kecamatan + '&page=profil',
            url: 'admin/module/data/dataKecamatan.php',
            success: function(hasil_kecamatan) {

                $("#kecamatan").html(hasil_kecamatan);

            }
        });
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKelurahan.php',
            data: 'id_kelurahan=' + id_kelurahan + '&id_kecamatan=' + (id_kecamatan * 10) + '&page=profil',
            success: function(hasil_kelurahan) {
                $("#kelurahan").html(hasil_kelurahan);

            }

        });

        function modal_image(id, src) {
            var modal_content = '<div class="modal-dialog" id="dialog-img-' + id + '">'
            modal_content += '<div class="modal-content">';
            modal_content += '<div class="modal-body">';
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

        $(document).on('click', '.close', function() {

            $('#modal-img').removeClass("show");


        });
    });
</script>