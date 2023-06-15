<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="adminweb.php?module=lihatUkuran">Ukuran</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ubah Ukuran</a></li>
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
                                    <form class="form-valide" action="module/ukuran/aksiUbah.php" method="post" >
                                   <span id="formUkuran">
                                       <?php 
                                        include "../lib/config.php";
                                        include "../lib/koneksi.php";
                                        $id = $_GET['id'];
                                        $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_ukuran WHERE idUkuran= '$id'");
                                        while ($res=mysqli_fetch_array($kueri)) {
                                            ?>
                                       <input type="text" hidden name="idUkuran" value="<?php echo $res['idUkuran']; ?>">
                                    <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Ukuran
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="size">
                                                    <option value="">Pilih Kode Ukuran</option>
                                                    <option value="XS" <?php if ($res['size']=="XS") {
                                                echo "selected";
                                            } ?>>XS</option>
                                                    <option value="S" <?php if ($res['size']=="S") {
                                                echo "selected";
                                            } ?>>S</option>
                                                    <option value="M" <?php if ($res['size']=="M") {
                                                echo "selected";
                                            } ?>>M</option>
                                                    <option value="L" <?php if ($res['size']=="L") {
                                                echo "selected";
                                            } ?>>L</option>
                                                    <option value="XL" <?php if ($res['size']=="XL") {
                                                echo "selected";
                                            } ?>>XL</option>
                                                    <option value="XXL" <?php if ($res['size']=="XXL") {
                                                echo "selected";
                                            } ?>>XXL</option>
                                                    <option value="XXXL" <?php if ($res['size']=="XXXL") {
                                                echo "selected";
                                            } ?>>XXXL</option>
                                                    <option value="XXXXL" <?php if ($res['size']=="XXXXL") {
                                                echo "selected";
                                            } ?>>XXXXL</option>
             
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                    $idU = $res['idUkuran'];
                                    $kueri1 = mysqli_query($koneksi, "SELECT * FROM tbl_itemUkuran A INNER JOIN tbl_ukuran B ON A.idUkuran = B.idUkuran INNER JOIN tbl_itemNamaUkuran C ON A.idItemNamaUkuran = C.idItemNamaUkuran WHERE A.idUkuran = '$idU'" );
                                    $no=1;       
                                            while ($res1=mysqli_fetch_array($kueri1)) {
                                                
                                                ?>

                                        <input type="text" hidden name="idItemUkuran[]" value="<?php echo $res1['idItemUkuran']; ?>">
                                        <div class="form-group row" id="baris<?php echo $no;?>">
                                        <?php if($no == 1){ ?>    
                                        <label class="col-lg-4 col-form-label" for="val-username">Item (Centimeter)  
                                            </label>
                                        <?php }else{ ?>
                                            <label class="col-lg-4 col-form-label" for="val-username">
                                            </label>
                                            <?php } ?>
                                            <div class="col-lg-4">
                                            <select class="form-control"  name="item[]">
                                                    <option value="">Pilih Nama Item</option>
                                                    <?php
                                                 $kueri2 = mysqli_query($koneksi, "SELECT * FROM tbl_itemNamaUkuran");
                                                while ($res2=mysqli_fetch_array($kueri2)) {
                                                    ?>
                                                
                                                <option value="<?php echo $res2['idItemNamaUkuran'] ; ?>"<?php if ($res2['idItemNamaUkuran']==$res1['idItemNamaUkuran']) {
                                                        echo "selected";
                                                    } ?> ><?php echo $res2['namaUkuran'] ; ?></option>
                                                 <?php
                                                } ?>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                            <input type="text" class="form-control" name="ukuran[]" placeholder="Masukan ukuran" value="<?php echo $res1['nilaiUkuran'] ; ?>">
                                            </div>

                                            <div class="col-lg-2">
                                            <?php if($no == 1){ ?>  
                                            <button type="button" class="btn mb-1 btn-rounded btn-primary mt-2" name="add" id="add"><i class="ti-plus"></i></button>
                                            <?php }else{ ?>
                                                
                                                <a onClick ="return confirm('Anda yakin ingin menghapus data ini?')" href="<?php echo $admin_url;?>module/ukuran/hapusItemUkuran.php?id=<?php echo $res1['idItemUkuran'];?>&idUkuran=<?php echo $res['idUkuran'];?>" type="button" class="btn mb-1 btn-rounded btn-danger mt-2 remove" name="remove" id="<?php echo $no;?>" ><i class="ti-minus"></i></a>
                                                <?php } ?>
                                            </div>
                                            
                                        </div>
                                            
                                        <?php
                                           $no++ ;} ?>
                                           </span>
                                        <?php } ?>
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
                     $(document).ready(function(){  
                      var i='<?php echo $no-1;?>';  
      $('#add').click(function(){  
       i++;  
       $('#formUkuran').append('<div class="form-group row" id="baris'+i+'"><label class="col-lg-4 col-form-label" for="val-username"></label><div class="col-lg-4">'+
                            '<select class="form-control" id="val-skill" name="itemBaru[]">'+
                            '<option value="">Pilih Nama Item</option>'+
                            '<?php $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_itemNamaUkuran"); while ($res=mysqli_fetch_array($kueri)) { ?>'+
                            '<option value="<?php echo $res['idItemNamaUkuran'] ;?>"><?php echo $res['namaUkuran'] ;?></option>'+
                            '<?php } ?>'+
                            '</select></div>'+
                            '<div class="col-lg-2">'+
                            '<input type="text" class="form-control" name="ukuranBaru[]" placeholder="Masukan ukuran" required>'+
                            '</div>'+
                           '<div class="col-lg-2">'+
                            '<button type="button" class="btn mb-1 btn-rounded btn-danger mt-2 removeNow"  id="'+i+'"><i class="ti-minus"></i></button>'+
                            '</div></div>');  
     });   
      
     $(document).on('click', '.removeNow', function(){  
       var button_id = $(this).attr("id");   
       $('#baris'+button_id+'').remove();  
     }); 
    });  
  </script>

