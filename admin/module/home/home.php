<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
   
        
        
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Transaksi Jahit Selesai</h3>
                            <div class="d-inline-block">
                                <?php
                               
                                $kueriJahit = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE statusPesanan = 'F' OR statusPesanan = 'U' ");

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
                            <h3 class="card-title text-white">Penjahit</h3>
                            <div class="d-inline-block">
                                <?php

                                $kueriP = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit ");
                                $countPenjahit = mysqli_num_rows($kueriP);
                                ?>
                                <h2 class="text-white"><?php echo $countPenjahit; ?></h2>
                                <p class="text-white mb-0"></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pelanggan Baru</h3>
                            <div class="d-inline-block">
                                <?php

                                $kueriPel = mysqli_query($koneksi, "SELECT  * FROM tbl_pelanggan");
                                $countPelanggan = mysqli_num_rows($kueriPel);
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

                                $kueriUl = mysqli_query($koneksi, "SELECT AVG(nilai) as nilai FROM tbl_ulasan A INNER JOIN tbl_pesanan B ON A.idPesanan = B.idPesanan ");

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

            








        </div>

        <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
