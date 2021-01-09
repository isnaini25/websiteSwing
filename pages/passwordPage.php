<main>
    <?php
    include "lib/config.php";
    include "lib/koneksi.php";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3 link-bread">
                <ul>

                    <li><a href="home.php">Beranda</a></li>
                    <li><i class="ti-angle-right"></i> Ubah Kata Sandi</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 title">

            </div>

        </div>
        <div class="row">
            <div class="col-sm-12 form-order">
                <div class="form-pesanan">
                    <h5 class="text-center">Ubah Kata Sandi</h5>
                    <form action="aksiUbahPassword.php" method="POST" enctype="multipart/form-data">
                        <input name="idPelanggan" type="text" hidden value="<?php echo $_SESSION['id_pelanggan']; ?>">

                    

                        <div class="form-group ">
                            <label for="exampleInputEmail1">Kata Sandi Baru</label>
                            <input type="password"  class="form-control" placeholder="Masukkan kata sandi baru" name="newpassword" required>
                        </div> 
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Kata Sandi Lama</label>
                            <input type="password"  class="form-control" placeholder="Masukkan kata sandi lama" name="oldpassword" required>
                        </div>
                        <button type="submit" onClick="return confirm('Simpan perubahan kata sandi?')" class="btn-all">Simpan Perubahan</button>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
</main>
