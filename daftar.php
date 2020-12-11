<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo-mark.png">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Daftar SWING</title>


</head>
<script>
    function loadFunc(){
        var x = document.getElementById("penjahit");
            var y = document.getElementById("pelanggan");
            
                x.style.visibility = "visible";
                x.style.opacity = "1";
                y.style.visibility = "hidden";
                y.style.opacity = "0";
            
    }
</script>
<style>
    body {
        background-color: rgb(233, 233, 233);
        padding: 0;
        margin: 0;
    }
</style>
<body onLoad=<?php if(isset($_GET['penjahit'])){ echo "loadFunc()";}?>>
    <header>
        <div class="container-fluid p-0 jumbotron">
            <div class="overlay">
                <nav class="navbar navbar-expand-lg navbar-dark mr-5">
                    <img src="assets/img/logo-compact.png" alt="Logo" id="logo">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="mr-auto"></div>
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bantuan</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="daftar.php">Daftar<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="masuk.php">Masuk</a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <div class="container">
                    <div class="container-forms">
                        <div class="container-pelanggan" id="pelanggan">
                            <div class="row">

                                <div class="form-item daftar-pelanggan col-lg-6 m-auto">
                                    <h5>Daftar sebagi pelanggan</h5>
                                    <form action="aksiDaftarPelanggan.php" method="post" enctype="multipart/form-data">

                                        <div class="list-group list-group-horizontal mb-3" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Detail Akun</a>
                                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Data Diri</a>

                                        </div>

                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username</label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Username" required name="usernamePL" id="usernamePL">
                                                    <label class="mt-1" id="cekUnamePL">  </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control"  placeholder="Masukkan Password" required name="passwordPL">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" required name="namaPL">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" placeholder="Masukkan Email" required name="emailPL">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No Telepon</label>
                                                    <input type="tel" class="form-control" placeholder="Masukkan Nomor Telepon" required name="nohpPL">
                                                </div>

                                            </div>
                                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Provinsi</label>
                                                    <select class="form-control" id="provinsi" name="provinsi">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Kota/Kabupaten</label>
                                                    <select class="form-control" id="kota" name="kota">
                                                    </select>
                                                </div>
                                                <div class="form-group alamat">
                                                    <label for="exampleInputEmail1">Alamat</label>
                                                    <textarea class="form-control" placeholder="Masukkan alamat lengkap" rows="2" required name="alamatPL"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Jenis Kelamin</label>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenisKelamin"  value="L" checked name="jenkelPL">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Laki-laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenisKelamin"  value="P" name="jenkelPL">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Foto Maks 1MB</label>
                                                    <input type="file" class="form-control-file" name="gambarPL">
                                                </div>
                                                <button type="submit" class="btn-all">Daftar</button>
                                            </div>

                                        </div>






                                    </form>
                                </div>

                                <div class="info-item col-lg-6 m-auto">
                                    <div class="info-text">
                                        Anda seorang PENJAHIT?
                                    </div>
                                    <div class="info-btn">
                                        <button onclick="myFunction()">Daftar <br> sebagai PENJAHIT</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="container-penjahit" id="penjahit">
                            <div class="row">
                                <div class="info-item col-lg-6 m-auto">
                                    <div class="info-text">
                                        Anda seorang PELANGGAN?
                                    </div>
                                    <div class="info-btn">
                                        <button onclick="myFunction()">Daftar <br> sebagai PELANGGAN</button>
                                    </div>
                                </div>
                                <div class="form-item col-lg-6 m-auto daftar-penjahit">
                                    <h5>Daftar sebagi penjahit</h5>

                                    <form action="aksiDaftarPenjahit.php" method="post" enctype="multipart/form-data">
                                        <div class="list-group list-group-horizontal mb-3" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home-penjahit" role="tab" aria-controls="home">Detail Akun</a>
                                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile-penjahit" role="tab" aria-controls="profile">Data Penjahit</a>
                                            

                                        </div>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="list-home-penjahit" role="tabpanel" aria-labelledby="list-home-list">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username</label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Username" required name="username" id="usernamePJ">
                                                    <label class="mt-1" id="cekUnamePJ">  </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" placeholder="Masukkan Password" required name="password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Penjahit</label>
                                                    <input type="text" class="form-control"  placeholder="Ex. Modiste Lorem " required name="nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control"  placeholder="Masukkan Email" required name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No Telepon</label>
                                                    <input type="text" class="form-control"  placeholder="Masukkan Nomor Telepon" required name="nohp">
                                                </div>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="list-profile-penjahit" role="tabpanel" aria-labelledby="list-profile-list">
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Provinsi</label>
                                                    <select class="form-control" id="provinsi" name="provinsi">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Kota/Kabupaten</label>
                                                    <select class="form-control" id="kota" name="kota">
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group alamat">
                                                    <label for="exampleInputEmail1">Alamat</label>
                                                    <textarea class="form-control"  rows="2" placeholder="Masukkan alamat lengkap " required name="alamat"></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Foto Maks 1MB</label>
                                                    <input type="file" class="form-control-file" name="gambar">
                                                </div>

                                                <button type="submit" class="btn-all">Daftar</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </header>

    <?php 
   include "templates/footer.php";
   ?>

    <script>
        function myFunction() {
            var x = document.getElementById("penjahit");
            var y = document.getElementById("pelanggan");
            if (x.style.visibility === "hidden" || y.style.visibility === "visible") {
                x.style.visibility = "visible";
                x.style.opacity = "1";
                y.style.visibility = "hidden";
                y.style.opacity = "0";
                
            } else {
                x.style.visibility = "hidden";
                x.style.opacity = "0";
                y.style.visibility = "visible";
                y.style.opacity = "1";
                y.style.display = "block";
                
            }
        }

   
    </script>

    <script>
    $(document).ready(function(){
     
      $.ajax({
          type:'post',
          url:'admin/module/data/dataProvinsi.php',
          success:function(hasil_provinsi)
          {
              
              $("select[name=provinsi]").html(hasil_provinsi);
             
          }
      });


      $("select[name=provinsi]").on("change", function(){
          var id_provinsi = $("option:selected", this).attr("id_provinsi");
          $.ajax({
              type:'post',
              url: 'admin/module/data/dataKota.php',
              data:'id_provinsi='+id_provinsi,
              success:function(hasil_kota){
                $("select[name=kota]").html(hasil_kota);
              }
          })
      })
  })

        $(document).ready(function(){
            $("#usernamePL").change(function(){  
            var username=$("#usernamePL").val();
 
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

         $(document).ready(function(){
            $("#usernamePJ").change(function(){  
            var username=$("#usernamePJ").val();
 
          	  $.ajax({
         		   	type:"post",
         		   	url:"checkUsernamePenjahit.php",
         		   	data:"username="+username,
        		    	success:function(data){
        	    		if(data==0){
        	    			$("#cekUnamePJ").html("<i class='fa fa-check'></i> Username tersedia");
        	    		}
        	    		else{
        	    			$("#cekUnamePJ").html("<i class='fa fa-times'></i> Username tidak tersedia");
        	    		}
       		     	}
       		     });
 
            });
 
         });
    </script>
    

</body>



</html>