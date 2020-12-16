
<?php
session_start();
if(empty($_SESSION['id_pelanggan'])){
    echo "<script>alert ('Anda belum login'); window.location = 'masuk.php';
        </script>";
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo-mark.png">

    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    
    <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Open+Sans:wght@600&family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>SWING</title>


</head>
<!-- <script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script> -->
<style>
    body {
        background-color: rgb(233, 233, 233);
        padding: 0;
        margin: 0;
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
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active mb-2">
                            <a class="link-nav aktif" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="link-nav" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notifikasi</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="link-nav" href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i> Pesanan</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="link-nav" href=""><i class="fa fa-user" aria-hidden="true"></i> Akun</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>


    </header>