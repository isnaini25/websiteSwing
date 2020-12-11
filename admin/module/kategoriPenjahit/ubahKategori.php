<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kategori Penjahit</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah Kategori</a></li>
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
                                    <form class="form-valide" action="module/kategoriPenjahit/aksiUbah.php" method="post">
                                    <?php
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $id = $_GET['idKategori'];
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE idKategori = '$id'");
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Kategori
                                            </label>
                                            <input  type="text" hidden value="<?php echo $res['idKategori']; ?>" name="idKategori">
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="namaKategori" placeholder="Masukan nama kategori ..." value=" <?php echo $res['namaKategori']; ?>">
                                               
                                            </div>
                                        </div>
                                    
                                    <?php }?>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
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