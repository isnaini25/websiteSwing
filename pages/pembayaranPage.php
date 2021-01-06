<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3 link-bread">
                <ul>

                    <li><a href="home.php">Beranda</a></li>
                    <li><i class="ti-angle-right"></i>Rincian Pembayaran</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 p-3">

                <div class="rincian-pembayaran mb-5">
                    <h5 class="text-center">Menunggu Pembayaran</h5>
                    <?php
                    include "lib/config.php";
                    include "lib/koneksi.php";
                    $idPesanan = $_GET['idPesanan'];
                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran B 
            INNER JOIN tbl_metodeBayar C ON B.idMetodeBayar = C.idMetodeBayar WHERE idPesanan ='$idPesanan'");
                    while ($res = mysqli_fetch_array($kueri)) {

                    ?>
                        <p class="text-center"> Silakan melakukan pembayaran ke rekening berikut ini : </p>
                        <p class="text-center"><?php echo $res['rekening'] . " - " . $res['namaMetode']; ?></p>

                        <p class="text-center total-bayar"> Sebesar
                            Rp<?php echo number_format($res['biayaKirim'] + $res['totalBayar']); ?>
                        </p>
                    <?php   } ?>

                    <form action="aksiBuktiPembayaran.php" method="POST" enctype="multipart/form-data">
                        <div class="bukti-bayar">
                            <label class="col-form-label">Bukti Pembayaran
                            </label>

                            <div class="mb-2">
                                <input type="text" hidden name="idPesanan" value="<?php echo $idPesanan;?>">
                                <input type="file" class="form-control" name="bukti" required accept="image/*">
                            </div>

                            <button class="btn-proses">Kirim Bukti</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</main>