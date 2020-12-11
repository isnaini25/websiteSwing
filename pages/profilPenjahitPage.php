<main>
    <div class="container-fluid">
        <div class="row profil-penjahit ">
            <?php
            include "lib/config.php";
            include "lib/koneksi.php";
            $id = $_GET['id'];
            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit ='$id'");
            while ($res = mysqli_fetch_array($kueri)) {
            ?>
                <div class="col-sm-6">
                    <img src="admin/upload/<?php echo $res['foto']; ?>" alt="" class="img-fluid" width="500px">
                </div>
                <div class="col-sm-6">
                    <div class="keterangan">
                        <h5><?php echo $res['nama']; ?></h5>
                        <p><?php echo $res['alamat']; ?></p>
                        <p><?php echo $res['deskripsi']; ?></p>
                    </div>
                    <div class="aksi">
                        <button>Chat</button>
                        <button>Buat Jahitan</button>

                    </div>

                </div>
            <?php } ?>

        </div>
        <hr>


        <div class="row">
            <div class="col-lg-12 katalog">
                <div class="owl-carousel owl-theme">
                    <?php

                    $id = $_GET['id'];
                    $kueriKat = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idPenjahit ='$id' LIMIT 10");
                    while ($resKat = mysqli_fetch_array($kueriKat)) {
                    ?>
                        <div class=" katalog-list" >

                            <img src="admin/upload/<?php echo $resKat['foto']; ?>" alt="" >
                            <div class="nama-katalog" >
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

                                <a href=""><i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>

    </div>


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

    });
   
</script>