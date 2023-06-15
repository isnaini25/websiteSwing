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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Bebas+Neue&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
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
                                <a class="nav-link active" href="bantuan.php">Bantuan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="daftar.php">Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="masuk.php">Masuk<span class="sr-only">(current)</span></a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <div class="bantuan">
                    <p>Halo, Ada yang bisa kami bantu?</p>
                    <form action="" class="cari">
                        <div class="form-group col-sm-6">
                            <input class="form-control" type="text" placeholder="Cari bantuan..">
                        </div>
                        <button class="btn-find" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
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
            }
        }
    </script>


</body>



</html>