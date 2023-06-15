<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<style>

#new-pass{
    display: none;
    
}
</style>
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profil Administrator</a></li>
                        
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
                                    <form class="form-valide" action="module/admin/aksiUbah.php" method="post" enctype="multipart/form-data">
                                    <?php 
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE idAdmin = 1");
                                   
                                    while ($res=mysqli_fetch_array($kueri)) {
                                        
                                        ?>
                                        <input type="text" name="idAdmin" value="<?php echo $res['idAdmin'];?>"hidden>
                                     
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username.." value="<?php echo $res['username'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Password
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="oldPassword" placeholder="Masukan password.." required>
                                            </div>
                                        </div>
                                        <div class="form-group row " id="new-pass">
                                            <label class="col-lg-4 col-form-label" for="val-username">Password Baru
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="newPassword" placeholder="Masukan password baru.." >
                                            </div>
                                        </div>
                                        
                                        
                                    <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <a class="btn  btn-outline-secondary" onclick="tampil()" >Ubah Password</a>
                                                <button onClick ="return confirm('Anda yakin ingin melakukan perubahan?')" type="submit" class="btn btn-primary gradient-1">Simpan Perubahan</button>
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

function tampil(){
    var pass = document.getElementById('new-pass');
    if(pass.style.display == 'none'){
    pass.style.display = 'flex';
    }else{
        pass.style.display = 'none';
    }
}


</script>