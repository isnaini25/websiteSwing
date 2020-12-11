<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Ukuran</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Ukuran</a></li>
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
                                    <form class="form-valide" action="module/ukuran/aksiSimpan.php" method="post" >
                                   <fieldset id="formUkuran">
                                    <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Ukuran
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="size">
                                                    <option value="">Pilih Kode Ukuran</option>
                                                    <option value="XS">XS</option>
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option value="XXXL">XXXL</option>
                                                    <option value="XXXXL">XXXXL</option>
             
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Item (Centimeter)
                                            </label>
                                            <div class="col-lg-4">
                                            <select class="form-control"  name="item[]">
                                                <option value="">Pilih Nama Item</option>
                                                <?php 
                                                 $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_itemNamaUkuran");
                                                 while ($res=mysqli_fetch_array($kueri)) {
                                                ?>
                                                
                                                <option value="<?php echo $res['idItemNamaUkuran'] ;?>"><?php echo $res['namaUkuran'] ;?></option>
                                                 <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                            <input type="text" class="form-control" name="ukuran[]" placeholder="Masukan ukuran">
                                            </div>
                                            <div class="col-lg-2">
                                            <button type="button" class="btn mb-1 btn-rounded btn-primary mt-2" name="add" id="add"><i class="ti-plus"></i></button>
                                            </div>
                                        </div>
                                        </fieldset>
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
                      var i=1;  
      $('#add').click(function(){  
       i++;  
       $('#formUkuran').append('<div class="form-group row" id="baris'+i+'"><label class="col-lg-4 col-form-label" for="val-username"></label><div class="col-lg-4"><select class="form-control" id="val-skill" name="item[]">'+
                            '<option value="">Pilih Nama Item</option>'+
                            '<?php $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_itemNamaUkuran"); while ($res=mysqli_fetch_array($kueri)) { ?>'+
                            '<option value="<?php echo $res['idItemNamaUkuran'] ;?>"><?php echo $res['namaUkuran'] ;?></option>'+
                            '<?php } ?>'+
                            '</select></div>'+
                            '<div class="col-lg-2">'+
                            '<input type="text" class="form-control" name="ukuran[]" placeholder="Masukan ukuran">'+
                            '</div>'+
                           '<div class="col-lg-2">'+
                            '<button type="button" class="btn mb-1 btn-rounded btn-danger mt-2 remove" name="remove" id="'+i+'"><i class="ti-minus"></i></button>'+
                            '</div></div>');  
     });   
      $(document).on('click', '.remove', function(){  
       var button_id = $(this).attr("id");   
       $('#baris'+button_id+'').remove();  
     });  
 
    });  
  </script>

