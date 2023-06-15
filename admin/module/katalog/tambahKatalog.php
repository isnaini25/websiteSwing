<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">katalog Jahitan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Katalog Jahitan</a></li>
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
                                    <form class="form-valide" action="module/katalog/aksiSimpan.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Produk Katalog
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="namaKatalog" placeholder="Masukan nama katalog...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Foto (Maks. 1MB)
                                            </label>
                                            <div class="col-lg-6">
                                            <input type="file" class="form-control-file" name="gambar" accept="image/*" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">
                                            </label>
                                            <div class="col-lg-6">
                                            <img id="output" width="300px"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Deskripsi
                                            </label>
                                            <div class="col-lg-6">
                                            <textarea class="form-control h-150px" rows="6" name="deskripsi" placeholder="Masukan deskripsi secara lengkap.."></textarea>
                                            </div>
                                        </div>
                                        
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

        <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>