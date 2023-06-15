<?php

include "../lib/config.php";
include "../lib/koneksi.php";

$idPelanggan = $_GET['idPelanggan'];
$idPenjahit = $_GET['idPenjahit'];


$kueriPelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE idPelanggan = '$idPelanggan'");
$res = mysqli_fetch_array($kueriPelanggan);
$kueriPenjahit = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit = '$idPenjahit'");
$has = mysqli_fetch_array($kueriPenjahit);

?>
<style>
    @media print {
        body * {
            visibility: hidden;
            
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
            margin-left: -5px;
        }

        #section-to-print {
            left: 0;
            top: 0;
        }
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
</style>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body" id="section-to-print">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <table border="1" class="p-3">
                                <tr>
                                    <td style="padding:20px" width="400" height="200">
                                        <h5>Data Penerima</h5>
                                        <h6><b><?php echo $res['nama']; ?></b>
                                            <br><?php echo $res['nohp']; ?>
                                            <br><?php echo $res['alamat']; ?>
                                            <br><span id="kota"></span> &nbsp;
                                            <span id="provinsi"></span></h6>
                                    </td>
                                    <td style="padding:20px" width="400" height="200">
                                        <h5>Data Pengirim</h5>
                                        <h6><b><?php echo $has['nama']; ?></b>
                                            <br><?php echo $has['nohp']; ?>
                                            <br><?php echo $has['alamat']; ?>
                                            <br><span id="kelurahan"></span> &nbsp;
                                            <span id="kecamatan"></span> Bantul DI Yogyakarta</h6>
                                    </td>
                                </tr>
                            </table>

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


        var id_kecamatan = <?php echo $has['idKecamatan']; ?>;
        var id_kelurahan = <?php echo $has['idKelurahan']; ?>;
        var id_kota = <?php echo $res['id_kota']; ?>;
        var id_provinsi = <?php echo $res['id_provinsi']; ?>;
        $.ajax({
            type: 'post',
            data: 'id_kecamatan=' + id_kecamatan + '&page=profil',
            url: 'module/data/dataKecamatan.php',
            success: function(hasil_kecamatan) {

                $("#kecamatan").html(hasil_kecamatan);

            }
        });
        $.ajax({
            type: 'post',
            url: 'module/data/dataKelurahan.php',
            data: 'id_kelurahan=' + id_kelurahan + '&id_kecamatan=' + (id_kecamatan * 10) + '&page=profil',
            success: function(hasil_kelurahan) {
                $("#kelurahan").html(hasil_kelurahan);

            }

        });

        $.ajax({
            type: 'post',
            data: 'id_provinsi=' + id_provinsi + '&page=profil',
            url: 'module/data/dataProvinsi.php',
            success: function(hasil_provinsi) {

                $("#provinsi").html(hasil_provinsi);

            }
        });
        $.ajax({
            type: 'post',
            url: 'module/data/dataKota.php',
            data: 'id_kota=' + id_kota + '&id_provinsi=' + (id_provinsi) + '&page=profil',
            success: function(hasil_kota) {
                $("#kota").html(hasil_kota);

            }

        });


    });
    setTimeout(function() {
        window.print();
    }, 1000);;
</script>