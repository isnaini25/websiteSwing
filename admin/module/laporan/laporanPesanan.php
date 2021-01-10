<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>

<!-- <style>
    @media print {
    body:not(#main) { 
       visibility: hidden; }
     #print{ 
       display: block;
    }
    }
</style> -->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Laporan Pesanan</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid" id="main">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-4">

                            <h4 class="d-inline">Laporan Pesanan</h4>
                            <a href="" id="print" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="Cetak Laporan"><i class="ti-printer"></i></a>

                        </div>
                        <div class="mb-3 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="box-title m-t-30">Tampilkan berdasarkan tanggal</h5>
                                    <input id="tanggal" class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2021 - 01/31/2021">
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <input type="checkbox" name="selesai" id="cekSelesai">
                                    <label for="cekSelesai">Hanya tampilkan pesanan selesai</label>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="printArea">
                        <h4 class="text-center">Laporan Pesanan</h4>
                       
                            <h6 class="text-center" id="tanggalRange"></h6>
                            
                            <table class="table table-bordered verticle-middle" >
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th>ID Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Status</th>
                                        <th>Biaya Jahit</th>
                                        <th>Ongkos Kirim</th>
                                        <th>Sub Total</th>

                                    </tr>
                                </thead>
                                <tbody id="laporan" >

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>

<script>
    var id_penjahit = <?php echo $_SESSION['id_penjahit']; ?>;
    $(document).ready(function() {


        function load_data(cek, tgl_mulai, tgl_selesai) {
            $.ajax({
                type: "post",
                url: "module/laporan/dataLaporanPesanan.php",
                data: "id_penjahit=" + id_penjahit + "&cek=" + cek + "&tgl_mulai=" + tgl_mulai + "&tgl_selesai=" + tgl_selesai,
                success: function(data) {
                    $("#laporan").html(data);
                }
            });
        }



        load_data('no', '', '');
        $("input[name=selesai]").on("click", function() {
            var checkBox = document.getElementById("cekSelesai");
            var status = document.getElementById("tanggal").getAttribute("status");
            if (status == null) {
                if (checkBox.checked == true) {
                    load_data('yes', '', '');

                } else {
                    load_data('no', '', '');
                }
            } else {
                var tgl = document.getElementById("tanggal").value;
                var tgl_mulai = tgl.substring(0,10);
                var tgl_selesai = tgl.substring(13,23);
                $('#tanggalRange').html(tgl_mulai+" - "+tgl_selesai) ;

                if (checkBox.checked == true) {
                    load_data('yes', tgl_mulai, tgl_selesai);

                } else {
                    load_data('no', tgl_mulai, tgl_selesai);
                }
            }

        })

        $(".applyBtn").on("click", function() {
            var tgl_mulai = $("input[name=daterangepicker_start]").val();
            var tgl_selesai = $("input[name=daterangepicker_end]").val();
            document.getElementById('tanggal').setAttribute("status", "set");
            var checkBox = document.getElementById("cekSelesai");
            $('#tanggalRange').html(tgl_mulai+" - "+tgl_selesai) ;;
            if (checkBox.checked == true) {
                load_data('yes', tgl_mulai, tgl_selesai);

            } else {
                load_data('no', tgl_mulai, tgl_selesai);
            }

        })

        $("#print").on("click", function() {
           cetak();
        }
        )

        function cetak(){
            var printContents = document.getElementById("printArea").innerHTML;
            var original = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = original;
        }
    });
</script>