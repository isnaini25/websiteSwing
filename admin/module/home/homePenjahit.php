<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <?php
    if (!empty($_GET['sukses'])) {
    ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong>Pendaftaran berhasil!</strong> Selamat Anda telah terdaftar sebagai penjahit di <strong> Swing </strong></div>
                </div>
            </div>
        <?php } ?>
        <?php
        $id = $_SESSION['id_penjahit'];
        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit = '$id'");

        while ($res = mysqli_fetch_array($kueri)) {
            if ($res['hargaMinimal'] == "0") { ?>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Selesaikan pendaftaran!</strong> Masukan seluruh data yang diperlukan</div>
                                    <div class="form-validation">
                                        <form class="form-valide" action="module/penjahit/aksiDaftar.php" method="post">
                                            <fieldset id="formKategori">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Kategori Penjahit (Kemampuan)
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="item[]">
                                                            <option value="">Pilih Kategori</option>
                                                            <?php
                                                            $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                                            while ($res = mysqli_fetch_array($kueri)) {
                                                            ?>

                                                                <option value="<?php echo $res['idKategori']; ?>"><?php echo $res['namaKategori']; ?></option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <button type="button" class="btn mb-1 btn-rounded btn-primary mt-2" name="add" id="add"><i class="ti-plus"></i></button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Deskripsi
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea class="form-control h-150px" rows="6" name="deskripsi" placeholder="Masukan deskripsi penjahit secara lengkap.." required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Harga Jasa Minimal
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="hargaMinimal" placeholder="Masukan harga jasa minimal..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Kuota Jumlah Pesanan
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="kuotaPesanan" placeholder="Masukan kuota pesanan per minggu..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">Nomor Rekening
                                                </label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="bank" name="bank">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username">
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="rekening" placeholder="Masukan nomor rekening..." required>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Jahitan Selesai</h3>
                            <div class="d-inline-block">
                                <?php
                                $id = $_SESSION['id_penjahit'];
                                $kueriJahit = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE idPenjahit = '$id' AND statusPesanan = 'F' OR idPenjahit = '$id' AND statusPesanan = 'U' ");

                                $countPesanan = mysqli_num_rows($kueriJahit);
                                ?>

                                <h2 class="text-white"> <?php echo $countPesanan; ?></h2>

                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pendapatan Bersih</h3>
                            <div class="d-inline-block">
                                <?php

                                $kueriP = mysqli_query($koneksi, "SELECT SUM(B.totalBayar) as total FROM tbl_pesanan A INNER JOIN tbl_pembayaran B ON A.idPesanan = B.idPesanan WHERE A.idPenjahit = '$id' AND A.statusPesanan = 'U' OR A.statusPesanan = 'F' ");

                                $resP = mysqli_fetch_array($kueriP);
                                $countPendapatan = $resP['total'];
                                ?>
                                <h2 class="text-white"><?php echo "Rp" . number_format($countPendapatan); ?></h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pelanggan Baru</h3>
                            <div class="d-inline-block">
                                <?php

                                $kueriPel = mysqli_query($koneksi, "SELECT COUNT(DISTINCT(idPelanggan)) as pelanggan FROM tbl_pesanan WHERE idPenjahit = '$id' ");

                                $resPel = mysqli_fetch_array($kueriPel);
                                $countPelanggan = $resPel['pelanggan'];
                                ?>
                                <h2 class="text-white"> <?php echo $countPelanggan; ?></h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Kepuasan Pelanggan</h3>
                            <div class="d-inline-block">
                                <?php

                                $kueriUl = mysqli_query($koneksi, "SELECT AVG(nilai) as nilai FROM tbl_ulasan A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan WHERE B.idPenjahit = '$id' ");

                                $resUl = mysqli_fetch_array($kueriUl);
                                $nilai = ($resUl['nilai']/5)*100;
                                ?>
                                <h2 class="text-white"><?php echo number_format($nilai,0);?>%</h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0 d-flex justify-content-between">
                                    <div>
                                        <h4 class="mb-1">Pesanan Jahitan</h4>
                                        <!-- <p>Total Pendapatan</p>
                                        <h3 class="m-0">Rp 12,555</h3> -->
                                    </div>
                                    <!-- <div>
                                        <ul>
                                            <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                            <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a></li>
                                            <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                        </ul>
                                    </div> -->
                                </div>

                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="table-responsive">
                                            <table class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th width="50">#</th>
                                                        <th>ID Pesanan</th>
                                                        <th width="200">Nama Pelanggan</th>
                                                        <th width="200">Kategori</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan A INNER JOIN tbl_pelanggan B 
                                                        ON A.idPelanggan = B.idPelanggan INNER JOIN tbl_kategori C ON A.idKategori = C.idKategori WHERE A.idPenjahit = '$id'");
                                                    $no = 1;
                                                    while ($res = mysqli_fetch_array($kueri)) {
                                                    ?>
                                                        <tr>
                                                            <th><?php echo $no; ?></th>
                                                            <td><?php echo $res['idPesanan']; ?></td>
                                                            <td><?php echo $res['nama']; ?></td>
                                                            <td><?php echo $res['namaKategori']; ?></td>
                                                            <td><?php echo date_format(new DateTime($res['tglOrder']), 'd/m/Y'); ?></td>
                                                            <td><?php
                                                                $st = $res['statusPesanan'];
                                                                if ($st == 'MK') {
                                                                    echo "<span class='badge badge-pill badge-primary'>Menunggu Konfirmasi</span>";
                                                                } else if ($st == 'MB') {
                                                                    echo "<span class='badge badge-pill badge-secondary'>Menunggu Pembayaran</span>";
                                                                } else if ($st == 'MP') {
                                                                    echo "<span class='badge badge-pill badge-warning'>Menunggu Proses</span>";
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
                                                                }

                                                                ?>

                                                            </td>



                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








        </div>

        <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <script>
            $(document).ready(function() {
                var i = 1;
                $('#add').click(function() {
                    i++;
                    $('#formKategori').append('<div class="form-group row" id="baris' + i + '"><label class="col-lg-4 col-form-label" for="val-username"></label><div class="col-lg-6"><select class="form-control" id="val-skill" name="item[]">' +
                        '<option value="">Pilih Kategori</option>' +
                        '<?php $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                            while ($res = mysqli_fetch_array($kueri)) { ?>' +
                        '<option value="<?php echo $res['idKategori']; ?>"><?php echo $res['namaKategori']; ?></option>' +
                        '<?php } ?>' +
                        '</select></div>' +
                        '<div class="col-lg-2">' +
                        '<button type="button" class="btn mb-1 btn-rounded btn-danger mt-2 remove" name="remove" id="' + i + '"><i class="ti-minus"></i></button>' +
                        '</div></div>');
                });
                $(document).on('click', '.remove', function() {
                    var button_id = $(this).attr("id");
                    $('#baris' + button_id + '').remove();
                });

            });

            $(document).ready(function() {
                $.ajax({
                    type: 'post',
                    url: 'module/data/dataBank.php',
                    success: function(hasil_bank) {

                        $("select[name=bank]").html(hasil_bank);

                    }

                });
            })
        </script>