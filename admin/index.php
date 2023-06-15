
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Swing - Admin Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logo-mark.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="asset/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
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
    <?php
    include "../lib/koneksi.php";
      
    ?>


    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.php"> <h4><img src="../assets/img/logo-black.png" alt="" width="200px"></h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="index.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100 mb-2">Masuk</button>
                                    <?php
                                    if (!empty($_POST['username'])&&!empty($pass = md5($_POST['password']))) {
                                        $username = $_POST['username'];
                                        $pass = md5($_POST['password']);

                                        $login = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND passwordAdmin='$pass'");
                                        $ketemu = mysqli_num_rows($login);
                                        $r = mysqli_fetch_array($login);
                                    
                                        if ($ketemu > 0) {
                                            session_start();
                                            $_SESSION['id_admin'] = $r['idAdmin'];
                                            $_SESSION['namauser'] = $r['username'];
                                            $_SESSION['passuser'] = $r['password'];
                                            $_SESSION['level']='admin';
                                            
                                            header('location:adminweb.php?module=home');
                                        }else{
                                            echo "<script>alert ('Password salah!'); window.location ='$admin_url';</script>";
                                        } 
                                    }?>
                                    
                                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="asset/plugins/common/common.min.js"></script>
    <script src="asset/js/custom.min.js"></script>
    <script src="asset/js/settings.js"></script>
    <script src="asset/js/gleek.js"></script>
    <script src="asset/js/styleSwitcher.js"></script>
</body>
</html>

