<style>
    .histori-pesanan {
        cursor: pointer;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3 link-bread">
                <ul>

                    <li><a href="home.php">Beranda</a></li>
                    <li><i class="ti-angle-right"></i>Pesanan</li>
                </ul>
            </div>
        </div>
        <div class="histori-all">

            <h5 class="text-center">Pesanan Jahit</h5>



            <?php
            include "lib/config.php";
            include "lib/koneksi.php";
            $idPelanggan = $_SESSION['id_pelanggan'];

            $no = 1;
            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_penjahit B ON A.idPenjahit = B.idPenjahit 
                            INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori 
                            INNER JOIN tbl_ukuran D ON A.idUkuran = D.idUkuran WHERE idPelanggan ='$idPelanggan' ORDER BY A.timestamp DESC");
            while ($res = mysqli_fetch_array($kueri)) {
                $idPesanan = $res['idPesanan'];
                $kueriBayar = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran WHERE idPesanan ='$idPesanan'");
                $resB = mysqli_fetch_array($kueriBayar);
                
            ?>


                <div class="histori-pesanan" data-href="orderConfirmed.php?id=<?php echo $idPesanan ; if($resB['statusBayar']=='S'){
                    echo "&idBayar=".$resB['idPembayaran'] ;
                }?>">

                    <div class="histori-gambar">
                        <?php

                        $kueriGambar = mysqli_query($koneksi, "SELECT * FROM tbl_itemFoto WHERE idPesanan ='$idPesanan' ORDER BY idItemFoto DESC LIMIT 1");
                        $count = mysqli_num_rows($kueriGambar);
                        $resF = mysqli_fetch_array($kueriGambar);
                        if ($count > 0) {
                            $src = $resF['foto'];
                        } else {
                            $idKatalog = $res['idKatalog'];
                            $kueriKat = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idKatalog ='$idKatalog'");
                            $count = mysqli_num_rows($kueriKat);
                            $resK = mysqli_fetch_array($kueriKat);
                            $src = $resK['foto'];
                        }
                        ?>

                        <img src="admin/upload/<?php echo $src; ?>" width="150" alt="">
                    </div>
                    <div class="histori-keterangan ">
                        <?php
                        $st = $res['statusPesanan'];
                        if ($st == 'MK') {
                            echo "<span class='badge badge-pill badge-primary'>Menunggu Konfirmasi</span>";
                        } else if ($st == 'MB') {
                            echo "<span class='badge badge-pill badge-secondary'>Menunggu Pembayaran</span>";
                        }else if ($st == 'KB') {
                            echo "<span class='badge badge-pill badge-secondary'>Menunggu Konfirmasi Pembayaran</span>";
                        } else if ($st == 'MP') {
                            echo "<span class='badge badge-pill badge-warning'>Menunggu Proses Jahit</span>";
                        } else if ($st == 'P') {
                            echo "<span class='badge badge-pill badge-info'>Proses Penjahitan</span>";
                        } else if ($st == 'S') {
                            echo "<span class='badge badge-pill badge-info'>Selesai Penjahitan</span>";
                        } else if ($st == 'K') {
                            echo "<span class='badge badge-pill badge-light'>Dikirim</span>";
                        } else if ($st == 'F' || $st == 'U' ) {
                            echo "<span class='badge badge-pill badge-success'>Selesai</span>";
                        } else if ($st == 'B') {
                            echo "<span class='badge badge-pill badge-danger'>Batal</span>";
                        }

                        ?>
                        <a href="" class="nama-penjahit"><?php echo $res['nama']; ?></a>
                        <p><?php echo $res['namaKategori']; ?></p>
                        
                        <p>Rp.<?php echo number_format($resB['totalBayar'] + $resB['biayaKirim']); ?></p>
                        <?php if($st=='K'){?>
                        <a href="aksiUpdate.php?idPesanan=<?php echo $idPesanan?>" onClick="return confirm('Apakah Anda sudah menerima jahitan?')"  class="btn-diterima">Jahitan diterima</a>
                        <?php }else if($st=='F'){?>
                            <a href="ulasan.php?idPesanan=<?php echo $idPesanan?>" class="btn-diterima">Beri Penilaian</a>
                            <?php }?>
                    </div>
                </div>

            <?php

                $no++;
            } ?>

        </div>

    </div>


</main>
<script>
    $(document).ready(function() {
        $(".histori-pesanan").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>