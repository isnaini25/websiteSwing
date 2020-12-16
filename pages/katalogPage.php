<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-2 link-bread">
                <ul>
                    <?php
                    $id = $_GET['id']; 
                    $nama = $_GET['nama'];
                    ?> 
                    <li><a href="profilPenjahit.php?id=<?php echo $id;?>"><?php echo $nama;?></a></li>
                    <li><i class="ti-angle-right"></i>  Katalog</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 title">
                <p style="text-align: center;">Katalog Jahitan</p>
            </div>

        </div>

        <div class="row penjahit-katalog">

            <?php
            include "lib/config.php";
            include "lib/koneksi.php";
            
            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idPenjahit ='$id'");
            while ($res = mysqli_fetch_array($kueri)) {
            ?>
                <div class="col-lg-3 col-md-3 col-sm-6 katalog-item">
                    <div class="katalog-list">
                    <div class="katalog-next">
                        <a href="" data-toggle="tooltip" data-placement="right" title="Lihat secara lengkap"><i class="ti-arrow-circle-right"></i></a>
                    </div> 
                        <img src="admin/upload/<?php echo $res['foto']; ?>" alt="">
                        <div class="nama-katalog">
                            <p>
                                <?php $name = strip_tags($res['namaKatalog']);
                                if (strlen($name) > 20) {
                                    $stringCut = substr($name, 0, 20);
                                    $endPoint = strrpos($stringCut, ' ');


                                    $name = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $name .= '...';
                                }
                                echo $name;

                                ?>
                            </p>
                               
                            <a href="order.php?idKatalog=<?php echo $res['idKatalog']; ?>&id=<?php echo $id; ?>&nama=<?php echo $nama;?>" data-toggle="tooltip" data-placement="bottom" title="Buat jahitan" ><i class="ti-plus"></i></a>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>


    </div>
    </div>
</main>