<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profil Penjahit</a></li>
                        
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
                                    <form class="form-valide" action="module/penjahit/aksiUbah.php" method="post" enctype="multipart/form-data">
                                    <?php 
                                        $id = $_SESSION['id_penjahit'];
                                    $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit = '$id'");
                                   
                                    while ($res=mysqli_fetch_array($kueri)) {
                                        $id_kecamatan = $res['idKecamatan'];
                                        $id_kelurahan = intval($res['idKelurahan']);
                                        $id_bank = $res['kodeBank'];
                                       
                                        ?>
                                        <input type="text" name="idPenjahit" value="<?php echo $res['idPenjahit'];?>"hidden>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-4 mb-3">
                                                <img src="upload/<?php if(!empty($res['foto'])){echo $res['foto'];}else{ echo "default-profile.png";}?>" id="output" alt="" style="object-fit:cover;" width="250px" height="180px" class="mb-3" >
                                                <input type="file" class="form-control-file" name="gambar" accept="image/*" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-username">Kategori
                                            </label>
                                        <div class="col-lg-6">
                                        <?php $kueriKategori = mysqli_query($koneksi, "SELECT * FROM tbl_itemKategori A INNER JOIN tbl_kategori B ON A.idKategori = B.idKategori WHERE A.idPenjahit ='$id'");
                          while ($resK = mysqli_fetch_array($kueriKategori)) {
                              ?>
                                        <span class="badge badge-pill badge-primary"><?php echo $resK['namaKategori'];?></span>
                                        <?php
                          }?>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan username.." value="<?php echo $res['username'];?>" required>
                                                <span id="cekUname"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nama Penjahit
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nama" placeholder="Masukan nama penjahit atau nama usaha..." value="<?php echo $res['nama'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Kecamatan
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kecamatan" name="kecamatan">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Kelurahan
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="kelurahan" name="kelurahan">
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Alamat Lengkap
                                            </label>
                                            <div class="col-lg-6">
                                            <textarea class="form-control h-150px" rows="6" name="alamat" placeholder="Masukan alamat lengkap.." required><?php echo $res['alamat'];?>
                                            </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="email" placeholder="Masukan email..." value="<?php echo $res['email'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nomor Telepon
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nohp" placeholder="Masukan nomor telepon..." value="<?php echo $res['nohp'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nomor Rekening
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="bank" name="bank">
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="rekening" placeholder="Masukan nomor rekening..." value="<?php echo $res['rekening'];?>" required>
                                            </div>
                                            
                                        </div>
                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Deskripsi Penjahit
                                            </label>
                                            <div class="col-lg-6">
                                            <textarea class="form-control h-150px" rows="6" name="deskripsi" placeholder="Masukan deskripsi secara lengkap.." required><?php echo $res['deskripsi'];?>
                                            </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Harga Jasa Minimal
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="hargaMinimal" placeholder="Masukan harga jasa minimal..." value="<?php echo $res['hargaMinimal'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Kuota Jumlah Pesanan
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="kuotaPesanan" placeholder="Masukan kuota pesanan..." value="<?php echo $res['kuotaPesanan'];?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Status Akun
                                            </label>
                                            <div class="col-lg-8">
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="statusAktif" checked value="1"> Aktif</label>
                                                
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="statusAktif" value="0"> Non-Aktifkan</label>
                                                <span>Aktif sejak <?php echo date_format(date_create($res['tglDaftar']),"d/M/y");?></span>
                                            </div>
                                        </div>
                                        
                                    <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
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
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

  $(document).ready(function(){
      
      var id_kecamatan_selected = <?php echo $id_kecamatan; ?>;
      var id_kelurahan_selected = <?php echo $id_kelurahan; ?>;
      var id_bank_selected = <?php echo $id_bank; ?>;
      $.ajax({
          type:'post',
          url:'module/data/dataBank.php',
          data:'id_bank='+id_bank_selected,
          success:function(hasil_bank)
          {
              
              $("select[name=bank]").html(hasil_bank);
             
          }

      });
      $.ajax({
          type:'post',
          url:'module/data/dataKecamatan.php',
          data:'id_kecamatan='+id_kecamatan_selected,
          success:function(hasil_kecamatan)
          {
              
              $("select[name=kecamatan]").html(hasil_kecamatan);
             
          }

      });
      $.ajax({
          type:'post',
          url:'module/data/dataKelurahan.php',
          data:'id_kelurahan='+id_kelurahan_selected+'&id_kecamatan='+(id_kecamatan_selected*10),
          success:function(select_kelurahan)
          {  
              $("select[name=kelurahan]").html(select_kelurahan); 
              
          }

      });

      $("select[name=kecamatan]").on("change", function(){
          var id_kecamatan = $("option:selected", this).attr("id_kecamatan");
          $.ajax({
              type:'post',
              url: 'module/data/dataKelurahan.php',
              data:'id_kecamatan='+(id_kecamatan*10),
              success:function(hasil_kelurahan){
                $("select[name=kelurahan]").html(hasil_kelurahan);
              }
          })
      })
      $(document).ready(function(){
       
            $("#username").change(function(){  
            var username=$("#username").val();
 
          	  $.ajax({
         		   	type:"post",
         		   	url:"../checkUsernamePenjahit.php",
         		   	data:"username="+username,
        		    	success:function(data){
        	    		if(data==0){
        	    			$("#cekUname").html("<i class='fa fa-check'></i> Username tersedia");
        	    		}
        	    		else{
        	    			$("#cekUname").html("<i class='fa fa-times'></i> Username tidak tersedia");
        	    		}
       		     	}
       		     });
 
            });
 
         });
  })

  
</script>
