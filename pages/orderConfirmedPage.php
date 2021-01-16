<style>
    .jasa-pengiriman{
        display: block;
    }
</style>
<main>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3 link-bread">
                <ul>

                    <li><a href="home.php">Beranda</a></li>
                    <li><i class="ti-angle-right"></i>Rincian Pesanan</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php
            include "lib/config.php";
            include "lib/koneksi.php";
            $idPesanan = $_GET['id'];

            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_penjahit B ON A.idPenjahit = B.idPenjahit 
            INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori 
            INNER JOIN tbl_ukuran D ON A.idUkuran = D.idUkuran WHERE idPesanan ='$idPesanan'");
            while ($res = mysqli_fetch_array($kueri)) {
                $idPenjahit = $res['idPenjahit'];
                $kurir = $res['idKurir'];
                $detail = $res['detailKurir'];
                $st = $res['statusPesanan'];
                $bahan  = $res['bahan'];
                $kurirKirim = $res['kurirKirim'];
            ?>


                <div class="col-sm-6 p-3">
                    <div class="rincian-pesanan">
                        <h5 class="text-center">Rincian Pesanan Jahit</h5>

                        <?php if ($st == 'MB') { ?>
                            <div class="alert alert-success fade show" role="alert">
                                <strong>Pesanan telah dikonfirmasi!</strong> Pesanan Anda telah dikonfirmasi oleh penjahit, berikut ini rincian pesanan jahit Anda. Segera lakukan pembayaran agar jahitan segera diproses oleh penjahit.

                            </div>
                        <?php } else if ($st == 'B') { ?>
                            <div class="alert alert-warning fade show" role="alert">
                                <strong>Pesanan berhasil dibatalkan!</strong> Pesanan Anda telah berhasil dibatalkan, penjahit tidak akan memproses pesanan ini.

                            </div>
                        <?php } ?>
                        <table class="tabel-rincian">
                            <tr>
                                <th>Status Pesanan</th>
                                <td><?php

                                    if ($st == 'MK') {
                                        echo "<span class='badge badge-pill badge-primary'>Menunggu Konfirmasi</span>";
                                    } else if ($st == 'MB') {
                                        echo "<span class='badge badge-pill badge-secondary'>Menunggu Pembayaran</span>";
                                    } else if ($st == 'MP') {
                                        echo "<span class='badge badge-pill badge-warning'>Menunggu Proses Jahit</span>";
                                    } else if ($st == 'P') {
                                        echo "<span class='badge badge-pill badge-info'>Proses Penjahitan</span>";
                                    } else if ($st == 'S') {
                                        echo "<span class='badge badge-pill badge-info'>Selesai Penjahitan</span>";
                                    } else if ($st == 'K') {
                                        echo "<span class='badge badge-pill badge-light'>Dikirim</span>";
                                    } else if ($st == 'F' || $st == 'U') {
                                        echo "<span class='badge badge-pill badge-success'>Selesai</span>";
                                    } else if ($st == 'B') {
                                        echo "<span class='badge badge-pill badge-danger'>Batal</span>";
                                    } ?></td>
                            </tr>
                            <?php if ($st == 'K') { ?>
                                <tr>
                                    <th>Resi</th>
                                    <td><?php echo $res['resi']; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th>ID Pesanan</th>
                                <td><?php echo $res['idPesanan']; ?></td>
                            </tr>
                            <tr>
                                <th>Penjahit</th>
                                <td><a href="profilPenjahit.php?id=<?php echo $res['idPenjahit']; ?>"><?php echo $res['nama']; ?></a></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?php echo $res['namaKategori']; ?></td>
                            </tr>

                            <tr>
                                <th>Deskripsi</th>
                                <td><?php echo $res['deskripsi']; ?></td>
                            </tr>
                            <tr>
                                <th>Ukuran</th>
                                <td><?php echo $res['size']; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td><?php echo $res['jumlah']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <td><?php echo date_format(new DateTime($res['tglOrder']), 'd M Y'); ?></td>
                            </tr>
                            <tr>
                                <th>Perkiraan Tanggal Selesai</th>
                                <td><?php echo date_format(new DateTime($res['tglSelesai']), 'd M Y'); ?></td>
                            </tr>
                            
                            <tr class="foto-pesanan">
                                <td colspan="2">
                                    <div id="carouselExampleControls" class="carousel slide foto-pesanan" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $queryFoto = mysqli_query($koneksi, "SELECT * FROM tbl_itemFoto WHERE idPesanan= '$idPesanan'");
                                            $count = mysqli_num_rows($queryFoto);
                                            $no = 1;
                                            if ($count > 0) {
                                                while ($resF = mysqli_fetch_array($queryFoto)) {
                                            ?>
                                                    <div class="carousel-item 
                                            <?php if ($no == 1) {
                                                        echo "active";
                                                    } ?>" id="img-container">
                                                        <img style="object-fit: cover;" data-id="<?php echo $no ?>" class="d-block w-100 img-zoom" height="400" src="admin/upload/<?php echo $resF['foto']; ?>">
                                                    </div>

                                                <?php
                                                    $no++;
                                                }
                                            }
                                            if ($no > 1) {
                                                ?>
                                        </div><a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                                    <?php
                                            } ?>
                                    </div>

                                </td>
                            </tr>

                            <tr class="foto-pesanan">
                                <td colspan="2">
                                    <div id="carouselKatalog" class="carousel slide " data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $idKatalog = $res['idKatalog'];
                                            $queryKatalog = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idKatalog= '$idKatalog'");
                                            $countKatalog = mysqli_num_rows($queryKatalog);
                                            if ($countKatalog > 0) {
                                                while ($resKat = mysqli_fetch_array($queryKatalog)) {
                                            ?>
                                                    <div class="carousel-item active" id="img-container">
                                                        <img style="object-fit: contain;" class="d-block w-100 img-zoom" height="400" src="admin/upload/<?php echo $resKat['foto']; ?>">
                                                    </div>

                                            <?php

                                                }
                                            }

                                            ?>
                                        </div>

                                </td>
                            </tr>
                        </table>
                        <?php if($st=='K'){?>
                        <a href="aksiUpdate.php?idPesanan=<?php echo $idPesanan?>" onClick="return confirm('Apakah Anda sudah menerima jahitan?')"  class="btn-diterima text-center mt-2">Jahitan diterima</a>
                        <?php }else if($st=='F'){?>
                            <a href="ulasan.php?idPesanan=<?php echo $idPesanan?>" class="btn-diterima text-center mt-2">Beri Penilaian</a>
                            <?php }?>
                    </div>
                </div>
            <?php } ?>


            <div class="col-sm-6 p-3">
                <?php if ($bahan == 'Y' && $st != 'B' && $st =='MB') { ?>
                    <div class="alamat-pesanan">
                        <h5 class="text-center">Pengiriman Bahan</h5>
                       
                            <form action="aksiKonfirmasi.php" method="POST">
                            <?php if($kurirKirim==''){?>
                            <input type="text" class="form-control" hidden name="idPesanan" value="<?php echo $idPesanan; ?>">
                            <div class="alert alert-warning fade show" role="alert">
                                <p><strong>Halo!</strong> Pada pesanan ini Anda memilih akan mengirimkan bahan jahit kepada penjahit. Mohon lakukan konfirmasi </p>
                                <!-- <hr>
                            <p>Bahan jahit yang Anda kirimkan</p> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apakah Anda yakin akan mengirimkan bahan jahit kepada penjahit?</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan" value="Y" id="ya" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Ya, saya yakin akan mengirimkannya.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahan" value="T" id="tidak">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Tidak, saya berubah pikiran.
                                    </label>
                                </div>

                            </div>
                        <?php }?>
                        <div class="form-group jasa-pengiriman" id="jasa-pengiriman">
                            <label for="exampleInputEmail1">Jasa Pengiriman</label>
                            <input type="text" class="form-control" placeholder="Masukkan jasa pengiriman yang digunakan.." name="jasa" <?php if($kurirKirim!=''){ echo "disabled";}?> value="<?php if($kurirKirim!=''){
                                echo $kurirKirim;
                            }?>">
                           
                        
                            <p class="mt-4">Kirimkan bahan jahit ke alamat berikut ini : </p>
                            <table style="width: 350px;">
                                <?php 
                                
                                $kueriPenjahit = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit = '$idPenjahit'");
                                $resPen = mysqli_fetch_array($kueriPenjahit);?>
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td> <?php echo $resPen['nama'];?></td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td><?php echo $resPen['nohp'];?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $resPen['alamat'];?> <span id="kelurahan"></span></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>DI Yogyakarta</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>Bantul</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><span id="kecamatan"></span></td>
                                </tr>
                            </table>
                            
                        </div>
                        <?php if($kurirKirim==''){?>
                        <div class="d-flex justify-content-center">
                        <button onClick="return confirm('Konfirmasi pengiriman bahan?')" class="btn-proses ">Konfirmasi</button>
                        </div>
                        <?php }?>
                            </form>
                    </div>
                <?php } ?>

                
                <div class="biaya-pesanan">
                    <h5 class="text-center">Biaya Pesanan Jahit</h5>
                    <?php if ($st == 'MP') { ?>
                        <div class="alert alert-success fade show" role="alert">
                            <strong>Pembayaran telah dikonfirmasi!</strong> Pembayaran telah dikonfirmasi, pesanan jahitan Anda akan segera diproses oleh penjahit.
                        </div>
                    <?php



                    } ?>
                    <form action="aksiPembayaran.php" method="POST">
                        <input type="text" class="form-control" hidden name="idPesanan" value="<?php echo $idPesanan; ?>">
                        <div class="form-group row mt-2">
                            <label class="col-md-2 col-form-label">Biaya Jahit
                            </label>
                            <div class="col-md-8 input-group">
                                <?php

                                $queryBayar = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran WHERE idPesanan= '$idPesanan'");
                                $resB = mysqli_fetch_array($queryBayar);

                                ?>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" disabled name="harga" value="<?php echo number_format($resB['totalBayar'], 2); ?>">

                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-md-2 col-form-label">Kurir
                            </label>
                            <div class="col-md-4 input-group">
                                <select class="form-control mb-2" id="kurir" name="kurir" <?php if ($st == 'MP' || $st != 'MB') {
                                                                                                echo "disabled";
                                                                                            } ?>>
                                    <option value="" selected disabled>--pilih kurir--</option>
                                    <?php


                                    $kueriKur = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
                                    while ($resK = mysqli_fetch_array($kueriKur)) {
                                    ?>
                                        <option value="<?php echo $resK['idKurir']; ?>" <?php if ($st == 'MP' || $st != 'MB' && $resK['idKurir'] == $kurir) {
                                                                                            echo "selected";
                                                                                        } ?> kurir="<?php echo strtolower($resK['namaKurir']); ?>"><?php echo $resK['namaKurir']; ?></option>
                                    <?php
                                    } ?>


                                </select>

                            </div>
                            <div class="col-md-4 input-group">
                                <select class="form-control" id="kurirDetail" name="kurirDetail" <?php if ($st == 'MP' || $st == 'B') {
                                                                                                        echo "disabled";
                                                                                                    } ?>>
                                    <?php if ($st == 'MP' || $st != 'MB') { ?>
                                        <option selected><?php echo $detail; ?></option>
                                    <?php } ?>

                                </select>

                            </div>

                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-md-2 col-form-label">Biaya Kirim
                            </label>
                            <div class="col-md-8 input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" disabled name="ongkir" value="<?php echo number_format($resB['biayaKirim'], 2); ?>">
                                <input type="text" class="form-control" hidden name="biayaKirim">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-md-2 col-form-label">Total Bayar
                            </label>
                            <div class="col-md-8 input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control biaya" disabled name="biaya" value="<?php echo number_format($resB['totalBayar'] + $resB['biayaKirim'], 2); ?>">

                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-md-2 col-form-label">Metode Bayar
                            </label>
                            <div class="col-md-8 input-group">
                                <select class="form-control" name="metodeBayar" <?php if ($st == 'MP' || $st != 'MB') {
                                                                                    echo "disabled";
                                                                                } ?>>
                                    <?php


                                    $kueriMet = mysqli_query($koneksi, "SELECT * FROM tbl_metodeBayar");
                                    while ($resM = mysqli_fetch_array($kueriMet)) {

                                    ?>
                                        <option value=" <?php echo $resM['idMetodeBayar']; ?>" <?php if ($resM['idMetodeBayar'] == $resB['idMetodeBayar']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $resM['namaMetode']; ?></option>
                                    <?php
                                    } ?>
                                </select>

                            </div>
                        </div>
                        <?php if ($st == 'MB') { ?>
                            <a href="aksiUpdate.php?batal=y&idPesanan=<?php echo $idPesanan; ?>" onClick="return confirm('Apakah Anda yakin akan membatalkan pesanan ini?')" class="btn btn-danger">Batalkan Pesanan</a>
                            <button onClick="return confirm('Lanjutkan proses pembayaran?')" class="btn-proses float-right">Proses Pembayaran</button>
                        <?php } ?>
                    </form>
                </div>


                <div class="alamat-pesanan">
                    <h5 class="text-center">Alamat Pengiriman</h5>
                    <div>
                        <?php

                        $idPelanggan = $_SESSION['id_pelanggan'];
                        $kueriP = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE idPelanggan = '$idPelanggan'");
                        $resP = mysqli_fetch_array($kueriP);

                        ?>
                        <p><?php echo $resP['nama']; ?></p>
                        <p><?php echo $resP['nohp']; ?></p>
                        <p><?php echo $resP['alamat']; ?> <span id="kota"></span> <span id="provinsi"></span></p>

                    </div>
                </div>
            </div>
        </div>
        <hr>



    </div>


</main>

<script>
    var id_kota = "<?php echo $resP['id_kota']; ?>";
    var id_provinsi = "<?php echo $resP['id_provinsi']; ?>";
    var biaya = "<?php echo $resB['totalBayar']; ?>";
    $(document).ready(function() {
        function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
            try {
                decimalCount = Math.abs(decimalCount);
                decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

                const negativeSign = amount < 0 ? "-" : "";

                let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                let j = (i.length > 3) ? i.length % 3 : 0;

                return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
            } catch (e) {
                console.log(e)
            }
        };


        $("select[name=kurir]").on("change", function() {
            var kurir = $("option:selected", this).attr("kurir");
            $.ajax({
                type: 'post',
                url: 'checkOngkir.php',
                data: 'kurir=' + kurir + "&kota_tujuan=" + id_kota,
                success: function(hasil_cek) {
                    $("select[name=kurirDetail]").html(hasil_cek);
                }
            })
        })

        $("select[name=kurirDetail]").on("change", function() {
            var harga = $("option:selected", this).attr("tarif");
            var ongkir = formatMoney(harga);
            $("input[name=ongkir]").val(ongkir);
            $("input[name=biayaKirim]").val(harga);

            var total = parseInt(biaya) + parseInt(harga);
            $("input[name=biaya]").val(formatMoney(total));

        })

        $("input[name=bahan]").on("click", function() {
            var x = document.getElementById('jasa-pengiriman');
            if(document.getElementById("ya").checked){
               
               x.style.display = 'block';
            }else{
                x.style.display = 'none';
            }

        })



        $.ajax({
            type: 'post',
            data: 'id_provinsi=' + id_provinsi + '&page=profil',
            url: 'admin/module/data/dataProvinsi.php',
            success: function(hasil_provinsi) {

                $("#provinsi").html(hasil_provinsi);

            }
        });
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKota.php',
            data: 'id_kota=' + id_kota + '&id_provinsi=' + (id_provinsi) + '&page=profil',
            success: function(hasil_kota) {
                $("#kota").html(hasil_kota);

            }

        });

        var id_kecamatan = "<?php if(isset($resPen['idKecamatan'])){
            echo $resPen['idKecamatan'];
        } ?>";
        var id_kelurahan = "<?php if(isset($resPen['idKelurahan'])){
            echo $resPen['idKelurahan'];
        } ?>";
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
    })
</script>