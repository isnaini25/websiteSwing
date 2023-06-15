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

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Penjahit</a></li>
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

                            <h4 class="d-inline">Daftar Penjahit</h4>
                            <a href="" id="print" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="Cetak Laporan"><i class="ti-printer"></i></a>

                        </div>
                        <div class="mb-3 mt-2">
                            <div class="row">
            
                                <div class="col-md-8">
                                <h5 class="box-title m-t-30">Cari berdasarkan nama penjahit</h5>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari penjahit.." aria-label="Recipient's username" name="cari" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary cari" type="button" >Cari</button>
                                        </div><div class="input-group-append">
                                            <button class="btn btn-outline-secondary reset" type="button" >Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="table-responsive" id="printArea">
                            <h4 class="text-center">Daftar Penjahit</h4>

                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th>ID Penjahit</th>
                                        <th>Nama Penjahit</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Pendapatan Bulan ini</th>
                                        <th>Bank</th>
                                        <th>No.Rek</th>
                                        <th>Status</th>
                                        <th>Aksi</th>


                                    </tr>
                                </thead>
                                <tbody id="laporan">

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
   
    $(document).ready(function() {


        function load_data(cari) {
            $.ajax({
                type: "post",
                url: "module/laporan/dataLaporanPenjahit.php",
                data: "cari=" + cari,
                success: function(data) {
                    $("#laporan").html(data);
                }
            });
        }



        load_data('');
        

        $(".cari").on("click", function() {
            var cari = $("input[name=cari]").val();
        load_data(cari);
        })
        $(".reset").on("click", function() {
        $("input[name=cari]").val('');
        load_data('');
        })

        $("#print").on("click", function() {
           print();
        }
        )

        function print(){
            var printContents = document.getElementById("printArea").innerHTML;
            var original = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = original;
        }
    });
</script>