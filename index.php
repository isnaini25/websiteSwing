<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo-mark.png">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    <script type="text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js "
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous ">
    </script>
    <script src="assets/js/bootstrap.bundle.js"></script>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">
    <title>SWING</title>


</head>
<style>
body {
    background-color: rgb(233, 233, 233);
    padding: 0;
    margin: 0;
}
</style>

<body>
    <header>
        <div class="container-fluid p-0 jumbotron">
            <div class="overlay">

                <nav class="navbar navbar-expand-lg navbar-dark mr-md-5">
                    <img src="assets/img/logo-compact.png" alt="Logo" id="logo">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="mr-auto"></div>
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="bantuan.php">Bantuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="daftar.php">Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="masuk.php">Masuk</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="jumbotron-content">
                    <div class="jumbotron-text">
                        <h1>SWING</h1>
                        <p> Swing adalah e-marketplace jasa jahit berbasis website yang digunakan untuk melakukan
                            pemesanan jasa
                            <br> penjahit secara online. Swing mempertemukan penjahit dan konsumen yang membutuhkan jasa
                            penjahit.
                            <br> Para penjahit dapat mendaftarkan jasanya di e-marketplace ini dan konsumen dapat
                            mencari jasa penjahit
                            <br>tanpa harus datang ke tempat penjahit. Swing memudahkan konsumen dalam melakukan
                            transaksi jasa jahit.
                        </p>
                    </div>

                    <div class="jumbotron-button">
                        <div class="button-penjahit">
                            <a href="daftar.php?penjahit=1"><span>Saya PENJAHIT</span></a>
                        </div>
                        <div class="button-pelanggan">
                            <a href="daftar.php"><span>Saya PELANGGAN</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container-fluid penjahit-corner">
            <h1>Temukan penjahit yang cocok untuk Anda</h1>
            <div class="row">
                <?php
                include "lib/config.php";
                include "lib/koneksi.php";
                $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_penjahit LIMIT 8");
                while ($res = mysqli_fetch_array($kueri)) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="penjahit-item">
                        <div class="penjahit-gambar">
                            <img src="admin/upload/<?php echo $res['foto']; ?>" alt="">
                        </div>
                        <div class="penjahit-desc">
                            <span class="penjahit-name"><?php echo $res['nama']; ?></span>
                            <?php
                                $idPenjahit = $res['idPenjahit'];
                                $kueriItem = mysqli_query($koneksi, "SELECT * FROM tbl_itemKategori a INNER JOIN tbl_kategori b ON a.idKategori = b.idKategori WHERE idPenjahit = '$idPenjahit' LIMIT 2");
                                $no = 0;
                                while ($resItem = mysqli_fetch_array($kueriItem)) {

                                ?>

                            <span class="penjahit-category">
                                <?php if ($no > 0) {
                                            echo ", ";
                                        }
                                        echo $resItem['namaKategori']; ?>
                                <?php $no++;
                                } ?>
                            </span>

                        </div>
                        <div class="next">
                            <a href="profilPenjahit.php?id=<?php echo $res['idPenjahit']; ?>">LIHAT </a>
                        </div>

                    </div>
                </div>
                <?php } ?>


            </div>
            <div class="row">
                <div class="button-all">
                    <a href="home.php"><span>Lihat lainnya</span></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="info">
                <div class="overlay-info">
                    <div class="row">
                        <div class="col-sm-12 info-content">
                            <div class="info-gambar">
                                <img src="assets/img/stroberydress.png " alt="dress " width="300px" height="330px">
                            </div>
                            <!-- Masih gak responsive cari pemecahannya! -->
                            <div class="info-teks">
                                <span>Beli baju sering kurang puas?</span><br>
                                <span>Ingin membuat pakaian sesuai keinginan?</span><br>
                                <span>Penjahit langganan penuh pesanan?</span><br>
                                <div class="info-link">
                                    <span>Cari penjahit yang bisa mewujudkan keinginanmu <a href="">di sini</a></span>
                                </div>
                                <div class="info-plus">
                                    <div class="plus-content">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <p>Kepuasan pelanggan sangat diutamakan. Kamu dijamin puas dengan hasil pesanan
                                            jahitmu.
                                        </p>
                                    </div>
                                    <div class="plus-content">
                                        <i class="fas fa-comment"></i>
                                        <p>Kamu bisa berdiskusi dengan penjahit mengenai pesanan jahitmu.
                                        </p>
                                    </div>
                                    <div class="plus-content">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>Penjahit di Swing adalah penjahit di Kabupaten Bantul yang berpengalaman.
                                        </p>
                                    </div>
                                </div>

                                <!-- /Masih gak responsive cari pemecahannya! -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php 
   include "templates/footer.php";
   ?>

</body>

</html>