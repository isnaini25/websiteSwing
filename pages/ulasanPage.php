<style>
    .checked {
        color: orange;
    }

    .text-ulasan textarea{
        width: 300px;
    }
</style>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mt-3 link-bread">
                <ul>

                    <li><a href="home.php">Beranda</a></li>
                    <li><i class="ti-angle-right"></i><a href="history.php">Pesanan</a></li>
                    <li><i class="ti-angle-right"></i>Ulasan</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 p-3">

                <div class="rincian-pembayaran mb-5">
                    <h5 class="text-center">Berikan Ulasan</h5>
                    <?php
                    include "lib/config.php";
                    include "lib/koneksi.php";
                    $idPesanan = $_GET['idPesanan'];


                    ?>



                    <form action="aksiUlasan.php" method="POST" enctype="multipart/form-data">
                        <div class="bukti-bayar">
                            <div class="nilai">
                                <span class="fa fa-star rating" cek="" id="rating-1" data-id="1"></span>
                                <span class="fa fa-star rating" cek="" id="rating-2" data-id="2"></span>
                                <span class="fa fa-star rating" cek="" id="rating-3" data-id="3"></span>
                                <span class="fa fa-star rating" cek="" id="rating-4" data-id="4"></span>
                                <span class="fa fa-star rating" cek="" id="rating-5" data-id="5"></span>
                            </div>
                            <input type="text" hidden name="nilai" id="nilai">
                            <input type="text" hidden name="idPesanan" value="<?php echo $idPesanan; ?>">


                            <div class="mb-3 text-ulasan">
                                <label for="exampleFormControlTextarea1" class="form-label">Tulis Ulasan</label>
                                <textarea class="form-control" name="ulasan" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Pilih Foto</label>
                                <input class="form-control" type="file" name="gambar" id="formFile" accept="image/*" >
                            </div>
                            <button class="btn-proses">Kirim Ulasan</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {

                $(".rating").on("click", function() {
                    var cek = $(this).attr("cek");
                    var id = $(this).data("id");
                    if (cek == '') {
                        for (i = 1; i <= id; i++) {
                            $('#rating-' + i).addClass("checked");
                            $('#rating-' + i).attr("cek", "1");
                        }

                        document.getElementById("nilai").value = parseInt(id);

                    } else {

                        for (i = 5; i >= id; i--) {
                            $('#rating-' + i).removeClass("checked");
                            $('#rating-' + i).attr("cek", "");
                        }
                        document.getElementById("nilai").value = parseInt(id);

                    }



                })




            })
        </script>