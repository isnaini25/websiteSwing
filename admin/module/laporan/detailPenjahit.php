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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail Penjahit</a></li>

            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="module/penjahit/aksiUbah.php" method="post" enctype="multipart/form-data">
                                <?php
                                $id = $_GET['id'];
                                $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit = '$id'");

                                while ($res = mysqli_fetch_array($kueri)) {
                                    $id_kecamatan = $res['idKecamatan'];
                                    $id_kelurahan = intval($res['idKelurahan']);
                                    $id_bank = $res['kodeBank'];

                                ?>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Nama Penjahit
                                        </label>
                                        <div class="col-lg-6">
                                            <input disabled type="text" class="form-control" name="nama" placeholder="Masukan nama penjahit atau nama usaha..." value="<?php echo $res['nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Total Pendapatan Bulan ini
                                        </label>
                                        <div class="col-lg-6">
                                            <?php
                                            $kueriTotal = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan WHERE statusBayar ='S' AND idPenjahit = '$id' AND MONTH(tglBayar) = MONTH(CURRENT_DATE())
                            AND YEAR(tglBayar) = YEAR(CURRENT_DATE()) ");

                                            $total = 0;
                                            $totalBayar = 0;
                                            while ($resT = mysqli_fetch_array($kueriTotal)) {
                                                $total = $resT['totalBayar'] + $resT['biayaKirim'];
                                                $totalBayar = $total + $totalBayar;
                                            }
                                            ?>
                                            <input disabled type="text" class="form-control" name="nama" placeholder="Masukan nama penjahit atau nama usaha..." value="<?php echo "Rp" . number_format($totalBayar); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Total Seluruh Pendapatan
                                        </label>
                                        <div class="col-lg-6">
                                            <?php
                                            $kueriTotal2 = mysqli_query($koneksi, "SELECT * FROM tbl_pembayaran A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan WHERE statusBayar ='S' AND idPenjahit = '$id' ");

                                            $total2 = 0;
                                            $totalBayar2 = 0;
                                            while ($resT2 = mysqli_fetch_array($kueriTotal2)) {
                                                $total2 = $resT2['totalBayar'] + $resT2['biayaKirim'];
                                                $totalBayar2 = $total2 + $totalBayar2;
                                            }
                                            ?>
                                            <input disabled type="text" class="form-control" name="nama" placeholder="Masukan nama penjahit atau nama usaha..." value="<?php echo "Rp" . number_format($totalBayar2); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Kategori
                                        </label>
                                        <div class="col-lg-6">
                                            <?php $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_itemKategori A INNER JOIN tbl_kategori B ON A.idKategori = B.idKategori WHERE A.idPenjahit ='$id'");
                                            while ($resK = mysqli_fetch_array($kueriKategori)) {
                                            ?>
                                                <span class="badge badge-pill badge-primary"><?php echo $resK['namaKategori']; ?></span>
                                            <?php
                                            } ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Username
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" disabled class="form-control" name="username" id="username" placeholder="Masukan username.." value="<?php echo $res['username']; ?>">
                                            <span id="cekUname"></span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Kecamatan
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="kecamatan" name="kecamatan" disabled>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Kelurahan
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="kelurahan" name="kelurahan" disabled>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Alamat Lengkap
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea disabled class="form-control h-150px" rows="6" name="alamat" placeholder="Masukan alamat lengkap.."><?php echo $res['alamat']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Email
                                        </label>
                                        <div class="col-lg-6">
                                            <input disabled type="text" class="form-control" name="email" placeholder="Masukan email..." value="<?php echo $res['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Nomor Telepon
                                        </label>
                                        <div class="col-lg-6">
                                            <input disabled type="text" class="form-control" name="nohp" placeholder="Masukan nomor telepon..." value="<?php echo $res['nohp']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Nomor Rekening
                                        </label>
                                        <div class="col-lg-6">
                                            <select disabled class="form-control" id="bank" name="bank">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" disabled class="form-control" name="rekening" placeholder="Masukan nomor rekening..." value="<?php echo $res['rekening']; ?>">
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">Status Akun
                                        </label>
                                        <div class="col-lg-8">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="statusAktif" checked value="1" disabled> Aktif</label>

                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="statusAktif" value="0" disabled> Non-Aktif</label>
                                            <span>Aktif sejak <?php echo date_format(date_create($res['tglDaftar']), "d/M/y"); ?></span>
                                        </div>
                                    </div>

                                <?php } ?>

                            </form>
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

        var id_kecamatan_selected = <?php echo $id_kecamatan; ?>;
        var id_kelurahan_selected = <?php echo $id_kelurahan; ?>;
        var id_bank_selected = <?php echo $id_bank; ?>;
        $.ajax({
            type: 'post',
            url: 'module/data/dataBank.php',
            data: 'id_bank=' + id_bank_selected,
            success: function(hasil_bank) {

                $("select[name=bank]").html(hasil_bank);

            }

        });
        $.ajax({
            type: 'post',
            url: 'module/data/dataKecamatan.php',
            data: 'id_kecamatan=' + id_kecamatan_selected,
            success: function(hasil_kecamatan) {

                $("select[name=kecamatan]").html(hasil_kecamatan);

            }

        });
        $.ajax({
            type: 'post',
            url: 'module/data/dataKelurahan.php',
            data: 'id_kelurahan=' + id_kelurahan_selected + '&id_kecamatan=' + (id_kecamatan_selected * 10),
            success: function(select_kelurahan) {
                $("select[name=kelurahan]").html(select_kelurahan);

            }

        });



    })
</script>