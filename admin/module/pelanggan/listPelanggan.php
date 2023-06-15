<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pelanggan</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="d-inline">Pelanggan</h4>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Kode Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = $_SESSION['id_penjahit'];
                                    $kueri = mysqli_query($koneksi, "SELECT DISTINCT A.idPelanggan as id, A.nama FROM tbl_pesanan B INNER JOIN  tbl_pelanggan A  ON A.idPelanggan = B.idPelanggan WHERE B.idPenjahit = '$id'");
                                    $no = 1;
                                    while ($res = mysqli_fetch_array($kueri)) {
                                    ?>
                                        <tr>
                                            <th><?php echo $no; ?></th>
                                            <td><?php echo $res['nama']; ?></td>
                                            <td>
                                                <?php
                                                $idP = $res['id'];
                                                $kueriP = mysqli_query($koneksi, "SELECT * FROM tbl_pesanan WHERE idPelanggan = '$idP'");

                                                while ($resP = mysqli_fetch_array($kueriP)) {
                                                ?>
                                                    <a href="<?php echo $admin_url; ?>adminweb.php?module=detailPesanan&id=<?php echo $resP['idPesanan'] ?>"><?php echo $resP['idPesanan']; ?></a><br>

                                                <?php
                                                } ?>

                                            </td>
                                            <td>
                                                <?php
                                                $kueriBlok = mysqli_query($koneksi, "SELECT * FROM tbl_blokir WHERE idPelanggan = '$idP' AND idPenjahit = '$id'");
                                                $cari = mysqli_num_rows($kueriBlok);

                                                if ($cari > 0) {
                                                ?>
                                                    <a onClick="return confirm('Anda yakin ingin membuka memblokir pelanggan ini?')" href="<?php echo $admin_url; ?>module/pelanggan/aksiBlokir.php?status=buka&id=<?php echo $res['id'] ?>" data-toggle="tooltip" data-placement="top" title="Buka Blokir"> Buka Blokir</a>
                                            </td>
                                        <?php
                                                } else {
                                        ?>
                                            <a onClick="return confirm('Anda yakin ingin memblokir pelanggan ini?')" href="<?php echo $admin_url; ?>module/pelanggan/aksiBlokir.php?status=blokir&id=<?php echo $res['id'] ?>" data-toggle="tooltip" data-placement="top" title="Blokir"><i class="ti-na"></i> Blokir</a></td>
                                        <?php
                                                }
                                        ?>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
        </div>
    </div>
</div>