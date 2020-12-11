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
                                <a class="nav-link" href="#">Bantuan</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="daftar.php">Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="masuk.php">Masuk<span class="sr-only">(current)</span></a>
                            </li>

                        </ul>
                    </div>
                </nav>

                <div class="container-masuk">
                    <div class="container-masuk-forms">
                        <div class="container-masuk-pelanggan" id="pelanggan">
                            <div class="row">
                                <div class="form-item masuk-pelanggan col-lg-6">
                                    <h5>Masuk sebagi pelanggan</h5>
                                    <form action="aksi_login.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" name="usernamePl" placeholder="Masukkan Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="passwordPl" placeholder="Masukkan Password" required>
                                        </div>

                                        <button type="submit" class="btn-all">Masuk</button>
                                    </form>
                                </div>

                                <div class="info-item col-lg-6">
                                    <div class="info-text">
                                        Anda seorang PENJAHIT?
                                    </div>
                                    <div class="info-btn">
                                        <button onclick="myFunction()">Masuk <br> sebagai PENJAHIT</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="container-masuk-penjahit" id="penjahit">
                            <div class="row">
                                <div class="info-item col-lg-6">
                                    <div class="info-text">
                                        Anda seorang PELANGGAN?
                                    </div>
                                    <div class="info-btn">
                                        <button onclick="myFunction()">Masuk <br> sebagai PELANGGAN</button>
                                    </div>
                                </div>
                                <div class="form-item col-lg-6 masuk-penjahit">
                                    <h5>Masuk sebagi penjahit</h5>
                                    <form action="aksi_login.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" name="usernamePj" placeholder="Masukkan Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="passwordPj" placeholder="Masukkan Password" required>
                                        </div>
                                        <button type="submit" class="btn-all">Masuk</button>
                                       

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
            }
        }
    </script>
   

</body>



</html>