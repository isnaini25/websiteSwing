<?php 
include "../lib/koneksi.php";
include "../lib/config.php";
session_start();

if(empty($_SESSION['level'])){
    echo "<script>alert ('Anda belum login'); window.location = '$base_url'+'masuk.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Swing</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logo-mark.png">
    <!-- Pignose Calender
    <link href="asset/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet"> -->
    <!-- Chartist -->
    <!-- <link rel="stylesheet" href="asset/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css"> -->
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="asset/icons/themify-icons/themify-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <!-- Custom Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">
    <link href="asset/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="asset/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
 
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="asset/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="asset/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- <script src="asset/plugins/jquery/jquery.min.js"></script> -->
   
    
    
</head>
<style>
    input[type=text]:disabled{
        background-color: #fff;
        border:none;
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
        background-color: #b057f4;
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
        background-color: #ebebeb;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .tanggal{
        display: flex;
        flex-direction: column; 
       
    }
    /* .remove{
        background-color: #de436f;
    } */
    .tanggal span{
        background-color:#ededed;
        margin-bottom: 10px;
        border-radius: 30px;
        align-self: center;
    }
    </style>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
   
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="adminweb.php?module=home">
                    <b class="logo-abbr"><img src="../assets/img/logo-mark.png" alt=""> </b>
                    <span class="logo-compact"><img src="../assets/img/logo-compact.png" alt=""  width="150px"></span>
                    <span class="brand-title">
                        <img src="../assets/img/logo-compact.png" alt="" width="150px">
                    </span>
                </a>
            </div>
        </div>
        
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                        <?php if($_SESSION['level']=='penjahit'){ ?>
                            <a href="javascript:void(0)" data-toggle="dropdown" id="seen-pesan">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1"><span id="count-pesan-text"></span></span>
                            </a>
                            <input type="text" hidden id="idPenjahit" value="<?php echo $_SESSION['id_penjahit'];?>">
                            <?php }?>
                            <div class="drop-down animated fadeIn dropdown-menu">
                            <?php if($_SESSION['level']=='penjahit'){ ?>
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><span id="count-pesan-text"></span> Pesan Baru</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1" id="count-pesan"></span>
                                    </a>
                                </div>
                                
                                <div class="dropdown-content-body">
                                    <ul id="notifikasi-pesan">
                                    
                                </ul>
                                </div>
                                <?php }?>
                            </div>
                        </li>

                        
                        <!-- Notifikasi codes -->
                        <?php if(!empty($_SESSION['id_penjahit'])){ ?> 
                        <li class="icons dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown" id="seen">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2" id="count"></span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><span id="count-text"></span> Notifikasi Baru</span>
                                    
                                </div>
                                <div class="dropdown-content-body" style="overflow: scroll;height:250px;overflow-x: hidden;">
                                    <ul id="notifikasi-pesanan">

                                    </ul>

                                </div>
                            </div>
                        </li>
                        <?php }else{?>
                         <!-- Admin Notifikasi codes -->
                         <li class="icons dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown" id="seen-admin">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2" id="count-admin"></span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><span id="count-text-admin"></span> Notifikasi Baru</span>
                                    
                                </div>
                                <div class="dropdown-content-body" style="overflow: scroll;height:250px;overflow-x: hidden;">
                                    <ul id="notifikasi-admin" >

                                    </ul>

                                </div>
                            </div>
                        </li>
                        <?php }?>

                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <?php if($_SESSION['level']=="penjahit"){ 
                                     $id = $_SESSION['id_penjahit'];
                                     $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit WHERE idPenjahit = '$id'");
                                    
                                     while ($res=mysqli_fetch_array($kueri)) {?>
                                <img src="upload/<?php echo $res['foto'];?>" height="40"  alt="">
                                <?php }}else{ ?>
                                    <img src="../assets/img/admin.png" height="40"  alt="">
                                    <?php } ?>
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <?php if($_SESSION['level']=="penjahit"){ ?>
                                            <a href="adminweb.php?module=profilPenjahit"><i class="icon-user"></i> <span>Profil</span></a>
                                            <?php }else{ ?>
                                                <a href="adminweb.php?module=profilAdmin"><i class="icon-user"></i> <span>Profil</span></a>
                                                <?php } ?>
                                        </li>
                                        <!-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li> -->

                                        <hr class="my-2">
                                        <!-- <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li> -->
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
           
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <?php if($_SESSION['level']=="admin"){ ?>
                    <li class="nav-label">Dashboard </li>
                    <li>
                        <a href="adminweb.php?module=home" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>

                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="ti-credit-card"></i><span class="nav-text">Pembayaran</span>
                        </a>
                        <ul aria-expanded="false">
                             <li><a href="adminweb.php?module=cekBayar">Cek Pembayaran</a></li>
                            <li><a href="adminweb.php?module=metodeBayar">Metode Pembayaran</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">PENJAHIT</li>    
                    <li>
                        <a href="adminweb.php?module=kategoriPenjahit" aria-expanded="false">
                            <i class="ti-tag" aria-hidden="true"></i><span class="nav-text">Kategori Penjahit</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=namaUkuran" aria-expanded="false">
                            <i class="ti-ruler-pencil" aria-hidden="true"></i><span class="nav-text">Standar Ukuran</span>
                        </a>
                    </li>
                    <li>
                        <a href="adminweb.php?module=laporanPenjahit" aria-expanded="false">
                        <i class="ti-cut"></i><span class="nav-text">Penjahit</span>
                        </a>
                    </li>
                    <li class="nav-label">LAIN-LAIN</li>
                   
                    <li>
                        <a href="adminweb.php?module=laporanPelanggan" aria-expanded="false">
                        <i class="ti-user"></i><span class="nav-text">Pelanggan</span>
                        </a>
                    </li>

                    <li>
                        <a href="adminweb.php?module=kurir" aria-expanded="false">
                        <i class="ti-truck"></i><span class="nav-text">Kurir</span>
                        </a>
                    </li>


                    <li>
                        <a href="adminweb.php?module=feedback" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Feedback</span>
                        </a>
                    </li>

                    <?php }elseif ($_SESSION['level']=="penjahit"){ ?>
                        <li class="nav-label">Dashboard </li>
                    <li>
                        <a href="adminweb.php?module=homePenjahit" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>

                    </li>
                    <li class="nav-label">PENJAHIT</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="ti-bookmark-alt"></i><span class="nav-text">Katalog</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="adminweb.php?module=tambahKatalog">Tambah</a></li>
                            <li><a href="adminweb.php?module=lihatKatalog">Lihat Katalog</a></li>
                        </ul>
                    </li>

                    <li>
                      <a href="adminweb.php?module=lihatUkuran" aria-expanded="false">
                          <i class="ti-ruler-alt-2"></i><span class="nav-text">Ukuran</span>
                        </a>
                    </li>
    
                    <li class="nav-label">TRANSAKSI</li>
                    <li>
                        <a href="adminweb.php?module=lihatPesanan" aria-expanded="false">
                            <i class="ti-shopping-cart" aria-hidden="true"></i><span class="nav-text">Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="ti-bar-chart"></i><span class="nav-text">Laporan</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="adminweb.php?module=laporanPesanan">Pesanan</a></li>
                            <li><a href="adminweb.php?module=laporanPendapatan">Pendapatan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="adminweb.php?module=lihatPelanggan" aria-expanded="false">
                            <i class="ti-user" aria-hidden="true"></i><span class="nav-text">Pelanggan</span>
                        </a>
                    </li>
                    

                    
                    
                    <? } ?>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <?php
        //dashboar
        if($_GET['module'] == 'home'){
            include "module/home/home.php";
        }elseif($_GET['module'] == 'homePenjahit'){
            include "module/home/homePenjahit.php";
        }
        //kategori penjahit
        elseif ($_GET['module'] == 'kategoriPenjahit'){
            include "module/kategoriPenjahit/listKategori.php";
        }elseif ($_GET['module'] == 'tambahKategori'){
            include "module/kategoriPenjahit/tambahKategori.php";
        }elseif ($_GET['module'] == 'ubahKategori'){
            include "module/kategoriPenjahit/ubahKategori.php";
        }
        //metode bayar
        elseif ($_GET['module'] == 'metodeBayar'){
            include "module/metodeBayar/listMetode.php";
        }elseif ($_GET['module'] == 'tambahMetode'){
            include "module/metodeBayar/tambahMetode.php";
        }elseif ($_GET['module'] == 'ubahMetode'){
            include "module/metodeBayar/ubahMetode.php";
        }
        //cek pembayaran
        elseif ($_GET['module'] == 'cekBayar'){
            include "module/pembayaran/listPembayaran.php";
        }elseif ($_GET['module'] == 'cekPembayaran'){
            include "module/pembayaran/cekPembayaran.php";
        }
        //kurir
        elseif ($_GET['module'] == 'kurir'){
            include "module/kurir/listKurir.php";
        }elseif ($_GET['module'] == 'tambahKurir'){
            include "module/kurir/tambahKurir.php";
        }elseif ($_GET['module'] == 'ubahKurir'){
            include "module/kurir/ubahKurir.php";
        }
        //standar ukuran
        elseif ($_GET['module'] == 'namaUkuran'){
            include "module/namaUkuran/listNamaUkuran.php";
        }elseif ($_GET['module'] == 'tambahNamaUkuran'){
            include "module/namaUkuran/tambahNamaUkuran.php";
        }elseif ($_GET['module'] == 'ubahNamaUkuran'){
            include "module/namaUkuran/ubahNamaUkuran.php";
        }
        //pelanggan
        elseif ($_GET['module'] == 'lihatPelanggan'){
            include "module/pelanggan/listPelanggan.php";
        }
         //penjahit
         elseif ($_GET['module'] == 'penjahit'){
            include "module/penjahit/listPenjahit.php";
        }
         //feedback
         elseif ($_GET['module'] == 'feedback'){
            include "module/feedback/listFeedback.php";
        }
        //katalog
        elseif ($_GET['module'] == 'lihatKatalog'){
            include "module/katalog/listKatalog.php";
        }elseif ($_GET['module'] == 'tambahKatalog'){
            include "module/katalog/tambahKatalog.php";
        }elseif ($_GET['module'] == 'ubahKatalog'){
            include "module/katalog/ubahKatalog.php";
        }
        //ukuran
        elseif ($_GET['module'] == 'lihatUkuran'){
            include "module/ukuran/listUkuran.php";
        }elseif ($_GET['module'] == 'tambahUkuran'){
            include "module/ukuran/tambahUkuran.php";
        }elseif ($_GET['module'] == 'ubahUkuran'){
            include "module/ukuran/ubahUkuran.php";
        }
        //profil penjahit
        elseif ($_GET['module'] == 'profilPenjahit'){
            include "module/penjahit/profilPenjahit.php";
        }
        //pesanan
        elseif ($_GET['module'] == 'lihatPesanan'){
            include "module/pesanan/listPesanan.php";
        }elseif ($_GET['module'] == 'detailPesanan'){
            include "module/pesanan/detailPesanan.php";
        }elseif ($_GET['module'] == 'cetakData'){
            include "module/pesanan/cetakData.php";
        }

        //laporan
        elseif ($_GET['module'] == 'laporanPesanan'){
            include "module/laporan/laporanPesanan.php";
        } elseif ($_GET['module'] == 'laporanPenjahit'){
            include "module/laporan/laporanPenjahit.php";
        }elseif ($_GET['module'] == 'detailPenjahit'){
            include "module/laporan/detailPenjahit.php";
        } elseif ($_GET['module'] == 'laporanPelanggan'){
            include "module/laporan/laporanPelangganAdmin.php";
        } elseif ($_GET['module'] == 'laporanPendapatan'){
            include "module/laporan/laporanPendapatan.php";
        }

        //ulasan
        elseif ($_GET['module'] == 'ulasan'){
            include "module/ulasan/ulasan.php";
        }

        //profilAdmin
        elseif ($_GET['module'] == 'profilAdmin'){
            include "module/admin/profilAdmin.php";
        }

    
        ?>


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
     
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
     <!-- Modal Chat -->

     
     <div class="chat modal" role="dialog" id="modal-show">
                    
    </div>
    <!-- Modal Foto -->                
    <div id="modal-img" role="dialog" class="foto-modal modal">
    </div>

    
    <script src="asset/plugins/common/common.min.js"></script>
   
    <script src="asset/js/custom.min.js"></script>
    <script src="asset/js/settings.js"></script>
    <script src="asset/js/gleek.js"></script>
    <script src="asset/js/styleSwitcher.js"></script>

   
    <script src="asset/plugins/chart.js/Chart.bundle.min.js"></script>
  
    <script src="asset/plugins/circle-progress/circle-progress.min.js"></script>
 
    <script src="asset/plugins/d3v3/index.js"></script>
    <script src="asset/plugins/topojson/topojson.min.js"></script>
  
   
    <!-- <script src="asset/plugins/raphael/raphael.min.js"></script>
    <script src="asset/plugins/morris/morris.min.js"></script> -->
    
    <script src="asset/plugins/moment/moment.min.js"></script>
    <script src="asset/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
  
    <script src="asset/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="asset/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="asset/plugins/moment/moment.js"></script>
    <script src="asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
   
    <script src="asset/js/plugins-init/form-pickers-init.js"></script>
    <!-- ChartistJS -->
    <!-- <script src="asset/plugins/chartist/js/chartist.min.js"></script>
    <script src="asset/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script> -->

<?php if ($_SESSION['level']=='admin'){ ?>

<script src="asset/js/scriptAdmin.js"></script>

<?php }else{?>
    <script src="asset/js/script.js"></script>
    <?php }?>
</body>

</html>