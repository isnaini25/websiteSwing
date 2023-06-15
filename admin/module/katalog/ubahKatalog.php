<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="adminweb.php?module=lihatKatalog">Katalog Jahitan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah Katalog Jahitan</a></li>
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
                                    <form class="form-valide" action="module/katalog/aksiUbah.php" method="post" enctype="multipart/form-data">
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $id = $_GET['id'];
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idKatalog= '$id'");
                                    while ($res=mysqli_fetch_array($kueri)) {
                                    ?>   
                                    <div class="form-group row">
                                        <input type="text" hidden value="<?php echo $res['idKatalog']; ?>" name="idKatalog">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Produk Katalog
                                            </label>
                                            <div class="col-lg-6">
                                                <input required type="text" class="form-control" name="namaKatalog" placeholder="Masukan nama katalog..." value="<?php echo $res['namaKatalog']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Foto (Maks. 1MB)
                                            </label>
                                            <div class="col-lg-6">
                                            <input type="file" class="form-control-file" name="gambar" accept="image/*" onchange="loadFile(event)" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">
                                            </label>
                                            <div class="col-lg-6">
                                            <img id="output" width="300px" src="upload/<?php echo $res['foto']; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Deskripsi
                                            </label>
                                            <div class="col-lg-6">
                                            <textarea required class="form-control h-150px" rows="6" name="deskripsi" placeholder="Masukan deskripsi secara lengkap.." ><?php echo $res['deskripsi']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>