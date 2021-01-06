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
                    <li><i class="ti-angle-right"></i> Profil</li>
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
                    <h5 class="text-center">Profil</h5>
                    <form action="aksiUbahProfil.php" method="POST" enctype="multipart/form-data">
                        <input name="idPelanggan" type="text" hidden value="<?php echo $_SESSION['id_pelanggan']; ?>">

                        <?php
                        $id = $_SESSION['id_pelanggan'];
                        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE idPelanggan ='$id'");
                        $res = mysqli_fetch_array($kueri)
                        ?>
                        <div class="form-group from-katalog" id="from-katalog">
                            <img src="admin/upload/<?php echo $res['foto']; ?>" alt="" width="300px" name="gambar">

                        </div>


                        <div class="form-group>">
                            <label for="exampleInputEmail1">Foto (@maks. 1MB)</label>
                            <input type="file" class="form-control-file" name="gambar" accept="image/*">

                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $res['username']; ?>">
                            <label class="mt-1" id="cekUnamePL">  </label>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $res['nama']; ?>">
                            
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">No HP</label>
                            <input type="text" class="form-control" name="nohp" value="<?php echo $res['nohp']; ?>">
                            
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $res['email']; ?>">
                            
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Provinsi</label>
                            <select class="form-control" name="provinsi">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kota</label>
                            <select class="form-control" name="kota">

                            </select>
                        </div>

                       
                        <div class="form-group alamat">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea class="form-control" rows="4" name="alamat"><?php echo $res['alamat']; ?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="L" <?php if ($res['jenisKelamin'] == 'L') {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="P" <?php if ($res['jenisKelamin'] == 'P') {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="exampleInputEmail1">Status Akun</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="1" <?php if ($res['statusAktif'] == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="0" <?php if ($res['statusAktif'] == 0) {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                                <label class="form-check-label" for="exampleRadios2">
                                    Non-Aktifkan
                                </label>
                            </div>
                            <label for="exampleInputEmail1">Aktif sejak <?php echo date_format(new DateTime($res['tglDaftar']), 'd M Y'); ?></label>

                        </div>

                        <div class="form-group ">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password"  class="form-control" placeholder="Masukkan Password" name="password" required>
                        </div>
                        <button type="submit" onClick="return confirm('Simpan perubahan profil?')" class="btn-all">Simpan Perubahan</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        var id_kota = <?php echo $res['id_kota']; ?>;
        var id_provinsi = <?php echo $res['id_provinsi']; ?>;
        $.ajax({
            type: 'post',
            data: 'id_provinsi=' + id_provinsi,
            url: 'admin/module/data/dataProvinsi.php',
            success: function(hasil_provinsi) {
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        $.ajax({
            type: 'post',
            url: 'admin/module/data/dataKota.php',
            data: 'id_kota=' + id_kota + '&id_provinsi=' + (id_provinsi),
            success: function(hasil_kota) {
                $("select[name=kota]").html(hasil_kota);
            }
        });

        $("select[name=provinsi]").on("change", function(){
          var id_provinsi = $("option:selected", this).attr("id_provinsi");
          $.ajax({
              type:'post',
              url: 'admin/module/data/dataKota.php',
              data:'id_provinsi='+id_provinsi,
              success:function(hasil){
                $("select[name=kota]").html(hasil);
            
              }
          })
      });

      $("input[name=username]").change(function(){  
            var username=$("input[name=username]").val();
          	  $.ajax({
         		   	type:"post",
         		   	url:"checkUsernamePelanggan.php",
         		   	data:"username="+username,
        		    	success:function(data){
        	    		if(data==0){
        	    			$("#cekUnamePL").html("<i class='fa fa-check'></i> Username tersedia");
        	    		}
        	    		else{
        	    			$("#cekUnamePL").html("<i class='fa fa-times'></i> Username tidak tersedia");
        	    		}
       		     	}
       		     });
 
            });
    });
</script>