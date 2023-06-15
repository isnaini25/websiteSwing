 <main>

        <div class="container-fluid penjahit-corner">
        <div class="item-penjahit">
            <form action="homeByCari.php" class="cari" method="POST">
                <div class="form-group col-sm-6">
                    <?php if(isset($_POST['cari'])){
                        $q = $_POST['cari'];
                    }?>
                    <input class="form-control" type="text" placeholder="Cari penjahit.."  name="cari">
                </div>
                <button class="btn-find" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>

            <h1>Temukan penjahit yang cocok untuk Anda </h1>
            <div class="row show-penjahit">
                <div class="col-lg-2">
                    <div class="filter">
                        <h6>Filter <i class="fa fa-filter" aria-hidden="true"></i></h6>
                        <p>Kategori Penjahit</p>
                        <hr>
                        <form action="homeByKategori.php" method="POST">
                        <?php
                        include "lib/config.php";
                        include "lib/koneksi.php";

                        $idKat = implode(",", $_POST['kat']);
						$kats = explode(",", $idKat);
                        $kueriKat = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                        while ($resKat = mysqli_fetch_array($kueriKat)) {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kat[]" value="<?php echo $resKat['idKategori']; ?>" <?php if (in_array($resKat['idKategori'], $kats) ) {echo 'checked';}?>>
                                <label class="form-check-label"><?php echo $resKat['namaKategori']; ?></label>
                            </div>
                        <?php } ?>
                        </label>
                        <button class="terapkan">Terapkan</button>
                        </form>
                    </div>
                </div>
         
            <div class="col-lg-10">
                

                <div class="row">
                    <?php

                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit A INNER JOIN tbl_itemKategori B ON A.idPenjahit = B.idPenjahit WHERE  idKategori IN($idKat) AND statusAktif = 1 LIMIT 12  ");
                    while ($res = mysqli_fetch_array($kueri)) { ?>
                        <div class="col-sm-3">
                            <div class="penjahit-item">
                                <div class="penjahit-gambar">
                                    <img src="admin/upload/<?php echo $res['foto']; ?>" alt="">
                                </div>
                                <div class="penjahit-desc">
                                    <span class="penjahit-name"><?php echo $res['nama']; ?></span>
                                    <?php
                                    $idPenjahit = $res['idPenjahit'];
                                    $kueriItem = mysqli_query($koneksi, "SELECT * FROM tbl_itemKategori a INNER JOIN tbl_kategori b ON a.idKategori = b.idKategori WHERE idPenjahit = '$idPenjahit' LIMIT 2");
                                    $no = 0;
                                    while ($resItem = mysqli_fetch_array($kueriItem)) {

                                    ?>

                                        <span class="penjahit-category">
                                            <?php if ($no > 0) {
                                                echo ", ";
                                            }
                                            echo $resItem['namaKategori']; ?>
                                        <?php $no++;
                                    } ?>
                                        </span>

                                </div>
                                <div class="next">
                                    <a href="profilPenjahit.php?id=<?php echo $res['idPenjahit']; ?>">LIHAT</a>
                                </div>

                            </div>
                        </div>
                    <?php } ?>


                </div>
                <div class="row">
                    <div class="button-all">
                        <a href=""><span>Lihat lainnya</span></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>




    </main>