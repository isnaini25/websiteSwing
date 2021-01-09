<?php
        session_start();
        if (empty($_SESSION['id_pelanggan'])) {
            echo "<script>alert ('Anda belum login'); window.location = 'masuk.php';
        </script>";
        }
        ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo-mark.png">

    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">


    <link rel="stylesheet" href="assets/css/flaticon.css">





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&family=Abel&family=Open+Sans:wght@400&family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>SWING</title>


</head>
<!-- <script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
</script> -->
<style>
    body {
        background-color: rgb(233, 233, 233);
        padding: 0;
        margin: 0;
    }

    .dropdown-toggle::after {
        display: none !important;
    }
    .pesan {
        display: flex;
        flex-direction: row;
    }

    .pesan textarea {
        width: 300px;
    }

    .kirim {
        margin-left: 20px;
        height: 40px;
    }

    .pesan1 {
        background-color:  #FFAD32;
        color: #fff;
       
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .bubble-pesan{
        display: flex;
        flex-direction: column; 
          
    }

    .nama-pesan2{
        align-self: flex-end;
     
    }
    .pesan2 {
        background-color:  #ebebeb;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .tanggal{
        display: flex;
        flex-direction: column; 
       
    }

    .tanggal span{
        background-color:#ededed;
        margin-bottom: 10px;
        border-radius: 30px;
        align-self: center;
    }
    

    
    

</style>


<body>
    <header>
        <div class="nav-pelanggan">
            <nav class="navbar navbar-expand-lg navbar-dark mr-5">
                <img src="assets/img/logo-black.png" alt="Logo" id="logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                <input type="text" id="idPelanggan" hidden value="<?php echo $_SESSION['id_pelanggan'];?>">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active mb-2">
                            <a class="link-nav aktif" href="home.php"><i class="ti-home" aria-hidden="true"></i> Beranda</a>
                        </li>


                        <li class="nav-item mb-2">
                            <a class="link-nav" href="history.php"><i class="ti-shopping-cart" aria-hidden="true"></i> Pesanan</a>
                        </li>

                        <li class="nav-item mb-2 dropdown">
                            <a class="link-nav dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="ti-user"></i> Akun
                            </a>
                            <ul class="dropdown-menu">
                                <!-- <li><a class="dropdown-item" href="#">Riwayat</a></li> -->
                                <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                                <li><a class="dropdown-item" href="passwordChanged.php">Ubah Kata Sandi</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="aksiKeluar.php">Keluar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mb-2 dropdown">
                            <a class="link-nav dropdown-toggle" href="#" id="seen" role="button" data-toggle="dropdown">
                                <i class="ti-bell" aria-hidden="true"></i><span id="count-notifikasi" class="count-number"></span>
                            </a>
    
                                <div class="dropdown-menu">
                                    <ul class="notifikasi-content">

                                    </ul>

                                </div>
                           

                        </li>
                        <li class="nav-item mb-2 dropdown mr-5" >
                            <a class="link-nav dropdown-toggle" href="#" role="button" data-toggle="dropdown" id="seen-pesan">
                                <i class="ti-email" aria-hidden="true"></i><span id="count-pesan" class="count-number"></span></a>
                     
                                <div  class="dropdown-menu" >
                                    <ul class="pesan-content">

                                    </ul>
                                   
                                </div>
                         
                            </a>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>



    </header>
    <script src="assets/js/notifikasi.js"></script>
   
  