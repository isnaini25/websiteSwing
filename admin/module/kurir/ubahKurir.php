<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Kurir</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah Kurir</a></li>
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
                                    <form class="form-valide" action="module/kurir/aksiUbah.php" method="post">
                                    <?php
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $id = $_GET['id'];
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_kurir WHERE idKurir= '$id'");
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>
                                        <div class="form-group row">
                                            <input  type="text" hidden value="<?php echo $res['idKurir']; ?>" name="idKurir">
                                            <label class="col-lg-4 col-form-label" >Nama Kurir
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="namaKurir" placeholder="Masukan nama kurir ..." value=" <?php echo $res['namaKurir']; ?>">
                                               
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