<main>
    <?php
    include "lib/config.php";
    include "lib/koneksi.php";
    ?>
    <div class="container-fluid">
    <div class="row">
            <div class="col-sm-12 mt-2 link-bread">
                <ul>
                    <?php
                    $id = $_GET['id']; 
                    $nama = $_GET['nama'];
                    ?> 
                    <li><a href="profilPenjahit.php?id=<?php echo $id;?>"><?php echo $nama;?></a></li>
                    <li><i class="ti-angle-right"></i>  Form Pesanan</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 title">
                <p style="text-align: center;">Pesan Jahitan</p>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-pesanan">
                    <form action="aksiOrder.php" method="POST" enctype="multipart/form-data">
                        <input name="idPenjahit" type="text" hidden value="<?php echo $id;?>">
                        <input name="idPelanggan" type="text" hidden value="<?php echo $_SESSION['id_pelanggan'];?>">
                        
                        <?php
                            if (!empty($_GET['idKatalog'])) {
                                $idKat = $_GET['idKatalog'];
                                $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_katalog WHERE idKatalog ='$idKat'");
                                while ($res = mysqli_fetch_array($kueri)) {
                                    ?>
                                <div class="form-group from-katalog" id="from-katalog">
                                <img src="admin/upload/<?php echo $res['foto']; ?>" alt="" width="300px">

                                <input name="idKatalog" type="text" hidden value="<?php echo $res['idKatalog'];?>">
                                <p class="mt-3"><?php echo $res['namaKatalog']; ?> <button onClick ="removeFunc()" class="btn btn-danger btn-sm "><i class="ti-close"></i></button> </p>
                                
                                    </div>
                        <?php
                                }
                            }?>
                        
                            <div class="form-group>">
                            <label for="exampleInputEmail1">Foto Referensi (Maks. 1MB)</label>
                            <input type="file" class="form-control-file" name="gambar" accept="image/*">
                            <button class="mb-2 mt-3 btn-ukuran"  type="button" onclick="window.location.href='katalog.php?id=<?php echo $id;?>&nama=<?php echo $nama;?>'">Pilih dari katalog</button>
                            </div>
                           
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select class="form-control"  name="kategori">
                                <?php


                                $query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                while ($result = mysqli_fetch_array($query)) {
                                ?>
                                    <option value=" <?php echo $result['idKategori']; ?>"><?php echo $result['namaKategori']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>

                        <div class="form-group alamat">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea class="form-control" placeholder="Masukkan deksripsi lengkap" rows="4" required name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="L" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="P">
                                <label class="form-check-label" for="exampleRadios2">
                                    Perempuan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" value="U">
                                <label class="form-check-label" for="exampleRadios2">
                                    Unisex
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ukuran</label>
                            <select class="form-control" id="ukuran" name="ukuran">
                                <?php


                                $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_ukuran WHERE idPenjahit = $id");
                                while ($res = mysqli_fetch_array($kueri)) {
                                ?>
                                    <option value=" <?php echo $res['idUkuran']; ?>"><?php echo $res['size']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div>
                            <button class="mb-3 btn-ukuran"  type="button" data-toggle="collapse" data-target="#tabel" aria-expanded="false">Lihat Tabel Ukuran</button>
                            <div class="tabel-ukuran collapse" id="tabel">
                                <table class="table table-bordered">
                                    <?php


                                    $kueriSize = mysqli_query($koneksi, "SELECT * FROM tbl_ukuran WHERE idPenjahit = 1");
                                    while ($resSize = mysqli_fetch_array($kueriSize)) {
                                    ?>
                                        <tr>
                                            <th colspan="2">Ukuran <?php echo $resSize['size']; ?></th>
                                        </tr>
                                        <?php
                                        $idSize= $resSize['idUkuran'];

                                    $kueriItemSize = mysqli_query($koneksi, "SELECT * FROM tbl_itemUkuran a INNER JOIN tbl_itemNamaUkuran b ON a.idItemNamaUkuran = b.idItemNamaUkuran WHERE idUkuran = '$idSize'");
                                    while ($resItem = mysqli_fetch_array($kueriItemSize)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $resItem['namaUkuran']; ?></td>
                                            <td><?php echo $resItem['nilaiUkuran']; ?>cm</td>
                                        </tr>

                                    <?php }} ?>
                                </table>
                            </div>
                        </div>
                        <div class="form-group " >
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="text" id="jumlah" class="form-control" placeholder="Masukkan Jumlah (khusus ukuran yang sama)" required name="jumlah">
                            <span id="cekJumlah"></span>
                        </div>
                        <button type="submit" class="btn-all">Buat Pesanan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
<script>
function removeFunc() {
  var myobj = document.getElementById("from-katalog");
  myobj.remove();
}

$(document).ready(function(){
            $("#jumlah").change(function(){  
            var jumlah=$("#jumlah").val();
 
          	  $.ajax({
         		   	type:"post",
         		   	url:"checkJumlah.php",
         		   	data:"jumlah="+jumlah,
        		    	success:function(dataJumlah){
        	    		if(dataJumlah!=1){
        	    			$("#cekJumlah").html("<i class='fa fa-times'></i> Masukkan angka");
        	    		}else{
                            $("#cekJumlah").html("<i class='fa fa-check'></i>");
                        }
       		     	}
       		     });
 
            });
 
         });
</script>